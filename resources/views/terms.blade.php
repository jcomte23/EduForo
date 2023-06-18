<x-guest-layout>
    <div class="pt-4 bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-authentication-card-logo />
            </div>

            <div class="flex items-center w-full sm:max-w-2xl">
                <h1 class="text-4xl font-custom font-bold text-center dark:text-white">{{ __('Terms of Service') }}</h1>
                <div x-data="{ open: false }" class="relative ml-auto order-last">
                    <div>
                        <button @click="open = !open" type="button"
                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gray-700 border border-transparent rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-white">
                            {{ __('Lang') }}
                            <svg x-bind:class="{ 'rotate-180': open }"
                                class="w-5 h-5 ml-2 -mr-1 transition-transform duration-200"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 -mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 w-max"
                        role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <div class="py-1 text-center" role="none">
                            <a href="{{ route('lang', 'es') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                role="menuitem">Español</a>
                            <a href="{{ route('lang', 'fr') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                role="menuitem">Français</a>
                            <a href="{{ route('lang', 'en') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                role="menuitem">English</a>
                            <a href="{{ route('lang', 'it') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                role="menuitem">Italiano</a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="w-full sm:max-w-2xl mt-6 p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
                <p>{{ __('terms1') }}</p>

                <p><strong>{{ __('Information we collect') }}:</strong></p>
                <ul>
                    <li>{{ __('InformationCollect1') }}/li>
                    <li>{{ __('InformationCollect2') }}</li>
                </ul>

                <p><strong>{{ __('Use of information') }}:</strong></p>
                <ul>
                    <li>{{ __('UseInformation1') }}</li>
                    <li>{{ __('UseInformation2') }}</li>
                    <li>{{ __('UseInformation3') }}</li>
                </ul>

                <p><strong>{{ __('Information security') }}:</strong></p>
                <ul>
                    <li>{{ __('InformationSecurity1') }}.</li>
                    <li>{{ __('InformationSecurity2') }}</li>
                </ul>

                <p><strong>{{ __('Your options') }}:</strong></p>
                <ul>
                    <li>{{ __('YourOptions1') }}</li>
                    <li>{{ __('YourOptions2') }}</li>
                </ul>

                <p><strong>{{ __('Changes in the privacy policy') }}:</strong></p>
                <ul>
                    <li>{{ __('ChangesPrivacyPolicy') }}</li>
                </ul>

                <p class="text-justify">{{ __('terms2') }}</p>
            </div>
        </div>
    </div>
</x-guest-layout>
