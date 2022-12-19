<?php

function get_locations($db_connection){
    $sql = "SELECT * FROM locations";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                echo '<div class="col-md shadow-sm p-3 mx-2 mb-5 bg-body rounded">';
                    echo '<img src="../'.$row['image'].'" class="mb-1" alt="'.$row['name'].'" style="height: 200px;">';
                    echo '<h5><i class="bi bi-geo-alt"></i> '.$row['name'].'</h5>';
                    echo '<p>'.$row['description'].'</p>';
                    echo '<p>';
                        for($i = 1; $i <= $row['rating']; $i++) {
                            echo '<i class="bi bi-star-fill"></i>';
                        }
                        for($i = 1; $i <= (5 - $row['rating']); $i++) {
                            echo '<i class="bi bi-star"></i>';
                        }
                    echo '</p>';
                    echo '<p>ZMW '.$row['price'].'</p>';
                    echo '<a href="book.form.php?location='.$row['id'].'" class="btn btn-primary">Book Now</a>';
                echo '</div>';
            }
            $result->free();
        } else {
            echo "No records found matching your request";
        }
    }
}

function get_three_locations($db_connection){
    $sql = "SELECT * FROM locations ORDER BY modified DESC LIMIT 3";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                echo '<div class="col-md shadow-sm p-3 mx-2 mb-5 bg-body rounded">';
                    echo '<img src="'.$row['image'].'" class="mb-1" alt="'.$row['name'].'" style="height: 200px;">';
                    echo '<h5><i class="bi bi-geo-alt"></i> '.$row['name'].'</h5>';
                    echo '<p>'.$row['description'].'</p>';
                    echo '<p>';
                        for($i = 1; $i <= $row['rating']; $i++) {
                            echo '<i class="bi bi-star-fill"></i>';
                        }
                        for($i = 1; $i <= (5 - $row['rating']); $i++) {
                            echo '<i class="bi bi-star"></i>';
                        }
                    echo '</p>';
                    echo '<p>ZMW '.$row['price'].'</p>';
                    echo '<a href="pages/book.form.php?location='.$row['id'].'" class="btn btn-primary">Book Now</a>';
                echo '</div>';
            }
            $result->free();
        } else {
            echo "No records found matching your request";
        }
    }
}

function get_location($id, $db_connection) {
    $sql = "SELECT * FROM locations WHERE id = ?";

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

function get_gallery($db_connection) {
    $sql = "SELECT * FROM gallery ORDER BY added DESC";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                echo '<div class="col ">';
                    echo '<div class="row">';
                        echo '<div class="col">';
                            echo '<img src="../'.$row['image'].'" alt="'.$row['name'].'" style="width: 200px;">';
                        echo '</div>';
                        echo '<div class="col">';
                            echo '<h5>'.$row['name'].'</h5>';
                            echo '<p>'.$row['description'].'</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            $result->free();
        } else {
            echo "No records found matching your request";
        }
    }
}

function get_gallery_for_carousel($db_connection) {
    $sql = "SELECT * FROM gallery ORDER BY added DESC LIMIT 3";
    if($result = $db_connection->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                echo '<div class="carousel-item active" data-bs-interval="10000">';
                    echo '<img src="'.$row['image'].'" class="d-block w-100" alt="'.$row['name'].'">';
                    echo '<div class="carousel-caption d-none d-md-block">';
                        echo '<h5>'.$row['name'].'</h5>';
                        echo '<p>'.$row['description'].'</p>';
                    echo '</div>';
                echo '</div>';
            }
            $result->free();
        }
    }
}