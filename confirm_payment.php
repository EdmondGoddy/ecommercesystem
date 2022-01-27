<?php
$active = "Cart";

session_start();



include("includes/db.php"); 
include("functions/functions.php");



    //Result:

    /*Array ( 
      
     [status] => REQUEST_ACCEPTED
     [message] => payment pending
     [channel_ussd] => *126*1#
     [channel_name] => MTN Mobile Money
     [channel] => CM_MTNMOBILEMONEY
     [paymentId] => 61347672161751969872

    ) */  
  
  

 //- CheckPayment

    function checkPayment($paymentId) {

      $data = array( 'paymentId' => $paymentId ); 
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.monetbil.com/payment/v1/checkPayment'); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $json = curl_exec($ch); 
    $jsonArry = json_decode($json, true);
 

    if (is_array($jsonArry) and array_key_exists('transaction', $jsonArry)) {
      $transaction = $jsonArry['transaction']; 
      $status = $transaction['status']; 

      if ($status == 1)
        { 
        // Successful payment

        
        
        } else if ($status == -1) {
         // Payment failed 
         
         echo "<script> alert('HELLO') </script>";
          
          }else{
              
$con = mysqli_connect("localhost", "id17892102_root", "{8dzE6[EgR%saneN", "id17892102_eddy_mall");
              
$customer_id = $_SESSION["ID"];  
  
        $query = "SELECT * FROM customers where customer_id='$customer_id'";
        $results = mysqli_query($con, $query) or die(mysql_error());
        $row = mysqli_fetch_array($results);


            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $full_name = $row["first_name"]. " " .$row["last_name"];
            $email_address = $row["email_address"];
            $country = $row["country"];
            $city = $row["city"];
            $state = $row["state"];
            $contact = $row["contact"];
            $address = $row["address"];
            $zipcode = $row["zipcode"]; 



$orderid = mysqli_insert_id($con);
$ip_add = getRealIpUser();
$today = date("Y-m-d");
$sessid = session_id();


$sql = "INSERT INTO orders (`order_date`, `customer_name`, `email_address`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_zipcode`) VALUES ('$today','$full_name','$email_address','$address','$city', '$city','$country','$zipcode')";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));



$query = "SELECT * FROM cart WHERE ip_add='$ip_add'";
$results = mysqli_query($con, $query) or die(mysqli_error($con));
//$row = mysqli_fetch_array($results);


while ($row = mysqli_fetch_array($results)) {


$product_id = $row["p_id"];
$quantity = $row["qty"];
$size = $row["size"];
$price = $row["price"];

$sql2 = "INSERT INTO orders_details (customer_id, product_id, order_date, item_name, quantity, price, size) VALUES ('$customer_id', '$product_id', '$today', 'name', '$quantity', '$price', '$size')";
$insert = mysqli_query($con, $sql2) or die(mysqli_error($con));
}


$query = "DELETE FROM cart WHERE ip_add='$ip_add' ";
$delete = mysqli_query($con, $query) or die(mysqli_error($con));
if ($delete) {
  # code...
  echo "Deleted";
}

?>

              <script type="text/javascript">
                alert("Thanks for Shopping with EDDYMALL");
               window.location.href = "customer/my_account.php?my_orders";
              </script>

<?php
          }
        
                
    }

if (!array_key_exists('transaction', $jsonArry)) {
echo "Awaiting your payment...";
header("Refresh:5");
?>
       <script>
            //window.location.reload();
       </script>
       
<?php
    }
  }

    
  if (isset($_GET['checkPayment'])) {

       checkPayment($_GET['checkPayment']);

  }
?>


  
<br>
<!-- -->
<form method="get" action="">
    <input type="hidden" name="checkPayment" value="<?php echo $_GET['checkPayment'] ?>">
   <button> Check my payment</button>
</form>


