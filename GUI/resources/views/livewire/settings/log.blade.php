

<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Change database file') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The default database file is /et/pmon2/pmon2db.sqlite') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="database" value="{{ __('database') }}" />
            <x-jet-input id="database" type="text" class="mt-1 block w-full" wire:model.defer="database" />
            <x-jet-input-error for="username" class="mt-2" />
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
