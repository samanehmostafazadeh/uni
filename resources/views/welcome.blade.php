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

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
             <li class="nav justify-content-end"><a href="/" class="nav-link px-2 link-secondary">خانه</a></li>
            @auth
               <li class="nav justify-content-end"><a href="{{route('posts')}}" class="nav-link px-2 link-dark">لیست </a></li>
               <li class="nav justify-content-end"><a href="{{route('dashboard')}}" class="nav-link px-2 link-dark">داشبرد من </a></li>

            @if(auth()->user()?->id === 1)
                <li><a href="/admin/panel" class="nav-link px-2 link-dark">پنل ادمین</a></li>
                @endif
            @endauth

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
                <li class=" nav nav-item dropdown">
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

<main>
    <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-4 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg mb-3 ">
                <img src="https://th.bing.com/th/id/R.f664b27b5ed6ee6eb95138d0e1c3690a?rik=bOy3Qqx7AylFvA&riu=http%3a%2f%2fwww.pixelstalk.net%2fwp-content%2fuploads%2f2016%2f06%2fFree-Images-Book-Wallpapers-HD.jpg&ehk=CNRZGzePm8out79YAYkXO%2baUSnhV37NayTxJ3saGSJM%3d&risl=&pid=ImgRaw&r=0" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-4 ">
                <h1 class="display-6 fw-bold lh-1 text-body-emphasis mb-4 text-center">هر کتاب یک دنیای جدید</h1>
                <p class="lead text-center">
                    اینجا درباره کتاب های مورد علاقت بنویس
                    ، به دیگران معرفی کن
                    و با خوندن معرفی های بقیه با کتاب های جدید آشنا شو
                    تا دنیا رو از زاویه های مختلف ببینی
                    و تجربه های دیگران رو یاد بگیری
                     <br>
                     برای استفاده از سایت وارد حساب کاربریت شو
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                   <a  href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">
                       <button  type="button" class="btn btn-primary btn-lg px-4 me-md-2"> {{ __('ورود') }}</button>
                   </a>
                   <a  href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">
                       <button type="button" class="btn Secondary  btn-lg px-4">  {{ __('ثبت نام') }}</button>
                   </a>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="container D-flex justify-content-center">
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
</div>
</body>

</html>
