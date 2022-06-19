
   {{-- <div class="col-span-1 mx-auto radial-progress " style="--value:{{$time ?? ' ' }};color:rgb(59, 130, 246)">{{ $time ?? ' ' }} --}}

<div class="items-center w-full col-span-2 my-auto">

    <div class=" flex flex-col mx-auto radial-progress bg-gray-100" style=" --size: 6rem;--thickness: 0.7rem;--value:@php if ($time != null) {echo e($time);} else {echo e(1000);} @endphp;color: @php if ($state == "GOOD") { echo e("rgb(59, 130, 246)"); } elseif ($state == "NORMAL") { echo e("rgb(59, 130, 246)");} elseif ($state == "INESTABLE") { echo e("rgb(234, 179, 8)");} else {echo e("rgb(220, 38, 38)");} @endphp ">
        <div class="flex-1 bg-white text-center rounded-full m-3 ">
            <div class="mt-5 text-black font-medium">
                @php if ($time != null) {echo e($time."ms");} else {echo e('DOWN');} @endphp
            </div>
        </div>
    <script>

        setInterval(() => {

            Livewire.emit('update')
        }, 1000);
    </script>

    </div>
    <div class=" font-medium text-center mt-2 @php if ($state == "GOOD") { echo e("text-blue-500"); } elseif ($state == "NORMAL") { echo e("");} elseif ($state == "INESTABLE") { echo e("text-yellow-500");} else {echo e("text-red-600");} @endphp">
        {{$state}}
    </div>
</div>
