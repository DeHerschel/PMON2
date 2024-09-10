

<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Email when down') }}
    </x-slot>

    <x-slot name="description">
        {{ __('') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="mailbutt" value="{{ __('Mail when down?') }}" />
            <x-jet-input id="mailbutt" type="text" class="mt-1 block w-full" wire:model.defer="database" />
            <x-switch></x-switch>
        </div>

    </x-slot>
</x-jet-form-section>
