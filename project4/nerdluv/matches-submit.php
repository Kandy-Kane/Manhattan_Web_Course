<!--
Frank Kane
Web Programming
HW 4
04/18/21
-->
<?php include("top.php"); ?>

<h1>Matches for <?= $_GET["name"] ?></h1>
<div class='match'>
    <?php printMatchesFromFile(); ?>
</div>

<?php include("bottom.php"); ?>

<!--PHP FUNCTIONS-->
<?php

/**
 * Read the name from the page's "name" query parameter and finds which other singles match the given user.
 * Output the HTML to display the matches.
 * This will then show each users info in order.
 */
function printMatchesFromFile()
{

    // retrieves user's info from singles.txt
    $loginUser = "";
    foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $loginUser) {
        // "name" parameter is used to find the remaining user info
        if ($_GET["name"] == explode(",", $loginUser)[0]) {
            break;
        }
    }

    foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $matchUser) {
        // required conditions for a match
        if (
            // Index[0]: name.
            explode(",", $matchUser)[0] != explode(",", $loginUser)[0]

            // Index[1]: gender.
            // Match with opposite gender of the given user.
            && explode(",", $matchUser)[1] != explode(",", $loginUser)[1]

            // Index[2]: user age, Index[5]: preferred min age, Index[6]: preferred max age.
            && explode(",", $matchUser)[2] >= explode(",", $loginUser)[5]
            && explode(",", $matchUser)[2] <= explode(",", $loginUser)[6]

            // Index[4]: operating system.
            // Match the same operating system as the user
            && explode(",", $matchUser)[4] == explode(",", $loginUser)[4]

            // Index[3]: personality type.
            // Shares at least one personality type letter in common at the same index in each string.
            && (
                str_split(explode(",", $matchUser)[3])[0] == str_split(explode(",", $loginUser)[3])[0]
                || str_split(explode(",", $matchUser)[3])[1] == str_split(explode(",", $loginUser)[3])[1]
                || str_split(explode(",", $matchUser)[3])[2] == str_split(explode(",", $loginUser)[3])[2]
                || str_split(explode(",", $matchUser)[3])[3] == str_split(explode(",", $loginUser)[3])[3]
            )

        ) {
            //print matches HTML to web page
            ?>
            <p><img src='images/user.jpg' alt='user icon'><?= explode(",", $matchUser)[0] ?></p>
            <ul>
                <li><strong>gender:</strong><?= explode(",", $matchUser)[1] ?></li>
                <li><strong>age:</strong><?= explode(",", $matchUser)[2] ?></li>
                <li><strong>type:</strong><?= explode(",", $matchUser)[3] ?></li>
                <li><strong>OS:</strong><?= explode(",", $matchUser)[4] ?></li>
            </ul>

        <?php }
    }
}

?>
<!-- PHP FUNCTIONS END-->
