<?php
session_start();
if(isset($_SESSION['admin_username'])!=''){
    header("location:index.php");
    exit();
}
include("../inc/inc_koneksi.php");

$username   = "";
$password   = "";
$err        = "";

if(isset($_POST['Login'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    if($username == '' or $password == ''){
        $err    = "Silahkan masukkan semua isian";
    }else{
        $sql1   = "select * from admin where username = '$username'";
        $q1     = mysqli_query($koneksi,$sql1);
        $r1     = mysqli_fetch_array($q1);
        $n1     = mysqli_num_rows($q1);

        if($n1 < 1){
            $err = "Username tidak ditemukan";
        }elseif($r1['password'] != md5($password)){
            $err = "Password yang kamu masukkan salah";
        }else{
            $_SESSION['admin_username'] = $username;
            header("location:index.php");
            exit();
        }
    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Visit Jatinegara Kaum</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


    <link rel="shortcut icon" href="../img/logo.png">

</head>

<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br><br>
                <img src="../img/Visit1.png" alt="" style="height: 100px;">
                <h2 style="color: black;">Login Administrator</h2>
                <?php
                if ($err) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo $err ?>
                    </div>
                <?php
                }
                ?>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Enter Details To Login </strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <br>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Username</span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Anda" value="<?php echo $username ?>" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Password</span>
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                            <div class="form-group">
                            </div>

                            <button type="submit" class="btn btnbeli" name="Login">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../js/custom.js"></script>

</body>

</html>