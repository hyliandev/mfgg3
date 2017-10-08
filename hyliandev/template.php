<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=setting('site_abbr')?></title>
<link rel="stylesheet" type="text/css" href="<?=url()?>/theme/base/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=url()?>/theme/base/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=url()?>/theme/base/style.css">
</head>

<body>

<header>
	<div class="container">
		<h1><?=setting('site_name')?></h1>
		
		<nav>
			<ul>
				<li>
					<a href="<?=url()?>/">
						Updates
					</a>
				</li>
				
				<li>
					<a href="<?=url()?>/content/">
						Content
					</a>
					
					<ul>
						<li>
							<a href="<?=url()?>/sprites/">
								Sprites
							</a>
						</li>
						
						<li>
							<a href="<?=url()?>/games/">
								Games
							</a>
						</li>
					</ul>
				</li>
				
				<li>
					<a href="<?=url()?>/login/">
						<span class="fa fa-user"></span>
						Log In
					</a>
				</li>
			</ul>
		</nav>
	</div>
</header>

<div class="container">

<?=$yield?>

</div>

<script type="text/javascript" src="<?=url()?>/theme/base/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?=url()?>/theme/base/script.js"></script>

</body>

</html>