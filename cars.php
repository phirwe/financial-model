<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store Template, Free CSS Template, TemplateMo.com</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML, TemplateMo.com" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website from TemplateMo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--  Free CSS Templates from www.templatemo.com -->
<div id="templatemo_container">
    
    <div id="templatemo_header">
    	<div id="templatemo_special_offers">
        	<p>
                <span>25%</span> discounts for
        purchase over $ 40
        	</p>
			<a href="#" style="margin-left: 50px;">Read more...</a>
        </div>    
    <div id="templatemo_content">
            <div class="templatemo_content_left_section">                
                <a href="http://validator.w3.org/check?uri=referer"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a>
			</div>
        </div> <!-- end of content left -->
        
        <div id="templatemo_content_right">
        	
            <h1>Book Title <span>(by author name)</span></h1>
            <div class="image_panel"><img src="images/templatemo_image_02.jpg" alt="CSS Template" width="100" height="150" /></div>
          <h2>Read the lessons - Watch the videos - Do the exercises</h2>
            <ul>
	            <li>By Deke <a href="#">McClelland</a></li>
            	<li>January 2024</li>
                <li>Pages: 498</li>
                <li>ISBN 10: 0-496-91612-0 | ISBN 13: 9780492518154</li>
            </ul>
            
            <p>
		 <?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = 'Rinku1234';
        $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

        $dbname = 'mydb';
        mysql_select_db($dbname);

        $query = "SELECT * FROM Cars";
        $result = mysql_query($query) 
        or die(mysql_error()); 
        echo " 
        <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\"><tr> 
	<td width=100>Check:</td> 
        <td width=100>Id:</td> 
        <td width=100>Name:</td> 
        <td width=100>Price:</td> 
        
        </tr>"; 
	
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
        { 
        print "<tr>"; 
	print "<td><form method='get'><input type='checkbox' name='options[]' value='value'/></td>";
	print "<td>" . $row['Id'] . "</td>"; 
        print "<td>" . $row['Name'] . "</td>"; 
        print "<td>" . $row['Price'] . "</td>"; 
        print "</tr>"; 
        } 
        print "</table>"; 
	print "<input type='submit' value='delete'/></form>";
	$checked = $_GET['options'];
	for($i=1; $i <= count($checked); $i++){
	    echo "Selected ".$i;
	}
        ?>
            </p>
            
             <div class="cleaner_with_height">&nbsp;</div>
            
            <a href="index.html"><img src="images/templatemo_ads.jpg" alt="css template ad" /></a>
            
        </div> <!-- end of content right -->
    
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
    <div id="templatemo_footer">
	       <a href="index.html">Home</a> | <a href="index.html">Search</a> | <a href="index.html">Books</a> | <a href="#">New Releases</a> | <a href="#">FAQs</a> | <a href="#">Contact Us</a><br />
        Copyright © 2024 <a href="#"><strong>Your Company Name</strong></a> | Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
	</div> <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
</body>
</html>
