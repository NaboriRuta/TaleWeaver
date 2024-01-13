<html>
    <?php 
        $user = $_POST["createUsername"];
        $email = $_POST["addEmail"];
        $pass_encrypted = password_hash($_POST["createPass"], PASSWORD_DEFAULT);

        $mysqli = require __DIR__ . "/db.php";

        $sql = "INSERT INTO userInfo (username, email, pass_encrypted) VALUES (?, ?, ?)";
        $stmt = $mysqli->stmt_init();

        if (! $stmt->prepare($sql)) die("MySQL Error: " . $mysqli->error);

        $stmt->bind_param("sss", $user, $email, $pass_encrypted);

        if ($stmt->execute()) {
            header("Location: ./create-account-success.html");
            exit;
        } else {
            if ($mysqli->errno === 1062) {
                die("Username is already taken");
            }
            die($mysqli->error . " " . $mysqli->errno);
        }
    ?>
</html>