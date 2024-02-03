<html>
    <?php 
    session_start();
        $user = $_POST["createUsername"];
        $email = $_POST["addEmail"];
        $pass_encrypted = password_hash($_POST["createPass"], PASSWORD_DEFAULT);

        $mysqli = require __DIR__ . "/db.php";

        $sql = "INSERT INTO userInfo (username, email, pass_encrypted) VALUES (?, ?, ?)";
        $stmt = $mysqli->stmt_init();

        if (! $stmt->prepare($sql)) die("MySQL Error: " . $mysqli->error);

        $stmt->bind_param("sss", $user, $email, $pass_encrypted);

        if ($stmt->execute()) {
            $_SESSION["username_taken"] = false;
            header("Location: ./login.php");
            exit;
        } else {
            if ($mysqli->errno === 1062) {
                $_SESSION["username_taken"] = true;
                header("Location: ./login.php");
                exit;
            }
            die($mysqli->error . " " . $mysqli->errno);
        }
    ?>
</html>