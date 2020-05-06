<?php
require 'header.php'; 
?>

<nav>
      <ul id="navigation">
      <li><a href="../index.php">LearnC#</a></li>
        <li><a href="structure.php">Basic Structure</a></li>
        <li><a href="output.php">Output</a></li>
        <li><a href="variables.php">Variable types</a></li>
        <li><a href="input.php">Input from user</a></li>
        <li><a href="junctions.php">Junctions</a></li>
        <li><a href="arrays.php">Arrays</a></li>
        <li><a href="methods.php">Methods</a></li>
        <li><a href="structs.php">Structs</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li><a class="active"  href="login.php">Login</a></li>
      </ul>
    </nav>
    <?php
      if(isset($_SESSION['userId'])){
        echo '
        <form action="logic/logout.logic.php" mehtod="post">
        <button type="submit" name="logout-submit">Logout</button>
        </form>
        ';
      }
      else{
        echo'
        <form action="logic/login.logic.php" method="POST">
        <input name="mailuid" placeholder="username">
        <input name="pwd" type="password" placeholder="password">
        <button type="submit" name="login-submit">Login</button>
        </form>
        <a href="register.php">Dont Have an Account yet? Register now!</a>#
        ';
      }
    ?>

<?php
require 'footer.php'; 
?>

