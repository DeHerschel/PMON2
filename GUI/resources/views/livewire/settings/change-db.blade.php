
<div>


    <x-jet-form-section>
        <x-slot name="title">
            {{ __('Change database file ') }}
        </x-slot>

        <x-slot name="description">
            {{ __('The default database file is /et/pmon2/pmon2db.sqlite') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <label for="dbfile" value="{{ __('database file') }}" />
                <input id="dbfile" type="text" class="mt-1 block w-full" wire:model.defer="dbfile"/>
                <x-jet-input-error for="dbfile" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-button wire:click="$set('confModal', 'true')" class="bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                {{ __('Save') }}
            </x-button>
        </x-slot>

        
    </x-jet-form-section>
    <x-jet-dialog-modal wire:model="confModal">
            <x-slot name="title" class="">
                <div  class="bg-red-600 text-white text-center">
                {{ __('Warning!') }}
                </div>
            
            </x-slot>
            <x-slot name="content">
            

                <div class="">
                    <div class="mb-7 mt-4 p-1 text-gray-800">
                        {{ __('Change the database file will cause an interruptuion of the service. If you continue the database file will change, but the content of the database will be the same (copy). If you want a completly new database select the option bellow') }}
                
                    </div>

                    <div class="m-5">
                        <input wire:model="deletedb" id="deletedb" type="checkbox" value="1" class="text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 active:bg-blue-600">
                        <label for="deletedb" class="ml-3 text-gray-700">
                        
                        {{ __('New database?') }}
                        </label>
                    
                        <label for="deletedb" class="text-red-700">
                        {{ __('(Warning! Mark this check will delete your all your hosts and its pings!)') }}
                        </label>
                    

                    </div>
                </div>

        



            </x-slot>
            
            <x-slot name="footer">
                <x-jet-danger-button wire:click="updatefile" class="bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                    {{ __('Change database') }}
                </x-jet-danger-button>
            </x-slot> 
    </x-jet-dialog-modal>
</div>