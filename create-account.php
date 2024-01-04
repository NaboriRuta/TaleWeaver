<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TaleWeaver - Login</title>
        <script src="./dropdown-script.js" type="text/javascript"></script>
        <link href="./style.css" type="text/css" rel="stylesheet" />
    </head>
    <?php 
        $user = $_POST["createUsername"];
        $email = $_POST["addEmail"];
        $pass = $_POST["createPass"];

        $host = "localhost:3306";
        $dbname = "taleweaverDatabase";
        $username = "root";
        $password = "Shelton79Adams";

        $conn = mysqli_connect($host, $username, $password, $dbname);

        if (mysqli_connect_errno()) die("Connection error: " . mysqli_connect_error());

        $sql = "INSERT INTO userInfo (username, email, pass) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (! mysqli_stmt_prepare($stmt, $sql)) die(mysqli_error($conn));

        mysqli_stmt_bind_param($stmt, "sss", $user, $email, $pass);
        mysqli_stmt_execute($stmt);
    ?>
    <body>
        <nav>
            <div class="left">
                <h3>TaleWeaver</h3>
            </div>
            <div class="right">
                <h3 onclick="window.location.href='./home.html'">Home</h3>
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
                <h3 onclick="window.location.href='./forums.html'">Forums</h3>
                <h3 onclick="window.location.href='./about-us.html'">About Us</h3>
                <h3 onclick="window.location.href='./login.html'" class="login">Login</h3>
            </div>
        </nav>
        <header>
            <h1>Successfully created account!</h1>
        </header>
        <main>
            <div class="center-buttons">
                <button onclick="window.location.href='./dashboard.html'">Go to Dashboard</button>
                <button onclick="window.location.href='./home.html'">Go to Home</button>
            </div>
        </main>
    </body>
</html>