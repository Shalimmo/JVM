<?php 
/*
Template Name: Galleries Villas
*/
$valor = $_GET["valor"];
//echo "tu nombre es".$valor;
?>
<?php get_header(); ?>
<style>
header#banner {background-color: #333333;display: none !important;}
#sub-footer {display: none !important;}
.content--footer{display: none !important;}
.wrap{display: none !important;}
body.page-template-galleries-villas {background: none !important;}
body.page-template-page-templatesgalleries-villas-php {background: none !important;}
.mobmenu {display: none !important;}
</style>
				<div class="royalgallery" id="galeryRoyal">
				<?php 
				$id = $valor;
				echo get_new_royalslider($id);
				//echo do_shortcode("$royal");
				?>				
				</div>		

		

<?php //endwhile;
//endif; ?>

<div style="clear: both;"></div>

<?php get_footer(); ?>