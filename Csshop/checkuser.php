<?php
    include "connect.php";

    $stmt = $pdo->prepare("SELECT username FROM member");
    $stmt->execute();
    $array = [];

    while ($row = $stmt->fetch()) {
        $array[] = $row["username"];
    };
    sleep(1);

    if (!in_array($_GET["username"], $array)) {
        echo "okay";
    } else {
        echo "denied";
    }
?>
