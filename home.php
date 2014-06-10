<?php 
get_header();
$query = new TEDxQuery();
$sticky_posts = $query->sticky_posts(5);
$unsticky_posts = $query->unsticky_posts();
?>

<?php if(count($sticky_posts) > 0): ?>
<div class="sticky-posts">
  <div class="container">
    <div class="row">

      <?php
        // If there is only one featured (sticky) post
        if(count($sticky_posts) === 1) { require('partials/blog/_single_sticky.php'); }
        // If there are more than one featured (sticky) post
        if(count($sticky_posts) > 1)   { require('partials/blog/_grouped_stickies.php'); }
      ?>

    </div><!-- .row -->
  </div><!-- .container -->
</div><!-- .sticky-posts -->
<?php endif; ?>


<div class="container">
  <div class="row">

    <div class="col-md-8">

      <div class="page-header">
        <h4>Recent</h4>
      </div><!-- .page-header -->

      <?php
        if(count($unsticky_posts) > 0):
          foreach ($unsticky_posts as $index => $post):
            WP_Render::partial('partials/blog/_post_excerpt.php');
          endforeach;
        else:
          WP_Render::partial('partials/_not_found.php', ['message' => 'There does not appear to be any posts here...']);
        endif;
      ?>
    </div><!-- .col-md-8 -->

    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div><!-- .col-md-4 -->

  </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>