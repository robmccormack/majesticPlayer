/* majesticPlayer engine bêta-v0.6.3
*  author: Thomas Brodusch
*
*   Cause we love majestic.
*/
$(document).ready(function(){
var scene = $('#wrapper'),
                                    first_videoid = $('ul.last_sounds li:first').attr('id'),
                                    videotitle = $('ul.last_sounds li:first').find('img').attr('alt'),
                                    videonumber = $('ul.last_sounds li:first').find('p').attr('id'),
                                    search_form = $('.form-search'),
                                    has_click = false;
                               
                                 //  Play/pause buttons events.
                                $('#play_button').click(function () {
                                    if ( $(this).attr('class') == "tubular-pause btn btn-inverse btn-medium"){
                                        $(this).attr('class','active tubular-play btn btn-inverse btn-medium');
                                        $(this).find('i').attr('class','icon-pause icon-white');
                                    }else{
                                        $(this).attr('class','tubular-pause btn btn-inverse btn-medium');
                                        $(this).find('i').attr('class','icon-play icon-white');
                                    }

                                });
                                
                                //  Playlist button event roll.
                                $('#playlist_button').click(function() {
                                    if(!has_click){
                                        $('#playlist').fadeIn();
                                        $(this).addClass('active');
                                        has_click = true;
                                    }else{
                                        $('#playlist').fadeOut();
                                        $(this).removeClass('active');
                                        has_click = false;
                                    }
                                });

                                //Shuffle button event.
                                $('#shuffle_button').click(function() {
                                    $(location).attr('href',"http://localhost:8888");

                                });

                                
                                //  Event on menu click.
                                $('#playlist-menu ul li').click(function(){
                                    $('#playlist-menu ul li a').removeClass('active');
                                    $(this).find('a').addClass('active');

                                    /*if ($(this).attr('id') == 'last_25') {search_form.find('input').val(1);};
                                    if ($(this).attr('id') == 'first_25') {search_form.find('input').val(680);};
                                    search_form.submit();
                                    */
                                });

                                //  Event on thumbnail click.
                                $('ul.last_sounds li').click(function(){
                                    var id = $(this).find('p').attr('id');
                                    search_form.find('input').val(id);
                                    search_form.submit();
                                       
                                });
                                //  BootStrap tooltips.
                                 if ($("[rel=tooltip]").length) {$("[rel=tooltip]").tooltip();}


                                function print_infos(){
                                    // Fetch video infos.
                                    $("h1#title").append(videotitle); 
                                    $("h1#track_id").append('#'+videonumber);
                                }
                                
                                scene.tubular({
                                            videoId: first_videoid,
                                            wrapperZIndex: 5,
                                            repeat: false,
                                            mute: false
                                })
                                print_infos();
                                        

                                    
                                 
            });