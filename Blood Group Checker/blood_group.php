
<!DOCTYPE html>
<html>
<head>
<title>Blood Group Compatibility Checker</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Blood Group Compatibility Checker</h1>
<form method="POST">
<?php
    // Check if the form has been submitted
    if(isset($_POST['submit'])) {
        // Get the selected blood groups from the form
        $partner1_blood_group = $_POST['partner1_blood_group'];
        $partner2_blood_group = $_POST['partner2_blood_group'];

        // Define an array of blood groups that are compatible
        $compatible_blood_groups = array(
            "O+" => array("O+", "O-","B+","B-","A+","A-"),
            "O-" => array("O-","A-","B-","AB-"),
            "A+" => array("A+","A-","AB+","AB-","O+","O-","B+","B-"),
            "A-" => array("A-","AB-","O-","B-"),
            "B+" => array("B+","B-","AB+","AB-","O+","O-","A+","A-"),
            "B-" => array("B-","AB-","O-","A-"),
            "AB+" => array("AB+","AB-","A+","A-","B+","B-","O+","O-"),
            "AB-" => array("AB-","A-","B-","O-")
        );

        // Check if the selected blood groups are compatible
        if(in_array($partner2_blood_group, $compatible_blood_groups[$partner1_blood_group])) {
            echo "<span>Partners are compatible!</span>";
        } else {
            echo "<span>Partners are not compatible!</span>";
        }
    }
?>
    <label for="partner1_blood_group">Partner 1 Blood Group:</label>
    <select id="partner1_blood_group" name="partner1_blood_group" required>
    <option value="" disabled="disabled" selected="selected">&larr; Select Blood Group &rarr;</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select>
    <br>
    <label for="partner2_blood_group">Partner 2 Blood Group:</label>
    <select id="partner2_blood_group" name="partner2_blood_group" required>
    <option value="" disabled="disabled" selected="selected">&larr; Select Blood Group &rarr;</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select>
    <br>
    <input type="submit" name="submit" value="Check Compatibility">
</form>
</body>
</html>