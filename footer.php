<div class="footer">
  <?php
  $footers = get_all_footers();
  $footerCnt = count($footers);
  foreach($footers as $footer){
    echo "<div class='sections num$footerCnt'><h4>".$footer['name']."</h4>".$footer['content'];
    if(count($footer['links']) > 0){
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
    echo "Copyright © " . date("Y") . " Michael Julander";
  ?>
</div>
</body>
