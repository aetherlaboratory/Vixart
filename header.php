<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Required Core Stylesheet -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/preloader/preloader.css">
<!-- jQuery CDN -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/smoothness_jquery-ui.css">
<script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.min.js"></script>

<script src="<?php bloginfo('template_url'); ?>/preloader/preloader.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&family=Flow+Block&family=Flow+Circular&family=Flow+Rounded&family=Foldit:wght@100;200;300;400;500;600;700;800;900&family=Righteous&family=Rubik+Marker+Hatch&family=Rubik+Vinyl&family=Rubik+Wet+Paint&family=Vampiro+One&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>


<div id="wrapper">
    <div class="search-form d-none position-fixed apex top-0 end-0 me-5 mt-1">
        <form class= "form-control bg-glass-light" action="#">
            <input type="text form-control bg-light">
            <button class="btn btn-sm btn-warning">Search</button>
        </form>
    </div>
<button id="search-btn" class="btn rounded-circle bg-glass-dark
 border border-2 border-warning px-1 py-1 apex position-fixed top-0 end-0 mt-1 me-2">
    <i class="fas fa-search px-1 py-1 text-dark"></i></button>
<?php get_template_part( 'menu' );?>