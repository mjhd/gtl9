<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">

        <link rel="apple-touch-icon" sizes="180x180" href="/in_house/gtl9/bedrock/web/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/in_house/gtl9/bedrock/web/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/in_house/gtl9/bedrock/web/favicon-16x16.png">
        <link rel="manifest" href="/in_house/gtl9/bedrock/web/manifest.json">
        <meta name="theme-color" content="#ffffff">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

	<div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=467873106578504";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

		<!-- wrapper -->
		<!-- <div class="wrapper"> -->

			<!-- /header -->
