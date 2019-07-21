@extends('layouts.admin');
@section('content')
    <h1>Добавить категорию</h1>
    <br>
    <form>
        <div class="form-group">
            <label for="admin-categories-name">Название категории</label>
            <input name="name" type="text" class="form-control" id="admin-categories-name" placeholder="Название категории">
        </div>

        <div class="form-group">
            <label for="admin-categories-name_s">Название в множественном числе</label>
            <input name="name_s" type="text" class="form-control" id="admin-categories-name_s" placeholder="Название в множественном числе">
        </div>

        <div class="form-group">
            <label for="admin-categories-code">Символьный код</label>
            <input name="code" type="text" class="form-control" id="admin-categories-code" placeholder="Символьный код">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@stop