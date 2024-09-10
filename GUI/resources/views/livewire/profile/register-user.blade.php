<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Register a new user') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure the new account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="username" value="{{ __('Username') }}" />
            <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="username" />
            <x-jet-input-error for="username" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="firstname" value="{{ __('First Name') }}" />
            <x-jet-input id="firstname" type="text" class="mt-1 block w-full" wire:model.defer="firstname" />
            <x-jet-input-error for="firstname" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="lastname" value="{{ __('Last Name') }}" />
            <x-jet-input id="lastname" type="text" class="mt-1 block w-full" wire:model.defer="lastname" />
            <x-jet-input-error for="lastname" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
             <div class="addTargetDomDiv col-span-6" >
                    <label for="role" class="block font-medium text-sm text-gray-700">Rol: </label>
                    <select id="role" name="role" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full ">
                        <option wire:model="role" value="1">Superadmin</option>
                        <option wire:model="role" value="2">Sysadmin</option>
                        <option wire:model="role" value="3">Programmer</option>
                    </select>
                </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="conf_password" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="conf_password" type="password" class="mt-1 block w-full" wire:model.defer="conf_password" />
            <x-jet-input-error for="conf_password" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-button class="bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-jet-form-section>
