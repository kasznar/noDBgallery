var overlayHTML = '<div class="gallery-overlay"><div class="gallery-wrapper"><div class="gallery-container"><img src="" id="big-img"></div><!--gallery-container--></div><!--gallery-wrapper--></div> <!--gallery-overlay-->';

$(document).ready(function(){
	//full screen image view overlay insert
	$("body").append(overlayHTML);

	//insert gallery images
	$( ".nodbgallery" ).each(function() {
  		var this_gallery_folder_name = $(this).attr('id');
  		$.post('gallery-manager/list-gallery-images.php',{
			gallery_folder_name: this_gallery_folder_name
		}, function(data){
			$("#"+this_gallery_folder_name).html(data);
		});
	});

	//show big image when thumb image clicked
	$('body').on('click', 'img.nodbgallery', function() {
		var thumbSrc = $(this).attr('src');
		var thumbSrcStr = thumbSrc.split("thumb-img");
		var bigImgSrc = thumbSrcStr[0]+"web-size-img"+thumbSrcStr[1];
		console.log(bigImgSrc);
    	
    	$("#big-img").attr("src",bigImgSrc);
		$(".gallery-overlay").fadeIn();
		
	});

	//close full screen view
	$('body').on('click', '#big-img', function() {
    	$(".gallery-overlay").fadeOut();
	});
	$('body').on('click', '.gallery-overlay', function() {
    	$(".gallery-overlay").fadeOut();
	});
});/*document ready*/