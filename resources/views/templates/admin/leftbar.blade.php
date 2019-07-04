<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="<?= Route::current()->getName() == 'admin.index'?'active':''?>">
                    <a href="{{url('/admin')}}" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Home</a>
                </li>
                 <li class="<?= Route::current()->getName() == 'admin.posts.index'?'active':''?>">
                 <a href="{{url('/admin/posts')}}" class="waves-effect"><i class="fa fa-file-text-o m-r-10" aria-hidden="true"></i>Posts</a>
                </li>
                <li class="<?= Route::current()->getName() == 'admin.user.index'?'active':''?>">
                    <a href="{{url('/admin/user')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>User</a>
                </li>
                <li class="<?= Route::current()->getName() == 'admin.category.index'?'active':''?>">
                    <a href="{{url('/admin/category')}}" class="waves-effect"><i class="fa fa-list-alt m-r-10" aria-hidden="true"></i>Category</a>
                </li>
                <li class="<?= Route::current()->getName() == 'admin.gallery.index'?'active':''?>">
                    <a href="{{url('/admin/gallery')}}" class="waves-effect"><i class="fa fa-file-image-o m-r-10" aria-hidden="true"></i>Gallery</a>
                </li>
                <li class="<?= Route::current()->getName() == 'admin.about.index'?'active':''?>">
                    <a href="{{url('/admin/about')}}" class="waves-effect"><i class="fa fa-address-card m-r-10" aria-hidden="true"></i>About</a>
                </li>
                <li class="<?= Route::current()->getName() == 'admin.contact.index'?'active':''?>">
                    <a href="{{url('/admin/contact')}}" class="waves-effect"><i class="fa fa-envelope-open m-r-10" aria-hidden="true"></i>Contact</a>
                </li>
                <li class="<?= Route::current()->getName() == 'admin.subcribe.index'?'active':''?>">
                    <a href="{{url('/admin/subcribe')}}" class="waves-effect"><i class="fa fa-phone-square m-r-10" aria-hidden="true"></i>Subcribe</a>
                </li>
                <li class="<?= Route::current()->getName() == 'admin.comment.index'?'active':''?>">
                    <a href="{{url('/admin/comment')}}" class="waves-effect"><i class="fa fa-comment m-r-10" aria-hidden="true"></i>Comment</a>
                </li>
                <li class="<?= Route::current()->getName() == 'admin.tag.index'?'active':''?>">
                    <a href="{{url('/admin/tag')}}" class="waves-effect"><i class="fa fa-tags m-r-10" aria-hidden="true"></i>Tags</a>
                </li>
            </ul>
            <div class="text-center m-t-30">
                <a href="https://wrappixel.com/templates/monsteradmin/" class="btn btn-danger">Logout</a>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
