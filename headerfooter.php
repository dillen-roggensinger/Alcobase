<?php 
class HeaderFooter{
	public function header(){
		echo "<html>\n
			<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\"><title>Alcobase</title><link href=\"Style.css\" rel=\"stylesheet\" type=\"text/css\"><style type=\"text/css\"><!--.style1 {font-family: Arial, Helvetica, sans-serif}--></style>\n
			</head><body>\n
			<div id=\"header\">\n
			<h1>ALCOBASE</h1>\n
			</div>\n
			<div>";
	}
	public function footer(){
		echo "</div>\n
			</body>\n
			</html>";
	}
}
?>
