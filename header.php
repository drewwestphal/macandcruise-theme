<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<!-- bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- jquery & bootstrap js -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- custom css 
<link rel="stylesheet" type="text/css" href="/wp-content/themes/MacAndCruise/css/custom.css" />-->
<link href='http://fonts.googleapis.com/css?family=Lato:400,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>


<!--development-->
<link rel="stylesheet/less" type="text/css" href="/wp-content/themes/MacAndCruise/style.less" />
<script>
  less = {
    env: "development",
    async: false,
    fileAsync: false,
    poll: 1000,
    functions: {},
    dumpLineNumbers: "comments",
    relativeUrls: false,
    rootpath: ":em.local/wp-content/themes/MacAndCruise/js"
  };
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.7.0/less.min.js"></script>
<script>less.watch();</script>
<!--development-->


<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div class="container-fluid">
		<div class="row">
			<header id="header" role="banner" class="">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						    <span class="sr-only">Toggle navigation</span>
						    <span class="icon-bar"></span>
						    <span class="icon-bar"></span>
						    <span class="icon-bar"></span>
						  </button>
						  <a class="navbar-brand" href="/"><h1>Macaroni <span class="orange-text">&</span> Cruise</h1></a>
						</div>
						
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav">
						  	<!--<?php wp_nav_menu( array( 'container_class' => 'main-nav', 'theme_location' => 'primary' ) ); ?>-->
						    <li class="active"><a href="#">Link</a></li>
						    <li><a href="#">Link</a></li>
						    <li><a href="#" class="orange-text">Link</a></li>
						    <li><a href="#">Link</a></li>
						    <li><a href="#">Link</a></li>
						  </ul>
						  <!--<ul class="nav navbar-nav navbar-right">
						    <li><a href="#">Link</a></li>
						  </ul>-->
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>

			</header>
		</div>
	</div>
