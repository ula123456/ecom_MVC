<?php include("includes/header.php");  ?>

		
		<div class="content_wrapper"><!-- content start -->
			<div id="sidebar"><!-- sidebar start -->
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
					
					<?php get_cat();?>

				</ul>
				<div id="sidebar_title">Brands</div>
				<ul id="cats">
					
					<?php get_brand(); 	?>
				</ul>

			</div><!-- sidebar start -->

			<div id="content_area">
				<div id="product_box">

	<?php get_All_Pro();	?>

				</div>
			</div>
				
		</div><!-- content end -->


<?php include("includes/footer.php");  ?>