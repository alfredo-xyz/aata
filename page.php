<?php get_header(); ?>

<main role="main" class="main page">
    <!-- section -->
    <section>

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <!-- article -->
        <article id="post-<?php the_ID(); ?>" class="article page">

            <h1 class="main__title"><?php the_title(); ?></h1>

            <div class="article__content">
                <?php the_content(); ?>
            </div>
            <?php edit_post_link(); ?>
        </article>
        <!-- /article -->

    <?php endwhile; ?>

    <?php else: ?>

        <!-- article -->
        <article>

            <h2><?php _e( 'Sorry, nothing to display.', 'aata' ); ?></h2>

        </article>
        <!-- /article -->

    <?php endif; ?>

    </section>
    <!-- /section -->
</main>


<?php get_sidebar(); ?>

<?php get_footer(); ?>

