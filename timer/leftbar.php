<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    #stats {
        background: var(--board1);
        position: absolute;
        top: 65px;
        left: 10px;
        padding: 10px;
        font: 500 110% "Nunito";
        display: flex;
        flex-direction: column;
    }

    #stats button,
    #stats select {
        background: var(--board2);
        color: var(--fontcolor);
        border: 0;
        padding: 5px;
        font: 500 110% "Nunito";
    }

    #stats button {
        width: 35px;
        height: 35px;
    }

    #stats select {
        width: 100px;
        height: 35px;
    }

    #sessionstuff {
        display: flex;
        flex-direction: row;
        gap: 5px;
    }

    #sessiondropdown {
        z-index: 5;
    }

    #sessiondropdown button {
        width: 120px;
        background: var(--board2);
        display: flex;
    }

    table,
    th,
    td {
        background: var(--board2);
    }

    table {
        display: flex;
        gap: 5px;
        justify-content: center;
        position: fixed;
        top: 120px;
    }

    #session1,
    #session2,
    #session3 {
        transition: transform 0.1s ease-in-out;
        rotate: x 90deg;
    }
</style>

<body>
    <?php include "createsession.php" ?>
    <div id="stats">
        <div id="sessionstuff">
            <!--Session:-->
            <button id="nukesession"><i class="fa-solid fa-bomb"></i></button>
            <!--<button id="nukesession"><i class="fa-solid fa-xmark"></i></button>-->
            <!--<select name="sessions">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>-->
            <div id="sessiondropdown">
                <button id="dropdown-select">3x3</button>
                <div class="dropdown-content" id="sessions">
                    <button class="session" id="session1">2x2</button>
                    <button class="session" id="session2">Megaminx</button>
                    <button class="session" id="session3">Square-1</button>
                </div>
            </div>
            <button id="addsession"><i class="fa-solid fa-plus"></i></button>
        </div>
        <table id="times">
            <tr>
                <th>time</th>
                <th>mo3</th>
                <th>ao5</th>
                <th>ao12</th>
            </tr>
        </table>
    </div>
</body>

<script src="script.js"></script>

<script>

    var allSessionsShown = false;
    document.getElementById('addsession').addEventListener("click", function (e) {
        inverseFlip(document.getElementById("createsession"));
        setTimeout(() => {
            inverseFlip(document.getElementById("sessionbigheader1"));
            setTimeout(() => {
                inverseFlip(document.getElementById("timerbuttondiv"));
                setTimeout(() => {
                    inverseFlip(document.getElementById("trainerbuttondiv"));
                }, 40);
            }, 40);
        }, 40);
    })
    
    var windowHeight = window.innerHeight;
    document.getElementById("stats").style.height = (windowHeight - 100) + "px";

    window.addEventListener('resize', function() {
        windowHeight = window.innerHeight;
        document.getElementById("stats").style.height = (windowHeight - 100) + "px";
    });

    function showSessions() {
        if (allSessionsShown === false) {
            inverseFlip(document.getElementById("session1"));
            setTimeout(function () {
                inverseFlip(document.getElementById("session2"));
                setTimeout(function () {
                    inverseFlip(document.getElementById("session3"));
                }, 40);
            }, 40);
            allSessionsShown = true;
        }

        else {
            document.getElementById("session3").style.transform = 'rotateX(0deg)';
            setTimeout(function () {
                document.getElementById("session2").style.transform = 'rotateX(0deg)';
                setTimeout(function () {
                    document.getElementById("session1").style.transform = 'rotateX(0deg)';
                }, 40);
            }, 40);
            allSessionsShown = false;
        }

    }
    document.getElementById("dropdown-select").addEventListener("click", function () {
        showSessions();
    }) 
</script>

</html>