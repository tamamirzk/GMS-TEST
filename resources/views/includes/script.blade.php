<!-- Bootstrap core JavaScript-->
<script src="{{ url('frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('frontend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('frontend/js/sb-admin-2.min.js') }}"></script>
<script src="{{ url('frontend/js/sb-admin-2.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ url('frontend/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('frontend/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('frontend/js/demo/chart-pie-demo.js') }}"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
    
    $(".deleteImg").click(function(e) {
       
        // alert("Its Works!");
        if(!confirm("Do you really want to do this?")) {
          return false;
        }
        $(this).closest('.productImage').fadeOut(800, function() { $(this).remove(); });

        e.preventDefault();
        var id = $(this).data("id");
        var token = $(this).data("token");
        var url = $(this).data("url");

        $.ajax({
            url: url, //or you can use url: "company/"+id,
            type: 'DELETE',
            dataType: "JSON",
            data: {
                "id": id,
                "_token": token,
        },

        success: function (response){
          $("#success").html(response.message)
              Swal.fire(
                'Remind!',
                'Image deleted successfully!',
                'success'
              );
            }
        });

        return false;
      });

  // var imgRefresh = setInterval(
  //       function(){
  //         $('#imageList').load(window.location.href + "#productImage" ).fadeIn("slow");
  //       }, 100);

  $(document).ready(function() {
      $(".btnsuccess").click(function(){ 
        
        var lsthmtl = '<div class="card">' +
                        '<div id="image-holder"></div>' +
                          '<div class="clone hide">' +
                            '<div id="wrapper" class="hdtuto control-group lst input-group" style="margin-top:10px;">' +
                              '<input id="fileUpload" type="file" name="filenames[]" class="myfrm form-control">' +
                              '<div class="input-group-btn"> ' +
                                '<button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>' +
                              '</div>' +
                            '</div>' +
                          '</div>' +
                      '</div>';
                      
        $(".newincrement").after(lsthmtl);

        $("#fileUpload").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
        
      });
      
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });

      // imageDel();

      // var imgRefresh = setInterval(
      //   function(){
      //     $('#imageList').load('<?php echo url('/image-list');?>').fadeIn("slow");
      //   }, 100);

    });
</script>
