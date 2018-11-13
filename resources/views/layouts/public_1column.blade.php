<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_content')">
    <meta name="keywords" content="@yield('meta_keywords')">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

    @yield('head')

    <link href="{{ asset('css/lyrics.css') }}?{{ time() }}" rel="stylesheet">


</head>

<body>

<header>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="{{ url('') }}">Lyrics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">




            <div class="alphabets-list">
                <ul>
                    <li><a href="{{ url('lyrics/start-a') }}">A</a></li>
                    <li><a href="{{ url('lyrics/start-b') }}">B</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">C</a></li>
                    <li><a href="{{ url('lyrics/start-d') }}">D</a></li>
                    <li><a href="{{ url('lyrics/start-e') }}">E</a></li>
                    <li><a href="{{ url('lyrics/start-f') }}">F</a></li>
                    <li><a href="{{ url('lyrics/start-g') }}">G</a></li>
                    <li><a href="{{ url('lyrics/start-h') }}">H</a></li>
                    <li><a href="{{ url('lyrics/start-i') }}">I</a></li>
                    <li><a href="{{ url('lyrics/start-j') }}">J</a></li>
                    <li><a href="{{ url('lyrics/start-k') }}">K</a></li>
                    <li><a href="{{ url('lyrics/start-l') }}">L</a></li>
                    <li><a href="{{ url('lyrics/start-m') }}">M</a></li>
                    <li><a href="{{ url('lyrics/start-n') }}">N</a></li>
                    <li><a href="{{ url('lyrics/start-o') }}">O</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">P</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">Q</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">R</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">S</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">T</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">U</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">V</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">W</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">X</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">Y</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">Z</a></li>
                    <li><a href="{{ url('lyrics/start-c') }}">#</a></li>
                </ul>
            </div>


        </div>
        </div>
    </nav>


    <div class="search-bar" style="background-color: #563d7c;">


        <div class="container">
        <form class="form-inline mt-2 mt-md-0" action="{{ url('search/') }}" method="get">
            <input class="form-control mr-sm-2" type="text" name="q" placeholder="Search" aria-label="Search" value="{{ app('request')->input('q') }}">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>


    </div>
</header>

<div class="container">






<main>
    @yield('content')
</main>
</div>

<footer class="bd-footer text-muted">
    <div class="container">


        <p>All lyrics are the property and copyright of their respective owners.
            All lyrics provided for educational purposes and personal use only. Please read the disclaimer.</p>
        <p>Copyright &copy; 2000-{{ date("Y") }} xxxxxxxx.com</p>
    </div>
</footer>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>