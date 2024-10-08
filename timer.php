<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timer</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <script src="https://kit.fontawesome.com/9c8c1521b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <!--<link rel="stylesheet" href="../tools/toolstyle.css">-->
    <link rel="stylesheet" href="https://icons.cubing.net/css/cubing-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <link rel="manifest" href="/manifest.webmanifest">

<style>
.grid {
	display: grid;
	/*grid-template-columns: repeat(auto-fill, minmax(25px, 1fr));
	grid-template-rows: repeat(auto-fill, minmax(25px, 1fr));*/
	grid-template: repeat(auto-fill, minmax(25px, 1fr));
	grid-auto-rows: 1fr;
	gap: 5px;
}

#overlay {
	position: fixed;
	top: 0; left: 0; right: 0; bottom: 0;
	z-index: 2;
	display: none;
	width: 100%; height: 100%;
	background-color: rgba(0, 0, 0, 0.5);
}
</style>

</head>

<body>
	<div class="grid">
		<?php require 'timer/scramble-generator.php';
require 'timer/session.php';
require 'timer/times.php'?>
	</div>

	<div id="overlay"></div>
</body>

</html>
