<?php get_header(); ?>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<main class="listing-page">

    <!-- Hero sekcija s animacijom -->
    <section class="hero">
        <h1 data-aos="fade-up" 
            data-aos-delay="100"
            data-aos-duration="800"
            data-aos-easing="ease-out-back">
            ARCHITECTURE for EVERYONE
        </h1>
    </section>

    <!-- Lista blog postova -->
    <section class="posts">
    <?php if (have_posts()) : ?>
        <?php 
        $delay = 0;
        while (have_posts()) : the_post(); 
            $delay += 50;
        ?>
            <article class="post-card" 
                data-aos="zoom-in" 
                data-aos-delay="<?php echo $delay; ?>"
                data-aos-duration="500"
                data-aos-easing="ease-out-quad">
                
                <!-- Thumbnail -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Naslov -->
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>

                <!-- Autor -->
                <p class="post-author"><?php the_author(); ?></p>

                <!-- Kategorija -->
                <?php $category = get_the_category(); ?>
                <?php if (!empty($category)) : ?>
                    <span class="post-tag"><?php echo esc_html($category[0]->name); ?></span>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e('Nema dostupnih članaka.', 'architecture-for-everyone'); ?></p>
    <?php endif; ?>
</section>

</main>

<?php get_footer(); ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ručna inicijalizacija AOS-a
    AOS.init({
        offset: 120,
        delay: 0,
        duration: 500,
        easing: 'ease-out-quad',
        once: false,
        disable: function() {
            return window.innerWidth < 768;
        }
    });
    
    // Osvježavanje AOS-a
    window.addEventListener('load', AOS.refresh);
    window.addEventListener('resize', AOS.refresh);
});
</script>