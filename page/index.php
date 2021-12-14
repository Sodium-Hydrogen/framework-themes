<?php
  $url = get_url(false);
  $ispost = (strrpos($url, '/') > 0);
  $base_url = explode("/", $url)[0];
  $id = $base_url == ""?$_SESSION["pages"][0]['id']:null;
  if($id === null){
    foreach($_SESSION["pages"] as $page){
      if($base_url == strtolower($page["title"])){
        $id = $page["id"];
        break;
      }
    }
  }else{
    $base_url = $_SESSION["pages"][0]["title"];
  }
  $content = fetch_content($id);
  if($ispost){
    $p_id = null;
    $post = substr($url, strrpos($url, '/')+1);
    foreach($content["page_content"] as $pg_cnt){
      if(isset($pg_cnt["title"]) && strtolower($pg_cnt["title"]) == $post){
        $p_id = $pg_cnt["id"];
      }
    }
    if($p_id == null){
      $_SESSION["error"] = "404";
      require (dirname(__FILE__) . "/error.php");
      exit();
    }else{
      $head = $content["in_html_header"];
      $content = fetch_content($id, $p_id);
      $content['direction'] = 'column';
      $content["in_html_header"] = $head;
    }
  }

  require (dirname(__FILE__) . "/../header.php");

  echo "<div class='content ".$content['direction']."'>";
  echo "<div class='title'><h2>".$content['title']."</h2></div><div class='post'>";
  if($ispost){
    echo "<div class='post-img'><img src='".$content['picture']."'></div>";
  }
  echo $content['content'];
  if(isset($content['page_content']) && sizeof($content["page_content"])){
    echo "<div class='post-table'>";
    foreach($content['page_content'] as $pg_cnt){
      print "<div";
      if(isset($pg_cnt["title"])){
        $posturl = $_SERVER['SCRIPT_NAME']."/".urlencode($base_url)."/".urlencode($pg_cnt['title']);
        echo " class='table-row'><div><a href='$posturl'>$pg_cnt[title]</a></div>";
        echo "<div><a href='$posturl'><img src='".$pg_cnt['picture']."' alt='".$pg_cnt['title']."'></a></div>";
      }else{
        print ">$pg_cnt[content]";
      }
      print "</div>";
    }
    echo "</div>";
  }
  echo "</div>";
  if($ispost){
    echo "<div class='navigate'>";
    echo "<a href='".$_SERVER['SCRIPT_NAME']."/".$base_url."'>Back</a></div>";
  }
  echo "</div>";

  require (dirname(__FILE__) . "/../footer.php");
?>
