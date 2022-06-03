<x-AppLayout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Targets
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto">
    <div class="max-w-7xl py-10 sm:px-6 lg:px-8 mx-auto">
        <div class="md:grid md:grid-cols-3 md:gap-6">
        @foreach ($targets as $target)
                <x-index-host-card :target="$target" />
        @endforeach
        </div>
    </div>
    {{$targets->links()}}
    </div>
</x-AppLayout>


