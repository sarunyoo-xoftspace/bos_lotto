<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div>
                <a href="./">
                    <img src="{{ asset("assets/img/lottery_logo.png") }}" alt="" srcset="" class="img" style="width: 120px; height: 40px;">
                </a>
            </div>
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
                <label for="email">{{ __("label.page_login_username") }}</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
            </div>

            <div class="mt-4">
                <label for="password">{{ __('label.page_login_password') }}</label>
                <input type="password" id="password" name="password" class="block mt-1 w-full" required autocomplete="current-password" />
            </div>

            {{-- 
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
             --}}

            <div class="flex items-center justify-end mt-4">
                
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
