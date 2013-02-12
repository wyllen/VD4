<?php

	date_default_timezone_set("Europe/Paris");

	if( !function_exists( 'theme_pagination' ) ) {
	
	function theme_pagination()
	{
	
	global $wp_query, $wp_rewrite;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	
		$pagination = array(
			'base' => @add_query_arg('page','%#%'),
			'format' => '',
			'total' => $wp_query->max_num_pages,
			'current' => $current,
	                'show_all' => false,
	                'end_size'     => 1,
	                'mid_size'     => 2,
			'type' => 'list',
			'next_text' => '»',
			'prev_text' => '«'
			);
	
		if( $wp_rewrite->using_permalinks() )
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
	
		if( !empty($wp_query->query_vars['s']) )
			$pagination['add_args'] = array( 's' => str_replace( ' ' , '+', get_query_var( 's' ) ) );
		
		echo str_replace('page/1/','', paginate_links( $pagination ) );
	}	
	
}

register_post_type('realisations', array(
		'label'             => 'Réalisations',
		'add_new_item'      =>'Ajouter une réa',
		'edit_item'         =>'Modifier un réa',
		'new_item'          =>'Ajouter un réa',
		'view_item'         =>'Voir la réa',
		'singular_label'    => 'realisations',  
		'public'            => true,
		'show_ui'           => true,
		'capability_type'   => 'post',
		'hierarchical'      => false,
		'has_archive'       => true,
		'rewrite'           => array('slug' => 'realisations'),
		'supports'          => array('title', 'editor','author', 'excerpt', 'thumbnail'),
		'show_in_nav_menus' => true
	)	
	);
	register_taxonomy( "realisations_cat", array( "realisations" ), array("hierarchical" => true, "label" => "Realisations catégories", "singular_label" => "Realisations catégories", "rewrite" => true, "slug" => 'realisations_categories' ) );

register_post_type('skills', array(
		'label'             => 'Skills',
		'add_new_item'      =>'Ajouter un skill',
		'edit_item'         =>'Modifier un skill',
		'new_item'          =>'Ajouter un skill',
		'view_item'         =>'Voir la skill',
		'singular_label'    => 'skill',  
		'public'            => true,
		'show_ui'           => true,
		'capability_type'   => 'post',
		'hierarchical'      => true,
		'has_archive'       => false,
		'rewrite'           => array('slug' => 'skills'),
		'supports'          => array('title','page-attributes'),
		'show_in_nav_menus' => true
	)	
	);
//	register_taxonomy( "skills_cat", array( "skills" ), array("hierarchical" => true, "label" => "skills catégories", "singular_label" => "skills catégories", "rewrite" => true, "slug" => 'skills_categories' ) );

register_post_type('labs', array(
		'label'             => 'Labo',
		'add_new_item'      =>'Ajouter une labs',
		'edit_item'         =>'Modifier un labs',
		'new_item'          =>'Ajouter un labs',
		'view_item'         =>'Voir la labs',
		'singular_label'    => 'labs',  
		'public'            => true,
		'show_ui'           => true,
		'capability_type'   => 'post',
		'hierarchical'      => false,
		'has_archive'       => true,
		'rewrite'           => array('slug' => 'labs'),
		'supports'          => array('title', 'editor','author', 'excerpt', 'thumbnail'),
		'show_in_nav_menus' => true
	)	
	);
	register_taxonomy( "labs_cat", array( "labs" ), array("hierarchical" => true, "label" => "labs catégories", "singular_label" => "labs catégories", "rewrite" => true, "slug" => 'labs_categories' ) );
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// AJOUT METAS BOX
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	

	add_image_size( 'mid', 300);



	add_filter('images_cpt','my_image_cpt');
	function my_image_cpt(){
		$cpts = array('page','labs','realisations');
		return $cpts;
	}
	
	add_filter('list_images','my_list_images');
	function my_list_images(){
		//I only need two pictures
		$picts = array(
			'image1' => '_image1',
		);
		return $picts;
	}
	
	
	
	
	
	
			add_action("admin_init", "admin_init");

	function admin_init(){ //initialisation des champs spécifiques

		add_meta_box("laburl", "LABURL", "laburl", "labs", "normal", "high");
		add_meta_box("skill_level", "SKILL_LEVEL", "skill_level", "skills", "normal", "high");
		
	}

function laburl($post){

	$val = get_post_meta($post->ID,'_laburl',true);

    echo '
<label for="laburl">URL:</label><br>
    <input type="text" style="width:100%;" name="laburl" id="laburl" value="'.$val.'" >
';

}






function skill_level($post){

	$val = get_post_meta($post->ID,'_skill_level',true);

    echo '
<label for="skill_level">Skill:</label><br>
<select id="skill_level" name="skill_level">';
for($i=-1;$i<=10;$i++){
	if($i==$val){
		echo'<option selected="selected" value="'.$i.'" >'.$i.'</option>';
	}else{
		echo'<option value="'.$i.'" />'.$i.'</option>';
	}
}   

echo'</select>';
}




add_action('save_post','save_metaboxes');

function save_metaboxes($post_ID){
	if(isset($_POST['laburl'])){

        update_post_meta($post_ID,'_laburl', esc_html($_POST['laburl']));		

    }
    if(isset($_POST['skill_level'])){

        update_post_meta($post_ID,'_skill_level', esc_html($_POST['skill_level']));		

    }
}