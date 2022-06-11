@extends('layouts.home')

@section('title','Proje Ekle')
@include('home._header')

<head>
    @FilemanagerScript
</head>

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>




@section('content')
    <div class="content" style="padding-top: 200px;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Proje Ekle</h4>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{route('user_project_store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <table>

                                        <tr><h4>Category:</h4> <select name="category_id" id="category_id" style="width: 1000px">
                                                <option value="0" selected="selected">Main Category</option>
                                                @foreach($datalist as $rs)
                                                    <option value="{{$rs->id}}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                                @endforeach


                                            </select></tr>
                                        <tr><h4>Title:</h4> <input style="width: 1000px" id="title" type="text" name="title" placeholder="Title"/></tr>
                                        <tr><h4>Keywords: </h4><input style="width: 1000px" id="keywords" type="text" name="keywords" placeholder="Keywords"/></tr>
                                        <tr><h4>Description: </h4><input style="width: 1000px" id="description" type="text" name="description" placeholder="Description"/></tr>
                                        <tr><h4>Detail: </h4><textarea id="detail" name="detail"></textarea></tr>
                                        <script>
                                            window.onload = function () {
                                                CKEDITOR.replace('detail', {
                                                    filebrowserBrowseUrl: filemanager.ckBrowseUrl,
                                                });
                                            }
                                        </script>
                                        <tr><h4>Video Link: </h4><input style="width: 1000px" id="videolink" type="text" name="videolink" placeholder="videolink"/></tr><br>
                                        <tr><h4>Slug: </h4><input style="width: 1000px" id="slug" type="text" name="slug" placeholder="Slug"/></tr><br>
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
    </div>

@endsection
