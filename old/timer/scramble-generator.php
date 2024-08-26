<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/logo.png">
    <script src="https://kit.fontawesome.com/9c8c1521b1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="manifest" href="/manifest.webmanifest">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
</head>

<style>
    #scramble-generator {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(25px, 1fr));
	grid-template-rows: repeat(auto-fill, minmax(25px, 1fr));
	grid-gap: 5px;
        background: var(--board1);
        color: var(--fontcolor);
        display: flex;
        justify-content: space-between;
        /* Spacing between the scramble and buttons */
        align-items: center;
        /* Align vertically centered */
        font-family: "Nunito Sans";
        font-weight: 460;
        font-size: 180%;
	text-align: center;
	padding: 5px;
        /* Add padding as needed */
        /*position: absolute;
        top: 65px;
	right: 10px;*/
	grid-column: 1 / -1;
	grid-row: 1 / 10;
        /*width: 77.5%;*/
    }

    #scramble-container {
	grid-column: 1 / 3;
	grid-row: 1/-1;
        /*display: flex;
        align-items: center;
        /* Center vertically within the container */
        justify-content: flex-end;
        /* Align buttons to the far right */
        /*margin-right: 108px;
        /* Add margin to create space between scramble and buttons */
        /*width: 100%;
        /* Make the container span the entire width of the page */
	background: var(--board2);
    }

    #scramble-display {
	flex-grow: 1;
        /* Style for the scramble display area */
        /*width: 100%;*/
        /* Make the scramble display area span the entire width */
    }

    .scramble-buttons {
	background: var(--board2);
        color: var(--fontcolor);
        border-width: 0;
        padding: 10px;
        text-align: center;
        /*margin-right: 10px;
         Add margin to create space between buttons */
    }

    #copy {
	grid-column: 1;
	grid-row: 1;
    }

    #scramble-options {
        z-index: -1;
        background: var(--board1);
        color: var(--fontcolor);
        padding: 10px;
        font-size: 125%;
        text-align: center;
        /*position: absolute;
        top: 75px; /* transforms to 127px
	right: 10px;*/
	grid-column: 1/-1;
	grid-row: 2/2;
        font-family: "Nunito Sans";
        transition: all 0.1s ease-in-out;
        transform-origin: top center;
        /*display: flex;
	flex-direction: row;*/
    }

    #scramble-options input[type='number'],
    #scramble-options select {
        background: var(--board2);
        color: var(--fontcolor);
        border: 0;
        font: 500 100% "Nunito Sans";
    }

    #cubetype {
        background: var(--board2);
        color: var(--fontcolor);
    }
</style>

<body>
    <!--<?php include "scrambles/3x3.php" ?>-->
	<div id="scramble-generator">
		<div id="scramble-container">
			<div id="scramble-display">
		<!-- The generated scramble will be displayed here <button id="generate-button"
		    title="New scramble"><i class="fa-solid fa-arrow-rotate-right"></i></button>-->
			</div>
		</div>

		<!--BUTTONS-->

		<div><button class="scramble-buttons" id="copy" title="Copy" data-clipboard-target="#scramble-display"><i class="fa-solid fa-copy"></i></button></div>
		<div><button class="scramble-buttons" id="last-scramble" title="Previous scramble"><i class="fa-solid fa-arrow-rotate-left"></i></button></div>
		<div><button class="scramble-buttons" id="new-scramble" title="New scramble"><i
                        class="fa-solid fa-arrow-rotate-right"></i></button></div>
        <div><button class="scramble-buttons" id="show-scramble-options" title="Options"><!--<i class="fa-solid fa-ellipsis">--><i class="fa-solid fa-chevron-down"></i></button></div>




	</div>




    <div id="scramble-options">
        <div id="puzzletype">
            <label for="cubetype">Puzzle:</label>
            <select id="cubetype">
                <option id="3x3">3x3</option>
                <option id="megaminx">Megaminx</option>
            </select>
        </div>
        &nbsp;&nbsp;
        <div id="lengthofscrambles">
            <label for="scramblelength">Scramble length:</label>
            <input type="number" min="2" value="20">
        </div>
    </div>
</body>

<script>

    var scrambleOptionsShown = false;

    const moves = ["U", "U'", "U2", "D", "D'", "D2", "L", "L'", "L2", "R", "R'", "R2", "F", "F'", "F2", "B", "B'", "B2"];

    const newScramble = generateScramble();
    updateScrambleDisplay(newScramble);

    // Function to generate a random integer
    function getRandomInt(max) {
        return Math.floor(Math.random() * max);
    }

    // Function to generate a random scramble
    function generateScramble() {
        const scrambleLength = 20; // You can adjust this as needed
        let scramble = "";

        let previousMove = ""; // Initialize with an empty move

        // Define an array of disallowed pattern pairs
        const disallowedPatterns = [
            ["U", "D", "U"],
            ["U", "D", "U'"],
            ["U", "D", "U2"],
            ["U", "D'", "U"],
            ["U", "D'", "U'"],
            ["U", "D'", "U2"],
            ["U", "D2", "U"],
            ["U", "D2", "U'"],
            ["U", "D2", "U2"],
            ["U'", "D", "U"],
            ["U'", "D", "U'"],
            ["U'", "D", "U2"],
            ["U'", "D'", "U"],
            ["U'", "D'", "U'"],
            ["U'", "D'", "U2"],
            ["U'", "D2", "U"],
            ["U'", "D2", "U'"],
            ["U'", "D2", "U2"],
            ["U2", "D", "U"],
            ["U2", "D", "U'"],
            ["U2", "D", "U2"],
            ["U2", "D'", "U"],
            ["U2", "D'", "U'"],
            ["U2", "D'", "U2"],
            ["U2", "D2", "U"],
            ["U2", "D2", "U'"],
            ["U2", "D2", "U2"],

            ["L", "R", "L"],
            ["L", "R", "L'"],
            ["L", "R", "L2"],
            ["L", "R'", "L"],
            ["L", "R'", "L'"],
            ["L", "R'", "L2"],
            ["L", "R2", "L"],
            ["L", "R2", "L'"],
            ["L", "R2", "L2"],
            ["L'", "R", "L"],
            ["L'", "R", "L'"],
            ["L'", "R", "L2"],
            ["L'", "R'", "L"],
            ["L'", "R'", "L'"],
            ["L'", "R'", "L2"],
            ["L'", "R2", "L"],
            ["L'", "R2", "L'"],
            ["L'", "R2", "L2"],
            ["L2", "R", "L"],
            ["L2", "R", "L'"],
            ["L2", "R", "L2"],
            ["L2", "R'", "L"],
            ["L2", "R'", "L'"],
            ["L2", "R'", "L2"],
            ["L2", "R2", "L"],
            ["L2", "R2", "L'"],
            ["L2", "R2", "L2"],

            ["F", "B", "F"],
            ["F", "B", "F'"],
            ["F", "B", "F2"],
            ["F", "B'", "F"],
            ["F", "B'", "F'"],
            ["F", "B'", "F2"],
            ["F", "B2", "F"],
            ["F", "B2", "F'"],
            ["F", "B2", "F2"],
            ["F'", "B", "F"],
            ["F'", "B", "F'"],
            ["F'", "B", "F2"],
            ["F'", "B'", "F"],
            ["F'", "B'", "F'"],
            ["F'", "B'", "F2"],
            ["F'", "B2", "F"],
            ["F'", "B2", "F'"],
            ["F'", "B2", "F2"],
            ["F2", "B", "F"],
            ["F2", "B", "F'"],
            ["F2", "B", "F2"],
            ["F2", "B'", "F"],
            ["F2", "B'", "F'"],
            ["F2", "B'", "F2"],
            ["F2", "B2", "F"],
            ["F2", "B2", "F'"],
            ["F2", "B2", "F2"],

            ["D", "U", "D"],
            ["D", "U", "D'"],
            ["D", "U", "D2"],
            ["D", "U'", "D"],
            ["D", "U'", "D'"],
            ["D", "U'", "D2"],
            ["D", "U2", "D"],
            ["D", "U2", "D'"],
            ["D", "U2", "D2"],
            ["D'", "U", "D"],
            ["D'", "U", "D'"],
            ["D'", "U", "D2"],
            ["D'", "U'", "D"],
            ["D'", "U'", "D'"],
            ["D'", "U'", "D2"],
            ["D'", "U2", "D"],
            ["D'", "U2", "D'"],
            ["D'", "U2", "D2"],
            ["D2", "U", "D"],
            ["D2", "U", "D'"],
            ["D2", "U", "D2"],
            ["D2", "U'", "D"],
            ["D2", "U'", "D'"],
            ["D2", "U'", "D2"],
            ["D2", "U2", "D"],
            ["D2", "U2", "D'"],
            ["D2", "U2", "D2"],

            ["R", "L", "R"],
            ["R", "L", "R'"],
            ["R", "L", "R2"],
            ["R", "L'", "R"],
            ["R", "L'", "R'"],
            ["R", "L'", "R2"],
            ["R", "L2", "R"],
            ["R", "L2", "R'"],
            ["R", "L2", "R2"],
            ["R'", "L", "R"],
            ["R'", "L", "R'"],
            ["R'", "L", "R2"],
            ["R'", "L'", "R"],
            ["R'", "L'", "R'"],
            ["R'", "L'", "R2"],
            ["R'", "L2", "R"],
            ["R'", "L2", "R'"],
            ["R'", "L2", "R2"],
            ["R2", "L", "R"],
            ["R2", "L", "R'"],
            ["R2", "L", "R2"],
            ["R2", "L'", "R"],
            ["R2", "L'", "R'"],
            ["R2", "L'", "R2"],
            ["R2", "L2", "R"],

            ["B", "F", "B"],
            ["B", "F", "B'"],
            ["B", "F", "B2"],
            ["B", "F'", "B"],
            ["B", "F'", "B'"],
            ["B", "F'", "B2"],
            ["B", "F2", "B"],
            ["B", "F2", "B'"],
            ["B", "F2", "B2"],
            ["B'", "F", "B"],
            ["B'", "F", "B'"],
            ["B'", "F", "B2"],
            ["B'", "F'", "B"],
            ["B'", "F'", "B'"],
            ["B'", "F'", "B2"],
            ["B'", "F2", "B"],
            ["B'", "F2", "B'"],
            ["B'", "F2", "B2"],
            ["B2", "F", "B"],
            ["B2", "F", "B'"],
            ["B2", "F", "B2"],
            ["B2", "F'", "B"],
            ["B2", "F'", "B'"],
            ["B2", "F'", "B2"],
            ["B2", "F2", "B"],
            ["B2", "F2", "B'"],
            ["B2", "F2", "B2"]

        ];


        for (let i = 0; i < scrambleLength; i++) {
            const randomMoveIndex = getRandomInt(moves.length);
            const currentMove = moves[randomMoveIndex];

            // Check for consecutive redundant moves
            if (i > 0 && currentMove.charAt(0) === previousMove.charAt(0)) {
                i--; // Retry this iteration to generate a different move
                continue;
            }

            // Check for disallowed patterns
            if (
                i > 1 &&
                disallowedPatterns.some(pattern => {
                    return (
                        currentMove.charAt(0) === pattern[0] &&
                        previousMove.charAt(0) === pattern[1]
                    );
                })
            ) {
                i--; // Retry this iteration to generate a different move
                continue;
            }

            scramble += currentMove + " ";
            previousMove = currentMove;
        }

        return scramble.trim();
    }

    ////

    document.addEventListener('DOMContentLoaded', function () {
        var clipboard = new ClipboardJS('#copy');
        var sessionsShown = false;

        clipboard.on('success', function (e) {
            console.log('Scramble copied:', e.text);
            e.clearSelection();
        });

        clipboard.on('error', function (e) {
            console.error('Failed to copy text:', e.text);
        });
    });

    let scrambleGeneratedManually = false;

    // Function to update the scramble display on the webpage
    function updateScrambleDisplay(scramble) {
        const scrambleDisplay = document.getElementById("scramble-display");
        scrambleDisplay.textContent = scramble;
    }

    document.getElementById("new-scramble").addEventListener("click", function () {
        const newScramble = generateScramble();
        updateScrambleDisplay(newScramble);
        document.getElementById('copy').innerHTML = '<i class="fa-solid fa-copy"></i>';
        document.getElementById('copy').setAttribute('title', "Copy");
    });

    document.getElementById("copy").addEventListener("click", function () {
        this.innerHTML = '<i class="fa-solid fa-check"></i>';
        this.setAttribute('title', "Copied!");
    })

    document.getElementById("show-scramble-options").addEventListener("click", function () {
        if (scrambleOptionsShown === false) {
            document.getElementById("scramble-options").style.top = "127px";
            setTimeout(() => {
                document.getElementById("scramble-options").style.top = "120px";
            }, 100);
            scrambleOptionsShown = true;
        } else {
            document.getElementById("scramble-options").style.transform = "rotateX(0deg)";
            scrambleOptionsShown = false;
        }
    })



    var windowWidth = window.innerWidth;
    document.getElementById("scramble-container").style.width = (windowWidth - 480) + "px";
    document.getElementById("scramble-options").style.width = (windowWidth - 280) + "px";

    window.addEventListener('resize', function () {
        windowWidth = window.innerWidth;
        document.getElementById("scramble-container").style.width = (windowWidth - 480) + "px";
        document.getElementById("scramble-options").style.width = (windowWidth - 280) + "px";
    })

    if(document.getElementById("scramble-generator").scrollHeight > document.getElementById("scramble-generator)").scrollHeight) {
	alert("TESTING!");
	document.getElementById("left-scramble-buttons").style.flexDirection = "column";
    }
</script>

</html>
