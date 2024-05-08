<?php
    $nama = "";
    $error_nama = "";
    $email = "";
    $error_email = "";
    $gender = "";
    $error_gender = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $error_nama = "Name is required";
        } else {
            $nama = test_input($_POST["nama"]);

            if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
                $error_nama = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $error_email = "Email is required";
        } else {
            $email = test_input($_POST["email"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "Invalid email format";
            }
        }

        if (empty($_POST["jk"])) {
            $error_gender = "Gender is required";
        } else {
            $gender = test_input($_POST["jk"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<html>
    <head>
        <style>
            p{
                color: red;
            }
            span {
                color: red;
            }
        </style>
        <title>FORM VALIDATION</title>
    </head>
    <body>
        <h1>PHP Form Validation Example</h1>
        <p>* required field</p>
        <form action="coba2.php" method="POST">
            <table>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input type="text" name="nama">
                    <span class="error"> *<?php echo $error_nama;?></span></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td><input type="text" name="email">
                    <span class="error"> *<?php echo $error_email;?></span></td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td>:</td>
                    <td><input type="text" name="website"></td>
                </tr>
                <tr>
                    <td>Comment</td>
                    <td>:</td>
                    <td>
                        <textarea name="pesan" cols="30" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="jk" value="Laki-laki"> Laki-laki
                        <input type="radio" name="jk" value="Perempuan"> Perempuan
                        <span class="error"> *<?php echo $error_gender;?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="left">
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
