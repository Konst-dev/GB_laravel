@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать данные пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="is_admin">Статус</label>
                <select name="is_admin" id="is_admin" class="form-control">
                    <option value="0" @if (!$user->is_admin) selected @endif>Обычный пользователь</option>
                    <option value="1" @if ($user->is_admin) selected @endif>Администратор</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Имя</label>
                <input type="text" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
