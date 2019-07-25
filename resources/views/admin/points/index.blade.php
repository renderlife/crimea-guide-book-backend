@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Список точек</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('points.add') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
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
                    <th>Тип точки</th>
                    <th>Город</th>
                    <th>Символьный код</th>
                    <th>Описание</th>
                    <th>Дата добавления</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($points as $point)
                    <tr>
                        <td>{{ $point->id }}</td>
                        <td>{{ $point->title }}</td>
                        <td>{{ $point->type }}</td>
                        <td>{{ $point->city }}</td>
                        <td>{{ $point->code }}</td>
                        <td>{!! $point->description !!}</td>
                        <td>{{ $point->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <a href="{!! route('points.edit', $point->id) !!}">Редактировать</a><br><a href="" class="js-delete-point" data-id="{{ $point->id }}" >Удалить</a>
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
            $('.js-delete-point').on('click', function (event) {
                event.preventDefault();
                if (confirm("Вы точно хотите удалить данную точку?")){
                    let id = $(this).data('id');
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('points.delete') !!}",
                        data: {_token: "{{ csrf_token() }}", id: id},
                        complete: function () {
                            alertify.success("{{ trans('messages.admin.pointSuccessDelete') }}");
                            location.reload();
                        }
                    });
                } else {
                    alertify.error("{{ trans('messages.admin.pointErrorDelete') }}");
                }
            });
        });
    </script>
@stop