<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <div class="mb-6">
        <div class="flex items-center gap-3">
            <div
                class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-sm font-bold text-white">
                TE
            </div>
            <div>
                <div class="text-lg font-semibold text-slate-900">TrackEd</div>
                <div class="text-xs text-slate-500">Permission-Based Access (PBAC)</div>
            </div>
        </div>

        <p class="mt-4 te-muted">
            Use your DepEd email to sign in. Accounts are provisioned by your School Administrator.
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('DepEd Email')" class="te-label" />
            <x-text-input id="email" class="te-input mt-1" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" placeholder="name@deped.edu.ph" />
            <p class="te-help">Example: name@deped.edu.ph</p>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="te-label" />

            <x-text-input id="password" class="te-input mt-1" type="password" name="password" required
                autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            <span class="text-sm text-slate-500">
                Need access? Contact your School ICT Coordinator.
            </span>
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
