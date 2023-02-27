@extends('layouts.app')
@section('content')
    <div class="col-8 offset-2">
        <h2>Добро пожаловать, {{ Auth::user()->name }}!</h2>
        <br>
        @if (Auth::user()->avatar)
            <img src="{{ Auth::user()->avatar }}" alt="" width:250px>
        @endif
        <br>
        @if (Auth::user()->is_admin === true)
            <a href="{{ route('admin.index') }}">В админку</a>
        @endif
    </div>
@endsection
