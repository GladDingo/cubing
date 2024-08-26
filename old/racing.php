<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battle!</title>
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
    .container {
        padding: 10px;
    }

    #rooms-dropdown {
        font: 720 175% "Nunito Sans";
        width: 100%;
        text-align: left;
        padding: 5px;
    }

    .room {
        font: 400 125% "Nunito Sans";
        width: 100%;
        text-align: left;
        padding: 5px;
    }

    #create-join-container {
        display: flex;
    }

    #create-room,
    #join-room {
        font: 300 200% "Nunito Sans";
    }

    #roompassword {
        border: 3px solid var(--fontcolor);
        font: 650 100% "Nunito Sans";
    }

    #roompassword:focus {
        outline: none;
    }
</style>

<body>
    <?php include "nav.html" ?>
    <div class="container">
        <h1>Racing</h1>
        <div id="create-join-container">
            <button id="create-room">Create room</button>
            <button id="join-room">Join room</button>
        </div>

        <button id="rooms-dropdown">PUBLIC ROOMS</button>
        <button class="room" onclick="showPassword(this.id)">test1</button>
        <button class="room">test2</button>
        <button class="room">test3</button>
        <button class="room">test4</button>
        <button class="room">test5</button>
        <input type="password" name="roompassword" id="roompassword" placeholder="Password">
    </div>
</body>
<script>

</script>

</html>