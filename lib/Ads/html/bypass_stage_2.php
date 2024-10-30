<?php defined( 'ABSPATH' ) or die(); ?><html>
<head>

</head>
<body>
<script type="text/javascript">
    <?php
    if ( (! empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') || (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (! empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ) {
        $server_request_scheme = 'https';
    } else {
        $server_request_scheme = 'http';
    }
    $current_url = $server_request_scheme . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $is_valid = MASE_UrlSigning::verifySignedUrl($current_url, MASE::$URLSIGNING_KEY);
    $url = $is_valid ? esc_url($_GET['i']) : '/';
    ?>

    window.top.location = "<?php echo $url; ?>";
</script>
</body>
</html>
