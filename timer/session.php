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
	#session-manager {
		background: var(--board1);
		grid-column: 1/8;
		grid-row: 3/6;
		padding: 5px;
	}

	#select-session {
		grid-column: 1/-1;
		grid-row: 1;
		font: 500 100% Nunito Sans;
	}

	#new-session {
		grid-column: 1/4;
		grid-row: 2;
		font: 600 80% Nunito;
	}

	#clear-session {
		grid-column: 4/7;
		grid-row: 2;
		font: 600 80% Nunito;
	}

	#delete-session {
		grid-column: 1/4;
		grid-row: 3;
		font: 600 80% Nunito;
	}

	#rename-session {
		grid-column: 4/7;
		grid-row; 3;
		font: 600 80% Nunito;
	}

	#time-list {
		grid-column: 1/-1;
		grid-row: 4/-1;
		background: var(--board2);
	}
</style>

</head>

<body>
	<div class="grid" id="session-manager">
		<button id="select-session">session</button>
		<button id="new-session"><i class="fa-solid fa-plus"></i> New</button>
		<button id="clear-session"><i class="fa-solid fa-bomb"></i> Clear</button>
		<button id="delete-session"><i class="fa-solid fa-dumpster-fire"></i> Delete</button>
		<button id="rename-session"><i class="fa-solid fa-i-cursor"></i> Rename</button>
	</div>
</body>

</html>
