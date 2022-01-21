@extends('layouts.template')
@section('title', 'PMON2 | SETTINGS' )

@section('content')
    <h1> This page displays all settings; </h1>
    <div class="userConf">
        <p> <strong>User     settings: </strong> </p>
        <div class="themeConf">
            <p>Theme:</p>
            <input type="radio" id="lightTheme" name="theme" value="Light" checked>
            <label for="lightTheme">Light</label>
            <input type="radio" id="darkTheme" name="theme" value="Dark">
            <label for="darkTheme">Dark</label>
        </div>
    </div>
    <div class="generalConf">
        <p> <strong> General settings: </strong></p>
        <div class="addTarget">
            <form action="{{route('targets.store')}}" method="POST">
                @csrf
                <p>Add a target:</p>
                <div class="addTargetNameDiv">
                    <label for="addTargetName">Name </label>
                    <input type="text" id="addTargetName" name="targetName" value="{{old('targetName')}}">
                </div>
                @error('targetName')
                        <small>{{$message}}</small>
                @enderror
                <div class="addTargetIpDiv">
                    <label for="addTargetIp">IP</label>
                    <input type="text" id="addTargetIp" name="targetIp"  value="{{old('targetIp')}}">
                </div>

                @error('targetIp')
                        <small>{{$message}}</small>
                @enderror
                <div class="addTargetDomDiv">
                    <label for="addTargetDom">Domain </label>
                    <input type="text" id="addTargetDom" name="targetDom"  value="{{old('targetDom')}}">
                </div>
                @error('targetDom')
                        <small>{{$message}}</small>
                @enderror
                <div class="addTargetMacDiv">
                    <label for="addTargetMac">MAC </label>
                    <input type="text" id="addTargetMac" name="targetMac"  value="{{old('targetMac')}}">
                </div>

                 @error('targetMac')
                        <small>{{$message}}</small>
                @enderror
                <div class="addTargetSubmitDiv">
                    <label for="addTargetSubmit"></label>
                    <input type="submit" id="addTargetSubmit" value="Submit">
                </div>
            </form>
        </div>
        <div class="quitTargetDiv">
            <p>Quit target: </p>
            <div class="searchTargetFormDiv">
            <!-- This form will be a JS in box search -->
                <form action="{{route('settings.search')}}" method="POST">
                    @csrf
                    <div class="searchTargetDiv">
                        <label for="targetSearch">Search target to quit</label>
                        <input type="text" id="targetSearch" name="targetSearch">
                    </div>
                    <input type="submit">
                </form>
            </div>
            @if (isset($error))
            <div class="targetSearchErrorDiv">
                {{$error}}
            </div>
            @endif
            @if (isset($target))
            <div class="targetDeleteInfo">
                Target to quit:
                <div class="targetDeleteName">
                    NAME: {{$target->name}}
                </div>
                <div class="targetDeleteIp">
                    IP: {{$target->IP}}
                </div>
                <div class="targetDeleteDom">
                    DOMAIN: {{$target->domain}}
                </div>
                <div class="targetDeleteMac">
                    MAC: {{$target->MAC}}
                </div>
            </div>
            <div class="quitTargetConfirmDiv">
                <form action="{{route('targets.destroy', $target)}}" method="post">
                    @csrf
                    @method('delete')
                    <label for="quitTargetConfirm">Are you sure? </label>
                    <input type="checkbox" id="quiTargetConfirm" name="quitTargetConfirm">
                    <input type="submit">
                </form>
            </div>
            @endif
        </div>


    </div>
@endsection

