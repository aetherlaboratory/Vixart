<?php get_header(); ?>
<?php get_template_part('preloader/preloader'); ?>

<article style="min-height:870px;">
  <div class="container-fluid text-dark">
    <section class="fdb-block team-6">
      <div class="w-100 py-0 my-0">
        <div class="row text-center justify-content-center">
          <div class="col-12">
            <h1 class="text-primary">Videos</h1>
          </div>
        </div>

        <div class="row text-center mt-5 gx-1">
          
          
          
          
          
          <?php
          $args = array(
          'post_type' => 'video', // Assuming 'photos' is your CPT
          'posts_per_page' => 4,
          'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
          'order' => 'ASC', // Ascending order
          'orderby' => 'date' // Order by date
          );
          
          $query = new WP_Query($args);?>
   <?php if ($query->have_posts()) : ?>
   <?php $counter = 0; // Initialize the counter ?>
   <?php while ($query->have_posts()) : $query->the_post(); ?>
   <?php $counter++; // Increment the counter ?>
          

          
          <!-- Video Thumbnail -->
          <div class="col-12 col-md-6 col-lg-3">
            <div class="position-relative">
             
              <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal<?php echo $counter; ?>" data-video-url="
                <?php 
 $meta_data = get_post_meta( get_the_ID(), '_custom_post_options', true );
echo $meta_data['video_url'];
?>">
 <img width="300" height="205" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="Video Thumbnail" class="rounded">
           
              </a>
            </div>

            <h3><strong><?php the_title(); ?></strong></h3>
            <p>
             <?php
                     $categories = get_the_category();
                     if (!empty($categories)) {
                         $category_names = array_map(function ($cat) {
                             return $cat->name;
                         }, $categories);
                         echo esc_html(implode(', ', $category_names));
                     }
                     ?>
                 </p>
                 <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 10)); ?></p>
             </div>

   
   
   
   

   <?php endwhile; ?>
   <?php wp_reset_postdata(); ?>
   <?php else : ?>
   <div class="mx-auto position-relative d-block text-center">
   <span>No Video posts found.</span>
   </div>
   <?php endif; ?>
   
   

   
   
       
          <!-- ... similar setup for other videos -->
        </div>
      </div>
    </section>
  </div>
</article>





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














<?php get_footer(); ?>
