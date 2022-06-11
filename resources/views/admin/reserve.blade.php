@extends('layouts.admin')

@section('title','Rezervasyon Listesi')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Rezervasyonlar</h4>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>Id</th>
                                    <th>User</th>
                                    <th>Package</th>
                                    <th>Start Date</th>
                                    <th>People</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>

                                    <th colspan="3">Actions</th>
                                    </thead>
                                    <tbody>
                                    @include('home.message')
                                    @foreach($datalist as $rs)
                                        <tr>
                                            <td>
                                                {{$rs->id}}
                                            </td>
                                            <td>
                                                <a href="{{route('admin_user_show',['id'=>$rs->user->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">{{$rs->user->name}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('package',['id'=>$rs->package->id,'slug'=>$rs->package->slug])}}" target="_blank">{{$rs->package->title}}</a>
                                            </td>
                                            <td>
                                                {{$rs->startDate}}
                                            </td>
                                            <td>
                                                {{$rs->people}}
                                            </td>
                                            <td>
                                                {{$rs->amount}} ₺
                                            </td>
                                            <td>
                                                {{$rs->created_at}}
                                            </td>
                                            <td>
                                                {{$rs->status}}
                                            </td>

                                            <td>
                                                <a href="{{route('admin_reserve_show',['id'=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><img src="{{asset('assets/admin/assets/images')}}/edit.png" height="30"></a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin_reserve_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/assets/images')}}/delete.png" height="30"></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
