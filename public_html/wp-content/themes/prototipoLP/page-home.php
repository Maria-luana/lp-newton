<?php  
    /*
    Template Name: Home
    */

    get_header();
 ?>
<?php
    // Banner Topo
    $args_banners_top = array (
        'post_type' => 'banner',
        'order'   => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'categorias_banner',
                'field'    => 'slug', 
                'terms'    => '',
            ),
        )
    );
    $args_banners_top['tax_query'][0]['terms'] = 'banner-intro';
    $header_query = new WP_Query ( $args_banners_top );
    $banners_intro = $header_query->posts;

    // Banners Espaço
    $args_banners_espaco = array (
        'post_type' => 'banner',
        'order'   => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'categorias_banner',
                'field'    => 'slug', 
                'terms'    => '',
            ),
        )
    );
    $args_banners_espaco['tax_query'][0]['terms'] = 'banner-espaco';
    $espaco_query = new WP_Query ( $args_banners_espaco );
    $banners_espaco = $espaco_query->posts;
    
?>
    <section class="s_intro">
        <div class="owl-carousel owl-banner-intro owl-theme">
            <?php foreach($banners_intro as $banner):?>
            <div class="item">
                <div class="bg-intro" style="background-image: url('<?php the_field('imagem', $banner->ID); ?>');">
                    <div class="container text-center">
                        <h1><?php echo $banner->post_title;?></h1>
                        <?php the_field('descricao', $banner->ID);?>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </section>

    <section class="s_padrao" id="quem-somos">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <figure class="mb-md-0 mb-4">
                        <img src="<?php the_field('imagem_quem_somos');?>" alt="">
                    </figure>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="infos_section">
                        <?php the_field('descricao_quem_somos');?>
                        <a href="<?php the_field('link_quem_somos');?>" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="s_padrao" id="equipe">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 order-md-0 order-1">
                    <div class="infos_section">
                        <?php the_field('descricao_nossa_equipe');?>
                        <a href="<?php the_field('link_nossa_equipe');?>" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 order-md-1 order-0">
                    <figure class="mb-md-0 mb-4">
                        <img src="<?php the_field('imagem_nossa_equipe');?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="s_padrao" id="espaco">
        <div class="bg-espaco">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="infos_section">
                        <?php the_field('descricao_espaco');?>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="box-espaco">
                            <i class="fas icon-arrow fa-arrow-left customPrevBtn"></i>
                            <i class="fas icon-arrow fa-arrow-right customNextBtn"></i>                        
                        <div class="owl-carousel owl-banner-espaco owl-theme">
                            <?php foreach($banners_espaco as $espaco):?>
                            <div class="item">
                                <div class="position-relative">
                                    <img src="<?php the_field('imagem', $espaco->ID);?>" alt="">
                                    <a href="<?php the_field('imagem', $espaco->ID);?>" data-fancybox="galeria-<?php echo $espaco->ID;?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-preview.png" class="icon-preview"></a>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <section class="s_fale_conosco" id="contato">
        <div class="container">
            <div class="infos_section text-center">
                <?php the_field('descricao_formulario')?>
                <ul class="list-contats">
                    <li>
                        <a href="<?php the_field('link_telefone')?>"><i class="fas fa-phone-alt"></i> Telefone</a>
                    </li>
                    <li>
                        <a href="<?php the_field('link_whatsapp')?>"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                    </li>
                    <li>
                        <a href="<?php the_field('link_webchat')?>"><i class="fas fa-comments"></i> Webchat</a>
                    </li>
                </ul>
            </div>
            <?php echo do_shortcode( '[contact-form-7 id="5" title="Contato"]');?>
        </div>
    </section>


 <?php get_footer(); ?>