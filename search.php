<?php get_header(); ?>

  <main role="main" class="main">
      <!-- section -->
    <section>

      <h1 class="main__title main__title--margin">
      <?php 
      	echo $wp_query->found_posts;
      	echo ' resultados para ';
      	echo get_search_query(); 
      ?>		
      </h1>

      <?php get_template_part('loop'); ?>

      <?php get_template_part('pagination'); ?>

    </section>
    <!-- /section -->
  </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
