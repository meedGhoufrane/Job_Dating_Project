<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

            </div>
        </div>
    </div>

    {{-- <section class="bg-white dark:bg-gray-900 h-screen flex items-center justify-center">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold mb-2">Announcements Count:</h3>
                        <p>{{ $announcementCount }}</p>
                    </div>

                    <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold mb-2">Companies Count:</h3>
                        <p>{{ $companyCount }}</p>
                    </div>

                    <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold mb-2">Users Count:</h3>
                        <p>{{ $userCount }}</p>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}
</x-app-layout>

@push('scripts')
    <script>
        window.tailwindConfig = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            "50": "#eff6ff",
                            "100": "#dbeafe",
                            "200": "#bfdbfe",
                            "300": "#93c5fd",
                            "400": "#60a5fa",
                            "500": "#3b82f6",
                            "600": "#2563eb",
                            "700": "#1d4ed8",
                            "800": "#1e40af",
                            "900": "#1e3a8a",
                            "950": "#172554"
                        }
                    }
                },
                fontFamily: {
                    'body': [
                        'Inter',
                        'ui-sans-serif',
                        'system-ui',
                        '-apple-system',
                        'system-ui',
                        'Segoe UI',
                        'Roboto',
                        'Helvetica Neue',
                        'Arial',
                        'Noto Sans',
                        'sans-serif',
                        'Apple Color Emoji',
                        'Segoe UI Emoji',
                        'Segoe UI Symbol',
                        'Noto Color Emoji'
                    ],
                    'sans': [
                        'Inter',
                        'ui-sans-serif',
                        'system-ui',
                        '-apple-system',
                        'system-ui',
                        'Segoe UI',
                        'Roboto',
                        'Helvetica Neue',
                        'Arial',
                        'Noto Sans',
                        'sans-serif',
                        'Apple Color Emoji',
                        'Segoe UI Emoji',
                        'Segoe UI Symbol',
                        'Noto Color Emoji'
                    ]
                }
            }
        };
    </script>
@endpush
