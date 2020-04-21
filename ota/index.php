<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<meta name="author" content="Gastón Funes">
		<meta name="description" content="Gastón Funes' personal website.">
		<meta name="robots" content="noindex, nofollow">

		<!-- Site icons -->
		<link rel="shortcut icon" href="../assets/images/ico/favicon.ico" type="image/x-icon" />
		<link rel="icon" href="../assets/images/ico/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" sizes="57x57" href="../assets/images/ico/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="../assets/images/ico/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="../assets/images/ico/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/images/ico/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="../assets/images/ico/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="../assets/images/ico/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="../assets/images/ico/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="../assets/images/ico/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="../assets/images/ico/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192" href="../assets/images/ico/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../assets/images/ico/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../assets/images/ico/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/ico/favicon-16x16.png">
		<link rel="manifest" href="../assets/images/ico/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="../assets/images/ico/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<title>App Distribution</title>

		<link rel="stylesheet" href="assets/css/ota.css" />
	</head>
	<body>
		<?php
			$baseURLiOS = 'https://'.$_SERVER['SERVER_NAME'].'/ota/files';
			$baseURLAndroid = 'https://'.$_SERVER['SERVER_NAME'].'/ota/files';
		?>

		<div class="congrats">iOS builds</div>

		<div class="step">
			<table>
				<tbody>
					<?php
						if ($handle = opendir('./files/')) {
							while (false !== ($file = readdir($handle))) {
								if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'ipa') {
									$file = basename($file, '.ipa');
									$showingFileName = str_replace("-", " ", $file);

									echo '<tr>
											<td class="instructions">'.$showingFileName.'<br><span class="date">'.date("F d Y H:i:s", filemtime('./files/'.$file.".ipa")).'</span></td>
											<td width="57" class="imagelink">
												<a href="itms-services://?action=download-manifest&url='.$baseURLiOS.'/'.$file.'.plist"</a>
												<img src="assets/images/app.png" height="57" width="57">
											</td>
										</tr>';
								}
							}

							closedir($handle);
						}
					?>
				</tbody>
			</table>
		</div>

		<div class="congrats">Android builds</div>

		<div class="step">
			<table>
				<tbody>
					<?php
						if ($handle = opendir('./files/')) {
							while (false !== ($file = readdir($handle))) {
								if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'apk') {
									$file = basename($file, '.apk');
									$showingFileName = str_replace("-", " ", $file);

									echo '<tr>
											<td class="instructions">'.$showingFileName.'<br><span class="date">'.date("F d Y H:i:s", filemtime('./files/'.$file.".apk")).'</span></td>
											<td width="57" class="imagelink">
												<a href="'.$baseURLAndroid.'/'.$file.'.apk"</a>
												<img src="assets/images/app.png" height="57" width="57">
											</td>
										</tr>';
								}
							}

							closedir($handle);
						}
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>
