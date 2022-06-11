@extends('layouts.admin')

@section('title','Paketler')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a href="{{route('admin_package_create')}}" style="position: absolute; right: 25px;" class="btn btn-primary">Paket Ekle</a>
                            <h4 class="card-title ">Paketler</h4>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Image Gallery</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($datalist as $rs)
                                        <tr>
                                            <td>
                                                {{$rs->id}}
                                            </td>
                                            <td>
                                                {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}
                                            </td>
                                            <td>
                                                {{$rs->title}}
                                            </td>
                                            <td>
                                                @if($rs->image)
                                                    <img src="{{Storage::url($rs->image)}}" height="60" width="120" alt=""/>
                                                @endif

                                            </td>
                                            <td>
                                                <b>{{$rs->price}} ₺</b>
                                            </td>
                                            <td><a href="{{route('admin_image_add',['package_id'=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><img src="{{asset('assets/admin/assets/images')}}/gallery.png" height="30"></a></td>

                                            <td>
                                                {{$rs->status}}
                                            </td>
                                            <td>
                                                <a href="{{route('admin_package_edit',['id'=>$rs->id])}}"><img src="{{asset('assets/admin/assets/images')}}/edit.png" height="30"></a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin_package_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/assets/images')}}/delete.png" height="30"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
