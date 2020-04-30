<?php
if(isset($_POST['signup-submit'])){
    require 'dbh.php';
    $username=$_POST['uid'];
    $email=$_POST['mail'];
    $password=$_POST['pwd'];
    $passwordRepeat=$_POST['pwd-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../register.php?error=emptyfields&uid=".username."&mail=".email);
        exit();
    }
    else if (!filer_var(§email, FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../register.php?error=invalidmailuid");
        exit();
    }
    else if (!filer_var(§email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail&uid=".username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../register.php?error=uid&mail=".email);
        exit();
    }
    else if(!$password == $passwordRepeat){
        header("Location: ../register.php?error=passwordcheck&uid=".username."&mail=".email);
        exit();
    }
    else{
        $sql = "SELECT uidUSERS FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../register.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if($resultCheck >0){
                header("Location: ../register.php?error=usertaken&mail=".email);
                exit();
            }
            else {
                $sql = "INSERT INTO users(uidUsers,emailUsers,pwdUsers) VALUES(?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../register.php?register=success");
                    exit();
                }
            }
        }
    }
    mysqli_smt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: register.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LearnC# - Structs</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body>
    <nav>
      <ul id="navigation">
        <li><a href="../index.html">LearnC#</a></li>
        <li><a href="structure.html">Basic Structure</a></li>
        <li><a href="output.html">Output</a></li>
        <li><a href="variables.html">Variable types</a></li>
        <li><a href="input.html">Input from user</a></li>
        <li><a href="junctions.html">Junctions</a></li>
        <li><a href="arrays.html">Arrays</a></li>
        <li><a href="methods.html">Methods</a></li>
        <li><a href="structs.html">Structs</a></li>
        <li><a href="forum.html">Forum</a></li>
        <li><a class="active"  href="login.html">Login</a></li>
      </ul>
    </nav>
    <form action="../src/register.php" method="POST">
        <input id="uid" name="login" placeholder="username">
        <input id="mail" name="mail" placeholder="e-mail">
        <input id="pwd" name="password" type="password" placeholder="password">
        <input id="pwd-repeat" name="confirm_password" type="password" placeholder="confirm password">
        <button type="submit" name="signup-submit">Register</button>
    </form>
    <a href="login.html">Have an Account? Login now!</a>    

  </body>
</html>
