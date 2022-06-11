<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Resim Galerisi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('assets')}}/img/logo.png" rel="icon">
    <link href="{{ asset('assets')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('assets')}}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('assets')}}/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets')}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('assets')}}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ asset('assets')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('assets')}}/css/style.css" rel="stylesheet">

    <!-- =======================================================
      Theme Name: EstateAgency
      Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
    @yield('css')
    @yield('headerjs')

</head>


</html>
<body>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Proje: {{$data->title}}</h5>

                </div>
                <div class="card-body">

                    <div style="width:1000px; height: 600px;">
                        <form action="{{route('user_image_store',['project_id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table>

                                <tr><h4>Title:</h4> <input style="width: 600px" id="title" type="text" name="title" projectholder="Title"/></tr>

                                <br><tr><label for="image"><h4>Image:</h4></label><input type="file" name="image" id="image" class="form-control">
                                    <br><br>
                                <tr><button type="submit" class="btn btn-primary">Ekle</button></tr>
                            </table>
                        </form>
                        <br><br>
                        <table class="table" style="width: 1000px">
                            <thead class=" text-primary">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Actions</th>

                            </thead>


                            <tbody>
                            @foreach($images as $rs)
                                <tr>
                                    <td>
                                        {{$rs->id}}
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
                                        <a href="{{route('user_image_delete',['id'=>$rs->id,'project_id'=>$data->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="30"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
