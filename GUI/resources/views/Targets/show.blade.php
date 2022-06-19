<x-AppLayout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Target: {{$target->name}}
        </h2>

       @livewire('delete-target', ['target' => $target])
    </x-slot>
    <a href="{{route('targets.index')}}">Back to all hosts</a>
    <a href="{{route('targets.edit', $target)}}">Edit Target</a>
    <ul>
        <li>{{$target->name}}</li>
        <li>{{$target->IP}}</li>
        @if ($target->domain)
        <li>{{$target->domain}}</li>
        @endif
        @if ($target->MAC)
        <li>{{$target->MAC}}</li>
        @endif
    </ul>
</x-AppLayout>


