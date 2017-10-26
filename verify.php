
<?php
 //include the file that handles connection to the database
  include 'accountUtility.php';
  $GLOBALS['random']=verifyCode($code);

 ?>
<html
<head>
  <title> Verifiy Account </title>
</head>



<body>
  <div>
    <h1>
      Thanks for registering <?php  echo $GLOBALS['random'] ;  ?>
    </h1>
    <h4>A verification email has been sent to your email inbox.</h4>
    <form action="./checkVerification.php" method="post" name="form">
   Verfication code:<input type="text" name="verification_code" value=""/>
  <input type="submit" name="submit" value="Submit"/>

   </form>

  </div>
</body>


</html>
