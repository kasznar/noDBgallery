function listGalleries() {
	$.get("list-galleries.php", function(data, status){
    	$(".gallery-list-container").html(data);
    }); //list galleries from galleries folder
}

function listGalleryImages(this_gallery_folder_name){
	$.post('list-gallery-images.php',{
		gallery_folder_name: this_gallery_folder_name
	}, function(data){
		$(".gallery-images."+this_gallery_folder_name).html(data);
	});
}

function ajaxUploadHandler(gallery_id){

	var form = document.getElementById('form__'+gallery_id);
	var fileSelect = document.getElementById('file__'+gallery_id);
	var uploadButton = document.getElementById('button__'+gallery_id);

	form.onsubmit = function(event) {
  		event.preventDefault();
  		// Get the selected files from the input.
		var files = fileSelect.files;
		var file = files[0];
		// Create a new FormData object.
		var formData = new FormData();
		formData.append('fileToUpload', file, file.name);
		formData.append('galleryID', gallery_id);
		var xhr = new XMLHttpRequest();
		xhr.onload = function () {
  			if (xhr.status === 200) {
   			 // File(s) uploaded.
   			 console.log('uploaded');
   			 listGalleryImages(gallery_id);
  			} else {
   			 console.log('something went wrong whit the upload :(');
  			}
		};
		xhr.open('POST', 'upload.php', true);
		xhr.send(formData);
		listGalleryImages(gallery_id);
	}
}

function deleteGallery(this_gallery_to_delete){
	$.post('delete-gallery.php',{
		gallery_to_delete: this_gallery_to_delete
	}, function(data){
		console.log(data);
	});
}

function removeDeletedGallery(this_gallery_to_remove){
	$(".gallery-wrapper."+this_gallery_to_remove).hide();
}

$(document).ready(function(){
	listGalleries();

	$(".gallery-list-container").on("click", ".galleries" , function(){
        var this_gallery_id = $(this).attr('id'); 
        var galleryTxt = '<form action="upload.php" id="form__'+this_gallery_id+'" method="post" enctype="multipart/form-data">Select image to upload:<input type="file" name="fileToUpload" id="file__'+this_gallery_id+'"><input type="submit" id="button__'+this_gallery_id+'" value="Upload Image" name="submit"><input type="hidden" name="galleryID" value="'+this_gallery_id+'"></form>';
        $(".gallery-controls."+this_gallery_id).html(galleryTxt);
        listGalleryImages(this_gallery_id);
        $(".gallery-container."+this_gallery_id).slideToggle(); //the slide down has the ID as a CLASS
        ajaxUploadHandler(this_gallery_id);
        $('.delete-button').click(function(){
    		var toDelete = $(this).attr('id').substring(8);
    		deleteGallery(toDelete);
    		removeDeletedGallery(toDelete);
    	});
    }); //click on gallery

    $('#newGalleryButton').click(function(){
    	var new_gallery_name = $("#newGalleryName").val();

    	$.post('add_new_gallery.php',{
			posted_gallery_name: new_gallery_name 
		}, function(data){
			listGalleries();
		});
    }); /*new gallery button clicked*/

});/*document ready*/



