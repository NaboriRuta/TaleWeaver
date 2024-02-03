<html>
    <?php 
    session_start();
    $mysqli = require __DIR__ . "/db.php";

    $sql = sprintf("DELETE FROM userInfo WHERE id = '%s'", $_SESSION["active_user_id"]);
    $stmt = $mysqli->stmt_init();

    if (! $stmt->prepare($sql)) die("MySQL Error: " . $mysqli->error);

    if ($stmt->execute()) {
        $_SESSION["username_taken"] = null;
        session_destroy();
        header("Location: ./login.php");
        exit;
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
    ?>
</html>