<?php
$error_page = true;
// $variable_from_error = "hello this is an error page";
  http_response_code(intval($_GET['error']));
  require (dirname(__FILE__) . "/../header.php");

  echo "<div class='content column'>";
  echo "<div class='title'><h3>Error ".$_GET['error']."</h3></div>";
  echo "<div class='post'>".get_error_message($_GET['error'])."</div>";
  echo "</div>";

// echo "hello";

  require (dirname(__FILE__) . "/../footer.php");
?>
