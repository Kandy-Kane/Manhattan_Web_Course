<!--
Frank Kane
Web Programming
HW 4
04/18/21
-->
<?php include("top.php"); ?>

<div>
    <h1>Thank you!</h1>
    <p>
        Welcome to NerdLuv, <?= $_POST["name"] ?>!<br/><br/>
        Now <a href="matches.php">log in to see your matches!</a>
    </p>
</div>

<?php writeToFile(); ?>

<?php include("bottom.php"); ?>

<!--PHP FUNCTIONS-->
<?php
/**
 * User data is stored in a file singles.txt.
 * The file contains data records as lines in exactly the following format:
**/
function writeToFile()
{
    //$_GET and $_POST are superglobals. They do not need to be passed as a function parameter.

    $userInfo = "";
    foreach ($_POST as $attribute) {
        $userInfo = $userInfo . $attribute . ",";
    }
    //substr($userInfo, 0, -1) removes the comma (,) at the end of the string
    file_put_contents("singles.txt", "\n" . substr($userInfo, 0, -1), FILE_APPEND);
}

?>

