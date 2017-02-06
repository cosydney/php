<?php
include("navbar.php");
if (isset($_SESSION['logged']) && $_SESSION['logged'] !== "") {
    header("Location: ../index.php");
    return;
}
?>
<br>
<div style="text-align: center;">
<form action="send_passwd_link.php" method="post">
  Email: <input type="email" name="email" required/>
  <br>
  <br>
  <input type="submit" name="submit" value="Send Password Link"/></form>
</div>
