<?php
$showcasePosition = isset($options['showcase-position'])
    ? html_escape($options['showcase-position'])
    : 'none';
$showcaseFile = $showcasePosition !== 'none' && !empty($attachments);
$galleryPosition = isset($options['gallery-position'])
    ? html_escape($options['gallery-position'])
    : 'left';
$galleryFileSize = isset($options['gallery-file-size'])
    ? html_escape($options['gallery-file-size'])
    : 'square_thumbnail';
$captionPosition = isset($options['captions-position'])
    ? html_escape($options['captions-position'])
    : 'center';
?>

<?php
foreach ($attachments as $attachment):
?>
<div class="popup-thumbnail">
<a href="<?= $attachment->getFile()->getWebPath('original');?>" class="lytebox" data-description="<?= htmlspecialchars($attachment['caption']) ?>" data-lyte-options="group:popup_<?=$index?>">
	<img src="<?= $attachment->getFile()->getWebPath('square_thumbnail');?>" />
</a>
</div>
<?php
if($attachment['caption']) {
?>
		<!--<div u="caption" style=" position:absolute; bottom:0; left:0;">
			<?= $attachment['caption'] ?>
		</div>-->
<?php } ?>

<?php       
endforeach;
 ?>
<?php echo $text; ?>