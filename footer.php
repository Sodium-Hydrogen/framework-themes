<div class="footer">
  <?php
  foreach($_SESSION["footers"] as $footer){
    echo "<div class='sections'><h4>".$footer['title']."</h4>".$footer['content'];
    if(sizeof($footer['links'])){
      echo "<ul class='socialBox'>";
      foreach($footer['links'] as $link){
        echo "<li><a class='social' href='".$link['url']."' target='_blank'>";
        echo "<i class='fa".$link['type'][0]." fa-".$link['icon']."'></i>";
        echo "</a></li>";
      }
      echo "</ul>";
    }
    echo "</div>";
  }
  ?>
</div>
</div>
<div class="copyright">
  <?php
		echo $_SESSION['show_login'] ? "<a href='/login.php'>Login</a>" : "";
    echo "Copyright © " . date("Y") . " Michael Julander";
  ?>
</div>
</body>
