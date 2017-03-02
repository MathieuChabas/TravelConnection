<?php get_header(); ?>

<?php
$post_id = 4;
$queried_post = get_post($post_id);
echo $queried_post->post_content;
?>

<?php get_footer(); ?>