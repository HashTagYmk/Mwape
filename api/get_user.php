<?php

function get_profile($email, $db_connection){
    $sql = "SELECT * FROM users WHERE email = ?";

    if($stmt = $db_connection->prepare($sql)){
        $stmt->bind_param("s", $email);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                $row = $result->fetch_array(MYSQLI_ASSOC);
                return $row;
            }
        }
    }
}

function get_profile_by_id($id, $db_connection){
    $sql = "SELECT * FROM users WHERE id = ?";

    if($stmt = $db_connection->prepare($sql)){
        $stmt->bind_param("s", $id);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                $row = $result->fetch_array(MYSQLI_ASSOC);
                return $row;
            }
        }
    }
}