<!DOCTYPE html>
<html>

<head>
    <title><?php echo $layout['title'] ?></title>
    <meta charset="<?php echo CHARSET ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex,nofollow">
    <meta name="generator" content="Bludit">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo HTML_PATH_CORE_IMG . 'favicon.png?version=' . BLUDIT_VERSION ?>">

    <!-- CSS -->
    <?php
    echo Theme::cssBootstrap();
    echo Theme::cssLineAwesome();
    echo Theme::css(array(
        'bludit.css',
        'booty-dark.css',
        'bludit.bootstrap.css'
    ), DOMAIN_ADMIN_THEME_CSS);
    echo Theme::css(array(
        'jquery.datetimepicker.min.css',
        'select2.min.css',
        'select2-bootstrap4.min.css'
    ), DOMAIN_CORE_CSS);
    ?>

    <!-- Javascript -->
    <?php
    echo Theme::jquery();
    echo Theme::jsBootstrap();
    echo Theme::jsSortable();
    echo Theme::js(array(
        'jquery.datetimepicker.full.min.js',
        'select2.full.min.js',
        'functions.js'
    ), DOMAIN_CORE_JS);
    ?>

    <!-- Plugins -->
    <?php Theme::plugins('adminHead') ?>

</head>

<body>

    <!-- Plugins -->
    <?php Theme::plugins('adminBodyBegin') ?>

    <!-- Javascript dynamic generated by PHP -->
    <?php
    echo '<script charset="utf-8">' . PHP_EOL;
    include(PATH_CORE_JS . 'variables.php');
    echo '</script>' . PHP_EOL;

    echo '<script charset="utf-8">' . PHP_EOL;
    include(PATH_CORE_JS . 'bludit-ajax.php');
    echo '</script>' . PHP_EOL;
    ?>

    <!-- Overlay background -->
    <div id="jsshadow"></div>

    <!-- Alert -->
    <?php include('html/alert.php'); ?>
    <!-- Navbar, only for small devices -->
    <?php include('html/navbar.php'); ?>

    <!-- 25%/75% split on large devices, small, medium devices hide -->
    <div class="container-fluid">
        <div class="row">
            <!-- LEFT SIDEBAR - Display only on large devices -->
            <nav id="sidebar" class="col-lg-2 d-none d-lg-block sidebar px-0 sidebar-dark selected-dark">
                <div class="sidebar-sticky h-100">
                    <?php include('html/sidebar.php'); ?>
                </div>
            </nav>
            <!-- RIGHT MAIN -->
            <main role="main" class="col ml-sm-auto col-lg-10 px-4 pt-3">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <?php
                        if (Sanitize::pathFile(PATH_ADMIN_VIEWS, $layout['view'] . '.php')) {
                            include(PATH_ADMIN_VIEWS . $layout['view'] . '.php');
                        } else {
                            echo '<h1 class="text-center">' . $L->g('Page not found') . '</h1>';
                            echo '<h2 class="text-center">' . $L->g('Choose a page from the sidebar.') . '</h2>';
                        }
                        ?>
                    </div>
                </div>
                <!-- Footer info on all admin pages -->
                <?php 
                if(Theme::lang()==='hu'){
                    $footerPowered ='Működteti: ';
                    $footerDev =' Booty Dark Admin sablon a JT Webtools fejlesztésében';
                }else if(Theme::lang()==='de'){
                    $footerPowered ='Unterstützt von ';
                    $footerDev =' Booty Dark Admin Theme von JT Webtools';
                }else{
                    $footerPowered = 'Powered by';
                    $footerDev ='Booty Dark Admin Theme by JT Webtools';
                }
                ?>
                <div id="adminFooterInfo" class="text-center border-top my-5 pt-3">
                    <p><?php echo $footerPowered ?>
                        <a target="_blank" href="https://bludit.com">
                            <?php echo (defined('BLUDIT_PRO')) ? 'BLUDIT PRO' : 'BLUDIT' ?>
                        </a>
                        <img src="<?php echo HTML_PATH_CORE_IMG ?>logo.svg" width="20" height="20" alt="bludit">
                        <?php echo $L->g('version') .': '. BLUDIT_VERSION ?>
                         -- <?php echo $footerDev ?>
                    </p>
                </div>
            </main>
        </div>
    </div>
    <!-- Plugins -->
    <?php Theme::plugins('adminBodyEnd') ?>

</body>

</html>