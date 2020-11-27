   $(document).ready(function(){
  var user_id;
  var user_href;
  var user_href_splitted;

  var image_src;
  var image_splitted;
  var image_id;
  var photo_id;



    $(".info-box-header").click(function(){
     $(".inside").slideToggle("slow");

     $("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon");


    });


   	$(".modal_thumbnails").click(function(){

   		$("#set_user_image").prop('disabled', false);

   		user_href = $("#user_id").prop('href');
        user_href_splitted = user_href.split("=");
        user_id = user_href_splitted[user_href_splitted.length -1];

        image_src = $(this).prop('src');
        image_splitted = image_src.split("/");
        image_id = image_splitted[image_splitted.length -1];


        photo_id = $(this).attr('data');


	$.ajax({


		url: "includes/ajax_code.php",
		data: {photo_id: photo_id},
		type: "POST",
		success: function(data){

			if (!data.error) {

               $("#modal_sidebar").html(data);
			}
		}
	});



   		

   	});
$("#set_user_image").click(function(){


	$.ajax({


		url: "includes/ajax_code.php",
		data: {image_id: image_id, user_id:user_id},
		type: "POST",
		success: function(data){

			if (!data.error) {

               $(".user_image_holder a img").prop('src', data);
			}
		}
	});





});


$(".delete_link").click(function(){
  return confirm("are you sure you want to delete this item");



});




   tinymce.init({
      selector: '#mytextarea'
    });	
   });
    