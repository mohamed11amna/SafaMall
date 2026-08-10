@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative w-full min-h-[90vh] flex items-center justify-center overflow-hidden bg-surface-container-low">
<div class="absolute inset-0 z-0">
<div class="w-full h-full bg-cover bg-center opacity-90 mix-blend-multiply" data-alt="A serene, high-end living space infused with biophilic design elements. Sunlight streams softly through large windows, illuminating lush green indoor plants, warm oak wood furniture, and pristine white stone surfaces. The atmosphere is calm, restorative, and luxurious, adhering to a soft minimalist aesthetic with subtle sage green accents." style="background-image: url('{{ asset(\App\Models\Setting::where('key', 'hero_image')->value('value')) }}')"></div>
<!-- Soft gradient overlay to ensure text readability -->
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-low via-surface/40 to-transparent"></div>
</div>
<div class="relative z-10 text-center max-w-4xl mx-auto px-margin-mobile md:px-margin-desktop animate-fade-in">
<span class="font-label-md text-label-md text-primary tracking-widest uppercase mb-6 block opacity-80">Safa Mall</span>
<h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-surface mb-8">The Art of Living Well</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto mb-12">Discover a curated collection of sustainable home goods, elegantly designed to bring serenity and balance to your sanctuary.</p>
<a href="{{ route('categories') }}" class="bg-primary text-on-primary font-label-md text-label-md py-4 px-8 rounded-full hover:bg-primary-container hover:text-on-primary-container transition-all duration-500 shadow-md">
                    {{ __('messages.explore') }}
                </a>
</div>
</section>

<!-- Bento Grid: Curated Categories -->
<section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-24 md:py-32">
<div class="text-center mb-16">
<h2 class="font-headline-md text-headline-md text-on-surface mb-4">{{ __('messages.our_departments') }}</h2>
<p class="font-body-md text-body-md text-on-surface-variant max-w-xl mx-auto">{{ __('messages.our_departments_desc') }}</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter auto-rows-[300px]">
    @if(isset($featuredCategories) && $featuredCategories->count() > 0)
        <!-- First Category (Large) -->
        <a href="{{ route('categories.show', $featuredCategories[0]->slug) }}" class="md:col-span-8 row-span-2 group relative overflow-hidden rounded-2xl bg-surface-container ambient-shadow cursor-pointer">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 group-hover:scale-105" style="background-image: url('{{ asset($featuredCategories[0]->image) }}')"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-on-surface/60 to-transparent opacity-80 transition-opacity duration-500"></div>
            <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full">
                <h3 class="font-headline-sm text-headline-sm text-on-primary mb-2">{{ $featuredCategories[0]->localized_name }}</h3>
                <p class="font-body-md text-body-md text-surface-bright/90 max-w-md hidden md:block">{{ $featuredCategories[0]->localized_description }}</p>
            </div>
        </a>
        
        @foreach($featuredCategories->skip(1)->take(2) as $category)
        <a href="{{ route('categories.show', $category->slug) }}" class="md:col-span-4 row-span-1 group relative overflow-hidden rounded-2xl bg-secondary-container ambient-shadow cursor-pointer">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 group-hover:scale-105" style="background-image: url('{{ asset($category->image) }}')"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-on-surface/50 to-transparent opacity-80"></div>
            <div class="absolute bottom-0 left-0 p-6 w-full">
                <h3 class="font-headline-sm text-headline-sm text-on-primary mb-1">{{ $category->localized_name }}</h3>
                <span class="text-surface-bright/80 font-label-md text-label-md flex items-center group-hover:text-primary-fixed transition-colors duration-300">
                    {{ __('messages.explore') }} <span class="material-symbols-outlined ml-2 rtl:rotate-180 text-sm">arrow_forward</span>
                </span>
            </div>
        </a>
        @endforeach
    @endif
</div>
<div class="mt-12 text-center">
    <a href="{{ route('categories') }}" class="inline-flex items-center text-primary font-label-md text-label-md hover:opacity-80">
        {{ __('messages.view_all') }} <span class="material-symbols-outlined ml-2 rtl:rotate-180 text-sm">arrow_forward</span>
    </a>
</div>
</section>

<!-- Newsletter / Calm CTA -->
<section class="bg-surface-container-lowest py-24 md:py-32">
<div class="max-w-3xl mx-auto px-margin-mobile md:px-margin-desktop text-center">
<img src="{{ asset(\App\Models\Setting::where('key', 'logo')->value('value') ?? 'images/logo.png') }}" alt="Safa Mall Logo" class="h-20 w-auto object-contain opacity-50 mb-6 mx-auto">
<h2 class="font-headline-md text-headline-md text-on-surface mb-6">{{ __('messages.cultivate') }}</h2>
<p class="font-body-md text-body-md text-on-surface-variant mb-10">{{ __('messages.cultivate_desc') }}</p>
<form class="flex flex-col sm:flex-row gap-4 justify-center items-center max-w-lg mx-auto" onsubmit="event.preventDefault();">
<input class="w-full bg-surface-container border-none rounded-2xl py-4 px-6 font-body-md text-body-md text-on-surface focus:ring-2 focus:ring-primary focus:outline-none transition-all duration-300" placeholder="{{ __('messages.email_placeholder') }}" type="email">
<button class="w-full sm:w-auto bg-primary text-on-primary font-label-md text-label-md py-4 px-8 rounded-full hover:bg-primary-container hover:text-on-primary-container transition-all duration-500 whitespace-nowrap" type="submit">
                        {{ __('messages.subscribe') }}
                    </button>
</form>
</div>
</section>
@endsection
