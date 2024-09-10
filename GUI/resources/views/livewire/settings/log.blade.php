

<x-jet-form-section submit="updateLogs">
    <x-slot name="title">
        {{ __('Change logs files') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Default logfile is /var/log/pmon.log
                Default error logfile is /var/log/pmon.err.log
                ') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="logfile" value="{{ __('Logfile') }}" />
            <x-jet-input id="logfile" type="text" class="mt-1 block w-full" wire:model.defer="database" />
            <x-jet-input-error for="logfile" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="errlogfile" value="{{ __('Error logfile') }}" />
            <x-jet-input id="errlogfile" type="text" class="mt-1 block w-full" wire:model.defer="database" />
            <x-jet-input-error for="errlogfile" class="mt-2" />
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
