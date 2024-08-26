<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nontimer Concept</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <link rel="manifest" href="/manifest.webmanifest">
</head>

<style>
    body {
        background: var(--bg);
        overflow: hidden;
    }

    button {
        background: var(--board2);
        color: var(--fontcolor);
        border: 0;
    }

    button:hover {
        cursor: pointer;
    }

    input[type='text'],
    textarea {
        background: var(--board2);
        color: var(--fontcolor);
        border: 0;
        font-size: 150%;
        font-family: "Nunito Sans";
    }

    textarea:focus,
    input:focus {
        outline: 2px solid var(--fontcolor);
    }

    #scramble-generator {
        display: flex;
        justify-content: center;
        background: transparent !important;
        font: 350 350% "Nunito" !important;
        position: fixed !important;
        top: 40vh !important;
        left: 20vh !important;
    }

    #stats {
        height: 35px !important;
        background: transparent !important;
    }

    table {
        display: none !important;
    }

    #generate-button,
    #show-scramble-options,
    #copy {
        background: transparent !important;
        width: fit-content !important;
        font: 500 italic 50% "Montserrat";
        position: fixed !important;
        top: 33vh !important;
    }

    #generate-button:hover,
    #show-scramble-options:hover,
    #copy:hover {
        text-decoration: underline;
    }

    #generate-button {
        left: 44vw !important;
    }

    #show-scramble-options {
        left: 66vw !important;
    }

    #copy {
        left: 27vw !important;
    }
</style>

<body>
    <?php include "nav.html";
    include "timer/scramble-generator.php";
    include "timer/leftbar.php";
    include "timer/createsession.php";
    include "timer/tools/drawscramble.php";
    include "scrambles/3x3.php" ?>
</body>

<script>
    document.getElementById("copy").innerHTML = "copy"
    document.getElementById("copy").setAttribute('title', '');
    document.getElementById("generate-button").innerHTML = "next scramble"
    document.getElementById("show-scramble-options").innerHTML = "options"

    document.getElementById("copy").addEventListener("click", function () {
        this.innerHTML = 'copied';
    })

    document.getElementById("generate-button").addEventListener("click", function() {
        document.getElementById("copy").innerHTML = 'copy';
    })
</script>

</html>