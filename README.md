<h1>Instagram Gallery</h1>
Gallery made with picture from instagram,with Instagram API.

Pictures are saved directly to hosting and MySQL database from Instagram account,because showing images directly from Instagram was too slow.

<h4>Name</h4>
In description of instagram picture, name will be everything before first ; <br/>
example :     King Energy;  This is very good energy.<br/>
So "King energy" will be name that will be saved to database.

<h4>What are we saving and where?</h4>

We are saving original size and thumbnail image to directory of your hosing.<br/>
We are saving picutre name(as explained before) and url(this is used to know what was the last image that you imported) of picture to database.

<h4>What does it do?</h4>
index.php will access database table and show all images from tabel.

When ever you run script.php new images(if there are some new images) will be saved in your directory and in your database you will save name of image ( as explained before) and picture url.

I added my script.php to crontab so I don't have to worry about it.

<h1>NOTE:</h1>
This was made for new instagram account or for accounts with less than 20 pictures,if you instagram account has more than 20 picutres this won't work,because you can grab only recent 20 pictures.

You can edit it, and grab next_max_id and get other pictures but I did not need it so i didn't add it.

<h1>What you have to edit</h1>
For this to work you will have to edit index.php and script.php and change info :

        $servera="";   MYSQL HOST
		$username="";  MYSQL USERNAME
		$pw="";        MYSQL PASSWORD
		$db="";        MYSQL DATABASE
		
		
		$table = "";   MYSQL TABLE THAT YOU WILL USE
		$col_name = "";  In index.php this is column in your table where you saved your name or the stuff beofre ; 
		$col_name = "";  In script.php this is column in your table where you saved your url of picture; 
		
		$dir = "";  /* DIRECTORY WHERE YOU SAVE PICTURES */
		
		/* INSTAGRAM INFO */
		$userid = "";
		$accessToken = "";
