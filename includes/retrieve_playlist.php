<?php


function get_videoID($link){
    
        $texte = $link; 
       $marqueurDebutLien = 'http://www.youtube.com/watch?v='; 
         $debutLien = strpos( $texte, $marqueurDebutLien ) + strlen( $marqueurDebutLien ); 
          $marqueurFinLien = '&feature=youtube_gdata'; 
         $finLien = strpos( $texte, $marqueurFinLien ); 

         $videoID = substr( $texte, $debutLien, $finLien - $debutLien ); 

    return $videoID;
}


function get_playlist($start_range){
  $xml =  simplexml_load_file('http://gdata.youtube.com/feeds/api/videos?max-results=20&start-index='.$start_range.'&author=majesticcasual');
  $i=$start_range;
  
  foreach ($xml->entry as $video) {
                        
                                        $title = $video->title.'<br>';
                                        $link = $video->link['href'].'<br>';

                                       
                                        $videoTitle = $video->title;
                                        $videoID = get_videoID($link);
                                        $videoURL = "http://www.youtube.com/watch?v=".$videoID;
                                        $videoThumb = "http://img.youtube.com/vi/". $videoID ."/default.jpg";
        
                                       $string = '<li id="'.$videoID.'"><img alt="'.$videoTitle.'" src="'.$videoThumb.'"/><p id='.$i.'><b>'.$i.'</b> - '.$videoTitle.'</p></li><br/>';
                                      echo $string;
                                     $i++;  
   }
}

function get_random_playlist(){
  $random_playlist_start= rand(1,680);
  get_playlist($random_playlist_start);
}
  


/* Pour l'ajax - NE FONCTIONNE PAS LORS D'UN CLIC SUR UNE LI */
$playlist_range = $_POST['playlist_range'];

if ( $playlist_range > 0 ){
  get_playlist($playlist_range);
}


?>