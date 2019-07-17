<footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container px-md-5">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Category</h2>
                        <ul class="list-unstyled categories">
                            <?php foreach ($categories as $key => $value) {
                             ?>
                            <li><a href="/blog?category={{$value->id}}">{{ucfirst($value->name)}} <span>({{$value->sum}})</span></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Archives</h2>
                        <ul class="list-unstyled categories">
                                <?php foreach ($archives as $key => $value) {
                                    ?>
                                   <li><a href="/blog?archives={{$value->month}}">{{ucfirst($value->name)}} <span>({{$value->sum}})</span></a></li>
                                   <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">108A Le loi, Da
                                        Nang, Viet Nam</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+84
                                            123456789</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@dofvn.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
