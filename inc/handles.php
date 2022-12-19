<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "dberror") {
            echo '<div class="alert alert-danger" role="alert"> Oops, Something went wrong on our end! </div>';
        }
        else if ($_GET["error"] == "usernameempty") {
            echo '<div class="alert alert-danger" role="alert"> Username can not be empty! </div>';
        }
        else if ($_GET["error"] == "passwordempty") {
            echo '<div class="alert alert-danger" role="alert"> Password can not be empty! </div>';
        }
        else if ($_GET["error"] == "cpasswordempty") {
            echo '<div class="alert alert-danger" role="alert"> Confirm password! </div>';
        }
        else if ($_GET["error"] == "emailempty") {
            echo '<div class="alert alert-danger" role="alert"> Email can not be empty! </div>';
        }
        else if ($_GET["error"] == "firstnameempty") {
            echo '<div class="alert alert-danger" role="alert"> First name can not be empty! </div>';
        }
        else if ($_GET["error"] == "lastnameempty") {
            echo '<div class="alert alert-danger" role="alert"> Last name can not be empty! </div>';
        }
        else if ($_GET["error"] == "usernameinvalid") {
            echo '<div class="alert alert-danger" role="alert"> Username can only contain letters, numbers, and underscores! </div>';
        }
        else if ($_GET["error"] == "usernametaken") {
            echo '<div class="alert alert-danger" role="alert"> Username is already taken! </div>';
        }
        else if ($_GET["error"] == "emailtaken") {
            echo '<div class="alert alert-danger" role="alert"> Email is already taken! </div>';
        }
        else if ($_GET["error"] == "passwordlength") {
            echo '<div class="alert alert-danger" role="alert"> Password be atleast 8 characters! </div>';
        }
        else if ($_GET["error"] == "passwordmatch") {
            echo '<div class="alert alert-danger" role="alert"> Passwords do not match! </div>';
        }
        else if ($_GET["error"] == "passwordwrong") {
            echo '<div class="alert alert-danger" role="alert"> Invalid Password! </div>';
        }
        else if ($_GET["error"] == "usernamewrong") {
            echo '<div class="alert alert-danger" role="alert"> Invalid Username! </div>';
        }
        else if ($_GET["error"] == "sessionexpired") {
            echo '<div class="alert alert-danger" role="alert"> Session expired! </div>';
        }
        else if ($_GET["error"] == "codeempty") {
            echo '<div class="alert alert-danger" role="alert"> A secret code has to be entered! </div>';
        }
        else if ($_GET["error"] == "verifiedcodeincorrect") {
            echo '<div class="alert alert-danger" role="alert"> You entered and incorrect verification code! </div>';
        }
        else if ($_GET["error"] == "verifiedfailed") {
            echo '<div class="alert alert-danger" role="alert"> Something when wrong while trying to verify your account! </div>';
        }
        else if ($_GET["error"] == "gnerateerror") {
            echo '<div class="alert alert-danger" role="alert"> Failed to generate a new code! </div>';
        }
        else if ($_GET["error"] == "codenotsent") {
            echo '<div class="alert alert-danger" role="alert"> Failed to send your verification code! </div>';
        }
        else if ($_GET["error"] == "descriptionempty") {
            echo '<div class="alert alert-danger" role="alert"> Description should not be empty! </div>';
        }
        else if ($_GET["error"] == "priceempty") {
            echo '<div class="alert alert-danger" role="alert"> Price should not be empty! </div>';
        }
        else if ($_GET["error"] == "ratingempty") {
            echo '<div class="alert alert-danger" role="alert"> Rating should not be empty! </div>';
        }
        else if ($_GET["error"] == "nameempty") {
            echo '<div class="alert alert-danger" role="alert"> Name should not be empty! </div>';
        }
        else if ($_GET["error"] == "filetype") {
            echo '<div class="alert alert-danger" role="alert"> File type not allowed! </div>';
        }
        else if ($_GET["error"] == "fileexists") {
            echo '<div class="alert alert-danger" role="alert"> File already exists! </div>';
        }
        else if ($_GET["error"] == "dateempty") {
            echo '<div class="alert alert-danger" role="alert"> Please pick a date! </div>';
        }
        else if ($_GET["error"] == "uploadprofile") {
            echo '<div class="alert alert-danger" role="alert"> There was an issue with uploading your file! </div>';
        }
        else if ($_GET["error"] == "uploadprofilesize") {
            echo '<div class="alert alert-danger" role="alert"> The image you tried to upload exceeds maximun upload size! </div>';
        }
    }
    if (isset($_GET["success"])) {
        if ($_GET["success"] == "verified") {
            echo '<div class="alert alert-success" role="alert"> Your account is now verified! </div>';
        }
        else if ($_GET["success"] == "newcodegenerated") {
            echo '<div class="alert alert-success" role="alert"> A new code has been generated! </div>';
        }
        else if ($_GET["success"] == "codesent") {
            echo '<div class="alert alert-success" role="alert"> Verification code sent! </div>';
        }
        else if ($_GET["success"] == "profileudated") {
            echo '<div class="alert alert-success" role="alert"> Profile has been updated! </div>';
        }
        else if ($_GET["success"] == "bookingcreated") {
            echo '<div class="alert alert-success" role="alert"> Your booking has been created! </div>';
        }
        else if ($_GET["success"] == "bookingdeleted") {
            echo '<div class="alert alert-success" role="alert"> Your booking has been deleted! </div>';
        }
    }
?>