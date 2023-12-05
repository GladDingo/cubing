<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    #createsession {
        background: var(--board1);
        color: var(--fontcolor);
        width: 550px;
        display: flex;
        flex-direction: column;
        padding: 20px;
        gap: 20px;
        position: absolute;
        top: 30%;
        left: 30%;
        rotate: x -90deg;
        transition: transform 0.15s ease-in-out;
        transform-origin: center;
    }

    #timerbutton,
    #trainerbutton {
        width: 100%;
        background: var(--board2);
        color: var(--fontcolor);
        border: 0;
        padding: 10px;
        display: flex;
        flex-direction: column;
        text-align: left;
    }

    #timerbuttondiv,
    #trainerbuttondiv {
        transition: transform 0.1s ease-in-out;
        transform-origin: top center;
    }

    #cancelsession,
    #cancelsession2 {
        background: var(--board2);
        color: var(--fontcolor);
        border: 0;
        width: 36px;
        padding: 7px;
        text-align: center;
        font-size: 125%;
        position: fixed;
    }

    #sessionbigheader1,
    #sessionbigheader2 {
        font: 350 300% "Nunito";
        text-align: center;
    }

    #sessionbigheader1 {
        transform-origin: top center;
        transition: transform 0.1s ease-in-out;
    }

    #sessionbigheader2 {
        transition: transform 0.2s ease-in-out;
        rotate: y 90deg;
        transform-origin: right;
    }

    sessionheader {
        font: 800 150% "Nunito Sans";
    }

    sessiontext {
        font: 500 120% "Nunito Sans";
    }


    #step2 {
        position: absolute;
        top: 7%;
        left: 15%;
        display: flex;
        flex-direction: column;
        text-align: center;
        justify-content: center;
    }

    #step2 button {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 5px;
        padding: 6px;
        font: 650 125% "Nunito";
        width: 100px;
        position: fixed;
        right: 2%;
        top: 80%;
        rotate: y 90deg;
        transition: transform 0.2s ease-in-out;
        transform-origin: right;
    }

    #step2 input[type='text'] {
        rotate: y 90deg;
        transition: transform 0.2s ease-in-out;
        transform-origin: right;
    }

    #nameerror {
        color: red;
        font: 600 110% "Nunito Sans";
        display: none;
    }
</style>

<body>
    <div id="createsession">
        <button id="cancelsession"><i class="fa-solid fa-xmark"></i></button>
        <button id="cancelsession2"><i class="fa-solid fa-xmark"></i></button>
        <div id="sessionbigheader1">Create session</div>
        <div id="timerbuttondiv">
            <button id="timerbutton">
                <sessionheader>Timer</sessionheader>
                <sessiontext>Optimized for timing solves.</sessiontext>
            </button>
        </div>
        <div id="trainerbuttondiv">
            <button id="trainerbutton">
                <sessionheader>Trainer</sessionheader>
                <sessiontext>Optimized for training algorithms.</sessiontext>
            </button>
        </div>
        <div id="step2">
            <div id="sessionbigheader2">Name your session</div>
            <input type="text" name="sessionname" id="sessionname">
            <span id="nameerror">ERROR: Session must have a name.</span>
            <!--<h2>Puzzle:</h2>
                <input type="radio" class="puzzle" id="2x2"><i class="cubing-icon event-222"></i>2x2</button>
                <input type="radio" class="puzzle" id="3x3"><i class="cubing-icon event-333"></i>3x3</button>
                <input type="radio" class="puzzle" id="4x4"><i class="cubing-icon event-444"></i>4x4</button>
                <input type="radio" class="puzzle" id="pyram"><i class="cubing-icon event-pyram"></i>Pyraminx</button>
                <input type="radio" class="puzzle" id="skewb"><i class="cubing-icon event-skewb"></i>Skewb</button>
                <input type="radio" class="puzzle" id="sq1"><i class="cubing-icon event-sq1"></i>Square-1</button>-->
            <button id="done" onclick="flip(document.getElementById('createsession'))"><span id="testspan"><i
                        class="fa-solid fa-check"></i> Done</span></button>
        </div>
    </div>
</body>
<script>
    
</script>

</html>