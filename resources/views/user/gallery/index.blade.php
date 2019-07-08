@extends('templates.user.master')
@section('content')
<section class="ftco-section bg-light ftco-bread">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center">
            <div class="col-md-9 ftco-animate fadeInUp ftco-animated">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span>
                    <span>Gallery</span></p>
                <h1 class="mb-3 bread">Galleries</h1>
                <p>A small river named Duden flows by their place and supplies it with the necessary
                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly into
                    your mouth.</p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section-2">
    <div class="photograhy">
        <div class="row no-gutters">
            <?php foreach($items as $item){?>
            <div class="col-md-4 ftco-animate fadeInUp ftco-animated">
                <a href="{{url('storage').'/'.$item->link}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{url('storage').'/'.$item->link}});">
                    <div class="overlay"></div>
                    <div class="text text-center">
                        <h3>{{$item->name}}</h3>
                        <span class="tag">{{$item->category_name}}</span>
                    </div>
                </a>
            </div>
            <?php }?>
        </div>
    </div>
</section>

@endsection
