@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Добавить категорию для статей</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('categories.add') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Экспорт</button>
                </div>
            </div>
        </div>

        <form method="post">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="admin-categories-name">Название категории</label>
                <input name="name_cat" type="text" class="form-control" id="admin-categories-name" placeholder="Название категории" required>
            </div>

            <div class="form-group">
                <label for="admin-categories-code">Символьный код</label>
                <input name="code" type="text" class="form-control" id="admin-categories-code" placeholder="Символьный код" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Описание</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </main>    
@stop