@extends('layouts.main')
@section('menu')
    @include('inc.menu', ['categories' => $categories])
@endsection
@section('content')
    <a href="{{ route('feedback', []) }}">Оставить отзыв</a> |
    <a href="{{ route('order', []) }}">Заказ</a> |
    <a href="{{ route('admin.index', []) }}">Админ</a>
@endsection
{{-- @foreach ($categories as $item)
    <a href="{{ route('news', ['cat' => $item['id']]) }}" style="margin:10px">{{ $item['name'] }}</a>
@endforeach --}}
