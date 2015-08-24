	<?php

		/* MYSQL CONNECTION INFO */
		$servera="";
		$username="";
		$pw="";
		$db="";
		
		/* INFO ABOUT MYSQL DATABASE */
		$table = "";
		$col_name = "";  /* COLUM NAME WHERE YOU WANT TO SAVE NAME OF IMAGE*/
		$dir = "";  /* DIRECTORY WHERE YOU SAVED PICTURES */
		
		/* INSTAGRAM INFO */
		$userid = "";
		$accessToken = "";
		
		
		
		$konekcija=mysqli_connect($servera,$username,$pw,$db);
	
		


		$get = file_get_contents("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}");
		$i=0;
		$result = json_decode($get,true);
		$novo = array();
		$slikav = "SELECT * FROM $table ORDER BY id DESC LIMIT 0, 1";
		$idemo=mysqli_query($konekcija,$slikav);
		$niz = mysqli_fetch_array($idemo);

		
		
		foreach ($result['data'] as $post): 
		
		
		
		if($post['images']['standard_resolution']['url'] != $niz['$col_name']){
			
			
			
				$novo[$i][0]=$post['images']['standard_resolution']['url'];
				$novo[$i][1]=$post['images']['thumbnail']['url'];
				$novo[$i][2]=$post['caption']['text'];
					
			$i++;
			
			}
			else { break;}
		
	
	endforeach; 
	
	$reversed = array_reverse($novo);
	
	for($j=0; $j<count($reversed); $j++){
			$url_v = $reversed[$j][0];
			$url_m = $reversed[$j][1];
			$opis =  $reversed[$j][2];
			$ime = explode(";", $opis);
			$n_ime = str_replace(' ', '_', $ime[0]);
			
			
			$insert_query="INSERT INTO $table VALUES('','$n_ime','$url_v')";
			$smor = mysqli_query($konekcija,$insert_query);	
			
			
			$img    = $n_ime.'.jpg';
			$img2    = $n_ime.'_mala'.'.jpg';
			$file   = file($url_v);
			$file2 = file($url_m);
			$save = file_put_contents($dir.$img, $file);
			$save2 = file_put_contents($dir.$img2, $file2);
	
	}
	echo "done";
	?>