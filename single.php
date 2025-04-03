<?php get_header(); ?>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<main class="article">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <!-- === Naslovna slika === -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="article-thumbnail" 
                 data-aos="fade-up" 
                 data-aos-delay="50"
                 data-aos-duration="600">
                <?php the_post_thumbnail('full', ['class' => 'featured-image']); ?>
            </div>
        <?php endif; ?>

        <section class="article-detail">

            <!-- === Naslov članka === -->
            <h1 class="article-title" 
                data-aos="fade-up"
                data-aos-delay="100"
                data-aos-duration="600">
                <?php the_title(); ?>
            </h1>

            <!-- === Autor === -->
            <p class="article-author" 
               data-aos="fade-up"
               data-aos-delay="150"
               data-aos-duration="600">
               By <?php the_author(); ?>
            </p>

            <!-- === Kategorija (prva) === -->
            <?php
            $categories = get_the_category();
            if (!empty($categories)) : ?>
                <span class="post-tag" 
                      data-aos="fade-up"
                      data-aos-delay="200"
                      data-aos-duration="600">
                    <?php echo esc_html($categories[0]->name); ?>
                </span>
            <?php endif; ?>

            <!-- === Sadržaj članka === -->
            <div class="content">
                <?php 
                // Dodajemo fade-up animaciju svim elementima u sadržaju
                $content = get_the_content();
                
                // Osnovni HTML elementi
                $content = preg_replace('/<p>/', '<p data-aos="fade-up" data-aos-delay="100">', $content);
                $content = preg_replace('/<h2>/', '<h2 data-aos="fade-up" data-aos-delay="100">', $content);
                $content = preg_replace('/<h3>/', '<h3 data-aos="fade-up" data-aos-delay="100">', $content);
                $content = preg_replace('/<h4>/', '<h4 data-aos="fade-up" data-aos-delay="100">', $content);
                
                // Slike - sada isto fade-up umesto zoom-in
                $content = preg_replace('/<img([^>]*)>/', '<img$1 data-aos="fade-up" data-aos-delay="100">', $content);
                
                // Liste
                $content = preg_replace('/<ul>/', '<ul data-aos="fade-up" data-aos-delay="100">', $content);
                $content = preg_replace('/<ol>/', '<ol data-aos="fade-up" data-aos-delay="100">', $content);
                
                // Blockquote
                $content = preg_replace('/<blockquote>/', '<blockquote data-aos="fade-up" data-aos-delay="100">', $content);
                
                // Tabele
                $content = preg_replace('/<table>/', '<table data-aos="fade-up" data-aos-delay="100">', $content);
                
                // WordPress blokovi
                $content = preg_replace('/<div class="wp-block-gallery/', '<div class="wp-block-gallery" data-aos="fade-up" data-aos-delay="100"', $content);
                $content = preg_replace('/<div class="wp-block-embed/', '<div class="wp-block-embed" data-aos="fade-up" data-aos-delay="100"', $content);
                $content = preg_replace('/<div class="wp-block-columns/', '<div class="wp-block-columns" data-aos="fade-up" data-aos-delay="100"', $content);
                
                echo apply_filters('the_content', $content);
                ?>
            </div>

        </section>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ručna inicijalizacija AOS-a
    AOS.init({
        offset: 100,
        delay: 0,
        duration: 600,
        easing: 'ease-out-quad',
        once: false,
        disable: function() {
            return window.innerWidth < 768;
        }
    });
    
    // Osvježavanje AOS-a nakon učitavanja slika
    window.addEventListener('load', function() {
        AOS.refresh();
    });
    
    // Ručno dodavanje atributa za složenije WordPress blokove
    setTimeout(function() {
        document.querySelectorAll('.wp-block-group, .wp-block-cover, .wp-block-media-text').forEach(el => {
            if (!el.hasAttribute('data-aos')) {
                el.setAttribute('data-aos', 'fade-up');
                el.setAttribute('data-aos-delay', '100');
            }
        });
        AOS.refresh();
    }, 500);
});
</script>