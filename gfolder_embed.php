<?php
/**
 * Plugin Name: Embed a Google Drive Folder w the unique folder ID 
 * Plugin URI: http://bionicteaching.com
 * Description: Allows an embed of the Google Drive Folder via the unique ID. You can also define a list or grid view via the style parameter.
 * Version: 1.1
 * Author: Tom Woodward
 * Author URI: http://bionicteaching.com
 * License: GPL2
 */
 
 /*   2014  PLUGIN_AUTHOR_NAME  (email : bionicteaching@gmail.com)
 
 	This program is free software; you can redistribute it and/or modify
 	it under the terms of the GNU General Public License, version 2, as 
 	published by the Free Software Foundation.
 
 	This program is distributed in the hope that it will be useful,
 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 	GNU General Public License for more details.
 
 	You should have received a copy of the GNU General Public License
 	along with this program; if not, write to the Free Software
 	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
 
//[gdrive id="YourFolderID" style="Grid or List" width="" height=""]
 
function gdrive_shortcode($atts, $content=null) {
    $a = shortcode_atts( array(
         'id' => '',
         'style' => 'list',
         'width' => '100%',
         'height' => '500px',
    ), $atts); 
	return '<iframe src="https://drive.google.com/embeddedfolderview?id=' . $a['id'] . '#' . $a['style'] . '" frameborder="0" width="' . $a['width'] . '" height="' . $a['height'].'" scrolling="auto"> </iframe>';
}
add_shortcode( 'gdrive', 'gdrive_shortcode' );

function add_gfolder_button() {
    echo '<a href="#" id="insert-gdrive-folder" class="button">Embed GDrive Folder</a>';
}

add_action('media_buttons', 'add_gfolder_button', 15);

function include_gdrive_button_js_file() {
    wp_enqueue_script('media_button', plugin_dir_url( __FILE__ ) . 'gdrive_button.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_media', 'include_gdrive_button_js_file');
