<?php get_header(); ?>
<?php get_template_part( 'preloader/preloader' );?>

<article>
<div class="my-3"></div>
<div class="nav-scroller card shadow-sm">
<nav class="nav nav-underline justify-content-center col-auto mx-auto" aria-label="Secondary navigation">
<a class="nav-link text-dark active" aria-current="page" href="#">Sketches</a>
<a class="nav-link text-dark" href="#">Dry-Media</a>  
<a class="nav-link text-dark" href="#">Wet-Media</a>  
<a class="nav-link text-dark" href="#">Mixed-Media</a>
<a class="nav-link text-dark" href="#">Relief Print</a>  
<a class="nav-link text-dark" href="#">Wood</a>
<a class="nav-link text-dark" href="#">Sculptures</a>
<a class="nav-link text-dark" href="#">Pottery</a>
<a class="nav-link text-dark" href="#">Reliefs</a>
<a class="nav-link text-dark" href="#">Murals</a>
<a class="nav-link text-dark" href="#">Body Art</a>
</nav>
</div>



<h1 class="text-center w-100 text-dark py-3">Artwork</h1>
<div class="container-fluid w-100">
    <?php
    $args = array(
        'post_type' => 'artwork', // Assuming 'artwork' is your CPT
        'posts_per_page' => 6,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        'order' => 'ASC', // Ascending order
        'orderby' => 'date' // Order by date
    );

    $query = new WP_Query($args);
    ?>

    <?php if ($query->have_posts()) : ?>
        <div class="row">
            <?php $count = 0; ?>
            <?php while ($query->have_posts()) : $query->the_post(); $count++; ?>

                <div class="col-lg-4 col-md-6 mb-4"> <!-- Each post will take up 4 columns on large screens and 6 on medium screens -->
                    <div class="card h-100">
                        <!-- Image as background -->
                         <a href="<?php echo the_permalink();?>">
                        <div class="card-img-top" style="
                            background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');
                            background-size: cover;
                            background-position: center;
                            width: 100%;
                            height: 300px; /* Fixed square height */
                            ">
                        </div>
                        </a>
                        <div class="card-body text-dark">
                            <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                        <div class="card-footer text-muted">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                $category_names = array_map(function ($cat) {
                                    return $cat->name;
                                }, $categories);
                                echo implode(', ', $category_names);
                            }
                            ?>
                            <br>
                            <small><?php echo get_the_date('m/d/Y'); ?></small>
                        </div>
                    </div>
                </div>

                <?php if ($count % 3 == 0 && $count < 6) : ?>
                    </div><div class="row"> <!-- Close and open a new row after every 3 posts -->
                <?php endif; ?>

            <?php endwhile; ?>
        </div> <!-- End of row -->
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <div class="mx-auto position-relative d-block text-center">
            <span>No Artwork posts found.</span>
        </div>
    <?php endif; ?>
</div>








<!--Pagination-->

<?php
if ($query->have_posts()) : 
// Calculate the total number of pages
$total_pages = $query->max_num_pages;

if ($total_pages > 1) {
$current_page = max(1, get_query_var('paged'));

echo '<nav class="mt-4" aria-label="Page navigation example">';
echo '<ul class="pagination pagination-lg justify-content-center">';

$links = paginate_links(array(
'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
'format' => '?paged=%#%',
'current' => $current_page,
'total' => $total_pages,
'type' => 'array',
'prev_next' => true,
'prev_text' => 'Prev',
'next_text' => 'Next',
));

if (is_array($links)) {
foreach ($links as $link) {
// Check if the link is the current page
if (strpos($link, 'current') !== false) {
echo "<li class='page-item active' aria-current='page'><span class='page-link'>$link</span></li>";
} else {
// Wrap each link in <li> and apply 'page-item' class; also apply 'page-link' class to <a>
echo "<li class='page-item'>" . str_replace('<a', '<a class="page-link"', $link) . "</li>";
}
}
}

echo '</ul>';
echo '</nav>';
}
endif;
?>


</div>
<!-- /content -->





















</article>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php the_content(); ?>
<?php endwhile; endif; ?>


<?php get_sidebar(); ?>

<?php get_footer('artwork'); ?>
