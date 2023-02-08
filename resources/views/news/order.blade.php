@extends('layouts.main');
@section('menu')
    @include('inc.menu', ['categories' => $categories])
@endsection
@section('content')
    <form method="GET" action="{{ route('save.order') }}">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="tel">Телефон</label>
            <input type="tel" id="tel" name="tel" class="form-control" value="{{ old('tel') }}">
        </div>

        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="comment">Информация о заказе</label>
            <textarea name="comment" id="comment" class="form-control" value="{{ old('comment') }}"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
@endsection
