<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <!-- First Name -->
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name"
                            class="block mt-1 w-full"
                            type="text"
                            name="first_name"
                            :value="old('first_name')"
                            required
                            autofocus />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name"
                            class="block mt-1 w-full"
                            type="text"
                            name="last_name"
                            :value="old('last_name')"
                            required />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role_id" :value="__('Role')" />

            <select name="role_id"
                    id="role_id"
                    onchange="toggleVendorField()"
                    class="text-sm block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                <option class="text-sm" value="">Select Role</option>

                @foreach($roles as $role)
                    <option class="text-sm" value="{{ $role->role_id }}"
                        {{ old('role_id') == $role->role_id ? 'selected' : '' }}>
                        {{ $role->role_name }}
                    </option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
        </div>
        <div id="vendor_select_container" class="mt-4 hidden">
                <label for="vendor_id" class="block text-sm font-medium text-gray-700">Vendor Name</label>
                <select id="vendor_id" name="vendor_id" class="block mt-1 w-full text-sm rounded-md shadow-sm border-gray-300">
                    <option class="text-sm"value="">-- Choose Your Vendor --</option>
                    @foreach($vendors as $vendor)
                        <option value="{{ $vendor->user_id }}">
                            {{ $vendor->first_name }} {{ $vendor->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <script>
            function toggleVendorField() {
                const roleSelect = document.getElementById('role_id');
                const container = document.getElementById('vendor_select_container');
                const businessContainer = document.getElementById('business_name_container');
                
                if (!roleSelect || !roleSelect.selectedOptions[0]) return;
                
                const selectedOption = roleSelect.selectedOptions[0];
                const roleName = selectedOption.getAttribute('data-name') || '';

                // Safely checks if the ID is 3 or the role name contains "clerk"
                if (roleSelect.value === '3' || roleName.includes('clerk')) {
                    container.classList.remove('hidden');
                    if (businessContainer) businessContainer.classList.add('hidden');
                } else {
                    container.classList.add('hidden');
                    if (businessContainer) businessContainer.classList.remove('hidden');
                }
            }

            // This ensures the dropdown displays properly if validation fails and reloads the page
            document.addEventListener('DOMContentLoaded', function() {
                toggleVendorField();
            });
        </script>

        <!-- Business name-->
        <div class="mt-4" id="business_name_container">
            <x-input-label for="business_name" :value="__('Business Name')" />

            <x-text-input id="business_name"
                        class="block mt-1 w-full"
                        type="text"
                        name="business_name"
                        :value="old('business_name')" />

            <x-input-error :messages="$errors->get('business_name')" class="mt-2" />
        </div>
        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
