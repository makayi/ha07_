<?php
  
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Verify</title>

</head>


<body>
  <div>
    <h1>
      <?php


         if ($status) {
           echo "Thanks for verifying your account";
         } else {
          echo "Verification code doesnt match";
         }


       ?>
    </h1>
  </div>

</body>

</html>
