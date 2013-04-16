<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>

	<title>В подвохе Социальная сеть для подводных охотников</title>

	<!--	<link type = "text/css" rel = "stylesheet" href = "/media/js/jquery.fancybox-1.3.4/style.css">-->
	<link type = "text/css" rel = "stylesheet" href = "/media/css/style.css">

	<script type = "text/javascript" src = "/media/js/jquery.fancybox-1.3.4/jquery-1.4.3.min.js"></script>


</head>
<body>
<div class = "header">


</div>
<div class = "header2">

	<div class = "wigets">
		<?foreach($informers as $informer):?>
				<?=$informer?>
		<?endforeach?>
	</div>
	<div class = "content">
	<span class = "label">
		Вподвохе
	</span>

		<div class = "left_menu">
			<?foreach ($wigets as $wiget): ?>
				<?= $wiget ?>
			<? endforeach?>
		</div>
		<!--	Основной контент-->
		<div class = "content_td">
			<?=$content?>
		</div>
		<!--	Основной контент-->
	</div>
	<div class = "clear"></div>
	<div class = "footer"></div>
</body>
</html>