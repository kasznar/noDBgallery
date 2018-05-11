# Gallery manager
My goal was to create an application, which allowes the user to upload images to galleries and then refer them into ther website whit a simple tag. Also I wanted to achieve this whitout the use of a database for easy install and because a lot of web hosting providers limit the number of avelable databases.

## Install
Copy the gallery-manager folder to your websites root directory. In the head of the page where you want to use it, make sure to include the latest **JQuery libary**, **gallery-inserter.js** to insert the gallery and **nodbgallery.css** to fromat it:
```
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="gallery-manager/gallery-inserter.js"></script>
<link rel="stylesheet" href="gallery-manager/nodbgallery.css">
```

## Usage
After setting up your password in `gallery-manager/login.php`, you can create galleryes and upload images to them. The manager will create thumb images (default: 300x300 px) and bigger "web size" images (default: 1500px width) for faster loading. The script **discards** the full size images, to avoid unnecessary storage use. In your website you can palce a `div` whit `nodbgallery` **class** and `yourgalleryID` as **id** like so:
```
<div class="nodbgallery" id="my_gallery_name"></div>
```
And the manager will automatically insert the images in it.

## Note
PHP limits the file upload size to 2mb by default.

## Future enhancements
Well, a lot
- reasonable UI
- Upload multiple files
- ~~full size image view~~
- support other formats than JPEG
- etc