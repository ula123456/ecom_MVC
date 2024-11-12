<tr align="center">
				<td> <input type="checkbox" name="remove[]" value="<?= $product_id; ?>"/> </td>
				<td><?= $product_title; ?></br>
						 	 		
				<img src="<?=STORAGE_DIR. $product_image; ?>"/>
				
	 	 		<td><input type="text" size="4" name="qty" value="<?= $qty; ?>" /></td>
				<td><?= "$". $sing_price; ?></td>
</tr>