<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Target: {{$target->name}}
        </h2>

    </x-slot>
   <div class="max-w-7xl mx-auto">
        <div class="max-w-7xl py-2 sm:px-6 lg:px-8 mx-auto">
            <div class="md:grid md:grid-cols-4 md:gap-2">
                <div class="col-span-3 grid grid-cols-3 gap-2 md:gap-3 mb-2 md:mb-0">
                    <div class="col-span-1 grid grid-cols-2 px-4 bg-white shadow md:rounded-tl-md md:rounded-tr-md">
                        <div class="col-span-2 text-center my-auto font-medium text-black">
                            Problems:
                        </div>
                        <div class="col-span-2 text-center text-gray-600">
                            {{$pingInfo['PROBLEMS']}}
                        </div>
                    </div>
                    <div class="col-span-1 grid grid-cols-2 px-4 bg-white shadow md:rounded-tl-md md:rounded-tr-md">
                        <div class="col-span-2 text-center font-medium text-black my-auto">
                            TTL:
                        </div>
                        <div class="col-span-2 text-center text-gray-600">
                            {{$pingInfo['TTL']}}
                        </div>
                    </div>
                    <div class="col-span-1 grid grid-cols-2 px-4 bg-white shadow md:rounded-tl-md md:rounded-tr-md">
                        <div class="col-span-2 text-center font-medium text-black my-auto">
                            ICMP_SEQ:
                        </div>
                        <div class="col-span-2 text-center text-gray-600">
                            {{$pingInfo['ICMP']}}
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="grid grid-cols-2 gap-3 py-5 px-4 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="col-span-1 mx-auto my-auto">
                            @livewire('delete-target', ['target' => $target])
                        </div>
                        <div class="col-span-1 mx-auto my-auto">
                            @livewire('edit-target', ['target' => $target])
                        </div>
                    </div>
                </div>
                <div class="col-span-3 grid grid-cols-3 gap-3 px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="col-span-1 grid grid-cols-1 mx-auto">
                        <div class="text-center text-black font-medium">
                           <svg class="w-6 h-6 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            IP:
                        </div>
                        <div class="my-auto text-gray-600">
                            {{$target->IP}}
                        </div>
                    </div>
                    <div class="col-span-1 grid grid-cols-1 mx-auto">
                        <div class="text-center text-black font-medium">
                            <svg class="w-6 h-6 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                            DOMAIN:
                        </div>
                        <div class="my-auto text-gray-600">
                            {{$target->domain ?? "----"}}
                        </div>
                    </div>
                    <div class="col-span-1 grid grid-cols-1 mx-auto">
                        <div class="text-center text-black font-medium">
                            <svg class="w-6 h-6 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                            MAC:
                        </div>
                        <div class="my-auto text-gray-600">
                            {{$target->MAC ?? "----"}}
                        </div>
                    </div>
                </div>
                <div class="col-span-1 grid grid-cols-1 gap-3 px-2 bg-white sm:p-3 shadow sm:rounded-tl-md sm:rounded-tr-md  ">
                    <div class="col-span-1 grid grid-cols-1 gap-3 px-1 py-1 ">
                        @livewire('show-ping-state',['target' => $target], key($target->IP))
                    </div>
                </div>

                <div class="col-span-3 lg:col-span-2 h-72 grid grid-cols-1  bg-white sm:p-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="col-span-1 text-black font-normal text-center">
                        Traceroute:
                    </div>
                    {{-- @php
                        $out = shell_exec("traceroute -I ".$target->IP);
                        echo "<pre>$out</pre>"
                    @endphp --}}
                    @if ($traceroute == null)
                        <svg role="status" class="mx-auto w-8 h-8 text-gray-200 animate-spin dark:text-gray-200 fill-blue-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                             <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                         </svg>
                    @endif
                    <div class="mx-auto col-span-1 h-44 text-xs sm:text-sm md:text-base text-gray-600">
                        @php
                            echo "<pre>$traceroute</pre>"
                        @endphp
                    </div>
                </div>
                <div class="col-span-1 grid grid-cols-1 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="col-span-1 text-black font-normal text-center">
                         Port Scan

                    </div>
                    @if ($nmap == null)
                        <svg role="status" class=" mx-auto col span-1 my-auto self-center w-8 h-8 text-gray-200 animate-spin dark:text-gray-200 fill-blue-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                             <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                         </svg>
                    @endif
                    <div class="mx-auto col-span-1 h-44 pt-3 lg:text-sm sm:pt-0 md:text-2xs text-gray-600">
                        @php
                            echo "<pre>$nmap</pre>"
                        @endphp
                    </div>
                </div>
                <div class="col-span-1 grid grid-cols-1 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="col-span-1 text-gray-600">
                        OS:  @php
                            if ($pingInfo['TTL'] < 64 ) {
                                echo e('Linux (Guessed)');
                            } elseif ($pingInfo['TTL'] > 64) {
                                echo e('Windows (Guessed)');
                            } else {
                                echo e('-');
                            }
                        @endphp
                    </div>
                    <div class="col-span-1 text-gray-600">
                        CPU:  @php

                        @endphp
                    </div>
                     <div class="col-span-1 text-gray-600">
                        DISK:  @php

                        @endphp
                    </div>
                    <div class="col-span-1 text-gray-600">
                        <a wire:click="$set('problemsModal', 'true')">Problems history</a>
                    </div>
                </div>
                <x-jet-dialog-modal wire:model="problemsModal">
                    <x-slot name="title">
                       Problems History
                    </x-slot>
                    <x-slot name="content">
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            PROBLEM
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            DESCRIPTION
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            DATE
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($problems as $problem)
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$problem->type}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$problem->description}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{$problem->date}}
                                            </p>
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </x-slot>
                    <x-slot name="footer">
                    </x-slot>
                </x-jet-dialog-modal>
            </div>
            <script>
                setInterval(() => {
                    Livewire.emit('trace')
                }, 1000);
            </script>

            @if ($nmap == null)
                <script>
                    setInterval(() => {
                        Livewire.emit('map')
                    }, 1000);
                </script>
            @endif
            <script>
                setInterval(() => {
                    Livewire.emit('updateInfo')
                }, 1000);
            </script>
        </div>
    </div>
</div>

