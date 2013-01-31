=== Multi Image Metabox ===
Contributors: willybahuaud
Tags: images, metabox, multiple
Requires at least: 3.0
Tested up to: 3.5
Stable tag: 3.5
License: GPLv2 or later

Add a multi-image metabox to your posts, pages and custom post types

== Description ==

This plugin add a metabox which allox to upload and link multiple images to one post.
Pictures are linked by the way of meta_value (and attachments ID). They can be reordered using drag and drop.

Number of allowed pictures and concerned post types can be overited using hooks.

Plugin includes many functions to retrieve linked pictures.
For more information on using the plugin, refer to the section ["Other Notes"](/extend/plugins/multi-image-metabox/other_notes/).

== Installation ==

1. Upload the Multi Image Metabox plugin to your blog and Activate it.

2. Customize (into the functions.php file of your theme):

* If you want to target other post type than PAGE, use the filter hook "images_cpt" 
* If you want to change the number of image, use the filter hook "list_images" 

3. Retrieve the linked images in your theme using the functions :

* Use get_images_ids() into the loop to get an array of attachment's ID
* Use get_images_src('size') into the loop to get an array of attachment's URI & dimensions for  the quiered size 
* Use get_multi_images_src('size1','size2') into the loop to get an array of attachment's URI & dimensions for 2 differents size

4. Enjoy ^^ (report to developper section to view the returned datas)

== Changelog ==

= 1.3 =
* Add an integer argument **id** for all procedurals functions to target a specific post
* Solve a bug into the get_multi_images_src() function

= 1.2 =
* Add an boolean argument **thumbnail** for all procedurals functions to join image post thumbnail (ID, images) at the front of the returned arrays

= 1.1 =
* Change the hook for initializing the plugin. By this way we can now assign different numbers of picts, depending to the post type.
* Debug the default sizes of get_multi_image_src()

= 1.0 =
* First version, with some hooks and functions

== Plugin's functions ==

= Plugin's hooks =

**Set concerned post types**

Paste this into your theme's functions.php file :
`<?php
	add_filter('images_cpt','my_image_cpt');
	function my_image_cpt(){
		$cpts = array('page','my_custom_post_type');
		return $cpts;
	}
?>`

**Set allowed number of picts**

Paste this into your theme's functions.php file :
`<?php
	add_filter('list_images','my_list_images');
	function my_list_images(){
		//I only need two pictures
		$picts = array(
			'image1' => '_image1',
			'image2' => '_image2',
		);
		return $picts;
	}
?>`

**Set allowed number of picts, depending to the post_type**

Paste this into your theme's functions.php file :
`add_filter('list_images','my_list_images');
function my_list_images(){
	global $typenow;
    if($typenow == "my_custom_post_type")
	    $picts = array(
	        'image1' => '_image1',
	        'image2' => '_image2',
	        'image3' => '_image3',
	    );
	else
		$picts = array(
	        'image1' => '_image1',
	        'image2' => '_image2',
	        'image3' => '_image3',
	        'image4' => '_image4',
	        'image5' => '_image5',
	        'image6' => '_image6',
	        'image7' => '_image7',
	        'image8' => '_image8',
	    );
    return $picts;
}`

= Plugin's outputs =

**get_images_ids()**

`<?php 
get_images_ids(true,id); //2 accepted parameter : thumbnail (BOOLEAN), and id (to target a specific post)
// if thumbnail = true, join the id of the post thumbnail at the front of the returned array

//An exemple of output
array(
	[0]	 => 45,
	'image1' => 5,
	'image2' => 6,
	'image3' => 12,
	'image6' => 20,
	'image7' => 15
);

//Empty pictures ar not returned

?>`

**get_images_src()**

`<?php 
get_images_src('medium',false,id); //3 accepted parameter : the size (STRING) & thumbnail (BOOLEAN) & id (integer)

//An exemple of output
array(
	'image1' => array(
		[0] => 'http://url_of_the_medium_pict.jpg',
		[1] => 340,
		[2] => 200,
		[3] => false //I've no idea what is it...
	),
	'image2' => array(
		[0] => 'http://url_of_the_medium_second_pict.jpg',
		[1] => 340,
		[2] => 200,
		[3] => false //I've no idea what is it...
	)
);

?>`

**get_multi_images_src()**

`<?php 
get_multi_images_src('medium','full',false,id); //4 accepted parameters : the 1st size (STRING) & the 2nd size (STRING) & thumbnail (BOOLEAN) & id (integer)

//An exemple of output
array(
	'image1' => array(
		[0] => array(
			[0] => 'http://url_of_the_medium_pict.jpg',
			[1] => 340,
			[2] => 200,
			[3] => false //I've no idea what is it...
		),
		[1] => array(
			[0] => 'http://url_of_the_full_pict.jpg',
			[1] => 1020,
			[2] => 600,
			[3] => false //I've no idea what is it...
		),
	),
	'image2' => array(
		[0] => array(
			[0] => 'http://url_of_the_medium_second_pict.jpg',
			[1] => 340,
			[2] => 200,
			[3] => false //I've no idea what is it...
		),
		[1] => array(
			[0] => 'http://url_of_the_second_full_pict.jpg',
			[1] => 1020,
			[2] => 600,
			[3] => false //I've no idea what is it...
		)
	)
);
//Empty pictures ar not returned

?>`

== Screenshots ==

1. The metabox look like that !