<?php
  $url = get_url();
  require (dirname(__FILE__) . "/../header.php");
  $ispost = (strrpos($url, '/') > 0);
  if($ispost){
    $page = substr($url, 0, strrpos($url, '/'));
    $post = substr($url, strrpos($url, '/')+1);
    $content = fetch_content($page, $post);
    $content['direction'] = 'row';
  }else{
    $content = fetch_content($url);
  }
  echo "<div class='content ".$content['direction']."'>";
  echo "<div class='title'><h3>".$content['title']."</h3>";
  if($ispost){
    echo "<img src='".$content['picture']."'>";
  }
  echo "</div>";
  echo "<div class='post'>".$content['content'];
  if(count($content['posts']) > 0){
    echo "<table><tbody>";
    foreach($content['posts'] as $post){
      $posturl = $_SERVER['SCRIPT_NAME']."/".$url."/".urlencode($post['name']);
      echo "<tr><td><a href='$posturl'>".$post['title']."</a></td>";
      echo "<td><a href='$posturl'><img src='".$post['picture']."' alt='".$post['title']."'></a></td></tr>";
    }
    echo "</tbody></table>";
  }
  if($ispost){
    echo "<br><br><br><br><div class='navigate'>";
    echo "<a href='".$_SERVER['SCRIPT_NAME']."/".$page."'>Back</a></div>";
  }
  echo "</div></div>";

  require (dirname(__FILE__) . "/../footer.php");
?>
