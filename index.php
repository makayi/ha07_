<?php
   //include "accountUtility.php";
   if(isset($_POST['registerSubmission']))
 {

 }




 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Account Creation</title>

</head>
 <div> Create your account</div>

<body>
  <form action='<?php echo  GetSelfScript(); ?>' method="post" name="form">
 Username:<input type="text" name="username" value=""/>
 <br />
 <input type='hidden' name='registerSubmission' id='submitted' value='1'/>
 <br>
 Email:<input type="email" name="email" value=""/>
  <br />
 Password:<input type="password" name="password" value=""/>
  <br />
 Confirm Password:<input type="password" name="confirmation" value=""/>
<br>
<input type="submit" name="submit" value="Submit"/>



</body>

</html>
