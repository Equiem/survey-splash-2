<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Welcome to tenant portal</title>
        <link rel="shortcut icon" href="<?php echo 'domains/' . $_SERVER['HTTP_HOST']; ?>/img/favicon.ico" type="image/x-icon" />
        <meta name="description" content="Tenant Portal" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" name="viewport" />
        <link rel="stylesheet" href="css/jquery.fancybox.css" />
        <link rel="stylesheet" href="css/jquery.jplayer.css" type="text/css" />
        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel='stylesheet' media='all and (min-width:760px) and (min-device-width:760px)' href='css/medium.css' />
        <link rel='stylesheet' media='all and (min-width:1090px) and (min-device-width:1090px)' href='css/large.css' />
        <!--[if lt IE 9]>
            <link rel='stylesheet' href='css/medium.css' />
        <![endif]-->
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <?php
            if (empty($_SERVER['HTTP_HOST'])) {
                echo '<script type="text/javascript">alert("Config file not found");</script>';
            }

            echo '
                <script src="domains/' . $_SERVER['HTTP_HOST'] . '/config.js"></script>
                <style type="text/css">
                    #slidesection{background:url(domains/' . $_SERVER['HTTP_HOST'] . '/img/background_top.jpg) center top no-repeat}
                    #chances{background:url(domains/' . $_SERVER['HTTP_HOST'] . '/img/background_btm.jpg) center top no-repeat}
                </style>
            ';
        ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <header>
            <div class="clearfix">
                <a href="/" id="logo"><img src="<?php echo 'domains/' . $_SERVER['HTTP_HOST'] . '/img/logo.png'; ?>" /></a>
                <a href="#" class="btn survey survey_links" target="_blank"><i class="s pen"></i> Take the survey</a>
            </div>
        </header>
        <script id="slidesection-template" type="text/x-handlebars-template">
            <h1>Your {{portal_name}} Tenant Portal is launching soon.</h1>
        </script>
        <section id="slidesection">
            <h2>Help us build the perfect experience by completing this short survey.</h2>
            <div id="actions">
                <a href="#" class="btn survey survey_links" target="_blank"><i class="s pen"></i> Take the Survey</a>
                <a href="#jp_container_1" class="btn playvideo fancyBoxLink" id="playWeb">Play Tour Video <i class="s plays"></i></a>
                <a href="#" class="btn playvideo" id="playmobile">Play Tour Video <i class="s plays"></i></a>
            </div>
            <div id="slideshow">
                <div>
                    <ul id="carousel">
                    <?php
                        $items   = array();
                        $path    = 'domains/' . $_SERVER['HTTP_HOST'] . '/slideshow';

                        if ($handle = opendir($path)) {
                            while (false !== ($file = readdir($handle))) {
                                if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'jpg') {
                                    $items[] = $file;
                                }
                            }
                            closedir($handle);
                        }

                        if (!empty($items)) {
                            $lists = '';
                            asort($items);

                            for ($i = 0, $max = sizeof($items); $i < $max; $i++) {
                                $file = $path . '/' . $items[$i];

                                if ($i == 0) {
                                    $lists .= '
                                        <li class="playcover">
                                            <a href="#jp_container_1" class="fancyBoxLink">
                                                <img src="' . $file . '" alt="Portal Image" /><i></i>
                                            </a>
                                        </li>
                                    ';
                                }
                                else {
                                    $lists .= '<li><img src="' . $file . '" alt="Portal Image" /></li>';
                                }
                            }

                            echo $lists;
                        }
                    ?>
                    </ul>
                </div>
            </div>
            <div id="slideshownav">
            </div>

            <script id="whatis-template" type="text/x-handlebars-template">
                <h2>What is {{portal_name}}? Let&#39;s take a little tour. </h2>
                <p>
                    The {{portal_name}} is a world first web platform creating an exclusive digital community at {{building_name}}.
                    Available exclusively to {{building_name}} tenants, this new Portal puts everything you need at your fingertips.
                    In the store, you can shop for food, gifts and more and have them delivered to your desk.
                    Enjoy a direct link to the Concierge, keep up to date with news, events, building management announcements and
                    the precinct community.  Life at {{building_name}} is about to get even better!
                </p>
            </script>
            <div id="whatis" class="cont"></div>
        </section>

        <script id="help-template" type="text/x-handlebars-template">
            <div class="cont clearfix">
                <div class="fl">
                    <h3>
                        Help shape {{portal_name}}! Take our survey and go in the draw to win a $250 Coles Myer card.
                    </h3>
                    <p>
                        {{#if lite}}
                            Help us build the perfect Portal for your building by completing our short survey.
                            It will help us tailor the news articles, events, store deals and products according
                            to what you like. Plus, for going through the trouble, everyone who completes the survey
                            will automatically go into the draw to win a
                            $250 Coles Myer card. <br/> A chance to win some shopping money,
                            all for 10 minutes of your time!
                            <a href="{{survey_links}}" target="_blank">Take the survey now</a>.
                        {{/if}}

                        {{#if mini}}
                            Help us build the perfect Portal for your building by completing our short survey.
                            It will help us tailor the content according to what you like. Plus,
                            for going through the trouble, everyone who completes the survey will
                            automatically go into the draw to win a $250 Coles Myer card.
                            <br/> A chance to win some shopping money, all for 10 minutes of your time!
                            <a href="{{survey_links}}" target="_blank">Take the survey now</a>.
                        {{/if}}
                    </p>
                </div>
                <div class="fr">
                    <i class="s help"></i>
                </div>
            </div>
        </script>
        <section id="help"></section>


        <script id="chances-template" type="text/x-handlebars-template">
            <h3>Now&#39;s your chance to shape the new {{portal_name}} Portal.</h3>
        </script>
        <section id="chances">
            <div class="cont">
                <a href="#" class="btn survey survey_links" target="_blank"><i class="s pen"></i> Take the Survey</a>
                <div id="socials">
                    <p>Share this with your team!</p>
                    <a href="#" id="fb" class="s" target="_blank"><span>Share on Facebook</span></a>
                    <a href="#" id="tw" class="s" target="_blank"><span>Share on Twitter</span></a>
                    <a href="#" id="li" class="s" target="_blank"><span>Share on Linked in</span></a>
                    <a href="#" id="mg" class="s"><span>Message</span></a>
                </div>
            </div>
        </section>

        <footer class="clearfix">
            <div id="footernav" class="fl">
                <a href="http://equiem.com.au" target="_blank" id="equiem"><img src="img/equiem.jpg" alt="Powered by Equiem" /></a>
            </div>

            <div class="fr">
                <a href="http://www.joneslanglasalle.com.au" target="_blank"><img src="img/joneslang_lasalle.jpg" alt="Jones Lang Lasalle" /></a>
                <a href="https://www.amp.com.au/wps/portal/au" target="_blank"><img src="img/amp.jpg" alt="AMP" /></a>
                <a href="http://www.au.brookfield.com" target="_blank"><img src="img/brookfield.jpg" alt="Brookfield" /></a>
                <a href="http://www.gpt.com.au" target="_blank"><img src="img/gpt.jpg" alt="GPT" /></a>
            </div>
        </footer>

        <div id="videocontainer" class="highlight">
            <div id="jp_container_1" class="jp-video jp-video-360p">
              <div class="jp-type-single">
                <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                <div class="jp-gui">
                  <div class="jp-video-play">
                    <a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
                  </div>
                  <div class="jp-interface">
                    <div class="jp-progress">
                      <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                      </div>
                    </div>
                    <div class="jp-current-time"></div>
                    <div class="jp-duration"></div>
                    <div class="jp-controls-holder">
                      <ul class="jp-controls">
                        <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                        <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                        <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                        <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                        <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                        <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                      </ul>
                      <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="jp-no-solution">
                  <span>Update Required</span>
                  To play the media you will need to either update your browser to a recent version or update your
                  Flash plugin (http://get.adobe.com/flashplayer).
                </div>
              </div>
            </div>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js" type="text/javascript"><\/script>')</script>
        <script src="js/vendor/jquery.jplayer.min.js" type="text/javascript"></script>
        <script src="js/vendor/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>
        <script src="js/vendor/handlebars.min.js" type="text/javascript"></script>
        <script src="js/vendor/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="js/plugins.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function(){
                $.fn.initplayer = function() {
                    if (this.length) {
                        // @todo: ie8 swf path is wrong when put it in the main.js (../js) ?
                        this.jPlayer({
                            ready: function () {
                                $(this).jPlayer("setMedia", {
                                    m4v: window.video_config.m4v,
                                    ogv: window.video_config.ogv,
                                    webmv: window.video_config.webmv
                                });
                            },
                            swfPath: "js",
                            supplied: "webmv, ogv, m4v",
                            size: {
                                width: "640px",
                                height: "352px",
                                cssClass: "jp-video-360p"
                            },
                            smoothPlayBar: true,
                            keyEnabled: true
                        });
                    }
                };

                // initialise player
                $("#jquery_jplayer_1").initplayer();

                if (!$("#slideshow").is(":hidden")) {
                    $(".fancyBoxLink").fancybox({
                        'href' : '#jp_container_1',
                        beforeShow  : function() {
                            $("#jquery_jplayer_1").jPlayer("destroy").initplayer();
                        }
                    });
                }
            });
        </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script type="text/javascript">
            if (window.google_analytic_id) {
                var _gaq=[['_setAccount', window.google_analytic_id],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src='//www.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
            }
        </script>
    </body>
</html>
