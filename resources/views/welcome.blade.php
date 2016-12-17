@extends('layouts.frontend')

@section('title', 'Welcome')

@section('content')
    <h1>Welcome</h1>
    <p><a href="{{ route('channel.index') }}">Channels</a></p>
@endsection
