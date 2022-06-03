<div>
   <div class="col-span-1 mx-auto radial-progress " style="--value:{{$time }};color:rgb(59, 130, 246)">{{ $time ?? " " }}</div>
    <script>
        setInterval(() => {

            Livewire.emit('update')
        }, 1000);
    </script>
</div>
