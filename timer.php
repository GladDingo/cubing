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
    <link rel="stylesheet" href="./tools/toolstyle.css">
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
    body {
	padding: 5px;
        overflow: hidden;
    }
    button {
        background: var(--board2);
        color: var(--fontcolor);
        border: 0;
    }

    button:hover {
        cursor: pointer;
    }

    input[type='text'],
    textarea {
        background: var(--board2);
        color: var(--fontcolor);
        border: 0;
        font-size: 150%;
        font-family: "Nunito Sans";
    }

    textarea:focus,
    input:focus {
        outline: 2px solid var(--fontcolor);
    }

	.grid {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(25px, 1fr));
		gap: 5px;
	}

	.grid div {
		background-color: var(--board2);
		color: var(--fontcolor);
		display: flex;
		justify-content: center;
		align-items: center;
		height: 25px;
		font-size: 16px;
		font-family: Nunito Sans;
	}
</style>

</head>


<body>
	<div class="grid">
    <!--<?php /*include "nav.html";
    include "timer/onscreentimer.php";
    include "timer/scramble-generator.php";
    include "timer/leftbar.php";
    include "timer/createsession.php";
    include "timer/tools/drawscramble.php";
    //include "settings.php"*/ ?>-->
		<div draggable="true">1</div>
		<div draggable="true">2</div>
		<div draggable="true">3</div>
		<div draggable="true">4</div>
		<div draggable="true">5</div>
	</div>
</body>

	    <script src="script.js">
	    <script src="timer/grid.js">

</html>
