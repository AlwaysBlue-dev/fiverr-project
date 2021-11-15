﻿<!DOCTYPE html>
<html>

<head>

	<title>krpano - terrasse</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, viewport-fit=cover" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="mobile-web-app-capable" content="yes" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="x-ua-compatible" content="IE=edge" />
	<style>
		html {
			height: 100%;
		}

		body {
			height: 100%;
			overflow: hidden;
			margin: 0;
			padding: 0;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 16px;
			color: #FFFFFF;
			background-color: #000000;
		}
	</style>
</head>

<body>
	<?php
	session_start();
	if (!$_SESSION) {
		header("location:index.php");
	}
	include 'conn.php';
	?>
	<script src="tour.js"></script>

	<div id="pano" style="width:100%;height:100%;">
		<noscript>
			<table style="width:100%;height:100%;">
				<tr style="vertical-align:middle;">
					<td>
						<div style="text-align:center;">ERROR:<br /><br />Javascript not activated<br /><br /></div>
					</td>
				</tr>
			</table>
		</noscript>
		<script>
			embedpano({
				swf: "tour.swf",
				xml: "tour.xml",
				target: "pano",
				html5: "auto",
				mobilescale: 1.0,
				passQueryParameters: "startscene,startlookat"
			});
		</script>
	</div>

</body>

</html>