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
                <div class="addTargetMacDiv">
                    <label for="addTargetMac">MAC </label>
                    <input type="text" id="addTargetMac" name="targetMac"  value="{{old('targetMac')}}">
                </div>
                <div class="addTargetSubmitDiv">
                    <label for="addTargetSubmit">Name </label>
                    <input type="submit" id="addTargetSubmit" value="Submit">
                </div>
            </form>

        </div>
        <div class="quitTargetDiv">

            <p>Quit target: </p>
            <div class="quitTargetSearchDiv">
                <label for="quitTargetSearch">Name </label>
                <!-- This input will search in the database for targets -->
                <input type="text" id="quitTargetSearch" name="quitTarget">
            </div>
            <div class="quitTargetInfoDiv">
                <!-- -->
                <br>
                THIS IS A BOX WHO DISPLAYS
                <br>
                TO-QUIT TARGET INFO
                <br>
                <br>
                <!-- -->
            </div>
            <div class="quitTargetConfirmDiv">
                <label for="quitTargetConfirm">Are you sure? </label>
                <input type="checkbox" id="quiTargetConfirm" name="quitTargetConfirm">
            </div>
        </div>


    </div>
@endsection

