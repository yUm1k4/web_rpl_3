<?php

$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>SMK Negeri 2 Kota Bekasi</title>
    <style>
        .scroll {
            width: 250px;
            background: #fff;
            overflow: scroll;
            height: 250px;

            /* Script tambahan khusus untuk IE (Internet Explorer) */
            scrollbar-face-color: #CE7E00;
            scrollbar-shadow-color: #FFFFFF;
            scrollbar-highlight-color: #6F4709;
            scrollbar-3dlight-color: #111;
            scrollbar-darkshadow-color: #6F4709;
            scrollbar-track-color: #FFE8C1;
            scrollbar-arrow-color: #6F4709;
        }

        .shout_box .message_box {
            background: #FFFFFF;
            height: 100px;
            overflow: auto;
            border: 1px solid #CCC;
        }

        .shout_msg {
            margin-bottom: 10px;
            display: block;
            border-bottom: 1px solid #F3F3F3;
            padding: 0px 5px 5px 5px;
            font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
            color: #7C7C7C;
        }

        .message_box:last-child {
            border-bottom: none;
        }

        time {
            font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
            font-weight: normal;
            float: right;
            color: #D5D5D5;
        }

        .shout_msg .username {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .user_info input {
            width: 100%;
            height: 25px;
            border: 1px solid #CCC;
            border-top: none;
            padding: 3px 0px 0px 3px;
            font: 11px 'lucida grande', tahoma, verdana, arial, sans-serif;
        }

        .shout_msg .username {
            font-weight: bold;
            display: block;
        }
    </style>

    <link rel="stylesheet" href="resources/css/skeleton.css">
    <link rel="stylesheet" href="resources/css/screen.css">
    <link rel="stylesheet" href="resources/css/prettyPhoto.css" type="text/css" media="screen" />

    <!-- CSS -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet" />
    <link href="resources/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="resources/css/style.css" rel="stylesheet" />


    <!-- Javascript for animation -->
    <script type="text/javascript" src="resources/js/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/js/expand.js"></script>
    <script type="text/javascript" src="resources/js/common.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // load messgae every 1000 milliseconds from server.
            load_data = {
                'ferch': 1
            };
            widow.setInterval(function() {
                $.post('shout.php', load_data, function(data) {
                    $('.message_box').html(data);
                    var scrolltoh = $('.message_box')[0].scrollHeight;
                    $('.message_box').scrollTop(scrolltoh);
                });
            }, 1000);

            // method to trigger when user hits enter key
            $("#shout_message").keypress(function(evt) {
                if (evt.which == 13) {
                    var iusername = $('#shout_username').val();
                    var imessage = $('#shout_message').val();
                    post_data = {
                        'username': iusername,
                        'message': imessage
                    };

                    // send data to "shout.php" using jQuery $.post()
                    $.post('shout.php', post_data, function(data) {
                        //append data into messagebox with jQuery fade effect!
                        $(data).hide().appendTo('.message_box').fadeIn();
                        //keep scrolled to bottom of chat!
                        var scrolltoh = $('.message_box')[0].scrollHeight;
                        $('.message_box').scrollTop(scrolltoh);
                        //reset value of message box
                        $('#shout_message').val('');
                    }).fail(function(err) {
                        // alert HTTP server error
                        alert(err.statusText);
                    });
                }
            });
            // toggle hide/show shout box
            $(".close_btn").click(function(e) {
                // get CSS display state of .togle_chat element
                var toggleState = $('.toggle_chat').css('display');
                //toggle show/hide chat box
                $('.toggle_chat').slideToggle();
                // use toggleState var to change close/open icon image
                if (toggleState == 'block') {
                    $(".header div").attr('class', 'open_btn');
                } else {
                    $(".header div").attr('class', 'close_btn');
                }
            });
        });
    </script>
</head>

<body>

    <!-- MAIN WEBSITE BEGIN -->
    <div id="main">
        <div class="logo"><a href="index.html"><img src="resources/images/logo.png" alt="" width="100px" /></a></div>
        <div class="logo">
            <h1><b> SMK Negeri 2 Kota Bekasi</b></h1>
            <h2> We Have Better Skills for Indonesia</h2>
            <h6><br></h1>
        </div>
        <div class=" clear"></div>

        <!-- HEADER WEBSITE BEGIN -->
        <div id="header">

            <!-- TOP MENU WEBSITE BEGIN -->
            <div class="container">


                <div id="mainmenu">
                    <ul class="sf-menu">
                        <li><a href="<?= SITE_URL; ?>" <?php if ($page == "" || $page == "home") echo 'class="current"'; ?>>Home</a></li>

                        <li><a href="<?= SITE_URL; ?>?page=bukutamu" <?php if ($page == "bukutamu") echo 'class="current"'; ?>>Bukutamu</a></li>
                        <li><a href="<?= SITE_URL; ?>?page=artikel" <?php if ($page == "artikel") echo 'class="current"'; ?>>Artikel</a></li>
                        <li><a href="<?= SITE_URL; ?>?page=siswa" <?php if ($page == "siswa") echo 'class="current"'; ?>>Data Siswa</a></li>
                        <li><a href="<?= SITE_URL; ?>?page=guru" <?php if ($page == "guru") echo 'class="current"'; ?>>Data Guru</a></li>
                        <li><a href="<?= SITE_URL; ?>?page=album" <?php if ($page == "album") echo 'class="current"'; ?>>Album</a></li>
                        <li><a href="<?= SITE_URL; ?>?page=alumni" <?php if ($page == "alumni") echo 'class="current"'; ?>>Data Alumni</a></li>
                        <li><a href="<?= SITE_URL; ?>?page=tentang" <?php if ($page == "tentang") echo 'class="current"'; ?>>Tentang</a></li>
                        <li><a href="<?= SITE_URL; ?>?page=kontak" <?php if ($page == "kontak") echo 'class="current"'; ?>>Kontak</a></li>
                    </ul>

                </div>
                <!-- END OF TOP MENU WEBSITE -->

            </div>
            <!-- END OF HEADER WEBSITE -->



            <?php

            if ($page == "" || $page == "home") {
            ?>
                <!-- SLIDER WEBSITE BEGIN -->
                <div id="slider-website">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?php echo PATH; ?>/resources/images/banner_1.jpg" alt="Sekolahku rumahku">
                            </div>

                            <div class="item">
                                <img src="<?php echo PATH; ?>/resources/images/banner_2.jpg" alt="Sekolahku rumahku">
                            </div>

                            <div class="item">
                                <img src="<?php echo PATH; ?>/resources/images/banner_3.jpg" alt="Sekolahku rumahku">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <!-- END OF SLIDER WEBSITE -->

            <!-- CONTENT WEBSITE BEGIN -->
            <div id="content">

                <!-- LEFT CONTENT WEBSITE BEGIN -->
                <div id="left-content">

                    <?php
                    $view = new View($viewName);
                    $view->bind('data', $data);
                    $view->forceRender();
                    ?>
                </div>

                <!-- END OF LEFT CONTENT WEBSITE -->
                <?php
                if ($page == "" || $page == "artikel" || $page == "home") {
                ?>

                    <!-- RIGHT CONTENT WEBSITE BEGIN -->
                    <div id="right-content">
                        <!-- CHAT -->
                        <div class="right-panel">
                            <div class="top-right-panel">Chat</div>
                            <div class="bottom-right-panel">
                                <div class="scroll">
                                    <div class="message_box">
                                    </div>
                                </div>
                                <div class="user_info">
                                    <input type="text" name="shout_username" id="shout_username" placeholder="Your Name" maxlength="20">
                                    <input type="text" name="shout_message" id="shout_message" placeholder="Type Message Then Enter" maxlength="100">
                                </div>
                            </div>
                        </div>

                        <!-- ARTIKEL TERBARU -->
                        <div class="right-panel">
                            <div class="top-right-panel">Artikel Terbaru</div>
                            <div class="bottom-right-panel">
                                <ul>
                                    <?php

                                    foreach ($data["main_artikel"] as $artikel) {

                                    ?>
                                        <li><a href="<?php echo SITE_URL; ?>?page=artikel&&action=detail&&id=<?php echo $artikel->id_artikel; ?>"><?php echo $artikel->judul; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                        <!-- KATEGORI ARTIKEL -->
                        <div class="right-panel">
                            <div class="top-right-panel">Kategori Artikel</div>
                            <div class="bottom-right-panel">
                                <ul>
                                    <?php

                                    foreach ($data["main_kategori"] as $kategori) {

                                    ?>
                                        <li>
                                            <a href="<?php echo SITE_URL; ?>?page=kategori&&action=detail&&id=<?php echo $kategori->id_kategori; ?>">
                                                <?php echo $kategori->nama_kategori; ?> (<?php echo $kategori->total; ?>)
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                        <!-- INFO USER -->
                        <div class="right-panel">
                            <div class="top-right-panel">Info User</div>
                            <div class="bottom-right-panel">

                                <table class="table" style="margin-bottom: 0;">
                                    <tbody>
                                        <tr>
                                            <td style="border-top:0;">IP User</td>
                                            <td style="border-top:0;">:</td>
                                            <td style="border-top:0;">
                                                <b>
                                                    <?php echo $_SERVER["REMOTE_ADDR"]; ?>
                                                </b>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td>:</td>
                                            <td>
                                                <b>
                                                    <?php

                                                    date_default_timezone_set('Asia/Jakarta');

                                                    echo date('h : i : s');
                                                    ?>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>
                                                <b>
                                                    <?php echo date('d F Y'); ?>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Browser</td>
                                            <td>:</td>
                                            <td>
                                                <b>
                                                    <?php echo $_SERVER['HTTP_USER_AGENT']; ?>
                                                </b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- END OF RIGHT CONTENT WEBSITE -->
                <?php
                }
                ?>
                <div class="clear"></div>

            </div>
            <!-- END OF CONTENT WEBSITE -->


            <!-- FOOTER WEBSITE BEGIN -->
            <div class="footer">

            </div>
        </div>
        <!-- END OF MAIN WEBSITE -->

    </div>

</body>

</html>