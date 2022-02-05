<div class="mt-5 md:mt-0 md:col-span-2">
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-4">
                <input type="search" id="targetSearch" wire:model='search' name="targetSearch" placeholder="Search target..." class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full ">
            </div>
            @if (isset($targets))

            @foreach ($targets as $target)

            <div class="col-span-6 sm:col-span-4 bg-orange-100 shadow py-8 px-4">
                <div class="grid grid-cols-6 gap-6">
                    <div class="targetDeleteInfo col-span-3 sm:col-span-3">
                        <div class="w-full">
                            <p class="w-full"><strong>Name:</strong> {{$target->name ?? ''}}</p>
                        </div>
                    </div>
                    <div class="targetDeleteInfo col-span-3 sm:col-span-3">
                        <div class="w-full">
                            <p class="w-full"><strong>IP:</strong> {{$target->IP ?? ''}}</p>
                        </div>
                    </div>
                    <div class="targetDeleteInfo col-span-3 sm:col-span-3  ">
                        <div class="w-full">
                            <p class="w-full"><strong>Domain:</strong> {{$target->domain ?? ''}}</p>
                        </div>
                    </div>
                    <div class="targetDeleteInfo col-span-3 sm:col-span-3 ">
                        <div class="w-full">
                            <p class="w-full"><strong>MAC:</strong> {{$target->MAC ?? ''}}</p>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="py-5">
                        <div class="border-t border-orange-200"></div>
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-6">
                    <div class="addTargetSubmitDiv col-span-3">
                        <input type="checkbox" name="sure" id="suer">
                        <p class="inline-flex ml-5">Are you sure?    </p>
                    </div>
                    <div class="addTargetSubmitDiv col-span-3">
                        <button id="deleteTargetSubmit" wire:model="deleteTarget" class="block items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">Delet Target </button>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

