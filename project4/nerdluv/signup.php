<!--
Frank Kane
Web Programming
HW 4
04/18/21
-->
<?php include("top.php"); ?>

<form action="signup-submit.php" method="post">
    <fieldset> <!--Group elements in the form-->
        <legend>New User Signup:</legend>
        <ul>
            <li>
                <!--Name: A 16-character box for the user to type a name.-->
                <strong>Name:</strong>
                <input type="text" name="name" size="16"/>
            </li>

            <li>
                <!-- 
                Gender: Radio buttons for the user to select a gender of
                Male or Female. -->
                <strong>Gender:</strong>
                <label><input type="radio" name="gender" value="M"/>Male</label>
                <label><input type="radio" name="gender" value="F"/>Female</label>

            </li>

            <li>
                <!--
                Age: A 6-letter-wide text input box for the user to type
                his/her age in years.-->
                <strong>Age:</strong>
                <input type="text" name="age" size="6" maxlength="2"/>
            </li>

            <li>
                <!--
                Personality type: A 6-character-wide text box allowing
                the user to type a Keirsey personality type, such as ISTJ or
                ENFP.-->
                <strong>Personality type:</strong>
                <input type="text" name="type" size="6" maxlength="4"/>
                <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type?)</a>
            </li>

            <li>
                <!--
                Favorite OS: A drop-down select box allowing the user to
                select a favorite operating system. The choices are Windows,
                Mac OS X, and Linux.
                -->
                <strong>Favorite OS:</strong>
                <select name="OS">
                    <option selected="selected">Windows</option>
                    <option>Mac OS X</option>
                    <option>Linux</option>
                </select>
            </li>

            <li>
                <!--
                Seeking age: Two 6-character-wide text boxes for the user to
                specify the range of acceptable ages of partners.The box should allow
                the user to type up to 2 characters in each box. 
                -->
                <strong>Seeking Age:</strong>
                <input type="text" name="min" size="6" maxlength="2" placeholder="min"/> to
                <input type="text" name="max" size="6" maxlength="2" placeholder="max"/>
            </li>
        </ul>

        <!--
        Sign Up: When the user presses "Sign Up," the form should submit its data as a POST to signup-submit.php.
        -->
        <input type="submit" value="Sign Up"/>
    </fieldset>
</form>

<?php include("bottom.php"); ?>