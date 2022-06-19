
<div class="grid grid-cols-4 px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
            <div class="col-span-2 p-0 grid grid-cols-2 md:text-xs lg:text-base">
                <div class="col-span-2">
                    <a class="" href="{{route('targets.show', $target)}}"> <h4 class=" mb-5  text-xl font-semibold  text-gray-900">{{$target->name}}</h4></a>
                </div>
                <div class="targetIp mb-2 col-span-2 grid grid-cols-2">
                    <div class="col-span-2 text-gray-900">
                        IP:
                    </div>
                    <div class="col-span-2 text-gray-600">
                        {{$target->IP}}
                    </div>
                </div>

                <div class="domain  mb-2 col-span-2 ">
                    <div class="col-span-2 text-gray-900">
                        DOMAIN:
                    </div>
                    <div class="col-span-2 text-gray-600">
                        {{$target->domain ?? "--"}}
                    </div>
                </div>
            </div>
           @livewire('show-ping-state', ['target' => $target], key($target->IP))
{{--
            <div class="col-span-1 mx-auto radial-progress " style="--value:{{$time ?? 31 }};color:rgb(59, 130, 246)">{{ $time ?? 31 }}
                <script>
                    setInterval(() => {

                        Livewire.emit('update')
                    }, 1000);
                </script>

                </div> --}}
</div>

