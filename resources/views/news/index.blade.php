@extends('layouts.main')

@section('menu')
    @include('inc.menu', ['categories' => $categories])
@endsection

@section('content')
    <a href="{{ route('categories.show', []) }}">К категориям</a> |
    <a href="{{ route('feedback', []) }}">Оставить отзыв</a> |
    <a href="{{ route('order', []) }}">Заказ</a>
    <div class="row mb-2">
        @foreach ($news as $item)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">{{ $item->author }}</strong>
                        <h3 class="mb-0">
                            <a class="text-dark"
                                href="{{ route('news.show', ['id' => $item->id, 'cat' => $cat]) }}">{{ $item->title }}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{ $item->created_at }}</div>
                        <p class="card-text mb-auto">{{ $item->description }}</p>
                        <a
                            href="@if (!$item->link) {{ route('news.show', ['id' => $item->id, 'cat' => $cat]) }}@else {{ $item->link }} @endif">Читать
                            далее...</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb"
                        alt="Card image cap">
                </div>
            </div>
        @endforeach
    </div>
@endsection
