
@extends('templates.user.master')
@section('content')
<section class="ftco-section bg-light ftco-bread">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center">
            <div class="col-md-9 ftco-animate fadeInUp ftco-animated">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span>
                    <span>Blog</span></p>
                <h1 class="mb-3 bread">Read Our Articles</h1>
                <p>A small river named Duden flows by their place and supplies it with the necessary
                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly into
                    your mouth.</p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php foreach($posts as $post){ ?>
                    <div class="col-md-6">
                        <div class="blog-entry ftco-animate fadeInUp ftco-animated">
                            <a href="/{{Str::slug($post['name']).'-'.$post['id'].'.html'}}" class="img img-2" style="background-image: url({{url('storage').'/'.$post['image']}});"></a>
                            <div class="text text-2 pt-2 mt-3">
                            <h3 class="mb-2"><a href="single.html">{{$post['name']}}</a></h3>
                                <div class="meta-wrap">
                                    <p class="meta">
                                        <span>{{ date("d-m-Y", strtotime($post['created_at'])) }}</span>
                                    <span><a href="single.html">{{ucfirst($post['category_name'])}}</a></span>
                                        <span>5 Comment</span>
                                    </p>
                                </div>
                                <p class="mb-4">{{$post['title']}}</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div><!-- END-->
                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {{-- {{$posts->appends(['search'=>$search])->render()}} --}}
                            @include('pagination.default', ['paginator' => $posts->appends($input)])
                        </div>
                    </div>
                </div>
            </div>
            @include('templates.user.right-bar');
        </div>
    </div>
</section>
@endsection


