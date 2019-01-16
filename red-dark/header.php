<?php
require 'resources/theme/functions.php';
request_page_head();
$cur = get_url("index.php");
?>
<link rel="icon" href="/resources/theme/resources/favicon.png">
<link rel="stylesheet" href="/resources/theme/resources/stylesheet.css">
<script src="/resources/theme/resources/script.js"></script>
<?php
load_logged_header();
?>
<body>
  <div class="menu" id="menu">
    <div class='title'>
    <?php
      echo "<h1>" . $_SESSION['site'] . "</h1>";
      echo "<h2 class='caption'>";
      $file = file_get_contents("content/page");
      $first = strpos($file, "\n") + 1;
      $second = strpos($file, "\n", $first);
      echo trim(substr($file, $first, $second-$first));
    echo "</h2>";
    ?>
    </div>
    <button class="dropDownBtn" onclick="dropdown()">
      <div class="oval"></div>
      <div class="oval"></div>
      <div class="oval"></div>
    </button>
    <div class="dropdown" id="dropDownContainer">
      <?php
      $page = $_SESSION['page'];
      for($i = 0; $i < count($page); $i++){
        if($page[$i] == $cur){
          $class = "class='current'";
        }else{
          $class = "";
        }
        if($page[$i] !== "home"){
          echo "<a $class href=/index.php/" . str_replace(" ", "%20", $page[$i]) . ">" . ucwords($page[$i]) . "</a>";
        }else{
          echo "<a $class href=/index.php/>Home</a>";
        }
      }
      ?>
    </div>
    <div class = "selcetionContainer">
      <?php
      $page = $_SESSION['page'];
      for($i = 0; $i < count($page); $i++){
        if($page[$i] == $cur){
          echo "<div class='menuItem currentItem'>";
        }else{
          echo "<div class='menuItem'>";
        }
        if($page[$i] !== "home"){
          echo "<a $class href=/index.php/" . str_replace(" ", "%20", $page[$i]) . ">" . ucwords($page[$i]) . "</a>";
        }else{
          echo "<a href=/index.php/>Home</a>";
        }
        echo "</div>";
      }
      ?>
    </div>
  </div>
</div>
  <div class="container">
