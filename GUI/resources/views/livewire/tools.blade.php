<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tools
        </h2>
    </x-slot>
   <div class="max-w-7xl mx-auto">
        <div class="max-w-7xl py-10 sm:px-6 lg:px-8 mx-auto">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h4 class="text-lg font-medium text-gray-900"> Nslookup: </h4>
                    <p class="mt-1 text-sm text-gray-600"></p>
                </div>



                <div class="mt-5 md:mt-0 md:col-span-2">

                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">

                                    <input class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" name="lookup" id="" wire:model.lazy="lookupTarget" wire:keydown.Enter='lookUp'>

                                 </div>
                            </div>
                                @if ($lookup)
                                    <pre class="mt-5 text-gray-600">{{$lookup}}</pre>
                                @endif

                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        </div>
                </div>



            </div>
            <div class="hidden sm:block">
                <div class="py-8">
                    <div class="border-t border-gray-200">
                    </div>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h4 class="text-lg font-medium text-gray-900">Traceroute: </h4>
                    <p class="mt-1 text-sm text-gray-600"></p>
                </div>



                <div class="mt-5 md:mt-0 md:col-span-2">

                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">

                                    <input class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" name="traceroute" id="" wire:model.lazy="traceTarget" wire:keydown.Enter='trace'>

                                 </div>
                            </div>
                                @if ($traceroute)
                                    <pre class="mt-5 text-gray-600">{{$traceroute}}</pre>
                                @endif
                                <script>
                                    setInterval(() => {
                                        Livewire.emit('updateTrace')
                                    }, 1000);
                                </script>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        </div>
                </div>



            </div>
            <div class="hidden sm:block">
                <div class="py-8">
                    <div class="border-t border-gray-200">
                    </div>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h4 class="text-lg font-medium text-gray-900"> Port Scan: </h4>
                    <p class="mt-1 text-sm text-gray-600"></p>
                </div>



                <div class="mt-5 md:mt-0 md:col-span-2">

                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">

                                    <input class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" name="nmap" id="" wire:model.lazy="mapTarget" wire:keydown.Enter='map'>

                                 </div>
                            </div>
                                @if ($nmap)
                                    <pre class="mt-5 text-gray-600">{{$nmap}}</pre>
                                @endif
                                <script>
                                    setInterval(() => {
                                        Livewire.emit('updateMap')
                                    }, 1000);
                                </script>

                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        </div>
                </div>



            </div>
            <div class="hidden sm:block">
                <div class="py-8">
                    <div class="border-t border-gray-200">
                    </div>
                </div>
            </div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h4 class="text-lg font-medium text-gray-900"> Whois </h4>
                    <p class="mt-1 text-sm text-gray-600"></p>
                </div>



                <div class="mt-5 md:mt-0 md:col-span-2">

                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">

                                    <input class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" type="text" name="whois" id="" wire:model.lazy="whoisTarget" wire:keydown.Enter='whoIs'>

                                 </div>
                            </div>
                                @if ($whois)
                                    <pre class="mt-5 text-xs text-gray-600">{{$whois}}</pre>
                                @endif

                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        </div>
                </div>



            </div>
            <div class="hidden sm:block">
                <div class="py-8">
                    <div class="border-t border-gray-200">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
