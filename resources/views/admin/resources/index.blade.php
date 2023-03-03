@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список источников</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.resources.create') }}">Добавить источник</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Название</th>
                    <th>URL</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @forelse($resList as $resource)
                    <tr>
                        <td>{{ $resource->id }}</td>
                        <td>{{ $resource->resource_name }}</td>
                        <td>{{ $resource->url }}</td>
                        <td><a href="{{ route('admin.resources.edit', ['resource' => $resource]) }}">Изм.</a> &nbsp <a
                                href="javascript:;" style="color:red" rel="{{ $resource->id }}" class="delete">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Записей нет</td>
                    </tr>
                @endforelse


            </tbody>
        </table>
        {{-- {{ $categoriesList->links() }} --}}
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                    const id = this.getAttribute('rel');
                    if (confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                        send(`/admin/resources/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert("Удаление отменено");
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
