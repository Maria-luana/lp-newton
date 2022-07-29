</main>
    <footer class="footer"> 
        <div class="container">
            <div class="position-relative">
                <div class="menu-footer">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'menu-principal',
                            'menu_id'        => 'menu-principal',
                            'container'      => false,
                            'depth'          => 2,
                            'menu_class'     => 'navbar-nav menu align-items-lg-center ml-auto',
                            'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
                            'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
                        ) );
                    ?>
                </div>
                <ul class="list-redes-sociais">
                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="bar-white"></div>

            <div class="infos_section">Health Clinic São Paulo - Todos os Direitos Reservados.</div>

        </div>

    </footer>


<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/deps.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/app.min.js"></script>

<?php wp_footer(); ?>
</body>
</html>