$(document).ready(function(){
	$( ".nodbgallery" ).each(function() {
  		var this_gallery_folder_name = $(this).attr('id');
  		$.post('gallery-manager/list-gallery-images.php',{
			gallery_folder_name: this_gallery_folder_name
		}, function(data){
			$("#"+this_gallery_folder_name).html(data);
		});
	});
});/*document ready*/