@extends('layouts.template')
@section('title', '| PMON2'.$target->name)

@section('content')
<h1> This page show individual host information: {{$target->name}} </h1>
<a href="{{route('targets.index')}}">Back to all hosts</a>
<a href="{{route('targets.edit', $target)}}">Edit Target</a>
<ul>
    <li>{{$target->name}}</li>
    <li>{{$target->IP}}</li>
    @if ($target->domain)
    <li>{{$target->domain}}</li>
    @endif
    @if ($target->MAC)
    <li>{{$target->MAC}}</li>
    @endif
</ul>
@endsection

