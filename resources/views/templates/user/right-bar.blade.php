<div class="col-lg-4 sidebar ftco-animate bg-light fadeInUp ftco-animated">
        <div class="sidebar-box">
            <form action="#" class="search-form">
                <div class="form-group">
                    <span class="icon icon-search"></span>
                    <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
            </form>
        </div>
        <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
            <h3 class="sidebar-heading">Categories</h3>
            <ul class="categories">
                <?php foreach ($categories as $key => $value) {
                    ?>
                <li><a href="#">{{ucfirst($value->name)}} <span>({{$value->sum}})</span></a></li>
                <?php }?>
            </ul>
        </div>

        <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
            <h3 class="sidebar-heading">Popular Articles</h3>
            <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no
                            control</a></h3>
                    <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> Oct. 04, 2019</a></div>
                        <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-box ftco-animate">
            <h3 class="sidebar-heading">Tag Cloud</h3>
            <ul class="tagcloud">
                <a href="#" class="tag-cloud-link">animals</a>
                <a href="#" class="tag-cloud-link">human</a>
                <a href="#" class="tag-cloud-link">people</a>
                <a href="#" class="tag-cloud-link">cat</a>
                <a href="#" class="tag-cloud-link">dog</a>
                <a href="#" class="tag-cloud-link">nature</a>
                <a href="#" class="tag-cloud-link">leaves</a>
                <a href="#" class="tag-cloud-link">food</a>
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
                    <li><a href="#">{{ucfirst($value->name)}} <span>({{$value->sum}})</span></a></li>
                <?php }?>
            </ul>
        </div>


        <div class="sidebar-box ftco-animate">
            <h3 class="sidebar-heading">Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                necessitatibus voluptate quod mollitia delectus aut.</p>
        </div>
    </div><!-- END COL -->
