
<div class="grid grid-cols-3 gap-3 px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
            <div class="col-span-2 py-5">
                <a class="" href="{{route('targets.show', $target)}}"> <h4 class="text-xl font-medium text-gray-900">{{$target->name}}</h4></a>
            </div>
            @livewire('show-ping-state', ['target' => $target])
            <div class="targetIp col-span-3">
                IP: {{$target->IP}}
            </div>

            <div class="targetMac col-span-3">
                MAC: {{$target->MAC ?? ""}}
            </div>

            <div class="domain col-span-3">
                DOMAIN: {{$target->domain ?? ""}}
            </div>
</div>

