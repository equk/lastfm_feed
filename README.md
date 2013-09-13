lastfm_feed
===========


    *****************************************************************
                    Lastfm feed - equk.co.uk
    *****************************************************************
     lastfm feed - Copyright (C) 2013  Bradley Walden
     This program comes with ABSOLUTELY NO WARRANTY.
     This is free software, and you are welcome to redistribute it
     under certain conditions. See GNU GPLv3.
    *****************************************************************

    *****************************************************************
    Version: 0.2.0

    Changelog:

        0.1.0 - initial commit

        0.2.0 - added function time_ago to show how long ago since
                tracks were played

    *****************************************************************

    To use this script you need to include this file using php.
    You can then call the functions.

    lastfmfeed('username','number_of_tracks')

    eg: lastfmfeed('equilibriumuk','10');

    There is also a function for css styles which can be put into
    the header of the website/page.

    eg: lastfmfeed_css();


To use this script you need to include lastfm_feed.php .. You can then call the functions.

There is also a function for css styles which can be put into
the header of the website/page.

Please see example.php for a working example of this code.

The example is also available live at lastfm.equk.co.uk


EXAMPLE:

![](https://raw.github.com/equk/lastfm_feed/master/example_screenshot.png)

```php

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php include ('lastfm_feed.php') ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <?php lastfmfeed_css();?>

</head>
<body>

    <h1>last.fm</h1>

    <?php lastfmfeed('equilibriumuk','10'); ?>

</body>
</html>

```