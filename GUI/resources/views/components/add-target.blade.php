<div class="max-w-7xl py-10 sm:px-6 lg:px-8 mx-auto">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <h4 class="text-lg font-medium text-gray-900">Add a target:</h4>
            <p class="mt-1 text-sm text-gray-600">Name and IP fields are required</p>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{route('targets.store')}}" method="POST">
                @csrf
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                            <div class="addTargetNameDiv col-span-6 sm:col-span-4">
                                <label for="addTargetName" class="block font-medium text-sm text-gray-700">Name: </label>
                                <input type="text" id="addTargetName" name="targetName" value="{{old('targetName')}}" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full ">
                                @error('targetName')
                                    <p class="text-sm text-red-600 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="addTargetIpDiv col-span-6 sm:col-span-4">
                                <label for="addTargetIp" class="block font-medium text-sm text-gray-700">IP:</label>
                                <input type="text" id="addTargetIp" name="targetIp"  value="{{old('targetIp')}}" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                                @error('targetIp')
                                    <p class="text-sm text-red-600 mt-2">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="addTargetDomDiv col-span-6 sm:col-span-4">
                                <label for="addTargetDom" class="block font-medium text-sm text-gray-700">Domain: </label>
                                <input type="text" id="addTargetDom" name="targetDom"  value="{{old('targetDom')}}" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full ">
                                @error('targetDom')
                                    <p class="text-sm text-red-600 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="addTargetMacDiv col-span-6 sm:col-span-4">
                                <label for="addTargetMac" class="block font-medium text-sm text-gray-700">MAC: </label>
                                <input type="text" id="addTargetMac" name="targetMac"  value="{{old('targetMac')}}" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                                @error('targetMac')
                                    <p class="text-sm text-red-600 mt-2">{{$message}}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                    <div class="addTargetSubmitDiv ">
                        <label for="addTargetSubmit"></label>
                        <input type="submit" id="addTargetSubmit" value="Add" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    </div>
                </div>
                </div>
            </form>
        </div>
        <div class="hidden sm:block">
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>
    </div>
</div>
