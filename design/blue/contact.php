
<?php

function removeHTML($texttovalid){
		$texttovalid = trim($texttovalid);
		if(strlen($texttovalid)>0){
			$texttovalid = htmlspecialchars(stripslashes($texttovalid));
		}
		return $texttovalid;
}

if(isset($_POST['submit'])){

	$name = removeHTML($_POST['name']);
	$email = removeHTML($_POST['email']);
	$subject = removeHTML($_POST['subject']);
	$message = removeHTML($_POST['message']);
	$msg ='';
	
	if($name==''){
		$msg = '<li>Name is a required field.</li>';
	}
	if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)){
	   $msg .= '<li>Invalid Email Address</li>';
	}
	if($subject==''){
		$msg .= '<li>Subject is a required field.</li>';
	}
	if($message==''){
		$msg .= '<li>Message is a required field.</li>';
	}
	
	if($msg!=''){
		$msg = '<div class="errorMsg"><h3>Message Field!</h3><ul>' . $msg . '</ul></div>';
	}
	else{
		
		/*Change this email to your email address*/
		$to = "joefrey.mahusay@gmail.com";
		
		
		$headers = "From: $email";
		$subject = $subject." - A message from Good Business";
		$body = "Name: $name\n\n"
			. "Email: $email\n\n"
			. "Subject: $subject\n\n"
			. "Message: $message"
			;
		$ok = (mail($to, $subject, $body, $headers));
		
		if($ok){
		$msg = '<div class="infoMsg"><h3>Message Sent!</h3><p>Thank you for contacting us. We will get back to you shortly!</p></div>';
		}else{
		$msg = '<div class="errorMsg"><h3>Message Failed!</h3><p>Please try again.</p></div>';
		}
		
		
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Good Business Clean Web Template</title>


<link href="css/style.css" type="text/css" rel="stylesheet" media="screen" />
<link href="css/reset.css" type="text/css" rel="stylesheet" media="screen" />
<script src="js/unitpngfix.js" type="text/javascript"></script>


</head>

<body id="inside_page">
	<!--start page -->
	<div id="page">
      
    	<!--start header_wrap -->
    	<div id="header_wrap">
        	<h1 id="logo"><a href="index.html">Good Business</a></h1>
            <div id="menu_wrap">

                <ul id="menu">
                	<li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.php" class="current">Contact</a></li>
                </ul>
                
                <div id="search_wrap">
                	<form method="post" action="#"><div class="t_bg"><input type="text" value="Search..." id="s" onblur="if (this.value == ''){this.value = 'Search...'; }" onfocus="if (this.value == 'Search...') {this.value = ''; }" /><input type="image" class="go_btn" src="images/s_go_btn.gif" /></div></form>
                </div>
                
            </div>
        </div>
        <!--end header_wrap -->
        
        
        
        <div id="title_wrap_inner">
        <!--start title_wrap -->
            <div class="title_wrap">
                 <h2 class="contact"><span>Get in touch</span></h2>
                 
            </div>
        <!--end title_wrap -->
        </div>
        
        
        
         
        <div id="main_content_inner">
        <!--start main_content -->
        <div id="main_content" class="two_column">
        
		  <div id="content">
          
          	<div class="breadcrumb_inner">
            	<ul class="breadcrumb">
                	<li class="first"><a href="index.html">Home</a></li>
                    <li class="current">Contact</li>
                </ul>
            </div>
            
            <h2>Contact Form</h2>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. </p>
            
            
            <?php echo $msg;?>
          <form id="contact-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p>
              <label for="name">Name:</label><input type="text" name="name" id="name" value="<?php echo $name;?>" />
            </p>
            <p>
              <label for="email">Email:</label><input type="text" name="email" id="email" value="<?php echo $email;?>"  />
            </p>
            <p>
              <label for="subject">Subject:</label><input type="text" name="subject" id="subject" value="<?php echo $subject;?>"  />
            </p>
            <p>
              <label for="message">Message:</label><textarea name="message" id="message" rows="5" cols="20"><?php echo $message;?></textarea>
            </p>
            <p>
              <label>&nbsp;</label><input type="submit" value="Submit Form" name="submit" class="button"/>
            </p>
          </form>
           
            
          </div>
          
          <div id="sidebar">
          	<h3>Contact Information</h3>
          	<div class="box_right_padding">
                
               <img src="images/building.jpg" alt="Sample Building Image" />
               <address>2901 Marmora Road, Glassgow, D04 59GR</address>
               <span>
               		 Tel: +1 234 567 8910<br />
					 Fax: +1 234 567 8910<br />
					 Email: <a href="mailto:mail@domain.com">mail@domain.com</a>
               </span>

               
            </div>
            <h3>Our Locations</h3>
            <div class="box_right_padding">
              <dl>
               <dt>Argentina</dt>
               <dd>Pellentesque habitant morbi tristique senectus et netus et malesuada fames</dd>
               <dt>France</dt>
               <dd>Pellentesque habitant morbi tristique senectus et netus et malesuada fames</dd>
               <dt>Denmark</dt>
               <dd>Pellentesque habitant morbi tristique senectus et netus et malesuada fames</dd>
              </dl>
              
            </div>
             
            
          </div>

          
        </div>
        <!--end main_content -->
        </div>
        
        
        <!--start footer_inner -->
        <div id="footer_inner">
            <div id="footer">	
                <ul class="footer_nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html" >About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.php" class="current">Contact</a></li>
                </ul>
                <span class="copyright">&copy; 2009 <strong>GoodBusiness</strong>.  All rights reserved.</span>
            </div>
        </div>
        <!--end footer -->
        
    </div>
    <!--end page -->
</body>
</html>
