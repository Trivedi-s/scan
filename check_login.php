<?php
    include('conn_db.php');
# We need to connect the database here for the php to work.
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    $query = "SELECT c_id,c_username,c_firstname,c_lastname FROM customer WHERE
    c_username = '$username' AND c_pwd = '$pwd' LIMIT 0,1";

    $result = $mysqli -> query($query);
    if($result -> num_rows == 1){
        //customer login
        $row = $result -> fetch_array();
        session_start();
        $_SESSION["cid"] = $row["c_id"];
        $_SESSION["firstname"] = $row["c_firstname"];
        $_SESSION["lastname"] = $row["c_lastname"];
        $_SESSION["utype"] = "customer";

        header("location: index.php");
        exit(1);
    }else{
        ?>
        <script>
            alert("You entered wrong username and/or password!");
            history.back();
        </script>
        <?php
    }
?>