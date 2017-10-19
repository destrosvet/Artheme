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
            $authors = artalk_get_authors('hide_empty=true');
            $authorCount = count($authors);

            $authorPerCol = ($authorCount > 0 ? ceil($authorCount/3):0);
            //var_dump($authorPerCol);
            if ($authorCount > 0) {
                foreach ($authors as $author) :
                    $counter++;
                    if (((($counter ) % $authorPerCol) == 0 && $counter != 1 && $authorCol < 3  )) echo '</div>';
                    if (((($counter ) % $authorPerCol) == 0 || $counter == 1) && $authorCol < 3  ) {
                        $authorCol++;
                        echo '<div class="authors-list-col">';
                    }

                    if ($bio = get_the_author_meta('description', $author->ID)) : ?>
                        <div class="authors-list-single">
                            <?php //var_dump($counter); ?>
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
                echo "<div> <p>Je nám líto, ale žádný autor nebyl nenalezen.</p></div>";
            } ?>

		</div>


<?php get_footer(); ?>