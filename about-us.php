<?php 
session_start();
if (isset($_SESSION["active_user_id"])) {
    $mysqli = require __DIR__ . "/db.php";
    $sql = "SELECT * FROM userInfo WHERE id = {$_SESSION["active_user_id"]}";

    $result = $mysqli->query($sql);
    $active_user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaleWeaver - About Us</title>
    <link href="./style.css" type="text/css" rel="stylesheet">
    <script src="./dropdown-script.js" type="text/javascript"></script>
</head>
<body>
    <!--Nav Bar-->
    <nav>
        <div class="left">
            <h3>TaleWeaver</h3>
        </div>
        <div class="right">
            <h3 onclick="window.location.href='./home.php'">Home</h3>
            <h3>Dashboard</h3>
            <h3 onclick="activateDropdown1()" class="dropdown-btn">Story Planners</h3>
            <div id="dropdown1" class="dropdown1">
                <a href="./forms/story-outline.html">Story Outlining</a>
                <a href="./forms/character-building.html">Character Builder</a>
                <a href="./forms/world-building.html">World Builder</a>
                <a href="./forms/location-building.html">Location Builder</a>
                <a href="./forms/artifact-building.html">Artifact Builder</a>
            </div>
            <h3 onclick="activateDropdown2()" class="dropdown-btn">Creative Writing Skills</h3>
            <div id="dropdown2" class="dropdown2">
                <a href="./writing/arcs.html">Arcs</a>
                <a href="./writing/character-growth.html">Character Growth</a>
                <a href="./writing/story-types.html"> Story Types</a>
                <a href="./writing/themes.html">Themes</a>
                <a href="./writing/antagonist-types.html">Antagonist Types</a>
                <a href="./writing/formatting.html">Formatting</a>
                <a href="./writing/world-building.html">World Building</a>
                <a href="./writing/character-planning.html">Character Building</a>
                <a href="./writing/planning-strategies.html">Planning Strategies</a>
                <a href="./writing/hooks.html">Hooks</a>
            </div>
            <h3>Forums</h3>
            <h3 onclick="window.location.href='./about-us.php'">About Us</h3>
            <?php  if (isset($active_user)): ?>
            <h3 onclick="window.location.href='./account-change.php'" class="login"><?= $active_user["username"]?></h3>
            <?php else: ?>
            <h3 onclick="window.location.href='./login.php'" class="login">Login</h3>
            <?php endif;?>
        </div>
    </nav>
    <!--Begin Main Page Segment-->
    <header>
        <h1>About Us</h1>
    </header>
    <main>
        <p>
            Our team worked on TaleWeaver as a side project in our AP Computer Science class.
            The whole idea for TaleWeaver is to help lots of writers, young and old, with ways to assist in creative writing, 
            whether that's with name ideas, story ideas, or just simply organizing a story into a sensible plot.
        </p>
        <div class="right-buttons">
            <button onclick="window.location.href='mailto:talew3aver@gmail.com'">Contact Us</button>
            <button class="right-most" style="margin-left: 10px;">Donate</button>
        </div>
        <!--This creates 3 boxes for the information for each user-->
        <h2>About The Creators:</h2>
        <div class="home-grid">
            <div class="part">
                <h3>Jade Jensen, aka WinteryNight</h3>
                <p onclick="window.location.href='mailto:jadeelisejensen@gmail.com'" class="email">Email: jadeelisejensen@gmail.com</p>
                <p>Discord: @wintersbanenex(#4118)</p>
            </div>
            <div class="part">
                <h3>Shelton Adams, aka NaboriRuta</h3>
                <p onclick="window.location.href='mailto:naboriruta0@gmail.com'" class="email">Email: naboriruta0@gmail.com</p>
                <p>Discord: @naboriruta(#3216)</p>
            </div>
            <div class="part">
                <h3>Elias Gomez, aka Someone</h3>
                <p onclick="window.location.href='mailto:'" class="email">Email: eliasgomez19@icloud.com</p>
                <p>Discord: @someone06178</p>
            </div>
        </div><br>
        <h2>Website Socials:</h2>
        <div class="center-buttons" style="display: flex; justify-content: space-around;">
            <button>Instagram</button>
            <button>YouTube</button>
            <button>Discord</button>
        </div>
    </main>
</body>
</html>