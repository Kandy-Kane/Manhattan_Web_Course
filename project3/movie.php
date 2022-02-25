<!-- Frank Kane
Web Programming
Project 3
04/08/21 -->


<?php
		//variables
		$movie = $_GET["film"];
		$first_info = file_get_contents("$movie/info.txt");
		$first_overview = file_get_contents("$movie/overview.txt");
		$info = explode("\n", $first_info);
		$overview = explode("\n", $first_overview);
		$count = 0;
		$freshness = "";
		$freshAlt = "";
		
		//this sets the value for freshness and freshAlt
		if (intval($info[2]) >= 60){
				$freshness = "freshbig.png";
				$freshAlt = "Fresh";
			}
			else{
				$freshness = "rottenbig.png";
				$freshAlt = "Rotten";
			}
		
		//functions
		
		//this function displays the overview sidebar 
		function sidebar(){
			global $overview;
			foreach($overview as $row){
				$row = explode(":", $row);
				echo "<dt>{$row[0]}</dt><dd>{$row[1]}</dd>";
			}
		}
		
		//this function retrieves the review information
		function getReviews(){
			global $movie;
			global $count;
			$raw_review = array();
			foreach (glob("$movie/review*.txt") as $filename){
				$raw_review[$count] = file_get_contents("$filename");
				$count++;
			}
			for ($i=0;$i<$count;$i++){
				$review = explode("\n", $raw_review[$i]);
				displayReview($review,$i);
			}
		}
		
		//this function displays the review information
		function displayReview($review,$num){
			global $count;
			$num++;
			$review[1] = strtolower($review[1]);
			echo "<p class='review'>
						<img src='{$review[1]}.gif' alt='{$review[1]}' />
						<q>{$review[0]}</q>
				 </p>
				 <p class='reviewer'>
				 		<img src='critic.gif' alt='Critic' />
				 		{$review[2]}<br />
				 		{$review[3]}
				 </p>";
			if($num == ceil($count/2)){
			echo "</div>
				  <div class='column'>";
			}
		}			
	?>


<!doctype html>
<html>
	
	<head>
		<title>Rancid Tomatoes</title>

		<meta charset="utf-8" />
		<link href="movie.css" type="text/css" rel="stylesheet" />
		<link rel="icon" type="image/gif" href="rotten.gif" />
	</head>
	
	<body>
		<div class="banner">
			<img src="banner.png" alt="Rancid Tomatoes" />
		</div>

		<h1 id="title"><?echo "$info[0] ($info[1])";?></h1>
		
		<div id="overall"> <!-- Start of main section -->
		
			<div id="right"> <!-- Start of right section -->
				<div>
					<img id="overview_img" src="<?=$movie?>/overview.png" alt="general overview" />
				</div>

				<dl>
					<?php sidebar();?>
				</dl>

			</div> <!-- End of right section -->

			<div id="left"> <!-- Start of left section -->

				<div id="score">
					<img id="rotten" src="<?=$freshness?>" alt="<?=$freshAlt?>" />
					<?=$info[2]?>%
				</div>
				
				<div class="column"> <!-- Start of Reviews -->
					<?php getReviews();?>				
				</div> <!-- End of reviews -->
				<div id="aftercolumns"></div>

			</div> <!-- End of left section -->

				<p id="footer">(1- <?=$count?>) of <?=$count?></p>
		</div> <!-- End of main section -->
		
		<div id="validate">
		<p><a href="https://validator.w3.org/check?uri=https://turing.manhattan.edu/~fkane01/Manhattan_Web_Course/project3/movie.php"><img src="w3c-xhtml.png" alt="Valid HTML5" /></a> <br />
		<a href="http://jigsaw.w3.org/css-validator/validator?uri=https://turing.manhattan.edu/~fkane01/Manhattan_Web_Course/project3/movie.css"><img src="w3c-css.png" alt="Valid CSS" /></a></p>
			</div>

		</div>
	</body>
</html>
