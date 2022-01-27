<?php
$active = "Home";
include("includes/header.php");

?>


                                         <!--  start of the First slider after second and main menu -->

    <div class="container" id="slider">
    	<div class="col-md-12">
    		<div class="carousel slide" id="myCarousel" data-ride="carousel">
    			<ol class="carousel-indicators"> 
    				<li data-target="#myCarousel" data-slide-to="0"></li>
    				<li data-target="#myCarousel" data-slide-to="1"></li>
    				<li data-target="#myCarousel" data-slide-to="2"></li>
    				<li data-target="#myCarousel" data-slide-to="3"></li>
    			</ol>
    			<div class="carousel-inner">

<?php

$query = "SELECT * FROM slider LIMIT 0,1";
$query = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($query)) {
    # code...
    $slide_name = $row["slide_name"];
    $slide_image = $row["slide_image"];
    $slide_url = $row["slide_url"];

?>

                     <div class='item active'>
                        <a href="<?php echo $slide_url; ?>">
                           <img src='<?php echo "admin_area/slides_images/$slide_image" ?>'>
<?php
//Optional Method // echo "<img src='admin_area/slides_images/$slide_image'>";
?>                      </a>
                     </div>

<?php

}


$query = "SELECT * FROM slider LIMIT 1,3";
$query = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($query)) {
    # code...
    $slide_name = $row["slide_name"];
    $slide_image = $row["slide_image"];
    $slide_url = $row["slide_url"];


?>
                     <div class='item'>
                        <a href="<?php echo $slide_url; ?>">
                           <img src='<?php echo "admin_area/slides_images/$slide_image" ?>'>
<?php
//Optional Method // echo "<img src='admin_area/slides_images/$slide_image'>";
?>   
                        </a>                        
                     </div>

<?php
}

?>                    
    			</div>
    			<a href="#myCarousel" class="left carousel-control" data-slide="prev">
    				<span class="glyphicon glyphicon-chevron-left"></span>
    				<span class="sr-only">Previous</span>
    			</a>
    			<a href="#myCarousel" class="right carousel-control" data-slide="next">
    				<span class="glyphicon glyphicon-chevron-right"></span>
    				<span class="sr-only">Next</span>
    			</a>
    		</div>
    	</div>
    </div>  

                              <!--  end of the First slider after second and main menu -->

                                <!--  start of the adveantages class -->

    <div id="advantages">
    	<div class="container">
    		<div class="same-height-row">


    			<?php

    			$get_box = "SELECT * FROM boxs_section ";
    			$run_boxes = mysqli_query($con, $get_box);

    			while($run_boxes_section = mysqli_fetch_array($run_boxes)){

    				$box_id = $run_boxes_section["box_id"];
    				$box_title = $run_boxes_section["box_title"];
    				$box_desc = $run_boxes_section["box_des"];


    			?>

    			<div class="col-sm-4">
    				<div class="box same-height">
    					<div class="icon">
    						<i class="fa fa-heart"></i>
    					</div>
    					<h3><a href="#"> <?php  echo $box_title; ?> </a></h3>
    					<p> <?php  echo $box_desc; ?> </p>
    				</div>
    			</div>

    		    <?php } ?>
    			
    			
    		</div>
    	</div>
    </div>    

                                       <!--  end of the advantages class -->


                                       <!--  start of the hot id div -->

    <div id="hot">
    	<div class="box">
    		<div class="container">
    			<div class="col-md-12">
    				<h2>
    					Our Latest Products
    				</h2>
    			</div>
    		</div>
    	</div>
    </div>      

                                       <!--  end of the hot id div -->  

                                       <!--  start of content id and container class div -->  

    <div id="content" class="container">
    	<div class="row">

<?php


getPro();


?>            
    	</div>
    </div> 

                                       <!--  end of content id and container class div -->

                                       <!--  start of footer -->
<?php

include("includes/footer.php");

?>

                                       <!--  end of footer -->                                                                                            







     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>  
</body>
</html>






















