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
    <form action="logic/register.logic.php" method="POST">
        <input name="uid"        type="text"     placeholder="username">
        <input name="mail"       type="text"     placeholder="e-mail">
        <input name="pwd"        type="password" placeholder="password">
        <input name="pwd-repeat" type="password" placeholder="confirm password">
        <button name="signup-submit" type="submit" >Register</button>
    </form>
    <a href="login.php">Have an Account? Login now!</a>    

    <?php
require 'footer.php'; 
?>
