<html>

<head>

  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <style>
	@import url("https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900");

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, div
pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q,
s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li,
figure, header, nav, section, article, aside, footer, figcaption, button {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
}

.html, body {
  font-family: 'Open Sans', sans-serif;
  background-color: #ffdddd;
}

section {
  margin-top: 50px;
  margin-bottom: 50px;
}

section.contact-us #contact {
  position: relative;
  display: block;
  width: 380px;
  height: auto;
  background-color: #fff;
  padding: 40px;
  margin-left: auto;
  margin-right: auto;
  border-radius: 15px;
  box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.05);
}

section.contact-us .section-heading {
  position: relative; 
  display: block;
  margin: auto;
}

.section-heading h4 {
  line-height: 40px;
  font-size: 28px;
  font-weight: 900;
  color: #dc8cdb;
  text-align: center;
  text-transform: uppercase;
  margin-bottom: 40px;
}

input, textarea {
  width: 350px;
  position: relative;
  display: block;
  background-color: #f4f7fb;
  font-family: 'Open Sans', sans-serif;
  font-size: 12px;
  font-weight: 500;
  border: none;
  box-shadow: none;
  border-radius: 5px;
  outline-color: #9e9e9e;
}

input {
  height: 40px;
  padding: 0px 15px;
}

textarea {
  min-height: 140px;
  max-height: 180px;
  padding: 15px;
  resize: none;
}

.contact-us span {
  height: 20px;
	font-size: 12px;
  margin-bottom: 20px;
}

.valid_info_name, .valid_info_email, .valid_info_message{
  display: inline-block;
  font-size: 13px;
  margin: 5px 2px;
}

.valid {
  border: 2px solid green;
  outline-color: green;
}

.invalid {
  border: 2px solid red;
  outline-color: red;
}

.btn {
  display: inline-flex;
  width: 100%;
  justify-content: flex-end;
}

#form-submit {
  position: relative;
  display: inline-block;
  float: right;
  font-size: 12px;
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: #fff;
  background: rgb(219,138,222);
  background: linear-gradient(-145deg, rgba(219,138,222,1) 0%, rgba(246,191,159,1) 100%);
  padding: 12px 20px;
  border-radius: 5px;
  border: none;
  outline: none;
  cursor: pointer;
  transition: all .3s;
  transition: all .3s;
}

#form-submit:disabled {
  border: 1px solid #9e9e9e;
  background: transparent;
  color: #9e9e9e;
  transition: none;
  transform: none;
  cursor: default;
}

#form-submit:hover:disabled{
  border: 1px solid #9e9e9e;
  color: #9e9e9e;
  background: transparent;
  transition: none;
  transform: none;
  cursor: default;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

.error{
  color:#cc1616;

}
.success{
  padding: 20px;
  background-color: #04AA6D; /* Red */
  color: white;
  margin-bottom: 15px;
}
  </style>
</head>

<body>

  <?php

$servername='localhost';
$username='root';
$password='';
$dbname = "om";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
  $successmsg="";
  $nameErr = $emailError = $mobileError =$msgError=$subjectError ="";
	if(isset($_POST['submit'])){
		

		if (empty($_POST["name"])) {

			$nameErr = "Name is required";
		  } 
		   else {
		
			$name=$_POST['name'];
			/* check if name only contains letters and whitespace */
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			  $nameErr = "Only letters and white space allowed"; 
			}
		  }
		 
    if (empty($_POST["email"])) {
      $emailError = "Email is required";
    } else {
      $email=$_POST['email'];
      /* check if e-mail address is well-formed */
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format"; 
      }
    }
		 $phone=$_POST['phone'];
     if (empty($_POST["phone"])) {
      $mobileError = "Phone Number is required";
    } else {
      $phone=$_POST['phone'];
      /* check if name only contains letters and whitespace */
      if (!preg_match('/^[0-9]{10}+$/', $phone)) {
        $mobileError = "10 digit Number"; 
      }
    }
	
    if (empty($_POST["msg"])) {

			$msgError = "Message  is required";
		  } 
		   else {
		
			$msg=$_POST['msg'];
		
		
		  }
	
    if (empty($_POST["subject"])) {

			$subjectError = "Subject  is required";
		  } 
		   else {
		
			$subject=$_POST['subject'];
		
		
		  }
			
      if(empty($nameErr) && empty($emailError) && empty($mobileError) && empty($subjectError) &&  empty($subjectError)){
        // echo "asd";exit;

        if(!empty($_POST["name"]) && !empty($_POST["email"])  && !empty($_POST["phone"]) && !empty($_POST["subject"]) && !empty($_POST["msg"]) ){
          $to='opks47284@gmail.com'; // Receiver Email ID, Replace with your email ID
        
          $message="Name :".$name."\n"."Phone :".$phone."\n"."Wrote the following :"."\n\n".$msg;
          $headers="From: ".$email;
          $sql = "INSERT INTO contact (name,email,phone,subject,msg)
          VALUES ('$name','$email','$phone','$subject','$msg')";
           if (mysqli_query($conn, $sql)) {
            
           }
        
          if(mail($to, $subject, $message, $headers)){
            $successmsg= "Sent Successfully! Thank you"." ".$name.", We will contact you shortly!";
          }
          else{
            $successmsg= "";
          }
        }
      
      
      }
	}
?>
  <section class="contact-us" id="contact-section">
    <form id="contact" action="index.php" method="POST" >
      
<?php 
if(!empty($successmsg)){
  echo "<p class=\"success\"> ".$successmsg."</p>";
}
?>


   
      <div class="section-heading">
        <h4>Contact us</h4>
      </div>

      <div class="inputField">
        <input type="name" name="name" id="name"  placeholder="Enter Your FullName" autocomplete="on" >
        <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
      </div>

      <div class="inputField">
        <input type="Email" name="email" id="email" placeholder="Enter Your email" />
       
        <span class="error">* <?php echo $emailError;?></span>
        <br><br>
      </div>

	  <div class="inputField">
        <input type="number" name="phone" id="phone" placeholder="Enter Your Phone" />
        <span class="error">* <?php echo $mobileError;?></span>
        <br><br>
      </div>
	  <div class="inputField">
        <input type="text" name="subject" id="subject" placeholder="Enter Subject" autocomplete="on" >
        <span class="error">* <?php echo $subjectError;?></span>
        <br><br>
      </div>
      <div class="inputField">
        <textarea name="msg" id="message" placeholder="Enter Your Message Here..."></textarea>
        <span class="error">* <?php echo $msgError;?></span>
        <br><br>
      </div>

      <div class="inputField btn">
        <button type="submit" name="submit" id="form-submit" value="send" class="main-gradient-button" >Send a message</button>
      </div>

    </form>
  </section>

 

</body>

</html>
