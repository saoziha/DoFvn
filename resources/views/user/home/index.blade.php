@extends('templates.user.master')
@section('content')
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
