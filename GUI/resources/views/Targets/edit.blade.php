@extends('layouts.template')
@section('title', 'PMON2 | EDIT'.$target->name )

@section('content')
    <h1>EDIT TARGET:</h1>
    <form action="{{route('targets.update', $target)}}" method="POST">
        @csrf
        @method('put')
        <div class="targetNameDiv">
            <label for="targetName">Name:</label>
            <input type="text" name="targetName" id="targetName" value="{{old('targetName', $target->name)}}">
        </div>
        @error('targetName')
            <small>{{$message}}</small>
        @enderror
        <div class="targetIpDiv">
            <label for="targetIp">IP:</label>
            <input type="text" name="targetIp" id="targetIp" value="{{old('targetIp',$target->IP)   }}">
        </div>
        @error('targetIp')
            <small>{{$message}}</small>
        @enderror
        <div class="targetDomeDiv">
            <label for="targetDom">Domain name:</label>
            <input type="text" name="targetDom" id="targetDom" value="{{old('targetDom',$target->domain)}}">
        </div>
        @error('targetDom')
            <small>{{$message}}</small>
        @enderror
        <div class="targetMacDiv">
            <label for="targetMac">Mac: </label>
            <input type="text" name="targetMac" id="targetMac" value="{{old('targetMac',$target->MAC)}}">
        </div>
        @error('targetMac')
            <small>{{$message}}</small>
        @enderror
        <div class="targetSubmitDiv">
            <input type="submit" id="targetSubmit" value="Submit">
        </div>
    </form>

@endsection
