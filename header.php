<?php
require (dirname(__FILE__).'/functions.php');
$cur = get_url(false);
queue_header("<link rel='icon' href='/resources/theme/resources/favicon.png'>");
queue_header("<link rel='stylesheet' href='/resources/theme/resources/stylesheet.css'>");
if(!isset($_SESSION['dark_mode']) || $_SESSION['dark_mode'] === true){
  queue_header("<link rel='stylesheet' href='/resources/theme/resources/dark-stylesheet.css'>");
}else{
  queue_header("<link rel='stylesheet' href='/resources/theme/resources/light-stylesheet.css'>");
}
queue_header("<script src='/resources/theme/resources/script.js'></script>");
if(isset($error_page)){
  request_page_head("Error");
}else{
  foreach($content["in_html_header"] as $header){
    queue_header($header["content"]);
  }
  request_page_head();
}
?>
  <div class="menu" id="menu">
    <div class='title'>
    <?php
      echo "<h1>" . $_SESSION['site'] . "</h1>";
      echo "<h2 class='caption'>".$_SESSION['sub_title']."</h2>";
    ?>
    </div>
    <div class='dropDownContainer'>
    <div class="dropDownBtn" onclick="dropdown()">
      <div class="oval"></div>
      <div class="oval"></div>
      <div class="oval"></div>
    </div>
    <div class="menuLinks" id="dropDownContainer">
      <?php
      $home = null;
      foreach($_SESSION['pages'] as $page){
        if(empty($_SESSION["error"]) && strtolower($page['title']) == explode("/", $cur)[0] || ($home === null && $cur == "")){
          $class = "class='current'";
        }else{
          $class = "";
        }
        echo "<div class='menuItem'>";
        if($home == null){
          echo "<a $class href=/index.php/>$page[title]</a>";
          $home = $page['title'];
        }else{
          echo "<a $class href='/index.php/".urlencode($page['title'])."'>".$page['title']."</a>";
        }
        echo "</div>";
      }
      ?>
    </div>
  </div>
</div>
  <div class="container">
