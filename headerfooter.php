<?php 
class HeaderFooter{
	public function header(){
		echo "<html>\n
			<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
			<title>Alcobase</title><link href=\"Style.css\" rel=\"stylesheet\" type=\"text/css\">
			<style type=\"text/css\"><!--.style1 {font-family: Arial, Helvetica, sans-serif}--></style>\n
			<script language='javascript' type='text/javascript'>
			function limitText(limitField, limitCount, limitNum) {
				if (limitField.value.length > limitNum) {
					limitField.value = limitField.value.substring(0, limitNum);
				} else {
					limitCount.value = limitNum - limitField.value.length;
				}
			}
			</script>
			</head><body>\n
			<div id='header'>\n
			<h1><a href='index.php'>ALCOBASE</a></h1>\n
			<h3><a href='login.php'>Login</a>&nbsp;&nbsp;&nbsp;
			<a href='account.php'>Account</a>&nbsp;&nbsp;&nbsp;
			<a href='browse.php'>Browse</a>&nbsp;&nbsp;&nbsp;
			<a href='search.php'>Search</a>&nbsp;&nbsp;&nbsp;
			<a href='signup.php'>Sign Up</a>&nbsp;&nbsp;&nbsp;
			<a href='passr.php'>Reset Password</a></h3>
			</div>\n
			<div id='contents'>\n
			<p> </p>";
	}
	public function footer(){
		echo "</div>\n
			</body>\n
			</html>";
	}
}
?>
