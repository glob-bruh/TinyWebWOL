<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, width=device-width">
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		<title>GB Wake on LAN</title>
		<link rel="stylesheet" href="WOL.css">
	</head> 
	<body>
		<h1>GB Wake on LAN</h1>
		<h2>Please select a computer to send magic packet to:</h2>
		<form method="post">
			<input type="text" placeholder="ENTER MAC HERE" name="targMac"></text>
			<input type="submit" value="SEND" name="sendPack" class="button"><br />
			<select id="compSel" onchange="fillMac()">
				<option value="">Select Client</option>
			</select>
		</form>
		<hr>
		<p id="subtext">
			<?php
				if(array_key_exists("targMac", $_POST)) {
					$macAddr = filter_var(trim($_POST["targMac"]), FILTER_VALIDATE_MAC);
					if ($macAddr == true) {
						print(htmlspecialchars( shell_exec("wakeonlan {$macAddr}") ));
					} else {
						print("Invalid MAC Address.");
					}
				}
			?>
		</p>
		<script src="WOL.js"></script>
	</body>
</html>