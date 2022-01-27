<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<h4>Pages</h4>
				<ul>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="customer/my_account.php">My Account</a></li>
				</ul>

				<hr>

				<h4>User Section</h4>
				<ul>
					<li>


                        <?php

                        if (!@isset($_SESSION["customer_name"])) {
                         # code...
                         echo "<a href='checkout.php'>Login</a>";
                        }else{

                         echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                        }
                            
                        ?>
					</li>
					<li>

                        <?php

                        if (!@isset($_SESSION["customer_name"])) {
                         # code...

                         echo "<a href='customer_register.php'>Register</a>";

                        }else{

                         echo "<a href='customer/my_account.php?edit_account'>Edit Account</a>";

                        }
                            
                        ?>

                        <li><a href="terms.php">Terms & Conditions</a></li>

					</li>
				</ul>

				<hr class="hidden-md hidden-lg hidden-sm">

			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Top products Categories</h4>
				<ul>
<?php

$get_p_cats = "SELECT * FROM product_categories";
$run_p_cats = mysqli_query($con, $get_p_cats);

while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
	# code...

	$p_cat_id = $row_p_cats["p_cat_id"];
	$p_cat_title = $row_p_cats["p_cat_title"];

	echo "

<li>
   <a href='shop.php?p_cat=$p_cat_id'>
     
     $p_cat_title

   </a>
</li>

	";
}

?>

				</ul>

				<hr class="hidden-md hidden-lg">

			</div>

			<div class="col-sm-6 col-md-3">
				<h4>Find Us</h4>
				<p>
					<strong>EG GLOBE media inc.</strong>
					<br>Cibubur
					<br>Ciracas
					<br>+237 6 771 028 54
					<br>goddyemond@gmail.com
					<br><strong></strong>
				</p>
				<a href="contact.php">Check Our Contact Page</a>

				<hr class="hidden-md hidden-lg">

			</div>
			<div class="col-sm-6 col-md-3">
				<h4>Get The News</h4>
				<p class="text-muted">
Keep intouch by subscribing to our site so that you don't miss our latest updates
				</p>
				<form action="" method="post">
	 				<div class="input-group">
						<input type="text" name="email" class="form-control">
						<span class="input-group-btn">
							<input type="submit" value="Subscribe" class="btn btn-default">
						</span>
					</div>
				</form>

				<hr>

				<h4>Keep In Touch</h4>
				<p class="social">
					<a target="_blank" href="https://web.facebook.com/edmond.goddy" class="fa fa-facebook"></a>
					<a target="_blank" href="#" class="fa fa-twitter"></a>
					<a target="_blank" href="#" class="fa fa-instagram"></a>
					<a target="_blank" href="https://www.linkedin.com/in/edmond-goddy-3b67b8225" class="fa fa-linkedin"></a>
					<a target="_blank" href="#" class="fa fa-envelope"></a>
				</p>
			</div>
		</div>
	</div>
</div>

                                    
                                       <!--  start of footer -->  

<div id="copyright">
	<div class="container">
		<div class="col-md-6">
			<p class="pull-left">&COPY; 2020 EG GLOBE Store all rights reserve</p>
		</div>
		<div class="col-md-6">
			<p class="pull-right">Theme by: <a target="_blank" href="https://www.linkedin.com/in/edmond-goddy-3b67b8225">Edmond Goddy</a></p>
		</div>
	</div>
</div>                                       

















