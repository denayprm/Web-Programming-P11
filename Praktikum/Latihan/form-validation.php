<?php
$name = $email = $gender = $comment = $website = "";
$nameErr = $emailErr = $genderErr = $websiteErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Nama harus diisi";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Nama hanya boleh mengandung huruf dan spasi";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email harus diisi";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email tidak valid";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Jenis kelamin harus dipilih";
    } else {
        $gender = test_input($_POST["gender"]);
    }
    if (!empty($_POST["website"])) {
        $website = test_input($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=|!:,.;]*[-a-z0-9+&@#\/%?=|!:,.;]/i", $website)) {
            $websiteErr = "URL website tidak valid";
        }
    }

    if (empty($nameErr) && empty($emailErr) && empty($websiteErr) && empty($genderErr)) {
        echo "Formulir berhasil disubmit";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation Example</title>
    <style>
        .form-group input[type="text"] {
            margin-left: 7px;
            padding: 4px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1); /* Tambahkan efek bayangan dalam */
        }
        .error {color: red;}
    </style>
</head>
<body>
    <div>
        <h2>PHP Form Validation Example</h2>
        <p><span class="error">* required field</span></p>
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
            <span class="error">* <?php echo $nameErr;?></span>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
            <span class="error">* <?php echo $emailErr;?></span>
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="text" id="website" name="website" value="<?php echo isset($website) ? htmlspecialchars($website) : ''; ?>">
            <span class="error"><?php echo $websiteErr;?></span>
        </div>

        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="5" cols="40"><?php echo isset($comment) ? htmlspecialchars($comment) : ''; ?></textarea>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="radio" id="gender_female" name="gender" value="female" <?php if (isset($gender) && $gender == "female") echo "checked";?>> Female
            <input type="radio" id="gender_male" name="gender" value="male" <?php if (isset($gender) && $gender == "male") echo "checked";?>> Male
            <span class="error">* <?php echo $genderErr;?></span>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
</body>
</html>
