<?php
    session_start();
    $is_invalid = false;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $_SESSION["username_taken"] = null;
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $mysqli = require __DIR__ . "/db.php";

        $sql = sprintf("SELECT * FROM userInfo WHERE username = '%s'", $mysqli->real_escape_string($user));

        $result = $mysqli->query($sql);

        $active_user = $result->fetch_assoc();

        if ($active_user) {
            if (password_verify($pass, $active_user["pass_encrypted"])) {
                $_SESSION["active_user_id"] = $active_user["id"];
                $_SESSION["active_user_name"] = $active_user["username"];

                header("Location: ./dashboard.php");
                exit;
            } else {
                $is_invalid = true;
            }
        } else {
            $is_invalid = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaleWeaver - Login</title>
    <script src="./dropdown-script.js" type="text/javascript"></script>
    <link href="./style.css" type="text/css" rel="stylesheet" />
    <script src="./login.js"></script>
</head>
<body>
    <!--Nav Bar-->
    <nav>
        <div class="left">
            <h3>TaleWeaver</h3>
        </div>
        <div class="right">
            <h3 onclick="window.location.href='./home.php'">Home</h3>
            <h3 onclick="window.location.href='./dashboard.php'">Dashboard</h3>
            <h3 onclick="activateDropdown1()" class="dropdown-btn">Story Forms</h3>
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
            <h3 onclick="window.location.href='./login.php'" class="login">Login</h3>
        </div>
    </nav>
    <main>
        <div class="container">
            <!--Login Form for already added users-->
            <form class="form" id="login" method="post">
                <h1>Login</h1>
                <?php if ($is_invalid === true): ?>
                <div class="form-msg incorrect-credential">Incorrect Username/Password</div><br/>
                <?php else: ?> <?php endif; ?>
                <?php if ($_SESSION["username_taken"] === true): ?>
                <div class="form-msg incorrect-credential">Username is already taken</div><br/>
                <?php elseif ($_SESSION["username_taken"] === false): ?>
                <div class="form-msg success-msg">Successfully created account!</div><br/>
                <?php else: ?> <?php endif; ?>
                <div class="input">
                    <input type="text" class="input username" name="username" id="username" autofocus required placeholder="Username">
                    <div class="err-msg"></div>
                </div><br/>
                <div class="input-container">
                    <input type="password" class="input password" name="password" id="password" autofocus required placeholder="Password">
                    <div class="err-msg"></div>
                </div><br/>
                <input type="submit" value="Login" class="login-submit">
                <p class="forgot-pass">Forgot your password? Click <a href="#">here!</a></p>
                <p class="new-acc">Don't have an account? <a href="#" id="createAccount">Create New</a></p>
            </form>
            <!--Create Account Form for new users-->
            <form class="form hidden" id="newAcc" action="./create-account.php" method="post">
                <h1>Create Account</h1>
                <?php if ($_SESSION["username_taken"] === true): ?>
                <div class="form-msg incorrect-credential">Username Is Already Taken</div><br/>
                <?php else: ?> <?php endif; ?>
                <div class="input">
                    <input type="text" class="input createUsername" name="createUsername" id="createUsername" autofocus required placeholder="Username">
                    <div class="err-msg"></div>
                </div><br/>
                <div class="input-container">
                    <input type="email" class=" input addEmail" name="addEmail" id="addEmail" autofocus required placeholder="Email Address">
                    <div class="err-msg"></div>
                </div><br/>
                <div class="input-container">
                    <input type="password" class="input createPass" name="createPass" id="createPass" autofocus required placeholder="Password">
                    <div class="err-msg"></div>
                </div><br/>
                <div class="input-container">
                    <input type="password" class="input confirm" name="confirm" id="confirm" autofocus required placeholder="Confirm Password">
                    <div class="err-msg"></div>
                </div><br/>
                <input type="submit" value="Create Account" class="new-acc-submit">
                <p class="old-acc">Already have an account? <a href="#" id="toLogin">Login</a></p>
            </form>
        </div>
    </main>
</body>
</html>