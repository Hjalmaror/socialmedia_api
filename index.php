<!DOCTYPE html>
<html>
	<head>
		<title>Nacka Forum Showcase</title>
		<meta charset="utf-8">
		<meta name="author" content="Henrik Nilsson">
	</head>
	<body>
		<?php include "database/getPhotos.php"; ?>

		<table id='imgTable'>
			<tr>
			<?php
				foreach ($rows as $key => $value) {
					$link = $value["img_link"];
					echo "<div class='imgBox'>";
					echo "<img src='$link' style='height: 500px;'/>";
					echo "</div>";

					if (($key & 1) == 0) {
						echo("</tr><tr>");
					}
				}
			?>
			</tr>
		</table>
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="js/main.js"></script>
	</body>
</html>
	