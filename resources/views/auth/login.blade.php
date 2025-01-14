<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 bg-euro-darkest hover:bg-euro-dark">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>

        <div class="mt-4 border-t border-grey-200">

            <div class="mt-4">
                <form method="GET" action="{{ route('register') }}">
                    <button
                        class="w-full bg-euro-darkest hover:bg-euro-dark text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        {{ __('Signup') }}
                    </button>
                </form>
            </div>

            <div class="mt-4">
                <form method="GET" action="{{ route('facebook.login') }}">
                    <button
                        class="w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        {{ __('Login with Facebook') }}
                    </button>
                </form>
            </div>

        </div>
    </x-jet-authentication-card>
</x-guest-layout>
