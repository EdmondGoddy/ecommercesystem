<?php
$active = "Contact";
include("includes/header.php");

?>

    <div id="content">
    	<div class="container">
    		<div class="col-md-12"> 
    			<ul class="breadcrumb"> 
    				<li>
    					<a href="index.php">Home</a>
    				</li>
    				<li>
    					Contact Us
    				</li>
    			</ul>
    		</div>
    		<div  class="col-md-3">

    			                       <!--  start of sidebar -->
<?php

include("includes/sidebar.php");

?>    		
                                       <!--  end of sidebar -->	
    		</div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Feel free to Contact Us</h2>
                            <p class="text-muted">
                                If you have any questions, feel free to Contact Us. Our Customer Service works <strong> 24/7.</strong>
                            </p>
                        </center>
                        <form action="contact.php" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control" name="subject" required="">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">
                                  <i class="fa fa-user-md"></i> Send Message
                                </button>
                            </div>
                        </form>

                        <?php

                        if (isset($_POST["submit"])) {
                        	# code...
                        	/// Admin Receives Message With This  ////

                        	$sender_name = $_POST["name"];
                        	$sender_email = $_POST["email"];
                        	$sender_subject = $_POST["subject"];
                        	$sender_message = $_POST["message"];

                        	$receiver_email = "goddyedmond@gmail.com";

                        	mail($receiver_email, $sender_name, $sender_subject, $sender_message, $sender_email);

                        	///  Auto Reply To Sender With This  ///

                        	$email = $_POST["email"];
                        	$subject = "Welcom to my website";
                        	$msg = "Thanks for messaging us. ASAP we will reply your message";
                        	$from = "goddyedmond@gmail.com";

                        	mail($email, $subject, $msg, $from);

                        	echo "<script> alert('Your Message Was Sent Successfully') </script>";
                        }

                        ?>
                    </div>
                </div>                   
            </div>
        </div>
    </div>


                                         <!--  start of footer -->

<?php

include("includes/footer.php");

?>

                                         <!--  end of footer -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>