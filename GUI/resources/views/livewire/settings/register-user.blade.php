<x-jet-form-section>
    <x-slot name="title">
        {{ __('Register a new user') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Register a new user') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 text-gray-800">

          
        </div>

    </x-slot>

    <x-slot name="actions">
    <div>

                <button wire:click="$set('registerModal', 'true')" class=" mt-1 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                Add user
                </button>
            </div>
    </x-slot>
</x-jet-form-section>



    <x-jet-dialog-modal wire:model="registerModal">
         <x-slot name="title" class="text-center text-gray-600">
            {{ __('Register a new user') }}
        </x-slot>
        <x-slot name="content">
            @livewire('profile.register')
        </x-slot>
        
        <x-slot name="footer">
        </x-slot> 

    </x-jet-dialog-modal>

