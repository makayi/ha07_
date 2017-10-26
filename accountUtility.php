 <?php
  include 'dbConnect/dbConnect.php';
  require 'vendor/autoload.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;






  function verifyCode($code){

$sql  = "SELECT *  FROM `users` WHERE `verification_code` LIKE '$code' AND `confirmed`!='yes' ";

       $result=mysqli_query($conn,$sql);
       if(!$result || mysqli_num_rows($result) <= 0)
        {

            return false;
        }
        $row = mysqli_fetch_assoc($result);
        $user_rec['username'] = $row['username'];
        $user_rec['email']= $row['email'];


       $qry="UPDATE `users` SET `confirmed` = 'yes' WHERE `users`.`verification_code` = '$code' ";

        if(!mysqli_query($conn,$qry))
        {
         //echo "Error inserting data to the table\nquery:$qry";
            return false;
        }else {

              return true;
        }



  }

  function creatUser(){

   $userData= array();
   if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])
   && isset($_POST['confirmation'])  ){
     $userData['username']=$_POST["username"];
     $userData['email']=$_POST["email"];
     $userData['password']=$_POST["password"];
     $userData['confirmation']=$_POST["confirmation"];

       if(newUser($userData,$conn)){
          return true
       } else {
         return false;
       }


   }
     else {
         return false;
     }
  }

 function newUser($userData,$conn) {
   echo $userData['username'];
   $username=$userData['username'];
   $password=$userData['password'];
   $email=$userData['email'];
   $verification_code= random_num(6);


   $sql = "INSERT INTO users (username, password, email, verification_code)
   VALUES ('$username', '$password', '$password','$verification_code')";

   if (mysqli_query($conn, $sql)) {


      return true;
   } else {
      return false;
   }

 }

 function loginUser(){


  $sql  = "SELECT *  FROM `users` WHERE `username` = '$username'
     AND `password`='$password'
     AND `confirmed` LIKE 'yes'";

      $result=mysqli_query($conn,$sql);
      if(!$result || mysqli_num_rows($result) <= 0)
       {

           return false;
       }
       $row = mysqli_fetch_assoc($result);
       $user_rec['username'] = $row['username'];
       $user_rec['email']= $row['email'];

      //   var_dump($user_rec);
      return $user_details=$user_rec;





 }

 getUserFormData();

   //sendVerificationEmail();




 function sendVerificationEmail(){
   $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
 try {
   echo "mbuyu@bongohive.co.zm";
     //Server settings
     $mail->SMTPDebug = 2;                                 // Enable verbose debug output
     $mail->isSMTP();                                      // Set mailer to use SMTP
     $mail->Host = 'smtp.zoho.com;';  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                               // Enable SMTP authentication
     $mail->Username = '';                 // SMTP username
     $mail->Password = '';                           // SMTP password
     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
     $mail->Port = 587;                                    // TCP port to connect to

     //Recipients
     $mail->setFrom('mbuyu@bongohive.co.zm', 'Mailer');
     $mail->addAddress('mbmakayi@gmail.com', 'mbuyu');     // Add a recipient


     //Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'Here is the subject';
     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

     $mail->send();
     echo 'Message has been sent';
 } catch (Exception $e) {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
 }
 }


 function random_num($size) {
 	$alpha_key = '';
 	$keys = range('A', 'Z');

 	for ($i = 0; $i < 2; $i++) {
 		$alpha_key .= $keys[array_rand($keys)];
 	}

 	$length = $size - 2;

 	$key = '';
 	$keys = range(0, 9);

 	for ($i = 0; $i < $length; $i++) {
 		$key .= $keys[array_rand($keys)];
 	}

 	return $alpha_key . $key;
 }


 function RedirectToURL($url)
   {
       header("Location: $url");
       exit;
   }

//calls the script's self
   function GetSelfScript()
   {
       return htmlentities($_SERVER['PHP_SELF']);
   }




  ?>
