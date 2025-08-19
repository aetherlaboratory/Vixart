<!doctype html>

<div class="container my-5">
  <div class="row">
  <div class="col-md-8">

<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
  'post_type' => 'product',
  'paged' => $paged
);
$query = new WP_Query( $args );
?>

<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>


  
  <h2><?php the_title(); ?></h2>
  <?php the_content(); ?>
   
  <br>
  
  <div class="row">
    <div class="col-auto">
      <button class="btn btn-primary like-btn" data-post-id="<?php the_ID(); ?>" data-nonce="<?php echo wp_create_nonce('mothership_like_dislike'); ?>">
        Like <span class="like-count"><?php echo get_post_meta(get_the_ID(), '_mothership_like_count', true); ?></span>
      </button>
    </div>
    <div class="col-auto">
      <button class="btn btn-danger dislike-btn" data-post-id="<?php the_ID(); ?>" data-nonce="<?php echo wp_create_nonce('mothership_like_dislike'); ?>">
        Dislike <span class="dislike-count"><?php echo get_post_meta(get_the_ID(), '_mothership_dislike_count', true); ?></span>
      </button>
    </div>
  </div>

  <div class="clearfix"></div>
  <br>

<?php endwhile; ?>

<div class="pagination">
  <?php echo paginate_links( array(
    'total' => $query->max_num_pages,
    'prev_text' => __('« Prev'),
    'next_text' => __('Next »'),
  )); ?>
</div>

<?php endif; wp_reset_postdata(); ?>

</div>

    </div><!-- /.col-md-8 -->

    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div><!-- /.col-md-4 -->
  </div><!-- /.row -->
</div><!-- /.container -->
<?php
