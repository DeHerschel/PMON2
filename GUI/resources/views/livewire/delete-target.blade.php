 <div class="addTargetSubmitDiv col-span-3">
    <button wire:click="showDelModal" id="deleteTargetSubmit" class="block items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">Delete </button>
<script>
    setTimeout(() => {

        Livewire.on('delModal', ()=> {
               Swal.fire({
                   title: 'Are you sure?',
                   text: "You won't be able to revert this!",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Yes, delete it!'
                   }).then((result) => {
                   if (result.isConfirmed) {

                       Swal.fire(
                       'Deleted!',
                       'Target has been deleted.',
                       'success'
                       )
                       Livewire.emit('delete')
                   }
               })
           })
    }, 0.45);
</script>
</div>
