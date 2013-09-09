<?php
/*
*****************************************************************
                Lastfm feed - equk.co.uk
*****************************************************************
 lastfm feed - Copyright (C) 2013  Bradley Walden
 This program comes with ABSOLUTELY NO WARRANTY.
 This is free software, and you are welcome to redistribute it
 under certain conditions. See GNU GPLv3.
*****************************************************************


                                      -oo-
                                      +MMo
      .:+o+:`   `:+o/-+o+  +oo`  ooo  +MMo .oo+.
     oNNs+hMd- :mMmyydMMm  mMM`  MMM  +MMs/mMh:
    :MMmyyhMMy mMM-  .MMm  mMM`  MMM  +MMmNMh`
    -NMmo//++- hMMo..+MMm  dMM/.:MMM  +MMd+NMd-
     :ymmmmdh` .smNmdyMMm  -dNNmhhMN  +MMo :mMN+
       `...``    `..``MMm   ``.` `..  `..`  `...
                     `NNd

*****************************************************************
Version: 0.2.0

Changelog:
    0.1.0 - initial commit
    0.2.0 - added function time_ago to show how long ago since
            tracks were played
*****************************************************************

  To use this script you need to include this file using php.
  You can then call the functions.

  eg: lastfmfeed('equilibriumuk','10');

  There is also a function for css styles which can be put into
  the header of the website/page.

  eg: lastfmfeed_css();

  Please see example.php for a working example of this code.

*/
function lastfmfeed($lastfm_user,$lastfm_num) {
    /* VARIABLES
       =========

       lastfm_user = lastfm username
       lastfm_api = lastfm api key
       lastfm_num = number of tracks to show

       */

    //$lastfm_user = 'equilibriumuk';
    $lastfm_api = '8e4bd6c72ecdb58b26f70a96b231c249';
    //$lastfm_num = '10';

    $lastfm_request = "http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=".$lastfm_user."&api_key=".$lastfm_api."&limit=".$lastfm_num."";
    $xml = simplexml_load_file($lastfm_request);
    $music = $xml->recenttracks->track;

    /* END VARIABLES */

    echo "<div id='lastfmfeed_wrapper'>";

    for ($i = 0; $i < $lastfm_num; $i++) {
        echo "<div class='lastfmfeed_recently_played'>";
        if ($music[$i]->image <> ''){
            echo "<img src='".$music[$i]->image."' alt='albumart'>";
        } else {
            echo "<img src='img/nocover.png' alt='albumart'>";
        }
        echo "<div class='lastfmfeed_song_info'>";
        echo "<a href='".$music[$i]->url."' target='_blank'>" .$music[$i]->artist . " - ";
        echo $music[$i]->name . "</a>";
        echo "<div class='time'>".time_ago($music[$i]->date["uts"])."</div>";
        echo "</div>";
        echo "</div>";
    }

    echo "</div>";

}

function lastfmfeed_css(){
  echo "<link href='css/lastfm_feed.css' rel='stylesheet'>";
}

function time_ago($datefrom){

    $difference = time() - $datefrom;
    $show_fuzzy_detail = false;

    if($difference < 60){
      $plural = $difference > 1 ? 's' : '';
      return $difference.' second'.$plural.' ago';
    } else if( $difference < 60*60 ){
      $ago_seconds = $difference % 60;
      $plural = $ago_seconds > 1?'s':'';
      $ago_seconds_txt = $ago_seconds > 0 && $show_fuzzy_detail === true ?' and '.$ago_seconds.' second'.$plural.' ago' : ' ago';
      $ago_minutes = floor( $difference / 60 );
      $minplural= $ago_minutes > 1 ? 's' : '';
      return $ago_minutes . ' minute'.$minplural.$ago_seconds_txt;
    } else if ( $difference < 60*60*24 ){
      $ago_hours = floor( $difference / ( 60 * 60 ) );
      $plural = $ago_hours > 1 ? 's' : '';
      return  $ago_hours.' hour'.$plural.' ago';
    }else if ( $difference >= 60*60*24 ) {
      return "currently listening";
    }
  }
?>