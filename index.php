<?php
include_once('includes/retrieve_playlist.php');

$searchID = $_GET['track'];
?>

<!DOCTYPE html>
<html lang="fr">
        <head>
                <meta charset="utf-8">
                <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>majestic. player | v0.6.2</title>
                <link rel="stylesheet" type="text/css" href="css/style.css" /> 
                 <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> 
                 <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
                
                 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
              <script type="text/javascript" src="js/bootstrap.min.js"></script>
              <script type="text/javascript" src="js/jquery.tubular.1.0.js"></script>   
              
               <script type="text/javascript">
                    $(document).ready(function() {

                                //Si pas de données en POST alors charger la premiere video de la liste.
                               /* 
                                var clickID = '<?php echo $clickID; ?>';
                                if(clickID){ var video_id = '<?php echo $clickID; ?>';}
                                if(!clickID ){ var video_id = $('ul.last_sounds li:first').attr('id');}
                               */
                                var video_id = $('ul.last_sounds li:first').attr('id');
                               
                                $.getJSON('http://gdata.youtube.com/feeds/api/videos/'+video_id+'?v=2&alt=jsonc',function(data,status,xhr){
                                    $("h1#title").append(data.data.title); //Title
                                     $("h1#track_id").append('#'+$('ul.last_sounds li#'+video_id).find('p').attr('id'));
                                   });

                                //Tubular
                               $('#wrapper').tubular({
                                    videoId: video_id,
                                    wrapperZIndex: 5,
                                    repeat: false,
                                    mute: false
                                }); 
                                
                                //Player buttons
                                $('#play').click(function () {
                                        
                                        if ( $(this).attr('class') == "tubular-pause btn btn-inverse btn-medium"){
                                            $(this).attr('class','tubular-play btn btn-inverse btn-medium');
                                            $(this).find('i').attr('class','icon-pause icon-white');
                                        }else{
                                           $(this).attr('class','tubular-pause btn btn-inverse btn-medium');
                                            $(this).find('i').attr('class','icon-play icon-white');
                                            
                                        }
                                });
                                
                                //Playlist menu
                                var has_click = false;
                                $('#playlist_button').click(function() {

                                    if(!has_click){
                                        $('#playlist').show('slow');
                                        $(this).addClass('active');
                                        has_click = true;
                                    }else{
                                        $('#playlist').hide('slow');
                                        $(this).removeClass('active');
                                        has_click = false;
                                    }
                                    
                                    
                                });
                                
                                

                                //Event au clic d'une miniature video (chargement du son)
                                $('ul.last_sounds li').click(function(){
                                        var id = $(this).find('p').attr('id');
                                        $('.form-search').find('input').val(id);
                                      $('.form-search').submit();
                                       
                                });
                        //Activation des tooltip BootStrap.
                         if ($("[rel=tooltip]").length) {
                            $("[rel=tooltip]").tooltip();
                        }
                    });  
                </script>
        </head>
        <body>
            <div id="wrapper">
                <div id="navbar" class="row"> 
                   
                    <div id="logo"class="span4">
                        <h1>majestic.</h1>
                        <p>player</p>
                    </div>

                    <div id="social" class="span4">
                        <!-- social -->
                    </div>
                        
            		<div id="menu" class="span4">
            		    <ul>  
                            <li id="play" class="tubular-play btn btn-inverse btn-medium"><i class="icon-pause icon-white"></i><!--<a alt="play/pause"><img src="img/pause.png" alt="play/pause"></a>--></li>
            			    <li id="playlist_button" class="btn btn-inverse btn-medium"><i class="icon-list icon-white"></i><!--<a alt="playlist"><img src="img/button-tray-down.png" alt="playlist"></a>--></li>
            		    </ul>
            		</div>
            	</div>  <!-- end navbar-->
            		                
                <div id="playlist">
                	<div id="playlist-menu" class="sub_menu">
                        <form class="form-search" method="get">
                                      <input type="text" class="input-medium search-query" name="track" value="">
                                      <button type="submit" class="btn"><i class="icon-play"></i></button>
                                    </form>
                		<ul>
                		    <li id="brand_new"><a class="active"><i class="icon-heart"></i>Brand new</a></li>
                		    <li id="top_10"><a>...</a></li>
                		    <li id="log_in"><a>Log in</a></li>
                		                	                                                
                		</ul>
                		<hr size="0,5px">
                    </div>
                    <div class="sub_menu">
                		<ul class="last_sounds">
                            <?php 
                            if($searchID){
                                get_playlist($searchID);
                            }else{ get_random_playlist();} ?>
                		</ul>
                    </div>
                	
                
                                            
                </div> <!-- end playlist -->
                
                <div id="sound-infos">
                    <h1 id="title"></h1>  
                    <h1 id="track_id"></h1>      
                </div>  

            </div> <!-- end wrapper -->
        </body>
</html>