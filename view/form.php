
<!DOCTYPE html>
<html>
<head>
    <title>Contact-Rakin</title>
</head>
<body>

<h1>Contact Me</h1>
<fieldset>
    <legend>Enter Details:</legend>
    <form action="action_page.php">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" placeholder="Enter first name:"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" placeholder="Enter last name:"><br><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" placeholder="Enter last name:"><br><br>
        <input type="submit" value="Submit">
        <input type="reset" value="reset">
        <br>
        Select Hobby:
        <input type="checkbox" id="reading" name="reading" value="reading">Reading
        <input type="checkbox" id="surfing" name="surfing" value="surfing">Surfing
        <br>
        Select Gender:
        <input type="radio" id="gender1" name="gender1" value="gender1">Male
        <input type="radio" id="gender2" name="gender1" value="gender2">Female
    </form> 
</fieldset>

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>
</body>
</html>

