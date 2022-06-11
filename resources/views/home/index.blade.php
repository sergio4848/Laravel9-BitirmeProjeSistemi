@extends('layouts.home')



@section('title', 'Ana Sayfa | '.$setting->title)
@section('description')

@endsection


@include('home._header')

@include('home._slider')

@section ('content')


    <!--/ Property Star /-->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">En Son Eklenen Projeler</h2>
                        </div>
                        <div class="title-link">

                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">
                @foreach($last as $rs)
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <div class="img-box-a">
                            <img src="{{ Storage::url($rs->image) }}" style="height: 400px;" alt="" class="img-a img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-overlay-a-content">
                                <div class="card-header-a">
                                    <h2 class="card-title-a">
                                        <a href="{{route('project',['id' => $rs->id,'slug' => $rs->slug])}}">{{$rs->title}}</a>
                                    </h2>
                                </div>
                                <div class="card-body-a">

                                    <a href="{{route('project',['id' => $rs->id,'slug' => $rs->slug])}}" class="link-a">İncele
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                </div>
                                <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                        <li>
                                            <h4 class="card-info-title">Kategori</h4>
                                            <span>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}</span>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>


    <!--/ News Star /-->
    <section class="section-news section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Rastgele Projeler</h2>
                        </div>

                    </div>
                </div>
            </div>
            <div id="new-carousel" class="owl-carousel owl-theme">
                @foreach($picked as $rs)
                <div class="carousel-item-c">
                    <div class="card-box-b card-shadow news-box">
                        <div class="img-box-b">
                            <img src="{{ Storage::url($rs->image) }}" style="height: 400px;" alt="" class="img-b img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-header-b">
                                <div class="card-category-b">
                                    <a href="{{route('project',['id' => $rs->id,'slug' => $rs->slug])}}" class="category-b">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}</a>
                                </div>
                                <div class="card-title-b">
                                    <h2 class="title-2">
                                        <a href="{{route('project',['id' => $rs->id,'slug' => $rs->slug])}}">{{$rs->title}}</a>
                                    </h2>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </section>
    <!--/ News End /-->
    <section class="section-testimonials section-t8 nav-arrow-a" style="padding-top: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Farklı Projeler</h2>
                        </div>
                    </div>
                </div>
            </div>
        <div id="testimonial-carousel" class="owl-carousel owl-arrow">
        @foreach($daily as $rs)
            <div class="carousel-item-a">
                <div class="testimonials-box">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="testimonial-img">
                                <a href="{{route('project',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{ Storage::url($rs->image) }}" style="height: 300px;" alt="" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="testimonial-ico">
                                <span><a href="{{route('project',['id' => $rs->id,'slug' => $rs->slug])}}">{{$rs->title}}</a></span>
                            </div>
                            <div class="testimonials-content"><br><br>
                                <h3>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}</h3>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        </div>
    </section>
@endsection

