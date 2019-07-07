</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

<script src="{{asset('templates/admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('templates/admin/assets/plugins/bootstrap/js/tether.min.js')}}"></script>
<script src="{{asset('templates/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script  src="{{asset('templates/admin/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script  src="{{asset('templates/admin/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script  src="{{asset('templates/admin/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('templates/admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<!--Custom JavaScript -->
<script  src="{{asset('templates/admin/js/custom.min.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- Flot Charts JavaScript -->
<script src="{{asset('templates/admin/assets/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('templates/admin/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script  src="{{asset('templates/admin/js/flot-data.js')}}"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('templates/admin/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script type="text/javascript" src="{{asset('templates/admin/datatables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
            $('.alert').fadeOut();
        },3000);
    })
    $(document).ready( function () {
        $('#myTable').DataTable({
            stateSave: true
        });
    } );
</script>

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    $(function() {
        $(":file").change(function() {
            $('#files').html('');
            if (this.files && this.files[0]) {
            for (var i = 0; i < this.files.length; i++) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[i]);
            }
            }
        });
        });

    function imageIsLoaded(e) {
    $('#files').append('<div class="col" style="margin-right:10px"> <img width="100%"  src=' + e.target.result + '> </div>');
    };
</script>
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'content', {
        height:'1000px',
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        filebrowserWindowWidth: '1000',
        filebrowserWindowHeight: '700'
    } );
</script>
 @include('ckfinder::setup')
</body>

</html>
