<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>  
  <title>Путеводитель по Крыму | Крым глазами местных</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
  <meta name="description" content="Сайт том как и где отдохнуть в Крыму"> 
  <meta name="keywords" content="крым, крымглазамиместных, достопримечательности, туризм, отдых, отпуск">
  <meta name="yandex-verification" content="57c1c1233a26b0bd" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700" rel="stylesheet">
  <style type="text/css">
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Roboto', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    .title h1 {
        font-size:  100px;
        font-family: 'Roboto', sans-serif;
    }
    .title a {
        color: #FFF;
        font-family: 'Roboto', sans-serif;
        text-shadow: -6px 11px 8px rgba(0,0,0,1);
    }
    .title a:hover {
        text-decoration: none;
        color: #F1F1F1;
    }
    #bg {
      position: fixed; 
      top: 0; 
      left: 0; 
      min-width: 100%;
      min-height: 100%;
    }
    #outer {
        text-align: center;
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
    }

    #table-container {
        height:100%;
        width:100%;
        display:table;
    }

    #table-cell {
        vertical-align:middle;
        height:100%;
        display:table-cell;
    }
    @media (max-width: 768px) { 
        .title h1 {
            font-size:  50px;
        }
    }
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <img src="/images/back.jpg" id="bg" alt="">
    <div id="outer">
        <div id="table-container">
            <div id="table-cell" class="title">
                <a title="Перейти на канал YouTube" href="https://www.youtube.com/КРЫМГЛАЗАМИМЕСТНЫХ" target="_blank"><h1>Крым глазами местных</h1></a>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

       ym(53953558, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/53953558" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

</body>
</html>
