@extends('layouts.template')
@section('title', 'PMON2 | HOSTS' )

@section('content')
    <h1> This page displays all the hosts; </h1>
    <ul>
        @foreach ($targets as $target)
            <li> Name: <a href="{{route('targets.show', $target->id)}}">  {{$target->name}}</a>
                <ul>
                    <li>IP: {{$target->IP}}</li>
                    @if ($target->MAC)
                    <li> MAC: {{$target->MAC}}</li>
                    @endif
                    @if ($target->domain)
                    <li>DOMAIN: {{$target->domain}}</li>
                    @endif
                </ul>
            </li>
        @endforeach
    </ul>
    {{$targets->links()}}

@endsection

