@extends('layouts.app')

@section('title', $product->name . ' - Safa Mall')

@section('content')
<!-- Product Hero Canvas -->
<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-20 mt-10">
    <!-- Breadcrumb -->
    <nav class="flex items-center space-x-2 text-on-surface-variant mb-6 font-caption text-caption">
        <a class="hover:text-primary transition-colors" href="{{ route('categories') }}">Departments</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="{{ route('categories.show', $product->category->slug) }}">{{ $product->category->name }}</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <span class="text-primary">{{ $product->name }}</span>
    </nav>

    <!-- Bento Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter mb-[120px]">
        <!-- Product Gallery (Main) -->
        <div class="lg:col-span-7 bg-surface-container-lowest rounded-xl shadow-[0_10px_40px_rgba(95,116,100,0.05)] p-8 flex flex-col justify-center items-center overflow-hidden relative">
            <div class="absolute inset-0 z-0 bg-gradient-to-b from-surface-bright to-surface-container opacity-50"></div>
            <!-- Dynamic Image or Fallback -->
            <img alt="{{ $product->localized_name }}" class="w-full h-auto object-cover rounded-lg z-10 max-h-[600px]" src="{{ $product->image ? asset($product->image) : asset(\App\Models\Setting::where('key', 'logo')->value('value') ?? 'images/logo.png') }}">
        </div>
        <!-- Product Details -->
        <div class="lg:col-span-5 flex flex-col justify-center pl-0 lg:pl-10 mt-10 lg:mt-0">
            <h1 class="font-display-md text-display-md text-primary mb-2">{{ $product->localized_name }}</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">{{ $product->category->localized_name }}</p>
            <p class="font-body-lg text-body-lg text-on-surface-variant mb-8 leading-relaxed">
                {{ $product->localized_description }}
            </p>
            <div class="flex items-baseline space-x-4 mb-10">
                <span class="font-headline-md text-headline-md text-on-surface">{{ number_format($product->price, 2) }} EGP</span>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 mb-12">@php
    $whatsappNumber = "201011193027"; // Add your mall's WhatsApp number here
    $productUrl = urlencode(route('products.show', $product->slug));
    $message = urlencode("Hello! I am interested in this product: " . $product->localized_name . "\nLink: " . $productUrl);
@endphp
<a href="https://wa.me/{{ $whatsappNumber }}?text={{ $message }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 bg-[#25D366] hover:bg-[#1ebe57] text-white font-label-lg text-label-lg py-4 px-8 rounded-full transition-all duration-300 shadow-md hover:shadow-lg w-full md:w-auto">
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.487-1.761-1.663-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    {{ __('messages.inquire_whatsapp') }}
</a>
            </div>

            <!-- Specifications Mini-Grid -->
            <div class="grid grid-cols-2 gap-6 mt-auto">
                <div class="flex flex-col space-y-2">
                    <span class="material-symbols-outlined text-primary fill">local_shipping</span>
                    <span class="font-label-md text-label-md text-on-surface">Free Delivery</span>
                </div>
                <div class="flex flex-col space-y-2">
                    <span class="material-symbols-outlined text-primary">support_agent</span>
                    <span class="font-label-md text-label-md text-on-surface">24/7 Support</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
