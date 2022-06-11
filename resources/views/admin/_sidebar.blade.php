<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
                @if(Auth::user()->profile_photo_path)
                    <img src="{{Storage::url(Auth::user()->profile_photo_path)}}" height="40" style="border-radius: 10px">
                @endif
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
                <p style="font-size: 10px;">{{Auth::user()->name}}</p>
            </a>
        </div>
        <ul class="nav">
            <li class="active ">
                <a href="{{route('admin_home')}}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>ANASAYFA</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_category')}}">
                    <i class="tim-icons icon-atom"></i>
                    <p>KATEGORİLER</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_packages')}}">
                    <i class="tim-icons icon-pin"></i>
                    <p>PAKETLER</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_message')}}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>MESAJLAR</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_review')}}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>YORUMLAR</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_users')}}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>KULLANICILAR</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_setting')}}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>AYARLAR</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_faq')}}">
                    <i class="tim-icons icon-world"></i>
                    <p>SSS</p>
                </a>
            </li>
            <li>
                <a href="{{route('admin_reserve')}}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>REZERVASYONLAR</p>
                </a>
            </li>
        </ul>
    </div>
</div>
