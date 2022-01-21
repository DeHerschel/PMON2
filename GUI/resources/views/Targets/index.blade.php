@extends('layouts.template')
@section('title', 'PMON2 | HOSTS' )

@section('content')
    <h1> This page displays all the hosts; </h1>
        @foreach ($targets as $target)
            <div class="targetContainer">
            <a href="{{route('targets.show', $target)}}">  {{$target->name}}</a>
            <div class="targetIp">
                IP: {{$target->IP}}
            </div>
            @if ($target->MAC)
            <div class="targetMac">
                MAC: {{$target->MAC}}
            </div>
            @endif
            @if ($target->domain)
            <div class="domain">
                DOMAIN: {{$target->domain}}
            </div>
            @endif
        @endforeach
        </div>
    {{$targets->links()}}

@endsection

