@extends('layouts.auth');
@section('content')
    <form class="form-signin form-signin-register" method="post" action="">
        {!! csrf_field() !!}
        <img class="mb-4 logo-login" src="/images/logo_kgm_youtube.jpg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>

        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Придумайте пароль" required>

        <label for="inputPasswordConfirm" class="sr-only">Пароль</label>
        <input type="password" name="password_confirmation" id="inputPasswordConfirm" class="form-control" placeholder="Повторите пароль" required>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="1" name="remember"> Запомнить
            </label>
        </div>

        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        <button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
@stop