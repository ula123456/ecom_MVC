<?php require_once 'header.php';  ?>
		
		
		<div class="content_wrapper"><!-- content start -->
<script>

$(document) .ready(function(){

	$("#password_confirm2") .on('keyup', function(){

		
		var password_confirm1 = $("#password_confirm1") .val();
		var password_confirm2 = $("#password_confirm2") .val();
		//alert(password_confirm2);
		if (password_confirm1==password_confirm2) {
			$("#status_for_confirm_password") .html('<strong style="color:green">Password match</strong>');
		}else{
			$("#status_for_confirm_password") .html('<strong style="color:red">Password do not match</strong>');
		}

	});

});
</script>	

<div class="register_box">
<form method="POST" action="" enctype="multipart/form-data">
	<table align="left" width="70%">
		<tr align="left">
			<td colspan="4">
				<h2>Register</h2><br/>
				<span>
				already have accaunt? <a href="http://localhost/ecom/index.php/login">Login now</a><br/><br/>
				</span>
			</td>
		</tr>
		<tr>
		<td width="15%"><b>Name:</b> </td>
		<td colspan="3"><input type="text" value="<?= $username ?>" name="username"></td>
		</tr>

		<tr>
		<td width="15%"><b>Email:</b> </td>
		<td colspan="3"><input type="email" value="<?= $email ?>" name="email"></td>
		</tr>

		<tr>
		<td width="15%"><b>Password:</b> </td>
		<td colspan="3"><input type="password" value="<?= $password ?>" name="password" name="password" ></td>
		</tr>

		<tr>
		<td width="15%"><b>Confirm Password:</b> </td>
		<td colspan="3"><input type="password" value="<?= $passwordRepeat ?>" name="passwordRepeat" ><p id="status_for_confirm_password"></p><!-- shuving validate password here -->
		</td>
		</tr>

		<tr>
		<td width="15%"><b>Image:</b> </td>
		<td colspan="3"><input type="file" name="image"/></td>
		</tr>

		<tr>
		<td width="15%"><b>Country:</b> </td>
		<td colspan="3">
			<?php include('includes/country_list.php') ?>
		</td>
		</tr>

		<tr>
		<td width="15%"><b>City:</b> </td>
		<td colspan="3"><input type="text" value="<?= $city ?>"name="city" required placeholder="City"></td>
						
		</tr>

		<tr>
		<td width="15%"><b>Contact:</b> </td>
		<td colspan="3"><input type="text" value="<?= $contact ?>"name="contact" required placeholder="contact"></td>
						
		</tr>

		<tr>
		<td width="15%"><b>Address:</b> </td>
		<td colspan="3"><input type="text" value="<?= $adress ?>" name="address" required placeholder="Address"></td>
		</tr>				


		
		<tr align="left">
		<td > </td>
					 	 		
				<td colspan="4"> 
					<button class="btn btn-success" type="submit">Account anlegen</button>
				</td>
		</tr>
	</table>
</form>
</div>
