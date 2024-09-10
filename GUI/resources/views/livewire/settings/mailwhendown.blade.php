

<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Email when down') }}
    </x-slot>

    <x-slot name="description">
        {{ __('PMON can email all the users of a concrete role when a host assigned to that role is down') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 text-gray-800">
            
            Do you want pmon to send an email when a host is down?
        </div>

    </x-slot>

    <x-slot name="actions">
    <div>
                <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer">
                <div class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-300 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-300 peer-checked:bg-blue-600"></div>
                </label>
            </div>
    </x-slot>
</x-jet-form-section>
