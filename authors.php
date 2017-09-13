<?php
/**
 * Template Name: Seznam autoru
 * @package WordPress
 * @subpackage Artheme
 * @since Artalk 2017 0.9.2
*/

$avatar_size = 100;

get_header();

?>
<div class="row authors-letter-line">
    <?php author_letter_line();?>
</div>

		<div class="authors-list-row row">

			<?php

            $counter = 0;
            $authorCol = 0;
            $authorCount = count(artalk_get_authors());
            //var_dump(count(artalk_get_authors()));
            $authorPerCol = ($authorCount > 1 ? floor($authorCount/3):0);
//            var_dump($authorCount);
//            var_dump($authorPerCol);

            if ($authorCount > 1) {
                foreach (artalk_get_authors() as $author) :
                    $counter++;
                    if (((($counter ) % $authorPerCol) == 0 && $counter != 1 && $authorCol < 3  )) echo '</div>';
                    if (((($counter ) % $authorPerCol) == 0 || $counter == 1) && $authorCol < 3  ) {
                        $authorCol++;
                        echo '<div class="authors-list-col">';
                    }


                    if ($bio = get_the_author_meta('description', $author->ID)) : ?>
                        <div class="authors-list-single">
                            <div class="authors-list-single-text">
                                <h1><a href="<?php echo esc_url(get_author_posts_url($author->ID)); ?>"><?php esc_html_e($author->data->display_name); ?></a></h1>
                                <div class="content bio">
                                    <?php echo artalk_awatar($author->ID); ?>
                                    <?php echo esc_html($bio); ?>
                                </div>
                                <!--                            --><?php
                                /*                            $user_posts = get_author_posts_url(  $author->ID);
                                                            echo '<a class="widget_single" href="'. $user_posts .'">Další články autora</a>'; */ ?>
                            </div>
                        </div>


                    <?php endif; ?>
                    <?php //if ((($counter-1) % $authorPerCol) == 0 && $counter != 1 && $counter != $authorCount ) echo '</div><!--/column-->'; ?>
                <?php endforeach;
            }
            else {
                echo "<p>Je nám líto, ale žádný autor nebyl nenalezen.</p>";
            } ?>

		</div>


	<?php /*get_template_part('templates/sidebar', 'authors'); */?>


<?php get_footer(); ?>