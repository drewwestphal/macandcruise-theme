<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/MacAndCruise/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/MacAndCruise/css/custom.css" />
<link href='http://fonts.googleapis.com/css?family=Lato:400,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="container-fluid hfeed">
	<div class="container-fluid col-md-8">
		<div class="row">
			<header id="header" role="banner" class="col-md-offset-1">
				<section id="branding">
					<div id="site-title"><h1>Macaroni<br><span class="orange">&</span> Cruise</h1></div>
					<div id="site-description">
						<h2><?php bloginfo( 'description' ); ?></h2>
						<h3>August 3-7, 2015</h3>
					</div>
					<p>Sailing from Miami to Grand Bahama Island, Nassau and Great Stirrup Cay aboard Norwegian Cruise Lines&rsquo; <span class="title">Norwegian Sky</span></p>
					<h4>Join the mailing list to be the first to get complete details!</h4>
					<?php if( function_exists( 'mc4wp_form' ) ) {
					    mc4wp_form();
					} ?>
					<ul>
						<h2>Featuring:</h2>
						<li>Lucky Diaz & the Family Jam Band</li>
						<li>Tim Kubart and The Space Cadets</li>
						<li>Secret Agent 23 Skidoo</li>
						<li>The Doubleclicks</li>
						<li>Nathan Sawaya</li>
						<li>and more!</li>
					</ul>
					<p id="brought-by">
					From the people who brought you JoCo Cruise Crazy & Spare the Rock, Spoil the Child
					</p>
					<div class="social">
						<a href="https://twitter.com/macandcruise"><img src="/wp-content/themes/MacAndCruise/img/twitter.png"></a>
						<a href="https://www.facebook.com/macaroniandcruise"><img src="/wp-content/themes/MacAndCruise/img/facebook.png"></a>
					</div>
				</section>
			</header>
		</div>
	</div>
