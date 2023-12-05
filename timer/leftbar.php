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
        height: 90%;
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

    #sessiondropdown button {
        width: 120px;
        background: var(--board2);
        display: flex;
    }
</style>

<body>
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
                <button onclick="showSessions()">3x3</button>
                <div class="dropdown-content" id="sessions">
                    <button class="session">2x2</button>
                    <button class="session">Megaminx</button>
                    <button class="session">Square-1</button>
                </div>
            </div>
            <button id="addsession"><i class="fa-solid fa-plus"></i></button>
        </div>
        <table>
            <tr>time</tr>
            <tr>mo3</tr>
            <tr>ao5</tr>
            <tr>ao12</tr>
        </table>
    </div>
</body>
<script>
    document.getElementById('addsession').addEventListener("click", function (e) {
        document.getElementById('cancelsession2').style.display = "none";
        flip(document.getElementById("createsession"));
        /*setTimeout(function() {
                if (document.getElementById('createsession').contains(e.target)){
                    alert("Clicked in Box");
                } else {
                    inverseFlip(document.getElementById('createsession'));
                }
        }, (1));*/
    })
</script>

</html>