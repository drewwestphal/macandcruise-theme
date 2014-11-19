<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( ' | ', true, 'right' ); ?></title>

<script> 
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56897608-1', 'auto');
  ga('send', 'pageview');

</script>

<!--development
<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.less" />
<script>
  less = {
    env: "development",
    async: false,
    fileAsync: false,
    poll: 1000,
    functions: {},
    dumpLineNumbers: "comments",
    relativeUrls: true
  };
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.7.0/less.min.js"></script>
<script>less.watch();</script>
<!--development-->


<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div class="container-fluid" id="header-container">
	    <?php if ( !current_theme_supports( 'headerless_operation' ) ) {?>
		<div class="row">
			<header id="header" role="banner" class="">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						    <span class="sr-only">Toggle navigation</span>
						    <span class="icon-bar"></span>
						    <span class="icon-bar"></span>
						    <span class="icon-bar"></span>
						  </button>
						  <a class="navbar-brand" href="/"><h1><?php echo get_option('mac_settings')['mac_html_friendly_title'];?></h1></a>
						</div>
						
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav">
							<?php 
							if (isset(get_option('mac_settings')['mac_booking_enabled'])) {  ?>
									<li class="visible-xs"><a href="<?php echo get_option('mac_settings')['mac_booking_url']; ?>" class="orange-text"><span class="glyphicon glyphicon-calendar"></span>Book Now</a></li>
							<?php 
							}
								  mac_clean_menu();
							  ?>
						  </ul>
						</div>
					</div>
				</nav>
			</header>
		</div>
		<?php } ?>
	</div>