

<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="/"><img src="{{asset('assets/img/logo.png')}}" style="height: 75px;"/></a>
        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
                data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Anasayfa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Ekstra
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('aboutus')}}">Hakkımızda</a>
                        <a class="dropdown-item" href="{{route('contact')}}">Bize Ulaşın</a>
                        <a class="dropdown-item" href="{{route('faq')}}">SSS</a>
                        <a class="dropdown-item" href="{{route('references')}}">Referanslarımız</a>
                    </div>
                </li>
                @php
                    $parentCategories=\App\Http\Controllers\HomeController::categoryList();
                @endphp

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Kategoriler
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($parentCategories as $rs)
                        <a class="dropdown-item" href="{{route('categoryprojects',['id'=>$rs->id,'slug'=>$rs->slug])}}">{{$rs->title}}</a>
                        @endforeach
                    </div>
                </li>
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('userprofile')}}">Profilim</a>
                        <a class="dropdown-item" href="{{route('user_review')}}">Yorumlarım</a>
                        <a class="dropdown-item" href="{{route('user_project')}}">Projelerim</a>
                        <a class="dropdown-item" href="{{route('logout')}}">Çıkış</a>
                    </div>
                </li>
            @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Giriş & Katıl
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/login">Giriş Yap</a>
                            <a class="dropdown-item" href="/register">Kaydol</a>
                        </div>
                    </li>
            @endauth
            </ul>
        </div>

    </div>
</nav>
<!--/ Nav End /-->
