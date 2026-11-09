<?php
$jquery = web_path_to('javascripts/jquery-1.9.1.min.js');
$jssor = web_path_to('javascripts/jssor.js');
$jssorslider = web_path_to('javascripts/jssor.slider.js');
$arrow = web_path_to('images/a03.png');
?>

<!--<script type="text/javascript" src="<?= $jquery ?>"></script>-->
    <!-- use jssor.slider.mini.js (40KB) instead for release -->
    <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="<?= $jssor ?>"></script>
    <script type="text/javascript" src="<?= $jssorslider ?>"></script>
    <script>
        jQuery(document).ready(function ($) {
            var options = {
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $FillMode: 1,
                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider<?=$index?> = new $JssorSlider$("slider<?=$index?>_container", options);
function ScaleSlider() {
                var bodyWidth = jQuery("#slider<?=$index?>_container").parent().innerWidth();
                if (bodyWidth)
                    jssor_slider<?=$index?>.$ScaleWidth(Math.min(bodyWidth, 1920));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();
        });
	
    </script>
<div id="slider<?=$index?>_container" style="position: relative; top: 0px; left: 0px; width: 600px;
        height: 600px;  margin: 0 auto;">

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 600px;
            overflow: hidden;">

<?php
foreach ($attachments as $attachment):
?>
            <div style="background-color:black;">
                <img u="image" src2="<?= $attachment->getFile()->getWebPath('original');?>" />
		<?php
if($attachment['caption']) {
?>
		<div u="caption" class="caption">
			<?= $attachment['caption'] ?>
		</div>
<?php } ?>
            </div>

<?php       
endforeach;
 ?>
 </div>
        
        <!--#region Arrow Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-jquery.html -->
        <style>
            /* jssor slider arrow navigator skin 03 css */
            /*
            .jssora03l                  (normal)
            .jssora03r                  (normal)
            .jssora03l:hover            (normal mouseover)
            .jssora03r:hover            (normal mouseover)
            .jssora03l.jssora03ldn      (mousedown)
            .jssora03r.jssora03rdn      (mousedown)
            */
            .jssora03l, .jssora03r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 55px;
                height: 55px;
                cursor: pointer;
                background: url(<?= $arrow ?>) no-repeat;
                overflow: hidden;
            }
            .jssora03l { background-position: -3px -33px; }
            .jssora03r { background-position: -63px -33px; }
            .jssora03l:hover { background-position: -123px -33px; }
            .jssora03r:hover { background-position: -183px -33px; }
            .jssora03l.jssora03ldn { background-position: -243px -33px; }
            .jssora03r.jssora03rdn { background-position: -303px -33px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style="top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;">
        </span>
    </div>
<?php echo $text; ?>
