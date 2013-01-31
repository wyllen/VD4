<?php

	date_default_timezone_set("Europe/Paris");


function add_nav_menu_items($items) {
    $donate = '<li id="menu-item-137" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-137"><a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=7UJ965EU225TC">Donate</a></li>';
    $items = $items . $donate ;
    return $items;
}
//add_filter( 'wp_nav_menu_items', 'add_nav_menu_items' );

if (!current_user_can('manage_options')) {

add_filter('show_admin_bar', '__return_false');

}


add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

function new_mail_from() {
 return 'contact@one-div.com';
}
function new_mail_from_name() {
 return 'One div';
}


//custom post type pour les pictos

	register_post_type('pictos', array(

		'label'             => 'Pictos',

		'add_new_item'      =>'Ajouter un picto',

		'edit_item'         =>'Modifier un picto',

		'new_item'          =>'Ajouter un picto',

		'view_item'         =>'Voir le picto',

		'singular_label'    => 'pictos',  

		'public'            => true,

		'show_ui'           => true,

		'capability_type'   => 'post',

		'hierarchical'      => false,

		'has_archive'       => true,

		'rewrite'           => array('slug' => 'pictos'),

		'supports'          => array('title', 'editor','comments','custom-fields', 'author', 'excerpt', 'thumbnail'),

		'show_in_nav_menus' => true

	)	

	);

	register_taxonomy( "pictos_categories", array( "pictos" ), array("hierarchical" => true, "label" => "Pictos catégories", "singular_label" => "Pictos catégories", "rewrite" => true, "slug" => 'pictos_categories' ) );

	

function creerFichier($fichierChemin, $fichierNom, $fichierExtension, $fichierContenu, $droit=""){

$fichierCheminComplet = $fichierChemin."/".$fichierNom;

if($fichierExtension!=""){

$fichierCheminComplet = $fichierCheminComplet.".".$fichierExtension;

}

 

// création du fichier sur le serveur

$leFichier = fopen($fichierCheminComplet, "wb");

fwrite($leFichier,$fichierContenu);

fclose($leFichier);

 

// la permission

if($droit==""){

$droit="0777";

}

 



// on vérifie que le fichier a bien été créé

$t_infoCreation['fichierCreer'] = false;

if(file_exists($fichierCheminComplet)==true){

$t_infoCreation['fichierCreer'] = true;

}

 

// on applique les permission au fichier créé

$retour = chmod($fichierCheminComplet,intval($droit,8));

$t_infoCreation['permissionAppliquer'] = $retour;

 

return $t_infoCreation;

}



 function rrmdir($dir) {

   if (is_dir($dir)) {

     $objects = scandir($dir);

     foreach ($objects as $object) {

       if ($object != "." && $object != "..") {

         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);

       }

     }

     reset($objects);

     rmdir($dir);

   }

 }	



function create_zip($files = array(),$destination = '',$overwrite = true) {

  //if the zip file already exists and overwrite is false, return false

  if(file_exists($destination) && !$overwrite) { return false; }

  //vars

  $valid_files = array();

  //if files were passed in...

  if(is_array($files)) {

    //cycle through each file

    foreach($files as $file) {

      //make sure the file exists

      if(file_exists($file)) {

        $valid_files[] = $file;

      }

    }

  }

  //if we have good files...

  if(count($valid_files)) {

    //create the archive

    $zip = new ZipArchive();

    if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {

      return false;

    }

    //add the files

    foreach($valid_files as $file) {

      $zip->addFile($file,$file);

    }

    //debug

    //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;

    

    //close the zip -- done!

    $zip->close();

    

    //check to make sure the file exists

    return file_exists($destination);

  }

  else

  {

    return false;

  }

} 

	



	



	

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// AJOUT METAS BOX

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		add_action("admin_init", "admin_init");

	function admin_init(){ //initialisation des champs spécifiques

		add_meta_box("html", "HTML", "html", "pictos", "normal", "high");

		add_meta_box("css", "CSS", "css", "pictos", "normal", "high");

		add_meta_box("compatibility", "Compatibilité", "compatibility", "pictos", "side", "high");

	}

	

	function html($post){

	$val = get_post_meta($post->ID,'_html_code',true);

    echo '<label for="html_code">Code HTML : </label>';

    echo '<textarea  name="html_code" id="html_code" cols="90" rows="2">'.$val.'</textarea>

	

	';

}


function compatibility($post){

	$chrome = get_post_meta($post->ID,'_chrome_compa',true);
	$firefox = get_post_meta($post->ID,'_firefox_compa',true);
	$safari = get_post_meta($post->ID,'_safari_compa',true);
	$opera = get_post_meta($post->ID,'_opera_compa',true);
	$ie = get_post_meta($post->ID,'_ie_compa',true);


    echo '<label class="chromelogo">Chrome : </label><br>';

    switch($chrome){

		case 0:

		    echo 'Non <input type="radio" name="chrome_compa" value="0" checked="chedked"/><br>';
		    echo 'Oui<input type="radio" name="chrome_compa" value="1"/><br>';
		    echo 'En partie<input type="radio" name="chrome_compa" value="2"/><br>';
		    echo 'Inconnu <input type="radio" name="chrome_compa" value="3"/><br><br>';
		break;
		case 1:

		    echo 'Non <input type="radio" name="chrome_compa" value="0"/><br>';
		    echo 'Oui<input type="radio" name="chrome_compa" value="1" checked="chedked"/><br>';
		    echo 'En partie<input type="radio" name="chrome_compa" value="2"/><br>';
		    echo 'Inconnu <input type="radio" name="chrome_compa" value="3"/><br><br>';
		break;
		case 2:

		    echo 'Non <input type="radio" name="chrome_compa" value="0"/><br>';
		    echo 'Oui<input type="radio" name="chrome_compa" value="1"/><br>';
		    echo 'En partie<input type="radio" name="chrome_compa" value="2" checked="chedked"/><br>';
		    echo 'Inconnu <input type="radio" name="chrome_compa" value="3"/><br><br>';
		break;
		case 3:

		    echo 'Non <input type="radio" name="chrome_compa" value="0"/><br>';
		    echo 'Oui<input type="radio" name="chrome_compa" value="1"/><br>';
		    echo 'En partie<input type="radio" name="chrome_compa" value="2"/><br>';
		    echo 'Inconnu <input type="radio" name="chrome_compa" value="3" checked="chedked"/><br><br>';
		break;

		default:
		  echo 'Non <input type="radio" name="chrome_compa" value="0"/><br>';
		    echo 'Oui<input type="radio" name="chrome_compa" value="1"/><br>';
		    echo 'En partie<input type="radio" name="chrome_compa" value="2"/><br>';
		    echo 'Inconnu <input type="radio" name="chrome_compa" value="3" checked="chedked"/><br><br>';
		break;
	}



      echo '<label class="firefoxlogo">Firefox : </label><br>';
    switch($firefox){

		case 0:

		 echo 'Non <input type="radio" name="firefox_compa" value="0" checked="chedked"/><br>';
    echo 'Oui<input type="radio" name="firefox_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="firefox_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="firefox_compa" value="3"/><br><br>';

		break;


		case 1:
				 echo 'Non <input type="radio" name="firefox_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="firefox_compa" value="1" checked="chedked"/><br>';
    echo 'En partie<input type="radio" name="firefox_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="firefox_compa" value="3"/><br><br>';

		break;


		case 2:
				 echo 'Non <input type="radio" name="firefox_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="firefox_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="firefox_compa" value="2" checked="chedked"/><br>';
    echo 'Inconnu <input type="radio" name="firefox_compa" value="3"/><br><br>';
		   
		break;


		case 3:
				 echo 'Non <input type="radio" name="firefox_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="firefox_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="firefox_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="firefox_compa" value="3" checked="chedked"/><br><br>';
		   
		break;


		default:
				 echo 'Non <input type="radio" name="firefox_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="firefox_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="firefox_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="firefox_compa" value="3" checked="chedked"/><br><br>';
		
		break;
	}


      echo '<label class="safarilogo">Safari : </label><br>';

     switch($safari){

		case 0:
 echo 'Non <input type="radio" name="safari_compa" value="0" checked="chedked"/><br>';
    echo 'Oui<input type="radio" name="safari_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="safari_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="safari_compa" value="3"/><br><br>';

		break;


		case 1:
 echo 'Non <input type="radio" name="safari_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="safari_compa" value="1" checked="chedked"/><br>';
    echo 'En partie<input type="radio" name="safari_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="safari_compa" value="3"/><br><br>';

		break;


		case 2:
 echo 'Non <input type="radio" name="safari_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="safari_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="safari_compa" value="2" checked="chedked"/><br>';
    echo 'Inconnu <input type="radio" name="safari_compa" value="3"/><br><br>';
		   
		break;


		case 3:
 echo 'Non <input type="radio" name="safari_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="safari_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="safari_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="safari_compa" value="3" checked="chedked"/><br><br>';
		   
		break;


		default:
 echo 'Non <input type="radio" name="safari_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="safari_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="safari_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="safari_compa" value="3" checked="chedked"/><br><br>';
		
		break;
	}
   

          echo '<label class="operalogo">Opera : </label><br>';
     switch($opera){

		case 0:
   echo 'Non <input type="radio" name="opera_compa" value="0" checked="chedked"/><br>';
    echo 'Oui<input type="radio" name="opera_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="opera_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="opera_compa" value="3"/><br><br>';

		break;


		case 1:
   echo 'Non <input type="radio" name="opera_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="opera_compa" value="1" checked="chedked"/><br>';
    echo 'En partie<input type="radio" name="opera_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="opera_compa" value="3"/><br><br>';

		break;


		case 2:
   echo 'Non <input type="radio" name="opera_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="opera_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="opera_compa" value="2" checked="chedked"/><br>';
    echo 'Inconnu <input type="radio" name="opera_compa" value="3"/><br><br>';
		   
		break;


		case 3:
   echo 'Non <input type="radio" name="opera_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="opera_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="opera_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="opera_compa" value="3" checked="chedked"/><br><br>';
		   
		break;


		default:
   echo 'Non <input type="radio" name="opera_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="opera_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="opera_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="opera_compa" value="3" checked="chedked"/><br><br>';
		
		break;
	}
  

          echo '<label class="ielogo">IE : </label><br>';
    switch($ie){

		case 0:
    echo 'Non <input type="radio" name="ie_compa" value="0" checked="chedked"/><br>';
    echo 'Oui<input type="radio" name="ie_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="ie_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="ie_compa" value="3"/><br><br>';

		break;


		case 1:
    echo 'Non <input type="radio" name="ie_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="ie_compa" value="1" checked="chedked"/><br>';
    echo 'En partie<input type="radio" name="ie_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="ie_compa" value="3"/><br><br>';

		break;


		case 2:
    echo 'Non <input type="radio" name="ie_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="ie_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="ie_compa" value="2" checked="chedked"/><br>';
    echo 'Inconnu <input type="radio" name="ie_compa" value="3"/><br><br>';
		   
		break;


		case 3:
    echo 'Non <input type="radio" name="ie_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="ie_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="ie_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="ie_compa" value="3" checked="chedked"/><br><br>';
		   
		break;


		default:
		
    echo 'Non <input type="radio" name="ie_compa" value="0"/><br>';
    echo 'Oui<input type="radio" name="ie_compa" value="1"/><br>';
    echo 'En partie<input type="radio" name="ie_compa" value="2"/><br>';
    echo 'Inconnu <input type="radio" name="ie_compa" value="3" checked="chedked"/><br><br>';
		break;
	}
  
}



function css($post){

	$val = get_post_meta($post->ID,'_css_code',true);

    echo '<style type="text/css">#css_code {

float: left;

}

.preview-wrapper {

border-radius: 5px;

box-shadow: inset 0px 0px 17px 1px rgba(0, 0, 0, 0.41);

margin-left: 490px;

margin-top: 66px;

text-align: center;

position: relative;

width: 100px;

height: 80px;

}

.preview-wrapper::before {

content: \'\';

display: inline-block;

height: 100%;

vertical-align: middle;

margin-right: -0.25em;

}

#preview-picto {

display: inline-block;

vertical-align: middle;

}

</style><textarea name="css_code" id="css_code" cols="90" rows="20">'.$val.'</textarea><div class="preview-wrapper">

<div id="preview-picto"></div>

<style type="text/css" id="preview-picto-style"></style>

</div><div style="clear:both"></div>

<script type="text/javascript">

jQuery("#preview-picto").html(jQuery("#html_code").val());

jQuery("#preview-picto-style").html(jQuery("#css_code").val());

</script>



';

}



add_action('save_post','save_metaboxes');

function save_metaboxes($post_ID){

	

	$newDir = realpath(__DIR__ . '/codes') . '/' .$post_ID;	

	 if(isset($_POST['html_code'])){

        update_post_meta($post_ID,'_html_code', esc_html($_POST['html_code']));		

		if(!file_exists($newDir)){

			mkdir($newDir);

		}	

		$htmlcode=str_replace('\"', '"', $_POST['html_code']);
		$htmlcode=str_replace("\'", "'", $htmlcode);
		creerFichier($newDir,'html_code','html',$htmlcode,0777);	

			$html_file=$newDir.'/html_code.html';

    }

	

	if(isset($_POST['css_code'])){

        update_post_meta($post_ID,'_css_code', esc_html($_POST['css_code']));

		if(!file_exists($newdir)){

			mkdir($newdir,0777);

		}

		$csscode=str_replace('\"', '"', $_POST['css_code']);
		$csscode=str_replace("\'", "'", $csscode);
		creerFichier($newDir,'css_code','css',$csscode ,0777);

		$css_file=$newDir.'/css_code.css';

    }

	

	if(isset($_POST['html_code'])&& isset($_POST['css_code'])){

		$zip = new ZipArchive();

		$filename = $newDir."/".$post_ID.".zip";



	if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {

		die("Impossible d'ouvrir <$filename>\n");

	}else{

	//die('ok'.$filename);

	  $zip->addFile($html_file, 'index.html');

	    $zip->addFile($css_file, 'style.css');

		$zip->close();

	}

		

	

	}

	if(isset($_POST['chrome_compa'])){

        update_post_meta($post_ID,'_chrome_compa', $_POST['chrome_compa']);

    }

	if(isset($_POST['firefox_compa'])){

        update_post_meta($post_ID,'_firefox_compa', $_POST['firefox_compa']);

    }
    	if(isset($_POST['safari_compa'])){

        update_post_meta($post_ID,'_safari_compa', $_POST['safari_compa']);

    }
    	if(isset($_POST['opera_compa'])){

        update_post_meta($post_ID,'_opera_compa', $_POST['opera_compa']);

    }

    if(isset($_POST['ie_compa'])){

        update_post_meta($post_ID,'_ie_compa', $_POST['ie_compa']);

    }



}



    register_sidebar(array(

        'before_widget' => '',

        'after_widget' => '',

        'before_title' => '<div class="title">',

        'after_title' => '</div>',

    ));



register_nav_menu( 'sidebar-menu', 'Sidebar' );



add_action('before_delete_post','delete_folder');

function delete_folder($post_ID){

$newDir = realpath(__DIR__ . '/codes') . '/' .$post_ID;

	rrmdir ($newDir);

}





add_filter('rewrite_rules_array', 'add_rewrite_rules');

function add_rewrite_rules($aRules){   

       $aNewRules = array('^popular$' => 'index.php?post_type=pictos&popular=1');

       $aRules = $aNewRules +  $aRules;

       return $aRules;

}

add_filter('query_vars', 'addnew_query_vars', 10, 1 );

function addnew_query_vars($vars){   

   $vars[] = 'popular';

   return $vars;

}



function order_popular( $query ) {

    if ( $query->is_post_type_archive('pictos') && $query->is_main_query() && $query->query_vars['popular'] ) {



         $query->set( 'meta_key' , 'ratings_score' );

		 $query->set( 'orderby' , 'meta_value_num' );

		  $query->set( 'order' , 'DESC' );

		  $query->set( 'posts_per_page' , -1 );

		

    }

}

add_action( 'pre_get_posts', 'order_popular' );



function wp_title_tag_cloud_filter($return, $tags) { 

$i=0;

				foreach ( $tags as $key => $tag ) {					

		

			$args = array(

			'posts_per_page'=>1,

				'post_type'=> 'pictos',

				'pictos_categories' => $tag->name,

				'meta_key' , 'ratings_score',

				'orderby' , 'meta_value_num',

				'order' , 'DESC'

			);

			$query = new WP_Query( $args );		

			

			if($query->have_posts()) : while($query->have_posts()) : $query->the_post();	 

			

			?>

			<div class="one_div_item <?php $i++;if($i%5== 0){echo 'endline';}?> categories">				

				<div class="picto">

					<div class="picto_wrapper">		

<a href="<?php echo $tag->link; ?>">					

						<?php

							$html= get_post_meta($query->post->ID,'_html_code',true);		

							$html= htmlspecialchars_decode($html)	;		

							$html_copy=$html;

							$html = preg_replace('/([class|id])=["|\']([a-zA-Z0-9_]*)["|\']/','${1}="${2}'.$query->post->ID.'"', $html);

						echo $html;  ?>

						<style type="text/css">	

						<?php $css= get_post_meta($query->post->ID,'_css_code',true); 

								$css= str_replace("&#039;", "'", $css);

								$css= str_replace("&quot;", "\"", $css);

								$css_copy=$css;

							   $css = preg_replace('/([#.])([_a-zA-Z0-9]*)([^"em";]*[{|::])/','$1${2}'.$query->post->ID.'${3}', $css);

								echo $css;

								?>

						</style>	

</a>						

					</div>

				</div>

			<a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>

			

				</div><?php

				

				

			endwhile;

			endif;

			

			}

			?>

			<div class="clear"></div>

			<?php

}

add_filter('wp_generate_tag_cloud',

  'wp_title_tag_cloud_filter', 1, 20);



function deregister_jquery_base(){

  wp_deregister_script( 'jquery' );

// wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js');

wp_register_script( 'jquery', 'http://one-div.com/wp-content/themes/one-div/js/jquery.min.js');



 wp_enqueue_script( 'jquery' );

}

add_action('wp_enqueue_scripts','deregister_jquery_base');