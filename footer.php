      </div><!--//content-->
      </div><!--//main container-->
        <footer class="">
            <div class="container art-footer">
                <nav>
                    <?php wp_nav_menu(array('theme_location'=>'footer-menu','menu_class'=>'footer-menu')); ?>
                </nav>

                <p class="col-md-12 noleftpadding no-right-padding-sm information">
                    <?php do_action('artalk_copyright'); ?>
                </p>

            </div>
        </footer>

    </div><!--//row-fluid-->
    <?php wp_footer(); ?>
</body>
</html>



