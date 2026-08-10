@extends('layouts.app')

@section('title', __('messages.departments') . ' | Safa Mall')

@section('content')
<!-- Header Section -->
<header class="mb-16 text-center max-w-2xl mx-auto px-margin-mobile md:px-margin-desktop mt-12">
    <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-primary mb-6">{{ __('messages.our_departments') }}</h1>
    <p class="font-body-lg text-body-lg text-on-surface-variant">{{ __('messages.our_departments_desc') }}</p>
</header>

<!-- Bento Grid Departments -->
<section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mb-24 grid grid-cols-1 md:grid-cols-12 gap-6 auto-rows-[350px]">
    @foreach($categories as $index => $category)
        @if($index % 4 == 0)
            <!-- Large Card -->
            <article class="bento-card md:col-span-8 md:row-span-2 rounded-2xl bg-surface-container-low shadow-[0_10px_40px_rgba(95,116,100,0.05)] overflow-hidden relative group">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-80" src="{{ $category->image ? asset($category->image) : asset(\App\Models\Setting::where('key', 'logo')->value('value') ?? 'images/logo.png') }}" alt="{{ $category->localized_name }}">
                <div class="absolute inset-0 bg-gradient-to-t from-surface-variant/90 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-8 w-full">
                    <h2 class="font-headline-md text-headline-md text-primary mb-3">{{ $category->localized_name }}</h2>
                    <p class="font-body-lg text-body-lg text-on-surface mb-6 max-w-lg line-clamp-2">{{ $category->localized_description }}</p>
                    <a href="{{ route('categories.show', $category->slug) }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container hover:text-on-primary-container transition-colors duration-300">
                        {{ __('messages.explore') }} <span class="material-symbols-outlined" style="font-size: 18px;">arrow_forward</span>
                    </a>
                </div>
            </article>
        @elseif($index % 4 == 1)
            <!-- Tall Card -->
            <article class="bento-card md:col-span-4 md:row-span-2 rounded-2xl bg-surface-container shadow-[0_10px_40px_rgba(95,116,100,0.05)] overflow-hidden relative group flex flex-col">
                <div class="h-1/2 w-full relative overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $category->image ? asset($category->image) : asset(\App\Models\Setting::where('key', 'logo')->value('value') ?? 'images/logo.png') }}" alt="{{ $category->localized_name }}">
                </div>
                <div class="p-8 flex-grow flex flex-col justify-center bg-surface-container-low">
                    <h2 class="font-headline-sm text-headline-sm text-primary mb-3">{{ $category->localized_name }}</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3">{{ $category->localized_description }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('categories.show', $category->slug) }}" class="inline-flex items-center gap-1 text-secondary hover:text-secondary-container transition-colors font-label-md text-label-md group/link">
                            {{ __('messages.explore') }} <span class="material-symbols-outlined transform group-hover/link:translate-x-1 transition-transform" style="font-size: 16px;">east</span>
                        </a>
                    </div>
                </div>
            </article>
        @elseif($index % 4 == 2)
            <!-- Wide Card 1 -->
            <article class="bento-card md:col-span-6 md:row-span-1 rounded-2xl bg-surface-container-low shadow-[0_10px_40px_rgba(95,116,100,0.05)] overflow-hidden relative group flex items-center h-[350px]">
                <div class="w-2/5 h-full relative overflow-hidden hidden sm:block">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $category->image ? asset($category->image) : asset(\App\Models\Setting::where('key', 'logo')->value('value') ?? 'images/logo.png') }}" alt="{{ $category->localized_name }}">
                </div>
                <div class="p-8 w-full sm:w-3/5">
                    <h2 class="font-headline-sm text-headline-sm text-primary mb-2">{{ $category->localized_name }}</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-4 line-clamp-3">{{ $category->localized_description }}</p>
                    <a class="inline-flex items-center gap-1 text-secondary hover:text-secondary-container transition-colors font-label-md text-label-md group/link" href="{{ route('categories.show', $category->slug) }}">
                        {{ __('messages.explore') }} <span class="material-symbols-outlined transform group-hover/link:translate-x-1 transition-transform" style="font-size: 16px;">east</span>
                    </a>
                </div>
            </article>
        @else
            <!-- Wide Card 2 -->
            <article class="bento-card md:col-span-6 md:row-span-1 rounded-2xl bg-surface-container shadow-[0_10px_40px_rgba(95,116,100,0.05)] overflow-hidden relative group flex items-center h-[350px]">
                <div class="p-8 w-full sm:w-3/5 order-2 sm:order-1">
                    <h2 class="font-headline-sm text-headline-sm text-primary mb-2">{{ $category->localized_name }}</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-4 line-clamp-3">{{ $category->localized_description }}</p>
                    <a class="inline-flex items-center gap-1 text-secondary hover:text-secondary-container transition-colors font-label-md text-label-md group/link" href="{{ route('categories.show', $category->slug) }}">
                        {{ __('messages.explore') }} <span class="material-symbols-outlined transform group-hover/link:translate-x-1 transition-transform" style="font-size: 16px;">east</span>
                    </a>
                </div>
                <div class="w-2/5 h-full relative overflow-hidden hidden sm:block order-1 sm:order-2">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $category->image ? asset($category->image) : asset(\App\Models\Setting::where('key', 'logo')->value('value') ?? 'images/logo.png') }}" alt="{{ $category->localized_name }}">
                </div>
            </article>
        @endif
    @endforeach
</section>
@endsection
