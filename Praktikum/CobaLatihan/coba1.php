<?php
    // Membuat variabel kosong
    // Cek form sudah di klik submit/belum
    // Cek input kosong
    // Cek semua input sudah diisi apa belum
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
        <form action="coba1.php" method="POST">
            <table>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><input type="text" name="nama"><span> *</span></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td><input type="text" name="nama"><span> *</span></td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
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
                        <span> *</span>
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