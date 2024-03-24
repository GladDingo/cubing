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

    #sessiondropdown button,
    #sessioncontextmenu button {
        z-index: 5;
        width: 120px;
        background: var(--board2);
        color: var(--fontcolor);
        border: 0;
        padding: 5px;
        font: 500 110% "Nunito";
        display: flex;
        justify-content: center;
        overflow: hidden;
    }

    th,
    td {
        background: var(--board2);
        padding: 5px;
    }

    table {
        text-align: center;
        position: fixed;
        top: 150px;
        left: 16px;
        border-collapse: separate;
        border-spacing: 5px;
        background-color: var(--board1);
    }

    #session1,
    #session2,
    #session3 {
        transition: transform 0.1s ease-in-out;
        rotate: x 90deg;
    }

    #counter {
        font: 750 italic 125% "Nunito";
        align-self: center;
        position: fixed;
        top: 120px;
    }

    #sessioncontextmenu {
        z-index: 6 !important;
        position: fixed;
        display: flex;
        gap: 5px;
    }

    #sessioncontextmenu button {
        rotate: y 90deg;
        transition: transform 0.15s ease-in-out;
        transform-origin: left;
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
                <button id="dropdown-select">longsessionname!</button>
                <div class="dropdown-content" id="sessions">
                    <div id="session1div">
                        <button id="session1">2</button>
                    </div>
                    <div id="session2div">
                        <button id="session2">3</button>
                    </div>
                    <div id="session3div">
                        <button id="session3">4</button>
                    </div>
                </div>
            </div>
            <button id="addsession"><i class="fa-solid fa-plus"></i></button>
        </div>
        <span id="counter">0/0 solves</span>
        <table id="times">
            <tr>
                <th>time</th>
                <th>mo3</th>
                <th>ao5</th>
                <th>ao12</th>
            </tr>
            <tr data='1'>
                <td class="times">6.66</td>
                <td class="times">N/A</td>
                <td class="times">N/A</td>
                <td class="times">N/A</td>
            </tr>
        </table>
    </div>
    <div id="sessioncontextmenu">
        <button id="rename">Rename</button>
        <button id="delete">Delete</button>
    </div>
</body>

<script src="script.js"></script>

<script>
    let times = document.getElementById("times");

    function checkOverflow(element) {
        if (element.scrollWidth > element.clientWidth) {
            element.style.justifyContent = "left";

        }
    }

    checkOverflow(document.getElementById("dropdown-select"));
    checkOverflow(document.getElementById("session1"));
    checkOverflow(document.getElementById("session2"));
    checkOverflow(document.getElementById("session3"));

    var allSessionsShown = false;
    document.getElementById('addsession').addEventListener("click", function (e) {
        flip(document.getElementById("createsession"));
        setTimeout(() => {
            inverseFlip(document.getElementById("sessionbigheader1"));
            setTimeout(() => {
                inverseFlip(document.getElementById("timerbuttondiv"));
                setTimeout(() => {
                    inverseFlip(document.getElementById("trainerbuttondiv"));
                    setTimeout(() => {
                        inverseFlip(document.getElementById("untimedbuttondiv"));
                    }, 40);
                }, 40);
            }, 40);
        }, 40);
    })

    var windowHeight = window.innerHeight;
    document.getElementById("stats").style.height = (windowHeight - 100) + "px";

    window.addEventListener('resize', function () {
        windowHeight = window.innerHeight;
        document.getElementById("stats").style.height = (windowHeight - 100) + "px";
    });

    document.getElementById("dropdown-select").addEventListener("click", function () {
        if (allSessionsShown === false) {
            inverseFlip(document.getElementById("session1"));
            setTimeout(function () {
                inverseFlip(document.getElementById("session2"));
                setTimeout(function () {
                    inverseFlip(document.getElementById("session3"));
                }, 40);
            }, 40);
            allSessionsShown = true;
        } else {
            document.getElementById("session3").style.transform = 'rotateX(0deg)';
            setTimeout(function () {
                document.getElementById("session2").style.transform = 'rotateX(0deg)';
                setTimeout(function () {
                    document.getElementById("session1").style.transform = 'rotateX(0deg)';
                }, 40);
            }, 40);
            allSessionsShown = false;
        }
    })

    var sessioncontextmenuClicked = false;

    document.getElementById("session1").addEventListener('contextmenu', function (event) {
        // Your code to run when the button is right-clicked
        if (sessioncontextmenuClicked === false) {
            document.getElementById("sessioncontextmenu").style.left = "185px"; // 60 + 120 + 5/*(document.getElementById("session1").style.left + document.getElementById("session1").style.width + 5).toString();*/
            document.getElementById("sessioncontextmenu").style.top = "109px";
            document.getElementById("rename").style.transform = "rotateY(-90deg)";
            setTimeout(() => {
                document.getElementById("delete").style.transform = "rotateY(-90deg)";
            }, 50);

            sessioncontextmenuClicked = true;
        } else {
            document.getElementById("delete").style.transform = "rotateY(0deg)";
            document.getElementById("rename").style.transform = "rotateY(0deg)";
            sessioncontextmenuClicked = false;
        } document.addEventListener('click', function (event) {
            document.getElementById("delete").style.transform = "rotateY(0deg)";
            document.getElementById("rename").style.transform = "rotateY(0deg)";


            sessioncontextmenuClicked = false;
        })

        event.preventDefault(); // Prevent the default right-click menu from showing

        if(window.innerHeight > window.innerWidth) {
            document.getElementById("stats").style.left = "100px";
        }
    });

</script>

</html>