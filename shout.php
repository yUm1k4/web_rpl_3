<?php
// DB CONFIG  START //
$db_username = "root";
$db_password = "";
$db_name = "db_rpl_3";
$db_host = "localhost";
// DB CONFIG END //

if ($_POST) {
    // connect to mysql db
    $sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('could not connect to database');

    //check if its an ajax request, exit if not
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }

    if (isset($_POST["message"]) && strlen($_POST["message"]) > 0) {
        // sanitize user name and message received from chat box
        // You can replace username with registered username, if only registered users are allower.
        $username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        $user_ip = $_SERVER['REMOTE_ADDR'];

        //insert new message in db
        if (mysqli_query($sql_con, "INSERT INTO shout_box(user, message, ip_address) value ('$username', '$message', '$user_ip')")) {
            $msg_time = date('h:i A M d', time()); //current time
            echo '<div class="shout_msg"><time>' . $msg_time . '</time><span class="username">' . $username . '</span><span class="message">' . $message . '</span></div>';
        }

        // delete all records except last 10, if u dont wnt to grow your db size!
        mysqli_query($sql_con, "DELETE FROM shout_box WHERE id NOT IN (SELECT * FROM (SELECT id FROM shout_box ORDER BY id DESC LIMIT 0, 9999999)as sb)");
    } elseif ($_POST["fetch"] == 1) {
        $results = mysqli_query($sql_con, "SELECT user, message, date_time FROM (SELECT * FROM shout_box ORDER BY id DESC LIMIT 9999999) shout_box ORDER BY shout_box.id ASC");
        while ($row = mysqli_fetch_array($results)) {
            $msg_time = date('h:i A M d', strtotime($row["date_time"])); // message posted time
            echo '<div class="shout_msg><time>' . $msg_time . '</time><span class="username">' . $row["user"] . '</span><span class="message">' . $row["message"] . '</span></div>';
        }
    } else {
        header('HTTP/1.1 500 Spam Deteced ');
        exit();
    }
}
