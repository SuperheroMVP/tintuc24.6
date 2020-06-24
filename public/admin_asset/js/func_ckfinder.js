function ckeditor(name)
{
	var editor =CKEDITOR.replace(name, {
         filebrowserBrowseUrl: '/public/admin_asset/ckfinder/ckfinder.html',
         filebrowserImageBrowseUrl: 'public/admin_asset/ckfinder/ckfinder.html?type=Images',
         filebrowserFlashBrowseUrl: '/public/admin_asset/ckfinder/ckfinder.html?type=Flash',
         filebrowserImageUploadUrl: '/public/admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
         filebrowserFlashUploadUrl: '/public/admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
}