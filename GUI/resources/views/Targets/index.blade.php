<x-AppLayout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Targets
        </h2>
    </x-slot>
        @foreach ($targets as $target)
            <div class="targetContainer">
            <a href="{{route('targets.show', $target)}}">  {{$target->name}}</a>
            <div class="targetIp">
                IP: {{$target->IP}}
            </div>
            @if ($target->MAC)
            <div class="targetMac">
                MAC: {{$target->MAC}}
            </div>
            @endif
            @if ($target->domain)
            <div class="domain">
                DOMAIN: {{$target->domain}}
            </div>
            @endif
        @endforeach
        </div>
    {{$targets->links()}}
</x-AppLayout>


