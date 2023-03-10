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
                    echo "<td> --view </td>";
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

function get_location_data($db_connection){
    $sql = "SELECT * FROM locations";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td><img style='width:100px;' src='../" . $row['image'] . "' class='img-thumbnail' alt='" . $row['name'] . "'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo '<td><a href="../scripts/delete.location.process.php?lodge='.$row['id'].'" class="link-danger">delete</a></td>';
                echo "</tr>";
            }
            $result->free();
        } else {
            echo "<tr>";
                echo "<td colspan='6' class='text-center'> No records found. </td>";
            echo "</tr>";
        }
    }
}

function get_lodging_data($db_connection){
    $sql = "SELECT * FROM lodging";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td><img style='width:100px;' src='../" . $row['image'] . "' class='img-thumbnail' alt='" . $row['name'] . "'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo '<td><a href="../scripts/delete.lodging.process.php?lodge='.$row['id'].'" class="link-danger">delete</a></td>';
                echo "</tr>";
            }
            $result->free();
        } else {
            echo "<tr>";
                echo "<td colspan='6' class='text-center'> No records found. </td>";
            echo "</tr>";
        }
    }
}

function get_gallery_data($db_connection){
    $sql = "SELECT * FROM gallery";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td><img style='width:100px;' src='../" . $row['image'] . "' class='img-thumbnail' alt='" . $row['name'] . "'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo '<td><a href="../scripts/delete.gallery.process.php?gallery='.$row['id'].'" class="link-danger">delete</a></td>';
                echo "</tr>";
            }
            $result->free();
        } else {
            echo "<tr>";
                echo "<td colspan='5' class='text-center'> No records found. </td>";
            echo "</tr>";
        }
    }
}

function get_all_bookings($db_connection){
    $sql = "SELECT * FROM booking ORDER BY added DESC";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                if ($row['type'] == 'location'){
                    $s = get_location($row['s_id'], $db_connection);
                } else {
                    $s = get_lodge($row['s_id'], $db_connection);
                }
                $user = get_profile_by_id($row['user_id'], $db_connection);
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $s['name'] . "</td>";
                    echo "<td><a href='account.view.php?viewing=". $user['id'] ."' class='link-secondary text-decoration-none'>" . $user['first_name']." ". $user['last_name']. "</a></td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['guest_no'] . "</td>";
                    echo "<td>" . ($row['guest_no'] * $s['price']) . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td><a href='../scripts/booking.approve.process.php?booking=".$row['id']."' class='link-primary'>approve</a>, <a href='../scripts/booking.delete.process.php?booking=".$row['id']."' class='link-danger'>delete</a></td>";
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
                if ($row['type'] == 'location'){
                    $s = get_location($row['s_id'], $db_connection);
                } else {
                    $s = get_lodge($row['s_id'], $db_connection);
                }
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $s['name'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['guest_no'] . "</td>";
                    echo "<td>" . ($row['guest_no'] * $s['price']) . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td><a href='../scripts/booking.delete.process.php?booking=".$row['id']."' class='link-danger'>delete</a></td>";
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