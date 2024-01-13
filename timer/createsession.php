<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    button {
        cursor: pointer;
    }

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

    #cancelsession {
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
        top: 80%;
        rotate: y 90deg;
        transition: transform 0.2s ease-in-out;
        transform-origin: right;
    }

    #done {
        right: 2%;
    }

    #sessionback {
        right: 20%;
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
        <button id="cancelsession"
            onclick="document.getElementById('createsession').style.transform = 'rotateX(0deg)'"><i
                class="fa-solid fa-xmark"></i></button>
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
            <button id="sessionback"><i class="fa-solid fa-arrow-left"></i> Back</button>
            <button id="done"><i class="fa-solid fa-check"></i> Done</button>
        </div>
    </div>
</body>
<script>
    function cancelSession() {
        document.getElementById('createsession').style.transform = "rotateX(0deg)";
        setTimeout(function () {
            document.getElementById('nameerror').style.display = 'none';
            document.getElementById("sessionbigheader1").style.transform = 'rotateX(0deg)';
            document.getElementById("timerbuttondiv").style.transform = 'rotateX(0deg)';
            document.getElementById("trainerbuttondiv").style.transform = 'rotateX(0deg)';
            document.getElementById("sessionbigheader2").style.transition = 'transform 0s';
            document.getElementById("sessionname").style.transition = 'transform 0s';
            document.getElementById("done").style.transition = 'transform 0s';
            document.getElementById("sessionback").style.transition = 'transform 0s';
            document.getElementById("sessionbigheader2").style.transform = 'rotateY(0deg)';
            document.getElementById("sessionname").style.transform = 'rotateY(0deg)';
            document.getElementById("done").style.transform = 'rotateY(0deg)';
            document.getElementById("sessionback").style.transform = 'rotateY(0deg)';
            document.getElementById("sessionbigheader2").style.transition = 'transform 0.2s ease-in-out';
            document.getElementById("sessionname").style.transition = 'transform 0.2s ease-in-out';
            document.getElementById("done").style.transition = 'transform 0.2s ease-in-out';            
            document.getElementById("sessionback").style.transition = 'transform 0.2s ease-in-out';
            document.getElementById("sessionname").value = '';
        }, (150));
    }
    document.getElementById('cancelsession').addEventListener("click", cancelSession);

    document.getElementById('timerbutton').addEventListener("click", function () {
        flip(document.getElementById("sessionbigheader1"));
        setTimeout(function () {
            flip(document.getElementById("timerbuttondiv"));
            setTimeout(function () {
                flip(document.getElementById("trainerbuttondiv"));
                setTimeout(function () {
                    // document.getElementById('step2').style.transform = 'rotateY(-90deg)';
                    document.getElementById('sessionbigheader2').style.transform = 'rotateY(-90deg)';
                    setTimeout(function () {
                        document.getElementById('sessionname').style.transform = 'rotateY(-90deg)';
                        setTimeout(function () {
                            document.getElementById('done').style.transform = 'rotateY(-90deg)';
                            document.getElementById('createsession').addEventListener('keypress', function (e) {
                                if (e.key === 'Enter') {
                                    document.getElementById('done').click();
                                }
                            });
                            setTimeout(function () {
                                document.getElementById('sessionback').style.transform = 'rotateY(-90deg)';
                            }, (40));
                        }, (40));
                    }, (40));
                }, (100));
            }, (40));
        }, (40));
    });

    document.getElementById('trainerbutton').addEventListener("click", function () {
        flip(document.getElementById("sessionbigheader1"));
        setTimeout(function () {
            flip(document.getElementById("timerbuttondiv"));
            setTimeout(function () {
                flip(document.getElementById("trainerbuttondiv"));
                setTimeout(function () {
                    // document.getElementById('step2').style.transform = 'rotateY(-90deg)';
                    document.getElementById('sessionbigheader2').style.transform = 'rotateY(-90deg)';
                    setTimeout(function () {
                        document.getElementById('sessionname').style.transform = 'rotateY(-90deg)';
                        setTimeout(function () {
                            document.getElementById('done').style.transform = 'rotateY(-90deg)';
                            document.getElementById('createsession').addEventListener('keypress', function (e) {
                                if (e.key === 'Enter') {
                                    document.getElementById('done').click();
                                }
                            });
                            setTimeout(function () {
                                document.getElementById('sessionback').style.transform = 'rotateY(-90deg)';
                            }, (40));
                        }, (40));
                    }, (40));
                }, (100));
            }, (40));
        }, (40));
    });

    document.getElementById('sessionback').addEventListener("click", function() {
        document.getElementById('sessionback').style.transform = 'rotateY(0deg)';
        setTimeout(() => {
            document.getElementById('done').style.transform = 'rotateY(0deg)';
            setTimeout(() => {
                document.getElementById('sessionname').style.transform = 'rotateY(0deg)';
                setTimeout(() => {
                    document.getElementById('sessionbigheader2').style.transform = 'rotateY(0deg)';
                    setTimeout(() => {
                        document.getElementById("timerbuttondiv").style.transition = 'transform 0.2s ease-in-out';
                        document.getElementById("trainerbuttondiv").style.transition = 'transform 0.2s ease-in-out';
                        document.getElementById("trainerbuttondiv").style.transform = 'rotateY(0deg)';
                        setTimeout(() => {
                            document.getElementById("timerbuttondiv").style.transform = 'rotateY(0deg)';
                            setTimeout(() => {
                                document.getElementById("sessionbigheader1").style.transform = 'rotateY(0deg)';
                            }, 40);
                        }, 40);
                    }, 100);
                }, 40);
            }, 40);
        }, 40);
    });

    document.getElementById('done').addEventListener("click", function () {
        if (!document.getElementById('sessionname').value.match(/\S/))
            document.getElementById('nameerror').style.display = 'inline';
        else {
            document.getElementById('createsession').style.transform = 'rotateX(0deg)';
            setTimeout(function () {
                document.getElementById('nameerror').style.display = 'none';
                document.getElementById("sessionbigheader1").style.transform = 'rotateX(0deg)';
                document.getElementById("timerbuttondiv").style.transform = 'rotateX(0deg)';
                document.getElementById("trainerbuttondiv").style.transform = 'rotateX(0deg)';
                document.getElementById("sessionbigheader2").style.transition = 'transform 0s';
                document.getElementById("sessionname").style.transition = 'transform 0s';
                document.getElementById("done").style.transition = 'transform 0s';
                document.getElementById("sessionbigheader2").style.transform = 'rotateY(0deg)';
                document.getElementById("sessionname").style.transform = 'rotateY(0deg)';
                document.getElementById("done").style.transform = 'rotateY(0deg)';
                document.getElementById("sessionbigheader2").style.transition = 'transform 0.2s ease-in-out';
                document.getElementById("sessionname").style.transition = 'transform 0.2s ease-in-out';
                document.getElementById("done").style.transition = 'transform 0.2s ease-in-out';
                document.getElementById("sessionname").value = '';
                document.getElementById('cancelsession').style.display = "inline";
            }, (150));
        }
    })

    /*function showSessions() {
        if (sessionsShown === false) {
            document.querySelector('session').inverseFlip();
        }
    }*/
</script>

</html>