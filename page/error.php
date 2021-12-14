<?php
$error_page = true;
  http_response_code(intval($_SESSION['error']));
  require (dirname(__FILE__) . "/../header.php");

  ?>
    <div class='content column'>
    <div class='title'><h3>Error <?php echo $_SESSION['error'] ?></h3></div>
    <div class='post'><?php echo get_error_message($_SESSION['error']) ?></div>
    </div>
  <?php
  unset($_SESSION["error"]);

  require (dirname(__FILE__) . "/../footer.php");
?>
