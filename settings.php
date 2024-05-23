<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
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
</head>

<style>
    .settingheader {
        background: var(--board1);
        text-align: center;
        padding: 5px;
        font: 720 200% "Nunito";
    }

    .setting {
        background: var(--board1);
        color: var(--fontcolor);
        font: 500 125% "Nunito Sans";
        text-align: center;
        padding: 20px;
        width: 50%;
        height: 200px;
        display: flex;
        flex-direction: column;
    }

    .container {
        display: flex;
        flex-direction: row;
        gap: 10px;
        padding: 10px;
        justify-content: center;
    }

    #timertype input[type='radio']+label {
        display: flex;
    }

    #timertype input[type='radio']:checked+label {
        border: 2px white;
    }

    .dragarea {
        display: flex;
        gap: 20px;
    }

    #timerdecimaldragarea {
        position: relative;
        top: 10px;
    }

    .numbercard {
        background: var(--board2);
        font: 600 600% "Nunito";
        width: 180px !important;
    }

    #searchsettings {
	background: var(--board1);
	width: 100%;
	font: 550 150% "Nunito Sans";
    }

    ::-webkit-input-placeholder {
	font-style: italic;
    }
    ::-moz-placeholder {
	font-style: italic;
    }
</style>

<body>
    <?php include "nav.html" ?>
    <h1>Settings</h1>
    <input type="text" id="searchsettings" placeholder="Search..."></input>
    <div class="settingheader">
        TIMER
    </div>
    <div class="container">
        <div class="setting" id="timertype">
            <input type="radio" name="timerinput" id="onscreeninput">
            <label for="onscreeninput">On-screen</label>
            <input type="radio" name="timerinput" id="keyboardinput">
            <label for="keyboardinput">Keyboard</label>
            <input type="radio" name="timerinput" id="stackmatinput">
            <label for="stackmatinput">Stackmat</label>
        </div>
        <div class="setting">
            <label for="timerdigits">Timer decimal places:</label>
            <!--<input type="number" min="0" max="5" name="timerdigits" id="timerdigits">
            <button class="increment" id="decimalincrement"><i class="fa-solid fa-plus"></i></button>
            <button class="decrement" id="decimaleecrement"><i class="fa-solid fa-minus"></i></button>-->
            <div class="dragarea" id="timerdecimaldragarea">
                <div class="numbercard" id="lefttimerdeccard1">0</div>
                <div class="numbercard" id="lefttimerdeccard1">1</div>
                <div class="numbercard" id="maintimerdeccard">2</div>
                <div class="numbercard" id="lefttimerdeccard1">3</div>
                <div class="numbercard" id="lefttimerdeccard1">4</div>
                <div class="numbercard" id="lefttimerdeccard1">5</div>
            </div>
        </div>
    </div>
</body>

</html>
