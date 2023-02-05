@extends('layouts.main')
@section('menu')
    @include('inc.menu', ['categories' => $categories])
@endsection
@section('content')
@endsection
{{-- @foreach ($categories as $item)
    <a href="{{ route('news', ['cat' => $item['id']]) }}" style="margin:10px">{{ $item['name'] }}</a>
@endforeach --}}
