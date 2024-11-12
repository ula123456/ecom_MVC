<?php

require_once 'header.php' ?>
	
		
<div class="content_wrapper"><!-- content start -->
			

			<?php include("routes/templates/sidebar.php"); ?>

			<div id="content_area">
				<div id="product_box">

					<div id='single_product'>
			    		<h3><?=$row_pro['product_title'] ?></h3>
						<img src='<?= STORAGE_DIR.$row_pro['product_image'] ?>' width='280' height='280' />
				
						<p><b> Price: $ <?=$row_pro['product_price'] ?></b></p>
				
						<a href="http://localhost/ecom/index.php/details/<?=$row_pro['product_id'] ?>">Details</a>

				
						<a href="http://localhost/ecom/index.php/cart/add/<?=$row_pro['product_id'] ?>">
				 		 <button style='float:right'>Add to Cart</button></a>
			    	</div>

				</div>
			</div>
				
</div><!-- content end -->


<?php include("footer.php");  ?>