<?php

function get_total_count(){
  $query = file_get_contents('http://gdata.youtube.com/feeds/api/users/majesticcasual/uploads?v=2&alt=jsonc');
  $data = json_decode($query, TRUE);
  return $data['data']['totalItems'];
}

function get_playlist($start_range){
  $query = file_get_contents('http://gdata.youtube.com/feeds/api/users/majesticcasual/uploads?v=2&start-index='.$start_range.'&alt=jsonc');
  $data = json_decode($query, TRUE);
  $i=$start_range;
  
  foreach ($data['data']['items'] as $items => $item) {
    $videoTitle = $item['title'];
    $videoID = $item['id'];
    $videoDuration = $item['duration'];
    $videoThumb = $item['thumbnail']["sqDefault"];
    $videoThumbHQ = $item['thumbnail']["hqDefault"];                        
    $string = '<li id="'.$videoID.'"><img alt="'.$videoTitle.'" src="'.$videoThumb.'"/><p id='.$i.'><b>'.$i.'</b> - '.$videoTitle.'</p></li><br/>';
    echo $string;
    $i++;    
   }
}

function get_random_playlist(){get_playlist(rand(1,get_total_count()));}

?>