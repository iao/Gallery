<?php 
/**
 *
 * @package  Unity 3D Viewer
 */

class GalleryPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array ('public_head');
    protected $_filters = array('exhibit_layouts' );

    public function hookPublicHead($args)
    {
        queue_js_file('lytebox');
	queue_css_file('lytebox');
    }

    public function filterExhibitLayouts($layouts)
    {
        $layouts['slider'] = array(
            'name' => __('Slider Galler'),
            'description' => __('A slider gallery.')
        );
	$layouts['popup'] = array(
            'name' => __('Thumbnail Popup Galler'),
            'description' => __('A Thumbnail Popup gallery.')
        );
        return $layouts;
    }
}
