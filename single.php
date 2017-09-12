<?php get_header();   ?>
    <div class="row">
        <article>
            <div class="col-lg-8 col-md-8  col-sm-8 col-xs-12 no-margin no-padding-sm single-content">

				<?php if (have_posts()) : while (have_posts()) : the_post();?>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 padding-left-sm-10 nopadding-i"><h1><?php the_title(); ?></h1>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 padding-right-md-20 padding-right-lg-45">
                    <div class="social-icon">
                        <a href='https://plus.google.com/share?url=' >
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0ZWQgYnkgSWNvTW9vbi5pbyAtLT4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHdpZHRoPSIyNHB4IiBoZWlnaHQ9IjI0cHgiIHZpZXdCb3g9IjAgMCAxNiAxNiI+CjxwYXRoIGZpbGw9IiNkMGQwZDAiIGQ9Ik01IDMuNGMtMC44IDAtMS4zIDAuOC0xLjIgMS44IDAuMSAxLjEgMC45IDEuOSAxLjcgMiAwLjggMCAxLjMtMC44IDEuMi0xLjktMC4xLTEtMC45LTEuOS0xLjctMS45eiIvPgo8cGF0aCBmaWxsPSIjZDBkMGQwIiBkPSJNNS40IDkuM2MtMS4yIDAtMi4zIDAuNy0yLjMgMS42czAuOSAxLjcgMi4xIDEuN2MxLjcgMCAyLjMtMC43IDIuMy0xLjYgMC0wLjEgMC0wLjIgMC0wLjMtMC4xLTAuNS0wLjYtMC44LTEuMy0xLjItMC4yLTAuMi0wLjUtMC4yLTAuOC0wLjJ6Ii8+CjxwYXRoIGZpbGw9IiNkMGQwZDAiIGQ9Ik0wIDB2MTZoMTZ2LTE2aC0xNnpNNy45IDUuM2MwIDAuNy0wLjQgMS4yLTAuOSAxLjZzLTAuNiAwLjYtMC42IDAuOWMwIDAuMyAwLjUgMC44IDAuOCAxIDAuOCAwLjYgMS4xIDEuMSAxLjEgMiAwIDEuMS0xLjEgMi4zLTMuMSAyLjMtMS43IDAtMy4yLTAuNy0zLjItMS44IDAtMS4yIDEuMy0yLjMgMy4xLTIuMyAwLjIgMCAwLjQgMCAwLjUgMC0wLjItMC4zLTAuNC0wLjYtMC40LTAuOSAwLTAuMiAwLjEtMC40IDAuMi0wLjYtMC4xIDAtMC4yIDAtMC4zIDAtMS40IDAtMi40LTEtMi40LTIuMyAwLTEuMiAxLjMtMi4zIDIuNy0yLjMgMC44IDAgMy4xIDAgMy4xIDBsLTAuNyAwLjZoLTFjMC43IDAuMiAxLjEgMSAxLjEgMS44ek0xNCA1LjVoLTIuMXYyaC0wLjV2LTJoLTJ2LTAuNWgydi0yaDAuNXYyaDIuMXYwLjV6Ii8+Cjwvc3ZnPgo=" />    </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0NTUgNDU1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NTUgNDU1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxwYXRoIHN0eWxlPSJmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDsiIGQ9Ik0wLDB2NDU1aDQ1NVYwSDB6IE0zMDEuMDA0LDEyNS4yMTdIMjY1LjQ0ICBjLTcuMDQ0LDAtMTQuMTUzLDcuMjgtMTQuMTUzLDEyLjY5NnYzNi4yNjRoNDkuNjQ3Yy0xLjk5OSwyNy44MDctNi4xMDMsNTMuMjM1LTYuMTAzLDUzLjIzNWgtNDMuNzk4VjM4NWgtNjUuMjY2VjIyNy4zOTVoLTMxLjc3MSAgdi01My4wMjloMzEuNzcxdi00My4zNTZjMC03LjkyOC0xLjYwNi02MS4wMDksNjYuODcyLTYxLjAwOWg0OC4zNjZWMTI1LjIxN3oiIGZpbGw9IiNkMGQwZDAiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />  </a>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text=">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0NTUgNDU1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NTUgNDU1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxwYXRoIHN0eWxlPSJmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDsiIGQ9Ik0wLDB2NDU1aDQ1NVYwSDB6IE0zNTIuNzUxLDE2My4yNTljMC4xMjMsMi43NzMsMC4xODYsNS41NjEsMC4xODYsOC4zNiAgYzAsODUuNDAzLTY1LjAwMiwxODMuODc2LTE4My44NzMsMTgzLjg3NmMtMzYuNDk2LDAtNzAuNDY2LTEwLjY5Ny05OS4wNjUtMjkuMDM3YzUuMDU2LDAuNjAxLDEwLjE5OSwwLjkwNywxNS40MTcsMC45MDcgIGMzMC4yNzgsMCw1OC4xNDMtMTAuMzMxLDgwLjI2Mi0yNy42NjhjLTI4LjI4LTAuNTE5LTUyLjE0OC0xOS4yMDQtNjAuMzczLTQ0Ljg4YzMuOTQ4LDAuNzU3LDcuOTk3LDEuMTYzLDEyLjE2MSwxLjE2MyAgYzUuODk0LDAsMTEuNjA0LTAuNzk0LDE3LjAyNy0yLjI2OGMtMjkuNTYzLTUuOTM5LTUxLjg0MS0zMi4wNTctNTEuODQxLTYzLjM2OGMwLTAuMjczLDAtMC41NDQsMC4wMDYtMC44MTQgIGM4LjcxMiw0Ljg0LDE4LjY3Niw3Ljc0OCwyOS4yNzEsOC4wODRjLTE3LjM0Mi0xMS41ODktMjguNzQ4LTMxLjM3MS0yOC43NDgtNTMuNzljMC0xMS44NDUsMy4xODctMjIuOTQ1LDguNzUxLTMyLjQ5MiAgYzMxLjg3MywzOS4xMDEsNzkuNDkzLDY0LjgyOCwxMzMuMjAzLDY3LjUyNmMtMS4xMDMtNC43MzItMS42NzctOS42NjUtMS42NzctMTQuNzI5YzAtMzUuNjg4LDI4LjkzOC02NC42MjMsNjQuNjI2LTY0LjYyMyAgYzE4LjU4OSwwLDM1LjM4NSw3Ljg0Nyw0Ny4xNzMsMjAuNDA2YzE0LjcxOS0yLjg5NSwyOC41NTEtOC4yNzYsNDEuMDM4LTE1LjY4MWMtNC44MjQsMTUuMDkyLTE1LjA3MSwyNy43NTQtMjguNDE1LDM1Ljc1NCAgYzEzLjA3NC0xLjU2MywyNS41MjgtNS4wMzgsMzcuMTE4LTEwLjE3OEMzNzYuMzM2LDE0Mi43NjYsMzY1LjM4LDE1NC4xNDksMzUyLjc1MSwxNjMuMjU5eiIgZmlsbD0iI2QwZDBkMCIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMS4xLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU3OC45NTIgNTc4Ljk1MiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTc4Ljk1MiA1NzguOTUyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ4NC4wOTMsMzQyLjEwN2MwLTE5LjE3Ni0yLjQ0OS0zNS45MDItNy4zNDQtNTAuMTg0Yy00Ljg5Ni0xNC4yOC0xMS42MzEtMjYuMTEyLTIwLjE5Ny0zNS40OTYgICAgYy04LjU2OC05LjM4NC0xOC42NjYtMTYuMzItMzAuMjkzLTIwLjgwOGMtMTEuNjI5LTQuNDg4LTI0LjM3OS02LjczMi0zOC4yNS02LjczMmMtMTEuMDIsMC0yMC42MDUsMS4zMjYtMjguNzY4LDMuOTc4ICAgIGMtOC4xNTYsMi42NTItMTUuMTk1LDYuMTItMjEuMTExLDEwLjQwNHMtMTAuOTE0LDguODc0LTE0Ljk5NCwxMy43N3MtNy41NDcsOS4zODQtMTAuNDA0LDEzLjQ2NHYtMzUuNDk2aC04My4yMzEgICAgYzAuNDA4LDYuOTM2LDAuNjEyLDIwLjQsMC42MTIsNDAuMzkydjc1Ljg5MWMwLDAtMC4yMDQsNDUuMDg0LTAuNjEyLDEzNS4yNTJoODMuMjMxVjM0NS43NzljMC0zLjY3MiwwLjIwNS03LjIzOCwwLjYxMy0xMC43MDkgICAgYzAuNDA4LTMuNDY5LDEuMjIzLTYuNjMxLDIuNDQ3LTkuNDg0YzMuMjY0LTcuMzQ2LDguMjYyLTE0LjI3OSwxNC45OTItMjAuODExYzYuNzMyLTYuNTI1LDE2LjAxNi05Ljc5MSwyNy44NDgtOS43OTEgICAgYzE1LjA5NiwwLDI1LjkwOCw1LjIwMSwzMi40MzYsMTUuNjA1YzYuNTI5LDEwLjQwMiw5Ljc5MywyNC4xNzQsOS43OTMsNDEuMzExdjEzNC42NDFoODMuMjMyTDQ4NC4wOTMsMzQyLjEwN0w0ODQuMDkzLDM0Mi4xMDd6ICAgICBNMTQxLjM3MiwyMDAuNzM2YzE0LjY4OCwwLDI2LjMxNi00LjI4NCwzNC44ODQtMTIuODUyYzguNTY4LTguNTY4LDEyLjY0OC0xOC43NjgsMTIuMjQtMzAuNmMwLTEyLjI0LTQuMTgyLTIyLjU0Mi0xMi41NDYtMzAuOTA2ICAgIGMtOC4zNjQtOC4zNjQtMTkuNjg2LTEyLjU0Ni0zMy45NjYtMTIuNTQ2cy0yNS43MDQsNC4xODItMzQuMjcyLDEyLjU0NlM5NC44NiwxNDUuMDQ0LDk0Ljg2LDE1Ny4yODQgICAgYzAsMTEuODMyLDQuMDgsMjIuMDMyLDEyLjI0LDMwLjZzMTkuMzgsMTIuODUyLDMzLjY2LDEyLjg1MkgxNDEuMzcyTDE0MS4zNzIsMjAwLjczNnogTTE4Mi45ODgsMjM1LjAwOEg5OS43NTZ2MjUxLjUzM2g4My4yMzIgICAgVjIzNS4wMDh6IE01NjEuODE1LDBjNC4wOCwwLDcuNTQ5LDEuMzI2LDEwLjQwNCwzLjk3OGMyLjg1NCwyLjY1Miw0LjI4NSw2LjAxOCw0LjI4NSwxMC4wOTh2NTUwLjgwMSAgICBjMCw0LjA4LTEuNDMyLDcuNDQzLTQuMjg1LDEwLjA5OGMtMi44NTUsMi42NTItNi4zMjQsMy45NzctMTAuNDA0LDMuOTc3SDE3LjEzNmMtNC4wOCwwLTcuNTQ4LTEuMzIyLTEwLjQwNC0zLjk3NyAgICBzLTQuMjg0LTYuMDE4LTQuMjg0LTEwLjA5OFYxNC4wNzZjMC00LjA4LDEuNDI4LTcuNDQ2LDQuMjg0LTEwLjA5OFMxMy4wNTYsMCwxNy4xMzYsMEg1NjEuODE1TDU2MS44MTUsMHoiIGZpbGw9IiNkMGQwZDAiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
                        </a>
                    </div>
                </div>
                <div class="post-meta-single padding-left-sm-10 ">
                    <span><?php the_author_posts_link(); ?></span> | <span><?php the_time( get_option( 'date_format' ) ); ?></span>
                    <span><?php edit_post_link( 'edit', ' | ' ); ?></span> <span> RECENZE - </span> <span><?php do_action('artalk_post_cats'); ?></span>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-4 no-padding-left padding-right-md-20 padding-right-lg-45 float-right">
                    <div class="single-tags-container">
			            <?php

			            $terms =wp_get_post_tags($post->ID);
			            //                   echo '<p>';
			            foreach($terms as $term) {

				            //                            echo $term->name; //the output
				            //                            echo get_tag_link($term->term_id);
				            echo '<span class="single-tags-tag"><a class="taglink" href="'. get_tag_link($term->term_id) .'">'. $term->name . '</a></span>';
				            //                            echo $string .= '<span class="tagbox"><a class="taglink" href="'. get_tag_link($tag->term_id) .'">'. $tag->name . '</a></span>' . "\n"   ;

			            }
			            //                    echo '</p>';
			            //  the_tags('', '' ,'' ); ?>
                    </div>
		            <?php
		            do_action( 'side_matter_list_notes' );
		            ?>
                </div>


                <!--                --><?php //$var = '600';echo get_the_content_reformatted($var);?>



                <div class="col-lg-8 col-sm-8 col-xs-8 padding-sm-10 single-text-container">
					<?php
					the_contents();
					?>

					<?php endwhile; else: ?>

                        <h3>Sorry, no posts matched your criteria.</h3>

					<?php endif;


					?>

                    <div class="clear"></div>
                </div>



            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding-sm sidebar_right">

                <!--//single_left-->

				<?php get_template_part('templates/sidebar', 'single'); ?>

                <div class="clear"></div>
            </div>

			<?php  comments_template(); ?>
        </article>
    </div><!--//content-->


<?php get_sidebar(); ?>

<?php get_footer(); ?>