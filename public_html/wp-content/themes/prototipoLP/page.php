<?php  
/*
Template Name: Page
*/
get_header(); 
?>    
<section class="s_padrao">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
					<h1><?php the_title();?></h1>
					<?php the_content();?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>