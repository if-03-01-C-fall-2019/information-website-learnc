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
        <li><a class="active" href="forum.php">Forum</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
        <main>
            <pre class="border">


            1
            1
            1
            1
            1
            </pre>
            <?php
                if(isset($_SESSION['userId'])){
                    echo '<p> You are logged in! </p>';
                }
                else{
                    echo '<p> You are logged out! </p>';
                }
            ?>
        </main>

<?php
require 'footer.php'; 
?>