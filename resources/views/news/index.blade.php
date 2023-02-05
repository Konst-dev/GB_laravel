@extends('layouts.main')
@section('menu')
@section('menu')
    @include('inc.menu', ['categories' => $categories])
@endsection
@endsection
@section('content')
<a href="{{ route('categories.show', []) }}">К категориям</a>
<div class="row mb-2">
    @foreach ($news as $item)
        @if ($cat == $item['category_id'])
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">{{ $item['author'] }}</strong>
                        <h3 class="mb-0">
                            <a class="text-dark"
                                href="{{ route('news.show', ['id' => $item['id']]) }}">{{ $item['title'] }}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{ $item['created_time'] }}</div>
                        <p class="card-text mb-auto">{{ $item['description'] }}</p>
                        <a href="{{ route('news.show', ['id' => $item['id']]) }}">Читать далее...</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb"
                        alt="Card image cap">
                </div>
            </div>
        @endif
    @endforeach
</div>
@endsection
