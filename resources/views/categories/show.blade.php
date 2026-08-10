@extends('layouts.app')

@section('title', $category->name . ' - Departments | Safa Mall')

@section('content')
<!-- Header Section -->
<header class="mb-16 text-center max-w-2xl mx-auto px-margin-mobile md:px-margin-desktop mt-12">
    <nav class="flex justify-center items-center space-x-2 text-on-surface-variant mb-6 font-caption text-caption">
        <a class="hover:text-primary transition-colors" href="{{ route('categories') }}">Departments</a>
        <span class="material-symbols-outlined text-sm">chevron_right</span>
        <span class="text-primary">{{ $category->localized_name }}</span>
    </nav>
    <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-primary mb-6">{{ $category->localized_name }}</h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-3xl">{{ $category->localized_description }}</p>
</header>

<!-- Products Grid -->
<section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mb-24 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($category->products as $product)
    <article class="bento-card rounded-2xl bg-surface-container-low shadow-[0_10px_40px_rgba(95,116,100,0.05)] overflow-hidden relative group flex flex-col h-[400px]">
        <div class="h-1/2 w-full relative overflow-hidden">
            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $product->image ? asset($product->image) : asset(\App\Models\Setting::where('key', 'logo')->value('value') ?? 'images/logo.png') }}" alt="{{ $product->localized_name }}">
        </div>
        <div class="p-6 flex-grow flex flex-col justify-between bg-surface-container-low">
            <div>
                <h2 class="font-headline-sm text-headline-sm text-on-surface mb-2 line-clamp-1">{{ $product->localized_name }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-4">{{ $product->localized_description }}</p>
            </div>
            <div class="flex items-center justify-between mt-auto">
                <span class="font-label-md text-label-md text-on-surface font-semibold">${{ number_format($product->price, 2) }}</span>
                <a class="inline-flex items-center gap-1 text-primary hover:text-primary-container transition-colors font-label-md text-label-md group/link bg-primary-fixed/20 px-4 py-2 rounded-full" href="{{ route('products.show', $product->slug) }}">
                    Details <span class="material-symbols-outlined transform group-hover/link:translate-x-1 transition-transform" style="font-size: 16px;">east</span>
                </a>
            </div>
        </div>
    </article>
    @empty
    <div class="col-span-full text-center py-20">
        <span class="material-symbols-outlined text-4xl text-on-surface-variant/50 mb-4">inventory_2</span>
        <h3 class="font-headline-sm text-headline-sm text-on-surface-variant mb-2">No Products Found</h3>
        <p class="font-body-md text-body-md text-on-surface-variant/80">Check back later for new arrivals in this department.</p>
    </div>
    @endforelse
</section>
@endsection
