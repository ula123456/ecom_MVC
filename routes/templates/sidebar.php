
<div class="content_wrapper"><!-- content start -->
			<div id="sidebar"><!-- sidebar start -->
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
					<?php 
				
					
					foreach ($cat as $row_cat):  ?>
					
					<li><a href='http://localhost/ecom/index.php/cat/<?= $row_cat['id']; ?>'>ui<?= $row_cat['title']; ?></a></li>
					 <?php endforeach;?>

				</ul>
				<div id="sidebar_title">Brands</div>
				<ul id="cats">
					<?php foreach ($brand as $row_brand):  ?>
					<li><a href='http://localhost/ecom/index.php/brand/<?= $row_brand['id']; ?>'>oi<?= $row_brand['title']; ?></a></li>
					<?php endforeach;?>
				</ul>

			</div><!-- sidebar start -->
			