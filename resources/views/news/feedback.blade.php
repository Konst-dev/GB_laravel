@extends('layouts.main');
@section('menu')
    @include('inc.menu', ['categories' => $categories])
@endsection
@section('content')
    <form method="GET" action="{{ route('save.feedback') }}">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="comment">Коментарий</label>
            <textarea name="comment" id="comment" class="form-control" value="{{ old('comment') }}"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
@endsection
