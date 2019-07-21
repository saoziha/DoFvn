<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{url('/')}}" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Home</a>
                </li>
                 <li class="<?= Route::current()->getName() == 'user.post.index'?'active':''?>">
                 <a href="{{url('/user/posts')}}" class="waves-effect"><i class="fa fa-file-text-o m-r-10" aria-hidden="true"></i>Posts</a>
                </li>
                <li class="<?= Route::current()->getName() == 'user.gallery.index'?'active':''?>">
                    <a href="{{url('/user/gallery')}}" class="waves-effect"><i class="fa fa-file-image-o m-r-10" aria-hidden="true"></i>Gallery</a>
                </li>
            </ul>
            <div class="text-center m-t-30">
                <a href="{{url('user/').'/'.Auth::guard('user')->user()->id.'/logout'}}" class="btn btn-danger">Logout</a>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
