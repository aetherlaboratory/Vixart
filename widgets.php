<?php
function mytheme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar - Section 1', 'mytheme' ),
        'id'            => 'footer-sidebar-section-1',
        'description'   => __( 'Widgets in this area will be displayed in the first section of the footer sidebar.', 'mytheme' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Sidebar - Section 2', 'mytheme' ),
        'id'            => 'footer-sidebar-section-2',
        'description'   => __( 'Widgets in this area will be displayed in the second section of the footer sidebar.', 'mytheme' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    // Repeat this code for each section of the footer sidebar that you want to create.
}
add_action( 'widgets_init', 'mytheme_widgets_init' );
?>