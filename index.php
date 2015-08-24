<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="jquery.fancybox-1.3.4.css" type="text/css">
	<script type='text/javascript' src='jquery.min.js'></script>
	<script type='text/javascript' src='jquery.fancybox-1.3.4.pack.js'></script>
	<script type="text/javascript">
		$(function() {
			$("a.group").fancybox({
				'nextEffect'	:	'fade',
				'prevEffect'	:	'fade',
				'overlayOpacity' :  0.8,
				'overlayColor' : '#000000',
				'arrows' : false,
			});			
		});
	</script>

	<?php
	
		/* MYSQL CONNECTION INFO */
		$servera="";
		$username="";
		$pw="";
		$db="";
		
		/* INFO ABOUT MYSQL DATABASE */
		$table = "";
		$col_name = ""; /* COLUM NAME WHERE YOU SAVED IMAGES*/
		$dir = "";  /* DIRECTORY WHERE YOU SAVED PICTURES */
		
		$konekcija=mysqli_connect($servera,$username,$pw,$db);
		
		$ext = ".jpg";
		$mala = "_mala";
		
		$rezultat = mysqli_query($konekcija,"SELECT * FROM $table ");
											while($niz1 = mysqli_fetch_array($rezultat))         
                                            {	

	

	echo	"<a class='group' rel='group1' href='".$dir.$niz1['$col_name'].$ext."'><img src='".$dir.$niz1['$col_name'].$mala.$ext."'></a>";
		
											}?>
</html>