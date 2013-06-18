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

        <title>majestic. player | v0.6.3</title>

        <link rel="stylesheet" type="text/css" href="css/style.css" /> 
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> 
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
    </head>
        <body>
            <div id="wrapper">
                <div id="navbar" class="row"> 
                    <div id="logo"class="span4">
                        <h1>majestic.</h1>
                        <p>player</p>
                    </div>

                    <div id="social" class="span4"></div>
                        
            		<div id="menu" class="span4">
            		    <ul>  
                            <li id="play" class="tubular-play btn btn-inverse btn-medium"><i class="icon-pause icon-white"></i></li>
            			    <li id="playlist_button" class="btn btn-inverse btn-medium"><i class="icon-list icon-white"></i></li>
            		    </ul>
            		</div>
            	</div>  <!-- end navbar-->
            		                
                <div id="playlist">
                	<div id="playlist-menu" class="sub_menu">
                        <form class="form-search" method="get">
                            <input type="text" class="input-medium search-query" name="track" value="">
                            <button type="submit" class="btn"><i class="icon-play"></i></button>
                        </form>
                		<ul id="">
                		    <li id="last_25"><a class="active"><i class="icon-heart"></i>Brand new</a></li>
                		    <li id="first_25"><a>First 25</a></li>
                	    </ul>
                		<hr size="0,5px">
                    </div><!-- end playlist-menu -->
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
                    <h1 id="track_id"></h1>
                    <h1 id="title"></h1>       
                </div>  
             </div> <!-- end wrapper -->
        </body>

        <!-- LE Javascript -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tubular.1.0-mod.js"></script> 
        <script type="text/javascript" src="js/mp_engine.0.6.3.js"></script> 
</html>