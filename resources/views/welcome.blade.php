<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AVA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50 bg-slate-50 ">

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            {{--            <li class="nav justify-content-end"><a href="/" class="nav-link px-2 link-secondary">خانه</a></li>--}}
            {{--            <li class="nav justify-content-end"><a href="{{route('posts')}}" class="nav-link px-2 link-dark">لیست </a></li>--}}

            @auth
                @if(auth()->user()?->id === 1)
                    <li><a href="/admin/panel" class="nav-link px-2 link-dark">پنل ادمین</a></li>
                @endif
            @endauth
            {{--                    <li><a href="#" class="nav-link px-2 link-dark">About</a></li>--}}
        </ul>
        @guest
            @if (Route::has('login'))
                <div class="col-md-3 text-end">
                    <a  href="{{ route('login') }}">
                        <button  type="button" class="btn btn-outline-primary me-2"> {{ __('ورود') }}</button>
                    </a>
                    @endif

                    @if (Route::has('register'))
                        <a  href="{{ route('register') }}">
                            <button type="button" class="btn btn-primary">  {{ __('ثبت نام') }}</button>
                        </a>
                    @endif
                </div>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('خروج') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

    </header>
</div>
<div class="container D-flex justify-content-center">
    {{--    <h2 class="D-flex justify-content-center">--}}
    {{--        هر کتاب یک دنیای جدید--}}
    {{--    </h2>--}}
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="https://th.bing.com/th/id/R.f664b27b5ed6ee6eb95138d0e1c3690a?rik=bOy3Qqx7AylFvA&riu=http%3a%2f%2fwww.pixelstalk.net%2fwp-content%2fuploads%2f2016%2f06%2fFree-Images-Book-Wallpapers-HD.jpg&ehk=CNRZGzePm8out79YAYkXO%2baUSnhV37NayTxJ3saGSJM%3d&risl=&pid=ImgRaw&r=0" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">هر کتاب یک دنیای جدید</h1>
            <p class="lead">اینجا درباره کتاب های مورد علاقت بنویس،به دیگران معرفی کن و با خوندن معرفی های بقیه با کتاب های جدید آشنا شو تا دنیا رو از زاویه های مختلف ببینی و تجربه های دیگران رو یاد بگیری
                <br>
                برای استفاده از سایت وارد حساب کاربریت شو
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a  href="{{ route('login') }}">
                    <button  type="button" class="btn btn-primary btn-lg px-4 me-md-2"> {{ __('ورود') }}</button>
                </a>
                <a  href="{{ route('register') }}">
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">  {{ __('ثبت نام') }}</button>
                </a>
            </div>
        </div>
    </div>
</div>


<footer class="sticky py-16 text-center text-sm text-black dark:text-white/70">
    <div class="relative h-32 w-32 ...">
        <div class="absolute bottom-4 right-0 h-16 w-16 ... mb-4">

            Student: Samaneh Mostafazadeh
            <br>
            Student Number: 990060001
            <br>
            Dr. Aziz Hanifi
        </div>


    </div>
</footer>
</body>
</html>
