<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timer</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <script src="https://kit.fontawesome.com/9c8c1521b1.js" crossorigin="anonymous"></script>

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
	#scramble-generator {
		grid-column: 1/-1;
		grid-row: 1/3;
		/*overflow: auto;*/
		background: var(--board1);
		padding: 5px;
	}

	#scramble-container {
		display: flex;
		background: var(--board2);
		grid-column: 2/-2;
		grid-row: 1/3;
		justify-content: center;
		align-items: center;
		text-align: center;
		font: 500 110% Nunito Sans;
	}

	#prev-scramble {
		grid-column: 1;
		grid-row: 1;
	}

	#next-scramble {
		grid-column: 1;
		grid-row: 2;
	}

	#copy-scramble {
		grid-column: -2;
		grid-row: 1;
	}

	#show-scramble-options {
		grid-column: -2;
		grid-row: 2;
	}
</style>

</head>

<body>
	<div class="grid" id="scramble-generator">
		<div id="scramble-container">
			R' U B' R U2 F2 D2 R U2 L2 R' U' B' F' R D L' B U D B' R2 U D' R'
		</div>
		<button class="scramble-button" id="prev-scramble"><i class="fa-solid fa-arrow-left"></i></button>
		<button class="scramble-button" id="next-scramble"><i class="fa-solid fa-arrow-right"></i></button>
		<button class="scramble-button" id="copy-scramble"><i class="fa-solid fa-copy"></i></button>
		<button class="scramble-button" id="show-scramble-options"><i class="cubing-icon event-333"></i></button>


	</div> <!--scramble-generator-->

</body>

</html>
