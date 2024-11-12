 <?php foreach ($products as $row_pro):  ?>
		      <div id='single_product'>
			    <h3><?=$row_pro['product_title'] ?></h3>
				<img src='<?= STORAGE_DIR.$row_pro['product_image'] ?>' width='180' height='180' />
				
				<p><b> Price: $ <?=$row_pro['product_price'] ?></b></p>
				
				<a href="http://localhost/ecom/index.php/product/<?= $row_pro['product_id'] ?>">Details</a>
				
				
				<a href="http://localhost/ecom/index.php/cart/add/<?= $row_pro['product_id'] ?>">
				  <button style='float:right'>Add to Cart</button>
				</a>
			  </div>
<?php endforeach;?>
