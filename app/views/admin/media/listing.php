<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Codeigniter Video Upload</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/imagepicker/image-picker/image-picker.css">
		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/css/base/jquery-ui.css">
		
		<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/imagepicker/image-picker/image-picker.min.js" type="text/javascript"></script>
		
    </head>
    <body>
        <div id="container">
            <h1>CodeIgniter Video Upload</h1>
 			
			<div id="picker">
                <p>Video Listing</p>

				<select class="image-picker hidden " style="display: none">
				<?php
					foreach($image as $img)
					{
						echo '<option data-img-src="../' . $img->video_path . '/' . $img->video_name.'" value="'.$img->video_name.'">'.$img->video_name.'</option>';
					}				
				?>
				</select>
			</div>
        </div>
    </body>
</html>	
<script>
$(document).ready(function () {
    $(".image-picker").imagepicker({
        hide_select: false
    });

    var $container = $('.image_picker_selector');
    // initialize
    $container.imagesLoaded(function () {
        $container.masonry({
            columnWidth: 30,
            itemSelector: '.thumbnail'
        });
    });
});
</script>