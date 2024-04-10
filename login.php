
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <style>
        /* CSS for custom styles */
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-family: Arial, sans-serif; /* Change font family */
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 20px 20px 0 0;
            padding: 20px 0;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border: none;
            border-radius: 20px;
            padding: 15px;
            background-color: #f3f4f6;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            padding: 15px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-link {
            color: #007bff;
            text-decoration: none;
        }

        .btn-link:hover {
            text-decoration: underline;
        }
            /* CSS for custom styles */
            body {
            background-color: #f0f0f0; /* Màu nền của trang */
            font-family: Arial, sans-serif;
            color: #333; /* Màu chữ chính */
        }

        #login-container {
            width: 400px;
            margin: 100px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* Màu nền của hộp đăng nhập */
        }

        .card-header {
            background-color: #007bff; /* Màu nền của header */
            color: #fff; /* Màu chữ của header */
        }

        .card-body {
            padding: 20px;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-dark {
            background-color: #28a745; /* Màu nền của nút đăng nhập */
            border-color: #28a745; /* Màu viền của nút đăng nhập */
            color: #fff; /* Màu chữ của nút đăng nhập */
        }

        .btn-dark:hover {
            background-color: #218838; /* Màu nền của nút đăng nhập khi di chuột vào */
            border-color: #218838; /* Màu viền của nút đăng nhập khi di chuột vào */
        }

        .btn-link {
            color: #007bff; /* Màu chữ của liên kết */
        }

        .btn-link:hover {
            color: #0056b3; /* Màu chữ của liên kết khi di chuột vào */
        }
    </style>

    <title>Clothes Store</title>
</head>

    <body id="register-body">
        <?php
            session_start();
            
            if (isset($_GET['thanhcong'])){
                $email = $_SESSION['email'];
                $conn = mysqli_connect("localhost","root","","webdb");
                $sql = "select hovaten,email from tblthongtin where email = '".$email."'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    if ( $matkhau == $row['matkhau']) {
                        $_SESSION['name'] = $row['hovaten'];
                    }
                }
                header('location: index.php?hoanthanh');
            }

            if (isset($_GET['hoanthanh'])){
                // This is in the PHP file and sends a Javascript alert to the client
                $message = "Đăng ký thành công, vui lòng đăng nhập lại";
                echo "<script type='text/javascript'>alert('$message');</script>";

            }

            if (isset($_GET['404'])){
                // This is in the PHP file and sends a Javascript alert to the client
                $message = "Đăng nhập sai";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }

            if (isset($_GET['hacker'])){
                // This is in the PHP file and sends a Javascript alert to the client
                $message = "Tài khoản của bạn đã bị khóa vui lòng liên hệ để biết thêm thông tin chi tiết";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }

            if (isset($_GET['yeucau'])){
                // This is in the PHP file and sends a Javascript alert to the client
                // $message = "Vui lòng đăng nhập";
                // echo "<script type='text/javascript'>alert('$message');</script>";
            }
        ?>
        <!-- Sản phẩm mới -->
        <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <form action="xulydangnhap_V2.php" method="GET">
                    <div class="form-group">
                        <input required type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input required type="password" name="matkhau" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
                <div class="text-center">
                    <a href="./register.php" class="btn btn-link">Don't have an account? Register</a>
                </div>
            </div>
        </div>
    </div>
        </main>
        <footer class="text-white bg-dark">

        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

        <script src="./js/trung/login.js"></script>
        <script>
        function showHint(str) {
        if (str.length == 0) {
            document.getElementById("checkmail").innerHTML = "";
            return;
        } 
        else 
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("checkmail").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", "gethint_TK.php?q=" + str, true);
            xmlhttp.send();
        }
        }
        </script>
    </body>

    </html>