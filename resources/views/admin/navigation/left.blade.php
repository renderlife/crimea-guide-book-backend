<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="/admin">
                    <span data-feather="home"></span>
                    Главная <span class="sr-only">(админка)</span>
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Контент</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="/admin/points/">
                    <span data-feather="map-pin"></span>
                    Точки
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="message-square"></span>
                    Комментарии точек
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/articles/">
                    <span data-feather="book"></span>
                    Статьи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="message-square"></span>
                    Комментарии статей
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Справочники</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories-points') }}">
                    <span data-feather="list"></span>
                    Категории точек
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories') }}">
                    <span data-feather="list"></span>
                    Категории статей
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="list"></span>
                    Города
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Пользователи
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Избранные точки/статьи</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Ялта, Ай-петри
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Алушта, кафе «Анна»
                </a>
            </li>
        </ul>
    </div>
</nav>
