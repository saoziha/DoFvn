@extends('templates.user.master')
@section('content')
<section class="ftco-section bg-light ftco-bread">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center">
            <div class="col-md-9 ftco-animate fadeInUp ftco-animated">
             <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span class="mr-2"><a href="/blog">Blog</a></span> <span>Blog Single</span></p>
            <h1 class="mb-3 bread">{{ucfirst($item->name)}}</h1>
            <p>{{ucfirst($item->title)}}</p>
        </div>
        </div>
    </div>
</section>
<section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate fadeInUp ftco-animated">
                {!!$item->content!!}
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                  <?php foreach ($tags as $key => $value) {
                   ?>
                <a href="{{url("blog?tag=$value->id")}}" class="tag-cloud-link">{{$value->name}}</a>
                <?php } ?>
              </div>
            </div>

            <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="{{asset('templates/user')}}/images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc">
                <h3>George Washington</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div>

            <div class="pt-5 mt-5">
            <h3 class="mb-5 font-weight-bold" id="total_comment" data-total='{{$item->comments}}'>{{$item->comments}} Comments</h3>
              <ul class="comment-list" id="comment_list">
                <?php foreach($comments as $comment){
                    if($comment->reply_id==0){
                ?>
                <li class="comment" id="li{{$comment->id}}">
                  <div class="vcard bio">
                        <?php
                        $avatar = $comment->avatar!=''?$comment->avatar:'other.png';
                        ?>
                    <img src="{{url('storage').'/'.$avatar}}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>{{$comment->user_name}}</h3>
                    <div class="meta">{{$comment->created_at}}</div>
                        <p>{{$comment->content}}</p>
                        <p style="display:inline"><a href="javascript:void(0)" onclick="parrentComment({{$comment->id}},'{{url('user/comment')}}',{{$item->id}})" class="reply">Reply</a></p>
                        @if($userLogin->id==$comment->user_id)
                        <p style="display:inline"><a href="javascript:void(0)" onclick="removeComment({{$comment->id}},'{{url('user/remove-comment')}}')" class="reply">Delete</a></p>
                        @endif
                  </div>

                    <ul class="children" id="pr_{{$comment->id}}">
                    <?php foreach($comments as $child){
                        if($child->reply_id!=0 && $child->reply_id==$comment->id){
                    ?>
                    <li class="comment" id="li{{$child->id}}">
                      <div class="vcard bio">
                        <img src="{{url('storage').'/'.$avatar}}" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>{{$child->user_name}}</h3>
                        <div class="meta">{{$child->created_at}}</div>
                            <p>{{$child->content}}</p>
                            @if($userLogin->id==$child->user_id)
                            <p style="display:inline"><a href="javascript:void(0)" onclick="removeComment({{$child->id}},'{{url('user/remove-comment')}}')" class="reply">Delete</a></p>
                            @endif
                      </div>
                    </li>
                    <?php }} ?>
                  </ul>
                </li>
                <?php }}?>
              </ul>
              <!-- END comment-list -->
              <div class="comment-form-wrap pt-5">
	                <h3 class="mb-5">Leave a comment</h3>
	                <form action="#" class="p-3 p-md-5 bg-light">
	                  <div class="form-group">
	                    <label for="message">Message</label>
                      <textarea name="" id="message" cols="30" id="message" data-url="{{url('user/comment')}}" data-id="{{$item->id}}" rows="10" class="form-control"></textarea>
	                  </div>
	                  <div class="form-group">
	                    <input type="button" onclick="comment()" value="Post Comment" class="btn py-3 px-4 btn-primary">
	                  </div>

	                </form>
	              </div>
            </div>
          </div> <!-- .col-md-8 -->
                @include('templates.user.right-bar')
            </div>
        </div>
    </section>
@endsection
