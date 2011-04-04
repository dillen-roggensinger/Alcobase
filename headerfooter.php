<?php 

/* 
 * Print header and footer for html pages
 */
function header(){
	echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\"http://www.w3.org/TR/html4/loose.dtd\">\n
		<html>\n
		<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\"><title>Alcobase</title><link href=\"Style.css\" rel=\"stylesheet\" type=\"text/css\"><style type=\"text/css\"><!--.style1 {font-family: Arial, Helvetica, sans-serif}--></style>
		</head><body>\n
		<div id=\"header\">\n
		<a href=\"index.html\"><h1>ALCOBASE</h1></a>
		</div>
		<div id=\"contents\">";
}

function footer(){
	echo "</div>\n
		</body>\n
		</html>";
}

?>