@extends('layouts.admin');
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактирование точки</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="{{ route('points.add') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Экспорт</button>
                </div>
            </div>
        </div>

        <form method="post">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="admin-point-title">Название</label>
                <input name="title" value="{{ $point->title }}" type="text" class="form-control" id="admin-point-title" placeholder="Название" required>
            </div>

            <div class="form-group">
                <label for="admin-point-code">Символьный код</label>
                <input name="code" value="{{ $point->code }}" type="text" class="form-control" id="admin-point-code" placeholder="Символьный код" required>
            </div>

            <div class="form-group">
                <label for="admin-point-coordinate">Координаты</label>
                <input name="coordinate" value="{{ $point->coordinate }}" type="text" class="form-control" id="admin-point-coordinate" placeholder="Например: [44.50984005681418,34.17243612448108]">
            </div>

            <div class="input-group mb-3">
                <select name="city" class="custom-select">
                    <option value="0" selected>Выберите город</option>
                    <option value="1">Ялта</option>
                    <option value="2">Алушта</option>
                    <option value="3">Севастополь</option>
                </select>
            </div>

            <div class="form-group">
                <label for="admin-point-street">Улица</label>
                <input name="street" value="{{ $point->street }}" type="text" class="form-control" id="admin-point-street" placeholder="Например: Лесная">
            </div>

            <div class="form-group">
                <label for="admin-point-place">Название места</label>
                <input name="place" value="{{ $point->place }}" type="text" class="form-control" id="admin-point-place" placeholder="Например: Лесная">
            </div>

            <div class="form-group">
                <label for="admin-point-house">Номер дома</label>
                <input name="house" value="{{ $point->house }}" type="text" class="form-control" id="admin-point-house" placeholder="Например: 16">
            </div>

            <div class="form-group">
                <label for="admin-point-picture_cover">Картинка обложки</label>
                <input name="picture_cover" value="{{ $point->picture_cover }}" type="text" class="form-control" id="admin-point-picture_cover" placeholder="Пусть к файлу на сервере (временно)">
            </div>

            <div class="form-group">
                <label for="admin-point-short_text">Описание короткое</label>
                <textarea name="short_text" class="form-control" id="admin-point-short_text" rows="3">{!! $point->short_text !!}</textarea>
            </div>

            <div class="form-group">
                <label for="admin-point-full_text">Описание короткое</label>
                <textarea name="full_text" class="form-control" id="admin-point-full_text" rows="5">{!! $point->full_text !!}</textarea>
            </div>

            <div class="form-group">
                <label for="admin-point-author">Автор</label>
                <input name="author" value="{{ $point->author }}" type="text" class="form-control" id="admin-point-author" placeholder="Евгений">
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </main>
@stop