<?php


ini_set('display_errors', 'On');

$db = mysqli_connect("localhost", "root", "", "eddy_mall");

// START OF getRealIpUser()  //

function getRealIpUser(){

  switch (true) {
    case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP']; 
    case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
    case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
    
    default : return $_SERVER['REMOTE_ADDR'];
  }
}

// End OF getRealIpUser()  //

// Start OF add_cart()  //

function add_cart(){

  global $db;
  if (isset($_GET["pro_id"])) { //add_cart
    # code...
    $ip_add = getRealIpUser();
    $p_id = $_GET["pro_id"];
    $product_qty = @$_POST["product_qty"];
    $product_size = @$_POST["product_size"];

    $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
    $run_check = mysqli_query($db, $check_product);

    if (mysqli_num_rows($run_check) > 0) {
      # code...
      echo "<script>alert('This product has already been added into cart')</script>";
      //echo "<script>windows.location('details.php?pro_id=$p_id', '_self')</script>";
      // OR echo "<script>windows.location('details.php?pro_id=$p_id')</script>";
      //header("location:details.php?pro_id=$p_id");
    }else{

      $query = "INSERT INTO cart (`ip_add`, `qty`, `size`) VALUES ('$ip_add', '$product_qty', '$product_size')";
      $run_query = mysqli_query($db, $query);
      echo "<script>alert('Product add to card')</script>";
      //echo "<script>windows.open('details.php?pro_id=$p_id') </script>";
      //header("location:details.php?pro_id=$p_id");
    }

  }
}

// End OF add_cart()  //


// START OF getPro()  //

function getPro(){

	global $db;

	$get_products = "SELECT * FROM products order by 1 DESC LIMIT 0,8";
	$run_products = mysqli_query($db, $get_products);

	while ($row_products = mysqli_fetch_array($run_products)) {
		# code...

		$pro_id = $row_products["product_id"];
		$pro_title = $row_products["product_title"];
		$pro_price = $row_products["product_price"];
		$pro_img1 = $row_products["product_img1"];

		echo "

<div class='col-md-4 col-sm-6 single'>
    <div class='product'>
        <a href='details.php?pro_id=$pro_id'>
            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
        </a>
        <div class='text'>
            <h3>
               <a href='details.php?pro_id=$pro_id'>

                  $pro_title

               </a>
            </h3>
            <p class='price'>

              $ $pro_price

            </p>
            <p class='button'>
               <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                   View Details
               </a>
               <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                   <i class='fa fa-shopping-cart'></i> Add to Cart
               </a>
            </p>
        </div>     
    </div>
</div>
		";

	}




}

// END OF getPro()  //


// START OF getPCats()  //


function getPCats(){
  
  global $db;

  $get_p_cats = "SELECT * FROM product_categories";
  $run_p_cats = mysqli_query($db, $get_p_cats);

  while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
    # code...
    $p_cat_id = $row_p_cats["p_cat_id"];
    $p_cat_title = $row_p_cats["p_cat_title"];

    echo "

<li>
   <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
</li>

    ";

  }

}

// END OF getPCats()  //



// START OF getCats()  //


function getCats(){
  
  global $db;

  $get_cats = "SELECT * FROM categories";
  $run_cats = mysqli_query($db, $get_cats);

  while ($row_cats = mysqli_fetch_array($run_cats)) {
    # code...
    $cat_id = $row_cats["cat_id"];
    $cat_title = $row_cats["cat_title"];

    echo "

<li>
   <a href='shop.php?cat=$cat_id'> $cat_title </a>
</li>

    ";

  }

}

// END OF getCats()  //


//  START OF getpcatpro()  //

function getpcatpro(){

  global $db;
  if (isset($_GET["p_cat"])) {
    # code...
    $p_cat_id = $_GET["p_cat"];

    $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";

    $run_p_cat = mysqli_query($db, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat["p_cat_title"];
    $p_cat_desc = $row_p_cat["p_cat_desc"];

    $get_products = "SELECT * FROM products WHERE p_cat_id-'$p_cat_id'";
    $run_products = mysqli_query($db, $get_products);
    $count = mysqli_num_rows($run_products);

    if ($count == 0) {
      # code...
      echo "

<div class='box'>
     <h1>No Product Found In This Product Categories</h1>
</div>

      ";
    }else{
      # code...
      echo "

<div class='box'>
     <h1> $p_cat_title </h1>
     <p> $p_cat_desc </p>
</div>

      ";
    }

    while ($row_products  = mysqli_fetch_array($run_products)) {
      # code...

    $pro_id = $row_products["product_id"];
    $pro_title = $row_products["product_title"];
    $pro_price = $row_products["product_price"];
    $pro_img1 = $row_products["product_img1"];


    echo "

<div class='col-md-4 col-sm-6 center-responsive'>
    <div class='product'>
        <a href='details.php?pro_id=$pro_id'>
            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
        </a>
        <div class='text'>
            <h3>
               <a href='details.php?pro_id=$pro_id'>

                  $pro_title

               </a>
            </h3>
            <p class='price'>

              $ $pro_price

            </p>
            <p class='button'>
               <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                   View Details
               </a>
               <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                   <i class='fa fa-shopping-cart'></i> Add to Cart
               </a>
            </p>
        </div>     
    </div>
</div>
    ";

    }

  }

}

//  END OF getpcatpro()  //


//  START OF getcatpro()  //

function getcatpro(){

  global $db;
  if (isset($_GET["cat"])) {
    # code...

    $cat_id = $_GET["cat"];

    $get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";
    $run_cat = mysqli_query($db, $get_cat);

    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat["cat_title"];
    $cat_desc = $row_cat["cat_desc"];

    $get_cat = "SELECT * FROM products WHERE cat_id='$cat_id' LIMIT 0,6";
    $run_products = mysqli_query($db, $get_cat);
    $count = mysqli_num_rows($run_products);

    if ($count == 0) {
      # code...
      echo "

<div class='box'>
    <h1>No Product Found In This Category</h1>
</div>

      ";
    }else{
      echo "

<div class='box'> 
    <h1>$cat_title</h1>
    <p>$cat_desc</p>
</div>

      ";
    }

    while ($row_products = mysqli_fetch_array($run_products)) {
      # code...
      $pro_id = $row_products["product_id"];
      $pro_title = $row_products["product_title"];
      $pro_price = $row_products["product_price"];
      $pro_desc = $row_products["product_desc"];
      $pro_img1 = $row_products["product_img1"];

      echo "

<div class='col-md-4 col-sm-6 center-responsive'>
    <div class='product'>

        <a href='details.php?pro_id=$pro_id'>
           <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
        </a>

        <div class='text'>

            <h3>
               <a href='details.php?pro_id=$pro_id'>$pro_title</a>
            </h3>

            <p class='price'> 
               $ $pro_price
            </p> 

            <p class='buttons'>
            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
               View Details
            </a>

            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
               <i class='fa fa-shopping-cart'></i> Add to Cart
            </a>
            </p>

        </div>

    </div>
</div>


      ";
    }

  }


}



//  END OF getcatpro()  //



//  START OF items()  //


function items(){

  global $db;

  $ip_add = getRealIpUser();

  $get_items = "SELECT * FROM cart WHERE ip_add='$ip_add'";
  $run_items = mysqli_query($db, $get_items);
  $count_items = mysqli_num_rows($run_items);

  echo $count_items;
}

//  END OF items()

//  START of total_price()  //

function total_price(){

  global $db;

  $ip_add = getRealIpUser();
  $total = 0;

  $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
  $run_cart = mysqli_query($db, $select_cart);

  while($record=mysqli_fetch_array($run_cart)) {
    # code...
    $pro_id = $record["p_id"];
    $pro_qty = $record["qty"];

    $get_price = "SELECT * FROM products WHERE product_id='$pro_id'";
    $run_price = mysqli_query($db, $get_price);

    while($row_price=mysqli_fetch_array($run_price)) {
      # code...
      $sub_total = $row_price["product_price"] * $pro_qty;
      $total += $sub_total;
    }
  }

  echo "$ " . $total; 

}

//  END of total_price()  //


?>