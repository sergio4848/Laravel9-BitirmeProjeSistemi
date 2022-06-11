@extends('layouts.home')
@php
    $setting=\App\Http\Controllers\HomeController::getsetting();
@endphp

@section('title', 'Yorumlarım | '.$setting->title)
@include('home._header')
@section ('content')

    <section class="section-testimonials section-t8 nav-arrow-a" style="padding-top: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Yorumlarım</h2>
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
                                    <img src="{{ Storage::url($rs->project->image) }}" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-ico">
                                    <span>{{$rs->created_at}}</span>
                                </div>
                                <div class="testimonials-content">
                                    <p class="testimonial-text">
                                        {{$rs->review}}

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

