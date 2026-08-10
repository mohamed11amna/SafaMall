<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>@yield('title', 'Safa Mall - Wellness through Design')</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-secondary-fixed": "#281805",
                    "primary-fixed": "#d1e8d5",
                    "tertiary": "#535855",
                    "surface-bright": "#faf9f7",
                    "surface-container": "#efeeec",
                    "on-tertiary-container": "#f0f4f1",
                    "primary-container": "#5f7464",
                    "on-secondary-container": "#765e44",
                    "primary-fixed-dim": "#b5ccb9",
                    "tertiary-container": "#6b706e",
                    "surface-variant": "#e3e2e0",
                    "surface-container-highest": "#e3e2e0",
                    "on-surface-variant": "#434843",
                    "outline": "#737873",
                    "on-primary-container": "#e2f9e5",
                    "on-primary-fixed": "#0c1f13",
                    "on-primary": "#ffffff",
                    "surface-container-high": "#e9e8e6",
                    "on-surface": "#1a1c1b",
                    "inverse-on-surface": "#f1f1ef",
                    "secondary-container": "#fadab9",
                    "secondary-fixed": "#fdddbc",
                    "secondary-fixed-dim": "#e0c1a1",
                    "on-primary-fixed-variant": "#374b3d",
                    "surface-container-low": "#f4f3f1",
                    "surface-dim": "#dadad8",
                    "on-secondary-fixed-variant": "#58432b",
                    "surface-container-lowest": "#ffffff",
                    "on-secondary": "#ffffff",
                    "on-tertiary-fixed-variant": "#434846",
                    "primary": "#475b4c",
                    "surface": "#faf9f7",
                    "on-tertiary-fixed": "#181d1b",
                    "on-tertiary": "#ffffff",
                    "inverse-primary": "#b5ccb9",
                    "on-background": "#1a1c1b",
                    "secondary": "#715a40",
                    "inverse-surface": "#2f3130",
                    "tertiary-fixed": "#dfe3e0",
                    "tertiary-fixed-dim": "#c3c7c4",
                    "background": "#faf9f7",
                    "surface-tint": "#4f6354",
                    "error": "#ba1a1a",
                    "on-error": "#ffffff",
                    "error-container": "#ffdad6",
                    "outline-variant": "#c3c8c1",
                    "on-error-container": "#93000a"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "margin-mobile": "20px",
                    "margin-desktop": "64px",
                    "gutter": "24px",
                    "container-max": "1280px",
                    "unit": "8px"
            },
            "fontFamily": {
                    "headline-md": ["EB Garamond"],
                    "body-md": ["Inter"],
                    "display-lg-mobile": ["EB Garamond"],
                    "label-md": ["Inter"],
                    "display-lg": ["EB Garamond"],
                    "body-lg": ["Inter"],
                    "caption": ["Inter"],
                    "headline-sm": ["EB Garamond"]
            },
            "fontSize": {
                    "headline-md": ["32px", {"lineHeight": "1.2", "fontWeight": "500"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "display-lg-mobile": ["36px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "500"}],
                    "label-md": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "500"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "caption": ["12px", {"lineHeight": "1.4", "fontWeight": "400"}],
                    "headline-sm": ["24px", {"lineHeight": "1.3", "fontWeight": "500"}]
            }
          },
        },
      }
</script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined.fill {
            font-variation-settings: 'FILL' 1;
        }
        .ambient-shadow {
            box-shadow: 0 10px 40px rgba(95, 116, 100, 0.05);
        }
        @keyframes softFadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: softFadeIn 1s ease-out forwards;
        }
</style>
</head>
<body class="bg-surface text-on-surface antialiased font-body-md text-body-md">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 bg-surface/90 dark:bg-surface-dim/90 backdrop-blur-md shadow-[0_10px_40px_rgba(95,116,100,0.05)] border-none">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop flex justify-between items-center h-24">
<!-- Brand -->
<a href="{{ route('home') }}" class="block h-20">
  <img src="{{ asset(\App\Models\Setting::where('key', 'logo')->value('value') ?? 'images/logo.png') }}" alt="Safa Mall Logo" class="h-full w-auto object-contain scale-125 origin-left">
</a>
<!-- Navigation Links (Desktop) -->
<div class="hidden md:flex items-center space-x-8 rtl:space-x-reverse">
<a class="text-on-surface-variant dark:text-on-tertiary-fixed-variant hover:text-primary transition-colors duration-300 font-label-md text-label-md cursor-pointer transition-all duration-500 ease-in-out hover:opacity-80 transition-opacity" href="{{ route('home') }}">{{ __('messages.home') }}</a>
<a class="text-on-surface-variant dark:text-on-tertiary-fixed-variant hover:text-primary transition-colors duration-300 font-label-md text-label-md cursor-pointer transition-all duration-500 ease-in-out hover:opacity-80 transition-opacity" href="{{ route('categories') }}">{{ __('messages.departments') }}</a>
</div>
<!-- Trailing Icons & Lang -->
<div class="flex items-center space-x-4 rtl:space-x-reverse">
<a href="{{ route('lang.switch', app()->getLocale() == 'ar' ? 'en' : 'ar') }}" class="font-label-md text-label-md text-primary hover:opacity-80 transition-opacity">
    {{ app()->getLocale() == 'ar' ? 'EN' : 'عربي' }}
</a>
<button class="md:hidden text-primary p-2">
<span class="material-symbols-outlined">menu</span>
</button>
</div>
</div>
</nav>

<!-- Main Content Canvas -->
<main class="pt-20">
    @yield('content')
</main>

<!-- Footer Component -->
<footer class="w-full py-20 bg-surface-container-low dark:bg-inverse-surface flat no shadows transition-all duration-300">
<div class="max-w-container-max mx-auto px-margin-desktop grid grid-cols-1 md:grid-cols-3 gap-gutter">
<!-- Brand & Copyright -->
<div class="flex flex-col justify-between space-y-6 md:space-y-0">
<div><img src="{{ asset(\App\Models\Setting::where('key', 'logo')->value('value') ?? 'images/logo.png') }}" alt="Safa Mall Logo" class="h-20 w-auto object-contain"></div>
<div class="font-caption text-caption text-secondary dark:text-secondary-fixed">
                    © {{ date('Y') }} Safa Mall. Wellness through Design.
                </div>
</div>
<!-- Links Column 1 -->
<div class="flex flex-col space-y-4">
<a class="font-body-lg text-body-lg text-on-surface-variant/80 dark:text-on-tertiary-fixed-variant hover:text-primary dark:hover:text-primary-fixed-dim transition-colors duration-300" href="#">Our Story</a>
<a class="font-body-lg text-body-lg text-on-surface-variant/80 dark:text-on-tertiary-fixed-variant hover:text-primary dark:hover:text-primary-fixed-dim transition-colors duration-300" href="#">Departments</a>
</div>
<!-- Links Column 2 -->
<div class="flex flex-col space-y-4">
<a class="font-body-lg text-body-lg text-on-surface-variant/80 dark:text-on-tertiary-fixed-variant hover:text-primary dark:hover:text-primary-fixed-dim transition-colors duration-300" href="#">Contact Us</a>
</div>
</div>
</footer>

</body></html>
