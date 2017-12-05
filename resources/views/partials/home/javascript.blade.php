
<!--Jquery Library-->
<!--script src="{{ asset('js/jquery.js') }}"></script-->

<!--Swiper JavaScript-->

<!-- Mainly scripts -->
<script src="{{ asset('assets/theme-new/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/inspinia.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/staps/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/footable/footable.all.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/chartJs/Chart.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/demo/peity-demo.js') }}"></script>
<script src="{{ asset('assets/Parsley.js-2.8.0/dist/parsley.js') }}"></script>
<script src="{{ asset('assets/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/plugins/cropper/cropper.min.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/bootstrap-tooltip.js') }}"></script>
<script src="{{ asset('assets/theme-new/js/ajaxscript.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$('#myTable').DataTable( {
		"dom": '<"top"lf>rt<"bottom"ip><"clear">',
		language: {
			searchPlaceholder: "",
			"paginate": {
				"previous": '<i class="fa fa-chevron-left"></i>',
				"next": '<i class="fa fa-chevron-right"></i>'
			},
			sSearch: "Search"
		}
	} );
</script>
<script type="text/javascript">
	$('#myTable2').DataTable( {
		"dom": '<"top"lf>rt<"bottom"ip><"clear">',
		language: {
			searchPlaceholder: "",
			"paginate": {
				"previous": '<i class="fa fa-chevron-left"></i>',
				"next": '<i class="fa fa-chevron-right"></i>'
			},
			sSearch: "Search"
		}
	} );
</script>
<script>
$(document).ready(function(){
  $(document).on('click','.pagination a', function(e){
    e.preventDefault();
    var page = $(this).attr('href').split("page=")[1];
    getAllTemplates(page);
  });
  function getAllTemplates(id){
    $.ajax(
    {
      url: "create_videos/page?page="+id,
      type: 'get',
      dataType: "html",
      success: function (data)
      {
        $('.new-table-content').html(data);
        $("#videotemplateModal").on('hidden.bs.modal', function (e) {
            $("#videotemplateModal iframe").attr("src", "");
        });
        $('.preview-video-template').click(function(){
          var url = $(this).attr('video-url');
          var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
          if(videoid[1]){
           var inject_contents = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+videoid[1]+'?autoplay=1" frameborder="0" allowfullscreen></iframe></div>';
            $('#videotemplateModal .modal-body').html(inject_contents);
            $("#videotemplateModal").modal('show'); 
          }
        });
        $('div.choose-template').click(function(){
          var choosedtemplate = $(this).attr('template-type');
          var choosedtemplateurl = $(this).attr('template-url');
          $('.template-selected').remove();
          $(this).parent().append('<span class="template-selected">Selected</span>');
          $('#choosed_template').val(choosedtemplate);
          $('#choosed_template_url').val(choosedtemplateurl);
        });
      }
    });
  }
  $("#wizard").steps({
    enableCancelButton: false,
    enableFinishButton: false,   
    onStepChanging: function (event, currentIndex, newIndex) {
      console.log(currentIndex+'   '+newIndex);
      if(currentIndex==0 && !$('#projecttitle').val()){
        $('#projecttitle').focus();
        return false;
      }else if(newIndex==2){
        if(!$("#choosed_template").val()){
          alert("Please Choose Template Video!");
          return false;
        }else{
          var choosedtemplateurl = $('#choosed_template_url').val();
          var videoid = choosedtemplateurl.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
          if(videoid[1]){
            $("#create_video_previewbox").append("<iframe id='youtubepreview' src='https://www.youtube.com/embed/"+videoid[1]+"?controls=0&showinfo=0&rel=0&autoplay=1' frameborder='0' allowfullscreen></iframe>");  
          }
          return true;  
        }
      }else if(currentIndex==2){
        $('#youtubepreview').remove();
        return true;  
      }else{
        return true;
      }
    },
  });
  $("#videotemplateModal").on('hidden.bs.modal', function (e) {
      $("#videotemplateModal iframe").attr("src", "");
  });
  $('.preview-video-template').click(function(){
    var url = $(this).attr('video-url');
    var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
    if(videoid[1]){
     var inject_contents = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+videoid[1]+'?autoplay=1&controls=0&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe></div>';
      $('#videotemplateModal .modal-body').html(inject_contents);
      $("#videotemplateModal").modal('show'); 
    }
  });
  $('div.choose-template').click(function(){
    var choosedtemplate = $(this).attr('template-type');
    var choosedtemplateurl = $(this).attr('template-url');
    $('.template-selected').remove();
    $(this).parent().append('<span class="template-selected">Selected</span>');
    $('#choosed_template').val(choosedtemplate);
    $('#choosed_template_url').val(choosedtemplateurl);
  });
  $("#gotemplatesearch").click(function(){
    if(!$("#template_search_keyword").val()){
      $("#template_search_keyword").focus();
      return false;
    }
    var searchkey = $("#template_search_keyword").val(); 
    var sort = $("#sorttemplate").val();
    $.ajax({
      url: "create_videos/sort/"+sort+"/search/"+searchkey,
      type: 'post',
      dataType: "html",
      success: function (data)
      {
        $('.new-table-content').html(data);
        $("#videotemplateModal").on('hidden.bs.modal', function (e) {
            $("#videotemplateModal iframe").attr("src", "");
        });
        $('.preview-video-template').click(function(){
          var url = $(this).attr('video-url');
          var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
          if(videoid[1]){
           var inject_contents = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+videoid[1]+'?autoplay=1&controls=0&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe></div>';
            $('#videotemplateModal .modal-body').html(inject_contents);
            $("#videotemplateModal").modal('show'); 
          }
        });
        $('div.choose-template').click(function(){
          var choosedtemplate = $(this).attr('template-type');
          var choosedtemplateurl = $(this).attr('template-url');
          $('.template-selected').remove();
          $(this).parent().append('<span class="template-selected">Selected</span>');
          $('#choosed_template').val(choosedtemplate);
          $('#choosed_template_url').val(choosedtemplateurl);
        });
      }
    });
  });
});
</script>
<!-- iCheck -->

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

<!-- Image cropper -->


<script>
$(document).ready(function(){
    /*$('.file-box').each(function() {
        animationHover(this, 'pulse');
    });*/

    // Image upload
    var $image = $(".image-crop > img")
    $($image).cropper({
        aspectRatio: 1.618,
        preview: ".img-preview",
        done: function(data) {
            // Output the result data for cropping image.
        }
    });

    var $inputImage = $("#inputImage");
    if (window.FileReader) {
        $inputImage.change(function() {
            var fileReader = new FileReader(),
                    files = this.files,
                    file;

            if (!files.length) {
                return;
            }

            file = files[0];

            if (/^image\/\w+$/.test(file.type)) {
                fileReader.readAsDataURL(file);
                fileReader.onload = function () {
                    $inputImage.val("");
                    $image.cropper("reset", true).cropper("replace", this.result);
                };
            } else {
                showMessage("Please choose an image file.");
            }
        });
    } else {
        $inputImage.addClass("hide");
    }        

    // Step 3 selection
    $('.btn-create_video-step-3-selection').click (function(event){
      event.preventDefault();
      $('.create_video-step3-1').hide();
      if($("input[name='rd-step3']:checked").val() == "step3-1")
        $('.create_video-step3-2').fadeIn();
      else
        $('.create_video-step3-2').fadeIn();
    });
});
</script>