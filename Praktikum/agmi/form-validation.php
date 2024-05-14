<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Define variables and set default values
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "";

    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Nama harus diisi";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Nama hanya boleh mengandung huruf dan spasi";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email harus diisi";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email is a valid format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email tidak valid";
        }
    }

    // Validate gender
    if (empty($_POST["gender"])) {
        $genderErr = "Jenis kelamin harus dipilih";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // Validate website (optional)
    if (!empty($_POST["website"])) {
        $website = test_input($_POST["website"]);
        // Check if website is a valid URL
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=|!:,.;]*[-a-z0-9+&@#\/%?=|!:,.;]/i", $website)) {
            $websiteErr = "URL website tidak valid";
        }
    }

    // If there are no errors, process the form
    if (empty($nameErr) && empty($emailErr) && empty($websiteErr) && empty($genderErr)) {
        // Process form data (e.g., insert data into database, send email notification)
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
