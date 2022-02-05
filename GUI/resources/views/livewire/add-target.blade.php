<div>
    <button wire:click="$set('modal', 'true')" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
            Add Target
    </button>
    @if ($added)
        <x-alert class="mt-5">
            Target added succesfully
        </x-alert>
    @endif
    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            Add Target
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-6 gap-6">
                <div class="addTargetNameDiv col-span-6">
                    <label for="addTargetName" class="block font-medium text-sm text-gray-700">Name: </label>
                    <input type="text" id="addTargetName" wire:model="name" value="{{old('targetName')}}" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full ">
                    @error('name')
                        <p class="text-sm text-red-600 mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="addTargetIpDiv col-span-6">
                    <label for="addTargetIp" class="block font-medium text-sm text-gray-700">IP:</label>
                    <input type="text" id="addTargetIp" wire:model="ip" value="{{old('targetIp')}}" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                    @error('ip')
                        <p class="text-sm text-red-600 mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="addTargetDomDiv col-span-6">
                    <label for="addTargetDom" class="block font-medium text-sm text-gray-700">Domain: </label>
                    <input type="text" id="addTargetDom" wire:model="domain" value="{{old('targetDom')}}" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full ">
                    @error('domain')
                    <p class="text-sm text-red-600 mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="addTargetMacDiv col-span-6">
                    <label for="addTargetMac" class="block font-medium text-sm text-gray-700">MAC: </label>
                    <input type="text" id="addTargetMac" wire:model="mac" value="{{old('targetMac')}}" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                    @error('mac')
                        <p class="text-sm text-red-600 mt-2">{{$message}}</p>
                    @enderror
                    </div>
            </div>
        </x-slot>
        <x-slot name="footer">
                <button wire:click="submit" type="submit" id="addTargetSubmit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"> Add </button>
        </x-slot>
    </x-jet-dialog-modal>


</div>
