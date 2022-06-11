@extends('layouts.home')

@section('title','Proje Ekle')
@FilemanagerScript


<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@include('home._header')





@section('content')

    <section id="subintro" style="padding-top: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                        <li><a href="{{route('userprofile')}}">User Profile</a><i class="icon-angle-right"></i></li>
                        <li class="active">{{Auth::user()->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="maincontent">
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                    @include('home.user_panel')
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Proje Ekle</h5>
                        </div>
                        <div class="card-body">

                            <div style="width:1200px; height: auto;">
                                <form action="{{route('user_project_store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <table>

                                        <tr><h4>Category:</h4> <select name="category_id" id="category_id" style="width: 1000px">
                                                @foreach($datalist as $rs)
                                                    <option value="{{$rs->id}}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                                @endforeach


                                            </select></tr>
                                        <tr><h4>Title:</h4> <input style="width: 1000px" id="title" type="text" name="title" projectholder="Title"/></tr>
                                        <tr><h4>Keywords: </h4><input style="width: 1000px" id="keywords" type="text" name="keywords" projectholder="Keywords"/></tr>
                                        <tr><h4>Description: </h4><input style="width: 1000px" id="description" type="text" name="description" projectholder="Description"/></tr>
                                        <tr><h4>Video Link: </h4><input style="width: 1000px" id="videolink" type="text" name="videolink" projectholder="videolink"/></tr>
                                        <tr><h4>Detail: </h4><textarea id="detail" name="detail"></textarea>
                                            <script>
                                                window.onload = function () {
                                                    CKEDITOR.reproject('detail', {
                                                        filebrowserBrowseUrl: filemanager.ckBrowseUrl,
                                                    });
                                                }
                                            </script>



                                        </tr>
                                        <tr><h4>Slug: </h4><input style="width: 1000px" id="slug" type="text" name="slug" projectholder="Slug"/></tr>
                                        <tr><label for="image"><h4>Image:</h4></label><input type="file" name="image" id="image" class="form-control">
                                            <br><br>
                                        <tr><button type="submit" class="btn btn-primary">Ekle</button></tr>
                                    </table>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

