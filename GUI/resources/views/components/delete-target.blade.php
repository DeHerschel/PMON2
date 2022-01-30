<div class="max-w-7xl py-10 sm:px-6 lg:px-8 mx-auto">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <h4 class="text-lg font-medium text-gray-900">Delete target:</h4>
            <p class="mt-1 text-sm text-gray-600">Search a target by IP, name, MAC, or domain name.</p>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">
                    <div class="searchTargetDiv col-span-6 sm:col-span-4">
                        <form action="{{route('settings.search')}}" method="POST">
                                @csrf
                                <label for="targetSearch" class="block font-medium text-sm text-gray-700">Search target:</label>
                                <input type="search" id="targetSearch" name="targetSearch" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full ">
                                <input type="submit" value="Search" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-gray-900 focus:outline-none focus:border-blue-600 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mt-5">
                        </form>
                    </div>
                    @if (isset($error))
                    <div class="targetSearchErrorDiv col-span-6">
                            <x-Alert color='red'>
                                Target not found
                            </x-Alert>
                    </div>
                    @endif
                    @if (isset($target))
                    <div class="col-span-6 sm:col-span-4 bg-orange-100 shadow py-8 px-4">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="targetDeleteInfo col-span-3 sm:col-span-3">
                                <div class="w-full">
                                    <p class="w-full"><strong>Name:</strong> {{$target->name ?? ''}}</p>
                                </div>
                            </div>
                            <div class="targetDeleteInfo col-span-3 sm:col-span-3">
                                <div class="w-full">
                                    <p class="w-full"><strong>IP:</strong> {{$target->IP ?? ''}}</p>
                                </div>
                            </div>
                            <div class="targetDeleteInfo col-span-3 sm:col-span-3  ">
                                <div class="w-full">
                                    <p class="w-full"><strong>Domain:</strong> {{$target->domain ?? ''}}</p>
                                </div>
                            </div>
                            <div class="targetDeleteInfo col-span-3 sm:col-span-3 ">
                                <div class="w-full">
                                    <p class="w-full"><strong>MAC:</strong> {{$target->MAC ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="addTargetSubmitDiv mt-5">
                    <form action="{{route('targets.destroy', $target)}}" method="post">
                        <input class="mr-2 inline-flex" type="checkbox" name="sure" id="sure">
                        <p class="inline">Are you sure?</p>
                        @csrf
                        @method('delete')
                        <input type="submit" id="deleteTargetSubmit" value="Delete target" class="block items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition mt-5">
                    </form>
                </div>
                @else
                </div>
                @endif
            </div>

        </div>
    </div>
        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>
</div>









