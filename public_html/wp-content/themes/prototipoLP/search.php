<?php 
    get_header();
?>
<main class="padding-header-search">
    <!-- Ínicio Section Intro Banner -->
        <?php include_once('inc/banner_intro_desktop.php')?>
        <?php include_once('inc/banner_intro_mobile.php')?>
    <!-- Fim Section Intro Banner -->
    <section class="mb-md-5 py-5">
        <div class="wrapper wrapper-1220">
                <div class="results-pesquisa">Resultados da pesquisa para: <strong><?php the_search_query(); ?></strong>.</div>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                        <?php if(get_field('link_delivery') != ''): ?>
                            <?php 
                                $valore = get_field('link_delivery');

                                $valoresArray = explode(PHP_EOL,$valore);


                                if(count($valoresArray)==1):
                                    $dadosLink = explode("|",$valoresArray[0]);
                                    $nomeDoLink = $dadosLink[0];
                                    $urlDoLink = $dadosLink[1];
                            ?>
                                <figure class="item_alimentacao">
                                    <a href="<?php echo $urlDoLink;?>" title="<?php the_title();?>" target="_blank">
                                        <img src="<?php the_field('imagem'); ?>" alt="<?php the_title();?>" >
                                    </a>
                                </figure>
                            <?php else: ?>
                                <figure class="item_alimentacao">
                                    <img src="<?php the_field('imagem'); ?>" alt="<?php the_title();?>">
                                    <figcaption>
                                        <div class="links_delivery" >
                                            <?php 
                                                foreach ($valoresArray as $key => $valor):
                                                    $dadosLink = explode("|",$valor);
                                                    $nomeDoLink = $dadosLink[0];
                                                    $urlDoLink = $dadosLink[1];
                                            ?>
                                                <a href="<?php echo $urlDoLink;?>" title="<?php the_title();?> - <?php echo $nomeDoLink;?>" target="_blank"> <span><?php echo $nomeDoLink;?></span></a>
                                            <?php endforeach;?>
                                        </div>
                                    </figcaption>
                                </figure>
                            <?php endif;?>
                        <?php else:?>
                            <div class="item_loja" id="post-<?php the_ID(); ?>">
                                <article>
                                    <figure>
                                        <img src="<?php the_field('imagem');?>" alt="">
                                    </figure>
                                    <h2><?php the_title();?></h2>
                                    <a href="<?php the_field('link_compre');?>" title="<?php the_title();?>" class="btn btn-primary btn-184" target="_blank">Compre aqui</a>
                                </article>
                            </div>
                        <?php endif;?>
                <?php endwhile; ?>
            <?php else : ?>

            <h3 class="brendon">Nenhuma loja encontrada!</h3>

            <?php endif; ?>
            <div class="text-center mt-5">
                <a href="/acoes/rmfdelivery/" class="btn btn-primary btn-240">Ver todas as lojas</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>