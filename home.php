<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://kit.fontawesome.com/9c8c1521b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://icons.cubing.net/css/cubing-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="manifest" href="/manifest.webmanifest">
</head>
<style>
    .homecontent {
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

    #homecontainer {
        display: flex;
        flex-direction: row;
        gap: 10px;
        padding: 10px;
        justify-content: center;
    }

    #homecontent1,
    #homecontent2,
    #updates {
        rotate: y 90deg;
        transition: transform 0.2s ease-in-out;
        transform-origin: left;
    }
</style>

<body>
    <nav id="navbar"></nav>

    <script>
        $(function () {
            $("#navbar").load("nav.html");
        });
    </script>

    <h1><!--Welcome! <i class="cubing-icon unofficial-333_team_bld">--></i></h1>
    <div id="homecontainer">
        <div class="homecontent" id="homecontent1">
        </div>
        <div class="homecontent" id="homecontent2">
        </div>
        <div class="homecontent" id="updates">
            <h2>1/2/2024</h2>
            Added some flip animations!<br><br>The other tiles are blank. I hope I can put something there soon.
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('homecontent1').style.transform = 'rotateY(-90deg)';
        setTimeout(function () {
            document.getElementById('homecontent2').style.transform = 'rotateY(-90deg)';
            setTimeout(function () {
                document.getElementById('updates').style.transform = 'rotateY(-90deg)';
            }, (60));
        }, (60));
    })
</script>

</html>