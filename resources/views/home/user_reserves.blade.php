@extends('layouts.home')
@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
@endphp

@section('title', 'Rezervasyonlarım | '.$setting->title)
@include('home._header')
@section ('content')
    <!--/ Testimonials Star /-->
    <section class="section-testimonials section-t8 nav-arrow-a">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Rezervasyonlarım</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="testimonial-carousel" class="owl-carousel owl-arrow">

                <div class="carousel-item-a">
                    @foreach($datalist as $rs)
                    <div class="testimonials-box">

                        <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <a href="{{route('package',['id' => $rs->package->id,'slug' => $rs->package->slug])}}">{{$rs->package->title}}</a>
                                    <div class="testimonial-img">
                                        <img src="{{ Storage::url($rs->package->image) }}" style="height: 300px; width: 300px;" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="testimonial-ico">
                                        <span class="ion-ios-quote"></span>
                                    </div>
                                    <div class="testimonials-content">
                                        <p class="testimonial-text">
                                            KİŞİ SAYISI:{{$rs->people}}<br>

                                            FİYAT:{{$rs->amount}} ₺<br>
                                            OLUŞTURULMA TARİHİ:{{$rs->created_at}}<br>
                                            REZERVASYON DURUMU:{{$rs->status}}<br>
                                        </p>
                                    </div>
                                    <div class="testimonial-author-box">
                                        <h5 class="testimonial-author">REZERVASYON TARİHİ:{{$rs->startDate}}</h5>
                                    </div>
                                </div>
                        </div>

                    </div>
                @endforeach
                </div>

            </div>
        </div>
    </section>
    <!--/ Testimonials End /-->

@endsection

