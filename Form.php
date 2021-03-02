<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .con {
            padding: 30px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $pass  = $_POST['pass'];
        $HostName = "localhost";
        $UserName = "root";
        $Password = "";
        $My_DB = "Email_Info";
        $conn = mysqli_connect($HostName, $UserName, $Password);
        if (!$conn) {
            echo "Not connected <br>";
        } else {
            echo "connected <br>";
            $create_DB = "CREATE DATABASE Email_Info";
            $data = mysqli_query($conn, $create_DB);
            if ($data or !$data) {
                $conn = mysqli_connect($HostName, $UserName, $Password, $My_DB);
                if (!$conn) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                         <strong>1Not Connected</strong> You should check in on some of those fields below.
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
                } else {
                    $Table = "CREATE TABLE `EMAIL_RECORD`(`EMAIL` VARCHAR(20) NOT NULL,
                                                          `PASS` VARCHAR(20) NOT NULL)";
                    $data1 = mysqli_query($conn, $Table);
                    if (!$data1 or $data)
                    {
                        echo "No";
                        $que12 = "INSERT INTO EMAIL_RECORD (`EMAIL`,`PASS`) VALUES('$email','$pass')";
                        $data2 = mysqli_query($conn, $que12);
                        if (!$data2)
                        {
                            echo "<br>....";
                        }
                        else
                        {
                            echo "<br>****";
                        }
                    }
                }
            }
            else
            {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                         <strong>2Not Connected</strong> You should check in on some of those fields below.
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
            }
        }
    }
    ?>
    <div class="con">
        <form action="/ajphp/Form.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="pass">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>