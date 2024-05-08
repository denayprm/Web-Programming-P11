<?php
    // Membuat variabel kosong
    $nama = "";
    $username = "";
    $pass = "";
    $namaErr = "";
    $usernameErr = "";
    $passErr = "";

    // Cek form sudah di klik submit/belum
    if(isset($_POST['submit'])){
        $nama = trim($_POST['nama']);
        $username = trim($_POST['username']);
        $pass = trim($_POST['pass']);

        // Cek input kosong
        if(empty($nama)){
            $namaErr = "Nama masih kosong.<br>";
        }
        if(empty($username)){
            $usernameErr = "Username masih kosong.<br>";
        }
        if(empty($pass)){
            $passErr = "Password masih kosong. <br>";
        }

        // Cek semua input sudah diisi apa belum
        if(!empty($nama) and !empty($username) and !empty($pass)){
            echo "Selamat semua input sudah diisi. <br>";
        }
    }
?>

<h3>From Register</h3>

<form action="validasi_kosong.php" method="post">
    Nama : <input type="text" name="nama" value="<?php echo $nama; ?>"><br>
            <?php echo $namaErr;?>
    Username : <input type="text" name="username" value="<?php echo $username; ?>"><br>
            <?php echo $usernameErr;?>
    Password : <input type="text" name="pass" value="<?php echo $pass; ?>"><br>
            <?php echo $passErr;?>
    <input type="submit" name="submit" value="Register">
</form>