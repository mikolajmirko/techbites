<?php
/*
YARPP Template: TechBites Recommendations
Description: Custom post recomendation template for TechBites.
Author: Mikołaj Mirko
*/
?>

<?php if (have_posts()) : ?>
  <div class="w-full text-center text-sm md:text-base text-gray-600 dark:text-dark py-3 mb-2 mt-6">
    <?php echo __('Related bites', 'tb')  ?>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php while (have_posts()) : the_post(); ?>
        <a href="<?php echo get_permalink(); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" class="bite-card rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-accent">
            <article class="h-full flex flex-col rounded-md">
                <?php if (get_the_post_thumbnail_url()) :
                    $thumbnail_id = get_post_thumbnail_id();
                    $thumbnail = get_post($thumbnail_id);
                    $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                    if(!empty($thumbnail_alt)) {
                        $thumbnail_title = $thumbnail_alt;
                    } elseif(!empty($thumbnail->post_title)) {
                        $thumbnail_title = $thumbnail->post_title;
                    } elseif(!empty($thumbnail->post_excerpt)) {
                        $thumbnail_title = $thumbnail->post_excerpt;
                    } elseif(!empty($thumbnail->post_content)) {
                        $thumbnail_title = $thumbnail->post_content;
                    } else {
                        $thumbnail_title = __('Bite thumbnail', 'tb');
                    }
                ?>
                <div class="post-thumbnail h-40 bg-cover bg-center rounded-md overflow-hidden">
                    <div class="w-full h-full bg-gray-500 bg-cover bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')" title="<?php echo $thumbnail_title; ?>"></div>
                </div>
                <?php endif; ?>
                <h2 class="text-dark flex-grow font-semibold text-xl py-1 px-2 mt-1"><?php echo get_the_title(); ?></h2>
                <div class="post-meta flex flex-row py-1">
                    <span class="text-xs relative text-gray-600 dark:text-dark py-1 px-2 mr-2 flex items-center" title="<?php echo __('Author', 'tb'); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                            <title><?php echo __('Person icon', 'tb'); ?></title>
                        </svg>
                        <?php echo get_the_author(); ?>
                    </span>
                    <time datetime="<?php echo get_post_time('c', true); ?>" class="text-xs relative text-gray-600 dark:text-dark py-1 px-2 mr-3 flex items-center" title="<?php echo __('Date', 'tb'); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>
                            <title><?php echo __('Calendar icon', 'tb'); ?></title>
                        </svg>
                        <?php echo get_the_date(); ?>
                    </time>
                </div>
            </article>
        </a>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

