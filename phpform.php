<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Name Validation</title>
</head>
<body>

    <?php
    
    $nameErr = $addErr = $pinErr = $phoneErr = $stateErr = $cityErr = ""; 
    $name = $address = $pincode = $city = $state = $phone = "";


    // Regex patterns
    $nameRegex = "/^[A-Za-z\s]+$/"; 
    $pinRegex = "/^\d{6}$/";         
    $phoneRegex = "/^\d{10}$/";  

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate Name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } elseif (!preg_match($nameRegex, $_POST["name"])) {
            $nameErr = "Only alphabets and spaces allowed";
        } else {
            $name = htmlspecialchars(stripslashes(trim($_POST["name"])));
        }

        // Validate Address
        if (empty($_POST["address"])) {
            $addErr = "Address is required";
        } elseif (strlen($_POST["address"]) < 5) {
            $addErr = "Invalid Address: Must be at least 5 characters.";
        } else {
            $address = htmlspecialchars(stripslashes(trim($_POST["address"])));
        }

        // Validate Pin Code
        if (empty($_POST["pincode"])) {
            $pinErr = "Pin Code is required";
        } elseif (!preg_match($pinRegex, $_POST["pincode"])) {
            $pinErr = "Invalid Pin Code: Must be exactly 6 digits.";
        } else {
            $pincode = htmlspecialchars(stripslashes(trim($_POST["pincode"])));
        }

        // Validate State
        if (empty($_POST["state"])) {
            $stateErr = "State is required";
        } elseif (!preg_match($nameRegex, $_POST["state"])) {
            $stateErr = "Invalid State: Only alphabets allowed.";
        } else {
            $state = htmlspecialchars(stripslashes(trim($_POST["state"])));
        }

        // Validate City
        if (empty($_POST["city"])) {
            $cityErr = "City is required";
        } elseif (!preg_match($nameRegex, $_POST["city"])) {
            $cityErr = "Invalid City: Only alphabets allowed.";
        } else {
            $city = htmlspecialchars(stripslashes(trim($_POST["city"])));
        }

        // Validate Phone
        if (empty($_POST["phone"])) {
            $phoneErr = "Phone Number is required";
        } elseif (!preg_match($phoneRegex, $_POST["phone"])) {
            $phoneErr = "Invalid Phone Number: Must be exactly 10 digits.";
        } else {
            $phone = htmlspecialchars(stripslashes(trim($_POST["phone"])));
        }
    }
    ?>

    <h2>Registration Form</h2>
    <form method="post" action="">

        <label>Full Name:</label>
        <input type="text" id="name" name="name" required value="<?php echo $name; ?>">
        <span style="color:red;">* <?php echo $nameErr; ?></span><br><br>

        <label>Address:</label><br>
        <textarea id="address" name="address" rows="3" cols="30" required><?php echo $address; ?></textarea>
        <span style="color:red;">* <?php echo $addErr; ?></span><br><br>

        <label>Pin Code:</label>
        <input type="text" id="pincode" name="pincode" required value="<?php echo $pincode; ?>">
        <span style="color:red;">* <?php echo $pinErr; ?></span><br><br>

        <label>City:</label>
        <input type="text" id="city" name="city" required value="<?php echo $city; ?>">
        <span style="color:red;">* <?php echo $cityErr; ?></span><br><br>

        <label>State:</label>
        <input type="text" id="state" name="state" required value="<?php echo $state; ?>">
        <span style="color:red;">* <?php echo $stateErr; ?></span><br><br>

        <label>Phone Number:</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter 10-digit number" required value="<?php echo $phone; ?>">
        <span style="color:red;">* <?php echo $phoneErr; ?></span><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    
    if (empty($nameErr) && empty($addErr) && empty($pinErr) && empty($stateErr) && empty($cityErr) && empty($phoneErr)) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p style='color:green;'>Form submitted successfully! Name: <strong>$name</strong></p>";
        }
    }
    ?>

</body>
</html>
