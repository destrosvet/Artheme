<?php
/**
 * Theme: Artheme
 * User: Filip Uhlir
 * Date: 17.01.2017
 * Time: 10:36
 */
?>


<div class="col-md-6 hidden-dm service nopadding nomargin" id="service">
    <div class="col-md-6 col-sm-12 nopadding nomargin service-news" id="news">
        <div class="s-news-content">
            <h3><a href="<?php echo esc_url( get_category_link(3905)); ?>" title="Aktuality">Aktuality</a></h3>
            <ul>
            <?php
            $QArgsActual = array( 'category_name' => 'aktuality','posts_per_page' => 6 );
            $ActualQuery = new WP_Query($QArgsActual);
            //query_posts($QArgsActual);
            while ($ActualQuery -> have_posts()) : $ActualQuery->the_post();
                echo '<li>';
                echo '<a href="'.get_permalink().'" title="'.get_the_title(false).'">&#9679; ';
                the_date('d.m.Y','<time>','</time><br />');
                $Actualtitle = get_the_title();
                echo artalk_get_the_excerpt( $post->ID, $num_words = 20, $more = '… ',$allowed_tags = '<a>',200);
                echo '</a></li>';
            endwhile;

            // Reset Query
            wp_reset_query(); ?>
            </ul>
        </div>
    </div>
    <div class="col-md-6 nopadding nomargin hidden-dm hidden-dm service-photoreport" id="photoreport">
        <div class="s-photoreport-content">
            <h3><a href="<?php echo esc_url( get_category_link(3876)); ?>" title="Foto report">Fotoreport</a></h3>
                <?php
                $QArgsActual = array( 'category_name' => 'foto-report','posts_per_page' => 2 );
                query_posts($QArgsActual);
                while ( have_posts() ) : the_post();
                    echo '<div class="photo-article">';
                    echo '<a href="'.get_permalink().'" title="'.get_the_title(false).'">';
                    the_post_thumbnail('thumbnail', ['class' => 'img-responsive responsive--full', 'title' => get_the_title(false)]);
                    $Actualtitle = get_the_title();
                    echo '<h5>'.wp_trim_words( $Actualtitle, $num_words = 6, $more = '… ' ).'</h5>';
                    echo '</a>';
                    echo '</div>';
                endwhile;

                // Reset Query
                wp_reset_query(); ?>
        </div>

    </div>

</div>
