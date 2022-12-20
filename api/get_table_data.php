<?php

include_once "get_data.php";
include_once "get_user.php";

function get_user_data($db_connection){
    $sql = "SELECT * FROM users";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone_no'] . "</td>";
                    echo "<td>" . $row['joined'] . "</td>";
                    echo "<td> --view, --delete </td>";
                echo "</tr>";
            }
            $result->free();
        } else {
            echo "<tr>";
                echo "<td colspan='7' class='text-center'> No records found. </td>";
            echo "</tr>";
        }
    }
}

function get_all_bookings($db_connection){
    $sql = "SELECT * FROM booking ORDER BY added DESC";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $location = get_location($row['location_id'], $db_connection);
                $user = get_profile_by_id($row['user_id'], $db_connection);
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $location['name'] . "</td>";
                    echo "<td>" . $user['first_name']." ". $user['last_name']. "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['guest_no'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td><a href='../scripts/booking.delete.process.php?booking=".$row['id']."' class='link-primary'>--delete</a></td>";
                echo "</tr>";
            }
            $result->free();
        } else {
            echo "<tr>";
                echo "<td colspan='7' class='text-center'> No records found. </td>";
            echo "</tr>";
        }
    }
}

function get_my_bookings($id, $db_connection){
    $sql = "SELECT * FROM booking WHERE user_id = ".$id." ORDER BY added DESC";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $location = get_location($row['location_id'], $db_connection);
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $location['name'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['guest_no'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td><a href='../scripts/booking.delete.process.php?booking=".$row['id']."' class='link-primary'>--delete booking</a></td>";
                echo "</tr>";
            }
            $result->free();
        } else {
            echo "<tr>";
                echo "<td colspan='7' class='text-center'> No records found. </td>";
            echo "</tr>";
        }
    }
}