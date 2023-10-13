<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tampilan Cantik</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .table {
            border-collapse: separate;
            border-spacing: 0 15px;
        }
        .table th,
        .table td {
            vertical-align: middle;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .table th,
        .table td {
            border-top: 0;
        }
        .table .btn {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">User Login</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../koneksi.php";
                // Query data dari tabel
                $sql = "SELECT id, username, password FROM user";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    // Output data dari setiap baris
                    while($row = $result->fetch_assoc()) {
                        $nama = $row["username"];
                        $email = $row["password"];
                        echo "<tr>
                                <td>" . $row["id"]. "</td>
                                <td>$nama <button class='btn btn-secondary' onclick='copyToClipboard(\"$nama\", this)'><i class='fas fa-copy'></i> </button></td>
                                <td>$email <button class='btn btn-secondary' onclick='copyToClipboard(\"$email\", this)'><i class='fas fa-copy'></i></button></td>
                                <td>
                                    <a href='#' class='btn btn-danger'><i class='fas fa-trash'></i> Hapus</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
                }

                // Tutup koneksi database
                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- JavaScript untuk menyalin ke clipboard -->
    <script>
        function copyToClipboard(text, button) {
            var tempInput = document.createElement("input");
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            
            // Mengubah teks tombol menjadi "Tersalin"
            button.innerHTML = "<i class='fas fa-check'></i>";
            button.disabled = true;

            setTimeout(function () {
                // Mengembalikan teks tombol setelah beberapa detik
                button.innerHTML = "<i class='fas fa-copy'></i> ";
                button.disabled = false;
            }, 2000); // Ganti 2000 dengan jumlah milidetik yang diinginkan
        }
    </script>
</body>
</html>
