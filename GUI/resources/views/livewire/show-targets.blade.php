<div>

    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hosts
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="max-w-7xl py-3 sm:py-5  sm:px-6 lg:px-8 mx-auto">
            <div class="md:grid md:grid-cols-3 md:gap-3 xl:gap-4">
                <div class="col-span-3 sm:col-span-3 grid grid-cols-5 gap-1 mb-3 md:mb-0">
                    <div class="col-span-4">
                       <input type="search" id="targetSearch" wire:model='search' name="targetSearch" placeholder="Search target..." class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full ">
                    </div>
                    <div class="col-span-1 mx-auto my-auto">
                        <x-AddTarget />
                    </div>
                </div>
                @foreach ($targets as $target)
                    <x-index-host-card :target="$target" />
                @endforeach
            </div>
        <div class="mt-2">
            {{$targets->links()}}

        </div>
        </div>
    </div>

</div>

