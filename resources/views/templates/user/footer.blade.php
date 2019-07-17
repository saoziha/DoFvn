</div>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" /></svg></div>


<script src="{{asset('templates/user')}}/js/jquery.min.js"></script>
<script src="{{asset('templates/user')}}/js/jquery-migrate-3.0.1.min.js"></script>
<script src="{{asset('templates/user')}}/js/popper.min.js"></script>
<script src="{{asset('templates/user')}}/js/bootstrap.min.js"></script>
<script src="{{asset('templates/user')}}/js/jquery.easing.1.3.js"></script>
<script src="{{asset('templates/user')}}/js/jquery.waypoints.min.js"></script>
<script src="{{asset('templates/user')}}/js/jquery.stellar.min.js"></script>
<script src="{{asset('templates/user')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('templates/user')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('templates/user')}}/js/aos.js"></script>
<script src="{{asset('templates/user')}}/js/jquery.animateNumber.min.js"></script>
<script src="{{asset('templates/user')}}/js/bootstrap-datepicker.js"></script>
<script src="{{asset('templates/user')}}/js/jquery.timepicker.min.js"></script>
<script src="{{asset('templates/user')}}/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
</script>
<script src="{{asset('templates/user')}}/js/google-map.js"></script>
<script src="{{asset('templates/user')}}/js/main.js"></script>
<script type="text/javascript">
    function parrentComment(id,url,post_id){
        if($(".input"+id).size()==0){
        let input = `<li class="comment input${id}" id="input">
                        <div class="vcard bio" style='width:50px;'>
                            <img src="/storage/user/other.png" alt="Image placeholder">
                        </div>
                        <div class="comment-body" style="float:left;">
                            <input type='text'   name='content' id='content${id}'/> <p class='reply' style="display:inline;" onclick="send(${id},'${url}',${post_id})">Send</p>
                        </div>
                </li>`;
        $("#pr_"+id).append(input);
        }
    }
    function removeComment(id,url){
        $("#li"+id).remove();
        $.ajax({
            type:'GET',
            url:url,
            data:{id:id},
            }).done(data=>{
                let eleTotal = $("#total_comment");
                let total = data;
                eleTotal.data('total',total);
                eleTotal.text(total + " Comments");
            }).error(error=>{
                if(error.status=401){
                    alert("Please login user !");
                }
            });
    }
    function send(id,url,post_id){
        let content = $("#content"+id).val();
        $.ajax({
            type:'GET',
            url:url,
            data:{reply_id:id,content:content,post_id:post_id},
            }).done(data=>{
                let comment = `<li class="comment">
                                <div class="vcard bio">
                                    <img src="/storage/${data.avatar}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>${data.user_name}</h3>
                                    <div class="meta">${data.created_at}</div>
                                    <p>${data.content}</p>
                                </div>
                                </li>`;
                $("#pr_"+data.reply_id).prepend(comment);
                let eleTotal = $("#total_comment");
                let total = parseInt(eleTotal.data('total'))+1;
                eleTotal.data('total',total);
                eleTotal.text(total + " Comments");
            }).error(error=>{
                if(error.status=401){
                    alert("Please login user !");
                }
            });
    }

    function comment(){
        let message = $("#message");
        let content = message.val();
        let post_id = message.data('id');
        let url = message.data('url');
        $.ajax({
            type:'GET',
            url:url,
            data:{reply_id:0,content:content,post_id:post_id},
            }).done(data=>{
                let comment = `<li class="comment" id="li${data.id}">
                                <div class="vcard bio">
                                    <img src="/storage/${data.avatar}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>${data.user_name}</h3>
                                    <div class="meta">${data.created_at}</div>
                                    <p>${data.content}</p>
                                    <p style="display:inline"><a href="javascript:void(0)" onclick="parrentComment(${data.id},'${url}',${data.post_id})" class="reply">Reply</a></p>
                                    <p style="display:inline"><a href="javascript:void(0)" onclick="removeComment(${data.id},'/user/remove-comment')" class="reply">Delete</a></p>
                                </div>
                                </li>`;
                $("#comment_list").prepend(comment);
                let eleTotal = $("#total_comment");
                let total = parseInt(eleTotal.data('total'))+1;
                eleTotal.data('total',total);
                eleTotal.text(total + " Comments");
            }).error(error=>{
                if(error.status=401){
                    alert("Please login user !");
                }
            });
    }
</script>
</body>

</html>
