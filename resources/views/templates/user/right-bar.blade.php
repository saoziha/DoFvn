<div class="col-lg-4 sidebar ftco-animate bg-light fadeInUp ftco-animated">
        <div class="sidebar-box">
            <form action="/blog" method="GET" class="search-form">
                <div class="form-group">
                    <span class="icon icon-search"></span>
                    <input type="text" name="search" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
            </form>
        </div>
        <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
            <h3 class="sidebar-heading">Categories</h3>
            <ul class="categories">
                <?php foreach ($categories as $key => $value) {
                    ?>
                <li><a href="{{url("blog?category=$value->id")}}">{{ucfirst($value->name)}} <span>({{$value->sum}})</span></a></li>
                <?php }?>
            </ul>
        </div>

        <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
            <h3 class="sidebar-heading">Popular Articles</h3>
            <?php foreach($popular as $item) { ?>
            <div class="block-21 mb-4 d-flex">
                    <a href="/{{Str::slug($item->name).'-'.$item->id.'.html'}}" class="blog-img mr-4" style="background-image: url({{url('storage').'/'.$item->image}});"></a>
                <div class="text">
                <h3 class="heading"><a href="/{{Str::slug($item->name).'-'.$item->id.'.html'}}">{{$item->name}}</a></h3>
                    <div class="meta">
                        <div><a href="/{{Str::slug($item->name).'-'.$item->id.'.html'}}"><span class="icon-calendar"></span> {{ date("d-m-Y", strtotime($item->created_at)) }}</a></div>
                        <div><a href="/{{Str::slug($item->name).'-'.$item->id.'.html'}}"><span class="icon-person"></span> {{$item->create_by}}</a></div>
                        <div><a href="/{{Str::slug($item->name).'-'.$item->id.'.html'}}"><span class="icon-chat"></span> {{$item->comments}}</a></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="sidebar-box ftco-animate">
            <h3 class="sidebar-heading">Tag Cloud</h3>
            <ul class="tagcloud">
                    <?php foreach ($tags as $key => $value) {
                        ?>
                     <a href="{{url("blog?tag=$value->id")}}" class="tag-cloud-link">{{$value->name}}</a>
                     <?php } ?>
            </ul>
        </div>

        <div class="sidebar-box subs-wrap img" style="background-image: url(images/bg_1.jpg);">
            <div class="overlay"></div>
            <h3 class="mb-4 sidebar-heading">Newsletter</h3>
            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
            </p>
            <form action="#" class="subscribe-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email Address">
                    <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
                </div>
            </form>
        </div>

        <div class="sidebar-box ftco-animate">
            <h3 class="sidebar-heading">Archives</h3>
            <ul class="categories">
                <?php foreach ($archives as $key => $value) {?>
                <li><a href="/blog?archives={{$value->month}}">{{ucfirst($value->name)}} <span>({{$value->sum}})</span></a></li>
                <?php }?>
            </ul>
        </div>


        <div class="sidebar-box ftco-animate">
            <h3 class="sidebar-heading">Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                necessitatibus voluptate quod mollitia delectus aut.</p>
        </div>
    </div><!-- END COL -->
