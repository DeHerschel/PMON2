
<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto">
    <div class="max-w-7xl py-10 sm:px-6 lg:px-8 mx-auto">
        <div class="grid grid-cols-4 gap-x-2 h-36 mb-5">
            <div class="col-span-1 flex shadow bg-blue-500 text-center text-gray-800 text-lg font-semibold md:rounded-tl-md md:rounded-tr-md">
              <div class="m-auto">
                  <div class="">
                    @php
                        $totalup = 0;
                        foreach ($targetsNoPag as $target) {
                            if (file_exists('/tmp/pmon/'.$target->IP.'.json')) {
                                $json = file_get_contents('/tmp/pmon/'.$target->IP.'.json');
                                $json = json_decode($json, true);
                                if ($json['STATE'] == "GOOD" || $json['STATE'] == "NORMAL") {
                                        $totalup++;
                                } else {
                                    if ($json['STATE'] == "INESTABLE"){
                                        $totalup++;
                                    }
                                }
                            }
                        }
                        echo e($totalup)
                    @endphp
                  </div>
                  <div class="">
                    ACTIVE
                  </div>
              </div>
            </div>
            <div class="col-span-1 flex shadow bg-orange-600 text-gray-800  text-center text-lg font-semibold md:rounded-tl-md md:rounded-tr-md">
              <div class="m-auto">
                  <div class="">
                    @php
                        $totalproblems = 0;
                        foreach ($targetsNoPag as $target) {
                            if (file_exists('/tmp/pmon/'.$target->IP.'.json')) {
                                $json = file_get_contents('/tmp/pmon/'.$target->IP.'.json');
                                $json = json_decode($json, true);
                                if ($json['PROBLEMS']){
                                    $totalproblems = $totalproblems + $json['PROBLEMS'];
                                }
                            }
                        }
                        echo e($totalproblems)
                    @endphp
                  </div>
                  <div class="">
                PROBLEMS
                  </div>
              </div>
            </div>

            <div class="col-span-1 flex shadow bg-yellow-500 text-gray-800  text-center text-lg font-semibold md:rounded-tl-md md:rounded-tr-md">
                <div class="m-auto">
                  <div class="">
                     @php
                        $totalinestable = 0;
                        foreach ($targetsNoPag as $target) {
                            if (file_exists('/tmp/pmon/'.$target->IP.'.json')) {
                                $json = file_get_contents('/tmp/pmon/'.$target->IP.'.json');
                                $json = json_decode($json, true);
                                if ($json['STATE'] == "INESTABLE"){
                                    $totalinestable++;
                                }
                            }
                        }
                        echo e($totalinestable)
                    @endphp
                  </div>
                  <div class="">
                   INESTABLE
                  </div>
              </div>
            </div>
            <div class="col-span-1 flex shadow bg-red-600 text-gray-800  text-center text-lg font-semibold md:rounded-tl-md md:rounded-tr-md">
                 <div class="m-auto">
                  <div class="">
                     @php
                        $totaldown = 0;
                        foreach ($targetsNoPag as $target) {
                            if (file_exists('/tmp/pmon/'.$target->IP.'.json')) {
                                $json = file_get_contents('/tmp/pmon/'.$target->IP.'.json');
                                $json = json_decode($json, true);
                                if ($json['STATE'] == "DOWN") {
                                        $totaldown++;
                                }
                            } else {
                                $totaldown++;
                            }
                        }
                        echo e($totaldown)
                    @endphp
                  </div>
                  <div class="">
                    DOWN
                  </div>
              </div>

            </div>

        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                IP
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Created at
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Updated at
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($targets)
                            @foreach ($targets as $target)
                                 <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <a href="{{route('targets.show', $target)}}">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$target->name}}
                                                </p>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{$target->IP}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$target->created_at}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$target->updated_at}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span class="relative inline-block px-3 py-1 font-semibold @php
                                        if (file_exists('/tmp/pmon/'.$target->IP.'.json')) {
                                                $json = file_get_contents('/tmp/pmon/'.$target->IP.'.json');
                                                $json = json_decode($json, true);
                                                if ($json['STATE'] == "GOOD" || $json['STATE'] == "NORMAL") {
                                                        echo e('text-blue-800');
                                                } else {
                                                    if ($json['STATE'] == "INESTABLE"){
                                                        echo e('text-yellow-700');
                                                    }
                                                    else {

                                                        echo e('text-red-900');
                                                    }
                                                }
                                            } else { echo e('text-red-900'); }

                                       @endphp leading-tight">
                                            <span aria-hidden  class="absolute inset-0 @php
                                            if (file_exists('/tmp/pmon/'.$target->IP.'.json')) {
                                                $json = file_get_contents('/tmp/pmon/'.$target->IP.'.json');
                                                $json = json_decode($json, true);
                                                if ($json['STATE'] == "GOOD" || $json['STATE'] == "NORMAL") {
                                                        echo e('bg-blue-200');
                                                } else {
                                                    if ($json['STATE'] == "INESTABLE"){
                                                        echo e('bg-yellow-100');
                                                    }
                                                    else {

                                                        echo e('bg-red-200');
                                                    }
                                                }
                                            } else { echo e('bg-red-200'); }

                                            @endphp opacity-50 rounded-full">

                                            </span>
                                            <span class="relative">@php
                                                if (file_exists('/tmp/pmon/'.$target->IP.'.json')) {
                                                    $json = file_get_contents('/tmp/pmon/'.$target->IP.'.json');
                                                    $json = json_decode($json, true);
                                                    if ($json['STATE'] == "GOOD" || $json['STATE'] == "NORMAL") {
                                                        echo e('Active');
                                                    } else {
                                                        if ($json['STATE'] == "INESTABLE"){
                                                            echo e('Inestable');
                                                        }
                                                        else {
                                                            echo e('Down');
                                                        }
                                                    }
                                                } else { echo e('Down');}
                                            @endphp
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        @endif

                    </tbody>
                </table>

                {{$targets->links()}}
            </div>
        </div>
    </div>
</div>
