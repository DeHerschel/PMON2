<x-AppLayout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tools
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto">


                    {{-- <div class="userConf" >
                        <p> <strong>User settings: </strong> </p>
                        <div class="themeConf">
                            <p>Theme:</p>
                            <input type="radio" id="lightTheme" name="theme" value="Light" checked>
                            <label for="lightTheme">Light</label>
                            <input type="radio" id="darkTheme" name="theme" value="Dark">
                            <label for="darkTheme">Dark</label>
                        </div>
                    </div> --}}

                        {{-- <p> <strong> General settings: </strong></p> --}}


                    <x-AddTarget/>
                    <x-DeleteTarget :target="$target ?? null" :error="$error ?? null"/>

    </div>
</x-AppLayout>
