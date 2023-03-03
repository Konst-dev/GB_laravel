@extends('layouts.main');
@section('menu')
    @include('inc.menu', ['categories' => $categories])
@endsection
@section('content')
    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="GET" action="{{ route('save.order') }}">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="phone"
                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
            </div>

            <div class="form-group">
                <label for="email">Электронная почта</label>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="description">Информация о заказе</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection
