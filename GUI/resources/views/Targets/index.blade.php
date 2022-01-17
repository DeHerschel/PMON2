@extends('layouts.template')
@section('title', 'PMON2 | HOSTS' )

@section('content')
    <h1> This page displays all the hosts; </h1>
    <ul>
        @foreach ($targets as $target)
            <li>{{$target}}</li>
        @endforeach
    </ul>

@endsection

