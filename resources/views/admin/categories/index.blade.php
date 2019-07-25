@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Список категорий статей</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('categories.add') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Экспорт</button>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Символьный код</th>
                    <th>Описание</th>
                    <th>Дата добавления</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categoties as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->code }}</td>
                        <td>{!! $category->description !!}</td>
                        <td>{{ $category->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <a href="{!! route('categories.edit', $category->id) !!}">Редактировать</a><br><a href="" class="js-delete-category" data-id="{{ $category->id }}" >Удалить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.js-delete-category').on('click', function (event) {
                event.preventDefault();
                if (confirm("Вы точно хотите удалить данную категорию?")){
                    let id = $(this).data('id');
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('categories.delete') !!}",
                        data: {_token: "{{ csrf_token() }}", id: id},
                        complete: function () {
                            alertify.success("{{ trans('messages.admin.categorySuccessDelete') }}");
                            location.reload();
                        }
                    });
                } else {
                    alertify.error("{{ trans('messages.admin.categoryErrorDelete') }}");
                }
            });
        });
    </script>
@stop