<html>
    <head>
        <title>::Data Registrasi::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .container{
                background-color: white;
                border: 3px solid grey;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 600px;
                width: 100%;
            }
            h1{
                text-align: center;
                color: #333;
                margin-bottom: 30px;
                font-size: 28px;
            }
            .success-message{
                background-color: #d4edda;
                color: #155724;
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid #c3e6cb;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            .error-message{
                background-color: #f8d7da;
                color: #721c24;
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid #f5c6cb;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            table{
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td{
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th{
                background-color: #f8f9fa;
                font-weight: bold;
                color: #333;
            }
            td{
                color: #666;
            }
            .back-button{
                text-align: center;
                margin-top: 20px;
            }
            .back-button a{
                background-color: #007bff;
                color: white;
                padding: 12px 24px;
                text-decoration: none;
                border-radius: 5px;
                display: inline-block;
                transition: background-color 0.3s;
            }
            .back-button a:hover{
                background-color: #0056b3;
            }
        </style>
    </head>

<?php
    $show_error = false;
    $error_message = "";

    if (isset($_POST['submit'])) {
        
        $nama_depan = htmlspecialchars($_POST['nama_depan']);
        $nama_belakang = htmlspecialchars($_POST['nama_belakang']);
        $asal_kota = htmlspecialchars($_POST['asal_kota']);
        $umur = (int)htmlspecialchars($_POST['umur']);

        if ($umur < 10) {
            $show_error = true;
            $error_message = "Umur yang Anda masukan ($umur tahun) tidak valid. <br> Minimal umur pendaftaran adalah 10 tahun.";
        } else {
            $nama_lengkap = $nama_depan . " " . $nama_belakang;
            $umur_display = $umur . " tahun";
        }

    } else {
        $show_error = true;
        $error_message = "Silakan isi form registrasi terlebih dahulu.";
    }
?>

    <body>
        <div class="container">
            <h1>Data Registrasi User</h1>
            
            <?php if ($show_error == false): ?>
                <div class="success-message">
                    Registrasi Berhasil!
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Umur</th>
                            <th>Asal Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= $umur; $i++): ?>
                            <?php if ($i % 2 == 0 && $i != 4 && $i != 8): ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $nama_lengkap; ?></td>
                                    <td><?php echo $umur_display; ?></td>
                                    <td><?php echo $asal_kota; ?></td>
                                </tr>
                            <?php endif; ?> 
                        <?php endfor; ?>
                    </tbody>
                </table>
                
                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>

            <?php else: ?>
                <div class="error-message">
                    <h3>Error: Registrasi Gagal</h3>
                    <p><?php echo $error_message; ?></p>
                </div>
                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>
