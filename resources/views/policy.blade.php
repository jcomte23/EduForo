<x-guest-layout>
    <div class="pt-4 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-authentication-card-logo />
            </div>

            <div class="flex items-center w-full sm:max-w-2xl">
                <h1 class="text-4xl font-custom font-bold text-center dark:text-white">{{ __('Privacy Policy') }}</h1>
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
                <p>{{ __('policy1') }}</p>

                <p><strong>{{ __('proper use') }}:</strong></p>
                <ul>
                    <li>{{ __('properUse1') }}</li>
                    <li>{{ __('properUse2') }}</li>
                    <li>{{ __('properUse3') }}</li>
                </ul>

                <p><strong>{{ __('Registration and User Accounts') }}:</strong></p>
                <ul>
                    <li>{{ __('Registration1') }}</li>
                    <li>{{ __('Registration2') }}</li>
                    <li>{{ __('Registration3') }}</li>
                </ul>

                <p><strong>{{ __('User Generated Content') }}:</strong></p>
                <ul>
                    <li>{{ __('GeneratedContent1') }}</li>
                    <li>{{ __('GeneratedContent2') }}</li>
                    <li>{{ __('GeneratedContent3') }}</li>
                </ul>

                <p><strong>{{ __('Intellectual Property') }}:</strong></p>
                <ul>
                    <li>{{ __('Property1') }}</li>
                    <li>{{ __('Property2') }}</li>
                </ul>

                <p><strong>{{ __('Limitation of Liability') }}:</strong></p>
                <ul>
                    <li>{{ __('Liability1') }}</li>
                    <li>{{ __('Liability2') }}</li>
                </ul>

                <p><strong>{{ __('Modifications and Termination') }}:</strong></p>
                <ul>
                    <li>{{ __('Termination1') }}</li>
                    <li>{{ __('Termination2') }}</li>
                </ul>

                <p class="text-justify">{{ __('policy2') }}</p>
            </div>
        </div>
    </div>
</x-guest-layout>
