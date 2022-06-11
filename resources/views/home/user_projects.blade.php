@extends('layouts.home')
@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
@endphp

@section('title', 'Projelerim | '.$setting->title)
@include('home._header')
@section ('content')

    <section class="section-testimonials section-t8 nav-arrow-a" style="padding-top: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Projelerim</h2> <a href="{{route('user_project_create')}}">PROJE EKLE</a>
                            <p>@include('home.message')</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="testimonial-carousel" class="owl-carousel owl-arrow">
                @foreach($datalist as $rs)
                    <div class="carousel-item-a">
                        <div class="testimonials-box">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="testimonial-img">
                                        <img src="{{ Storage::url($rs->image) }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="testimonial-ico">
                                        <span>{{$rs->title}}</span>
                                    </div>
                                    <div class="testimonials-content"><br><br>
                                        <h3>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}</h3>
                                        <p class="testimonial-text">
                                            {{$rs->created_at}}
                                            <a href="{{route('user_image_add',['project_id'=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><img src="{{asset('assets/admin/assets/images')}}/gallery.png" style="height: 30px;width: 30px;"></a>
                                            <a href="{{route('user_project_edit',['id'=>$rs->id])}}"><img src="{{asset('assets/admin/assets/images')}}/edit.png" style="width: 30px; height: 30px;"></a>
                                            <a href="{{route('user_project_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/assets/images')}}/delete.png" style="width: 30px; height: 30px;"></a>

                                        </p>
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

