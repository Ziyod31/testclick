<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <title>Test Click</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <div class="container collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="col-6 navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item active">
                <a class="nav-link active" aria-current="page" href="/">Главная</a>
            </li>

            <li class="nav-item active offset-3">
                <a class="nav-link active" aria-current="page" href="{{ route('products.create') }}">Создать Продукт</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active offset-3" aria-current="page" href="{{ route('categories.index') }}">Категории</a>
            </li>

        </ul>
        <form class="d-flex" action="{{ route('search') }}">
          <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search" name="search">
          <button class="btn btn-outline-success" type="submit">Поиск</button>
      </form>

      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироватся') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item">
            <span class="nav-link">{{ Auth::user()->name }}</span>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-flex">
            @csrf
           <button class="btn btn-outline-primary" type="submit">Выйти</button>
        </form>
        @endguest
    </ul>

</div>
</div>
</nav>


<div class="container">
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    @endforeach
    @endif
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
  </div>
  @endif


  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>