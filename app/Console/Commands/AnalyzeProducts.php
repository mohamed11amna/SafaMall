<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class AnalyzeProducts extends Command
{
    protected $signature = 'app:analyze-products {--key= : The Gemini API Key}';
    protected $description = 'Analyze product images using Gemini and update database';

    public function handle()
    {
        ini_set('memory_limit', '-1');
        $apiKey = $this->option('key');
        if (!$apiKey) {
            $this->error('Please provide a Gemini API key using --key=...');
            return;
        }

        $products = Product::where('description', 'like', 'Experience the quality%')->get();
        if ($products->isEmpty()) {
            $this->info('No products found that need analysis.');
            return;
        }

        $this->info("Found {$products->count()} products to analyze.");

        $prompt = 'You are an expert ecommerce catalog manager in Egypt. Look at this product image. Give me a realistic English name, a perfect Arabic name, a realistic price in Egyptian Pounds (numeric only, e.g. 4500), a short engaging English description, and a perfect Arabic description. Return ONLY valid JSON with exactly these keys: "name", "name_ar", "price", "description", "description_ar". Do not wrap the JSON in markdown.';

        foreach ($products as $index => $product) {
            $this->info("Processing Product ID: {$product->id} (" . ($index + 1) . "/{$products->count()})");

            $imagePath = public_path($product->image);
            if (!File::exists($imagePath)) {
                $this->error("Image not found: {$imagePath}");
                continue;
            }

            $mimeType = File::mimeType($imagePath);
            $base64 = base64_encode(File::get($imagePath));

            $payload = [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt],
                            [
                                'inlineData' => [
                                    'mimeType' => $mimeType,
                                    'data' => $base64
                                ]
                            ]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'responseMimeType' => 'application/json',
                ]
            ];

            try {
                $response = Http::timeout(120)->withoutVerifying()->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash-lite:generateContent?key={$apiKey}", $payload);
                
                if ($response->failed()) {
                    $this->error("API Error: " . $response->body());
                    if ($response->status() === 429) {
                        $this->error("Rate limit or quota exceeded. Stopping.");
                        break;
                    }
                    continue;
                }

                $jsonResponse = $response->json();
                
                if (!isset($jsonResponse['candidates'][0]['content']['parts'][0]['text'])) {
                    $this->error("Unexpected API response format.");
                    continue;
                }

                $text = $jsonResponse['candidates'][0]['content']['parts'][0]['text'];
                $text = trim($text);
                if (str_starts_with($text, '```json')) {
                    $text = substr($text, 7);
                    if (str_ends_with($text, '```')) {
                        $text = substr($text, 0, -3);
                    }
                }
                
                $data = json_decode($text, true);

                if (json_last_error() !== JSON_ERROR_NONE) {
                    $this->error("Failed to parse JSON: " . json_last_error_msg() . " -> " . $text);
                    continue;
                }

                $product->update([
                    'name' => $data['name'] ?? $product->name,
                    'name_ar' => $data['name_ar'] ?? $product->name_ar,
                    'price' => isset($data['price']) ? (float) $data['price'] : $product->price,
                    'description' => $data['description'] ?? $product->description,
                    'description_ar' => $data['description_ar'] ?? $product->description_ar,
                ]);

                $this->info("Updated: {$product->name}");
                
                // Sleep to avoid rate limiting (usually 15 RPM for free tier, so 4 seconds)
                sleep(4);
            } catch (\Exception $e) {
                $this->error("Exception for Product ID {$product->id}: " . $e->getMessage());
                // Don't break, try the next product
                continue;
            }
        }

        $this->info('Finished analysis batch.');
    }
}
