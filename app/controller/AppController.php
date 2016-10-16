<?php
session_start();
require(SITE_PATH."/../lib/Controller.php");
class AppController extends Controller 
{   
	public function __construct()
	{
		echo "";
	}

	public function common_signup_form()
	{
	}
	public function google_search()
	{
		echo " <script>
		(function() {
			var cx = '017221613782724336519:s9ib5q__zfw';
			var gcse = document.createElement('script');
			gcse.type = 'text/javascript';
			gcse.async = true;
			gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
			'//cse.google.com/cse.js?cx=' + cx;
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(gcse, s);
		})();
</script>
<gcse:search> </gcse:search>";
}
public function news_published()
{
	?>
	<form method="POST" enctype="multipart/form-data">
		<input type="test" name="new_title" >
	</form>
	<?php
}
}
?>