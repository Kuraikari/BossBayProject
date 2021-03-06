<?php

use services\DatabaseSeeder;

$databaseSeed = new DatabaseSeeder();

$databaseSeed->run();


?>
<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/parallax.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/sweatalert.css">
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/about.css">
    <link rel="stylesheet" href="/css/shop.css">
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="/css/article.css">
    <link rel="stylesheet" href="/css/prism.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prism - Where Lolis are 3D</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="/js/sweatalert.js"></script>

    <script src="/js/header.js"></script>
    <script src="/js/modal.js"></script>
    <script src="/js/countdown.js"></script>

</head>
<body>

<?php $this->renderComponent("login.php") ?>

<header id="js-header">
    <div class="container clearfix">

        <div class="navLeft">
            <nav class="effectHeader">
                <?php
                $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                ?>
                <a href="/BossBay/Homepage" <?php if ($actual_link == "http://localhost/BossBay/Homepage") {
                    echo "class='active'";
                } ?> data-hover="Home">Home</a>
                <a href="/BossBay/Media" <?php if ($actual_link == "http://localhost/BossBay/Media") {
                    echo "class='active'";
                } ?> data-hover="Media">Media</a>
                <a href="/BossBay/Prism" <?php if ($actual_link == "http://localhost/BossBay/Prism") {
                    echo "class='active'";
                } ?> data-hover="Prism">Prism</a>
                <?php if (\services\Sessionmanagement::get('user')) { ?> <a
                        href="/BossBay/Loli-Index" <?php if ($actual_link == "http://localhost/BossBay/Loli-Index") {
                    echo "class='active'";
                } ?> data-hover="Index">Index</a> <?php } ?>

            </nav>
        </div>

        <div class="navMiddle">
            <h1 id="logo"><strike>Prism</strike> Prison </h1>
        </div>

        <div class="navRight">
            <nav class="effectHeader">

                <?php

                if (\services\Sessionmanagement::get('user')) {
                    $user = unserialize(\services\Sessionmanagement::get('user'))['username'];
                    $image = unserialize(\services\Sessionmanagement::get('user'))['image'];
                    ?>
                    <div class="loggedIn">
                        <a href="/user/userpage"
                           class="iconUser <?php if ($actual_link == "http://localhost/user/userpage") {
                               echo "active";
                           } ?>" style="position: relative; left: -250px; top: 0px;">
                            <i class="fa fa-user"></i>
                        </a>

                        <!-- <a href="/user/cart" class="iconUser <?php // if ($actual_link == "http://localhost/user/cart") {
                        //  echo "active";
                        // } ?>">
                        <i class="fa fa-shopping-cart"></i>
                    </a> -->

                        <a href="/user/logout" class="iconUser" style="position: relative; left: -250px; top: 0px;">
                            <i class="fa fa-sign-out"></i>
                        </a>

                        <img src="<?php echo '/assets/userimages/' . $image ?>" class="userImage" width="35"
                             height="35" style="position: relative; left: 150px; top: 0px;">

                        <label for="" class="userLabel" style="position: relative; left: 150px; top: 0px;"><?php echo $user ?></label>
                    </div>
                    <?php
                    //                    echo '<a class="userNav" href="/user/userpage" data-hover="'.$user.'">Welcome '.$user.'</a>';
                } else {
                    echo '<a href="#modal" class="iconUser loggedOut">';
                    echo '<i class="fa fa-sign-in"></i>';
                    echo '</a>';
                }
                ?>
            </nav>
        </div>


    </div>
</header>
<div id="arrow-down"></div>
