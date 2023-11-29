<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    <link rel="stylesheet" href="style.css">
</head>
<style>
    #timer {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 90vh;
        font: 800 italic 1000% "Nunito Sans";
        color: var(--fontcolor);
    }
</style>

<body>
    <div id="timer"><span id="hr">00</span><!----><span class="txt" id="hrLabel">:</span><!----><span
            id="min">00</span><!----><span id="minLabel">:</span><!----><span id="sec">0</span><!----><span
            id="decimalpoint">.</span><!----><span id="count">00</span></div>
</body>

<script>
    let startTime;
    let timerInterval;
    let spacebarHeldStartTime = null;
    let timerRunning = false;
    const holdThreshold = 550;

    document.body.addEventListener('keydown', function (event) {
        if (event.key === ' ' && !spacebarHeldStartTime) {
            document.getElementById('timer').style.color = 'red';
            spacebarHeldStartTime = new Date().getTime();
        } else
            if (spacebarHeldStartTime >= holdThreshold)
                if (timerRunning === false)
                    document.getElementById('timer').style.color = 'green';
        if (timerRunning === true) stopTimer();
    });

    document.body.addEventListener('keyup', function (event) {
        document.getElementById('timer').style.color = 'var(--fontcolor)';
        if (event.key === ' ' && spacebarHeldStartTime) {
            const spacebarHeldTime = new Date().getTime() - spacebarHeldStartTime;
            spacebarHeldStartTime = null;


            if (timerRunning === false && spacebarHeldTime >= holdThreshold) {

                resetAndStartTimer();
            } else {
                timerRunning = false;
                document.getElementById('copy').innerHTML = '<i class="fa-solid fa-copy"></i>';
                document.getElementById('copy').title = "Copy";
            }
        }
    });

    function startTimer() {
        timerRunning = true;
        startTime = new Date().getTime();
        timerInterval = setInterval(updateTime, 10);
    }

    function stopTimer() {
        document.getElementById('timer').style.color = 'red';
        clearInterval(timerInterval);
        timerInterval = null;

        const newScramble = generateScramble();
        updateScrambleDisplay(newScramble);
    }

    function resetAndStartTimer() {
        clearInterval(timerInterval);
        startTime = null;
        startTimer();
    }
    /*
    function updateTime() {
        const currentTime = new Date().getTime();
        const elapsedTime = currentTime - startTime;
    
        let count = Math.floor((elapsedTime / 10) % 100);
        let second = Math.floor((elapsedTime / 1000) % 60);
        let minute = Math.floor((elapsedTime / 60000) % 60);
        let hour = Math.floor(elapsedTime / 3600000);
        var startTime;
        var timerInterval;
        var spacebarHeldStartTime = null;
        var timerRunning = false;
        holdThreshold = 500; // Time in milliseconds for holding the spacebar
        
        document.body.addEventListener('keydown', function (event) {
          if (event.key === ' ' && !spacebarHeldStartTime) {
            document.getElementById('timer').style.color = 'red';
            spacebarHeldStartTime = new Date().getTime();
          } else
              if (spacebarHeldStartTime >= holdThreshold) 
                  if (timerRunning === false) 
                      document.getElementById('timer').style.color = 'green'; 
          if (timerRunning === true) stopTimer();
        });
        
        document.body.addEventListener('keyup', function (event) {
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.getElementById('timer').style.color = 'white';
            } else document.getElementById('timer').style.color = 'black';
          if (event.key === ' ' && spacebarHeldStartTime) {
            const spacebarHeldTime = new Date().getTime() - spacebarHeldStartTime;
            spacebarHeldStartTime = null;
            
        
            if (timerRunning === false && spacebarHeldTime >= holdThreshold) {
              
              resetAndStartTimer();
            } else timerRunning = false;
          }
        });
        
        function startTimer() {
            timerRunning = true;
            startTime = new Date().getTime();
            timerInterval = setInterval(updateTime, 10);
        }
        
        function stopTimer() {
            document.getElementById('timer').style.color = 'red';
            clearInterval(timerInterval);
            timerInterval = null;
            
            const newScramble = generateScramble();
            updateScrambleDisplay(newScramble);
        }
        
        function resetAndStartTimer() {
            clearInterval(timerInterval);
            startTime = null;
            startTimer();
        }
        
        function updateTime() {
            const currentTime = new Date().getTime();
            const elapsedTime = currentTime - startTime;
        
            let count = Math.floor((elapsedTime / 10) % 100);
            let second = Math.floor((elapsedTime / 1000) % 60);
            let minute = Math.floor((elapsedTime / 60000) % 60);
            let hour = Math.floor(elapsedTime / 3600000);
        
            updateDisplay(hour, minute, second, count);
        }
        */
    // ... previous code ...

    // Hide the hours, hours label, minutes, and minutes label at the beginning
    document.getElementById('hr').style.display = 'none';
    document.getElementById('hrLabel').style.display = 'none';
    document.getElementById('min').style.display = 'none';
    document.getElementById('minLabel').style.display = 'none';
    document.getElementById('sec').innerHTML = second.toString();

    function updateDisplay(hour, minute, second, count) {
        // Show hours only if the elapsed time is 1 hour or more
        if (hour >= 1) {
            document.getElementById('hr').style.display = 'inline';
            document.getElementById('hrLabel').style.display = 'inline';
            document.getElementById('hr').innerHTML = hour.toString();
        } else {
            document.getElementById('hr').style.display = 'none';
            document.getElementById('hrLabel').style.display = 'none';
        }

        if (minute >= 1 || hour >= 1) {
            document.getElementById('min').style.display = 'inline';
            document.getElementById('minLabel').style.display = 'inline';

            // Show minutes without leading zero if it's less than 10
            if (minute < 10) {
                document.getElementById('min').innerHTML = minute.toString();
            } else {
                document.getElementById('min').innerHTML = minute.toString().padStart(2, '0');
            }
        } else {
            document.getElementById('min').style.display = 'none';
            document.getElementById('minLabel').style.display = 'none';
        }

        if (second < 10 && minute < 1) document.getElementById('sec').innerHTML = second.toString();
        else document.getElementById('sec').innerHTML = second.toString().padStart(2, '0');

        // document.getElementById('sec').innerHTML = second.toString().padStart(2, '0');
        document.getElementById('count').innerHTML = count.toString().padStart(2, '0');
    }
    document.body.addEventListener('keydown', function (event) {
        if (event.key === ' ' && !spacebarHeldStartTime) {
            document.getElementById('timer').style.color = 'red';
            spacebarHeldStartTime = new Date().getTime();
        } else
            if (spacebarHeldStartTime >= holdThreshold)
                if (timerRunning === false)
                    document.getElementById('timer').style.color = 'green';
        if (timerRunning === true) stopTimer();
    });

    document.body.addEventListener('keyup', function (event) {
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.getElementById('timer').style.color = 'white';
        } else document.getElementById('timer').style.color = 'black';
        if (event.key === ' ' && spacebarHeldStartTime) {
            const spacebarHeldTime = new Date().getTime() - spacebarHeldStartTime;
            spacebarHeldStartTime = null;


            if (timerRunning === false && spacebarHeldTime >= holdThreshold) {

                resetAndStartTimer();
            } else timerRunning = false;
        }
    });

    function startTimer() {
        timerRunning = true;
        startTime = new Date().getTime();
        timerInterval = setInterval(updateTime, 10);
    }

    function stopTimer() {
        document.getElementById('timer').style.color = 'red';
        clearInterval(timerInterval);
        timerInterval = null;

        const newScramble = generateScramble();
        updateScrambleDisplay(newScramble);
    }

    function resetAndStartTimer() {
        clearInterval(timerInterval);
        startTime = null;
        startTimer();
    }

    function updateTime() {
        const currentTime = new Date().getTime();
        const elapsedTime = currentTime - startTime;

        let count = Math.floor((elapsedTime / 10) % 100);
        let second = Math.floor((elapsedTime / 1000) % 60);
        let minute = Math.floor((elapsedTime / 60000) % 60);
        let hour = Math.floor(elapsedTime / 3600000);

        updateDisplay(hour, minute, second, count);
    }

    // ... previous code ...

    // Hide the hours, hours label, minutes, and minutes label at the beginning
    document.getElementById('hr').style.display = 'none';
    document.getElementById('hrLabel').style.display = 'none';
    document.getElementById('min').style.display = 'none';
    document.getElementById('minLabel').style.display = 'none';
    document.getElementById('sec').innerHTML = second.toString();

    function updateDisplay(hour, minute, second, count) {
        // Show hours only if the elapsed time is 1 hour or more
        if (hour >= 1) {
            document.getElementById('hr').style.display = 'inline';
            document.getElementById('hrLabel').style.display = 'inline';
            document.getElementById('hr').innerHTML = hour.toString();
        } else {
            document.getElementById('hr').style.display = 'none';
            document.getElementById('hrLabel').style.display = 'none';
        }

        if (minute >= 1 || hour >= 1) {
            document.getElementById('min').style.display = 'inline';
            document.getElementById('minLabel').style.display = 'inline';

            // Show minutes without leading zero if it's less than 10
            if (minute < 10) {
                document.getElementById('min').innerHTML = minute.toString();
            } else {
                document.getElementById('min').innerHTML = minute.toString().padStart(2, '0');
            }
        } else {
            document.getElementById('min').style.display = 'none';
            document.getElementById('minLabel').style.display = 'none';
        }

        if (second < 10 && minute < 1) document.getElementById('sec').innerHTML = second.toString();
        else document.getElementById('sec').innerHTML = second.toString().padStart(2, '0');

        // document.getElementById('sec').innerHTML = second.toString().padStart(2, '0');
        document.getElementById('count').innerHTML = count.toString().padStart(2, '0');
    }

    document.addEventListener('DOMContentLoaded', function () {
        var recordButton = document.getElementById("record");
        var recordingOn = false;

        recordButton.addEventListener('click', function () {
            console.log("Button clicked");

            if (recordingOn === false) {
                recordButton.style.backgroundColor = "green";
                recordButton.title = "On";
                recordingOn = true;
            } else {
                recordButton.style.backgroundColor = "var(--board1)";
                recordButton.title = "Off";
                recordingOn = false;
            }
        });
    });
    updateDisplay(hour, minute, second, count);
</script>

</html>