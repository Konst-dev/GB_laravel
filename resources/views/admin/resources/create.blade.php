@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.resources.store') }}">
            @csrf
            <div class="form-group">
                <label for="resource_name">Название источника</label>
                <input type="text" id="resource_name" name="resource_name"
                    class="form-control @error('resource_name') is-invalid @enderror" value="{{ old('resource_name') }}">
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror"
                    value="{{ old('url') }}">
            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
