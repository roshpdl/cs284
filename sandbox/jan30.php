<!DOCTYPE html>

<html lang="en">

	<head>

	    <title>Jan30 stuff</title>

	</head>


	<body>
		<div>
			<?php
			// $x = "Hello, ";
			// $y = "world";
			// $z = $x . $y;
			// $w = 2;
			// $q = 9;
			// $sum = $w + 4 * $q;
			// print "<p>$sum</p>";
			// print "<p>$z</p>";

			// for ($i = 0; $i < 20; $i++) {
			// 	print "whatever<br>";
			// }

			$list_of_stuff = array('this', 'that', 'the other');

			for ($i = 0; $i < 3; $i++){
				print "$list_of_stuff[$i]" . strlen($list_of_stuff[$i]) . "<br>";
			}

			?>


		</div>	
	</body>

</html>
