<!--/ Carousel Star /-->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
        @foreach($slider as $rs)
        <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ Storage::url($rs->image) }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}</p>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b">{{$rs->title}} </span></h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="{{route('package',['id' => $rs->id,'slug' => $rs->slug])}}"><span class="price-a">İNCELE | ₺ {{$rs->price}}</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--/ Carousel end /-->
