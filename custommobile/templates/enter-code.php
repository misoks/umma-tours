<?php
	if (ISSET($_POST['code'])) {
		$code = $_POST['code'];
		$type = $code[0];
		if ($type == '1') {
			$sub_type = $code[1];
			if ($sub_type == '0') {
				$path = 'resource/audio';
			}
			elseif ($sub_type == '1') {
				$path = 'resource/geographic';
			}
			elseif ($sub_type == '2') {
				$path = 'resource/image';
			}
			elseif ($sub_type == '3') {
				$path = 'resource/information';
			}
			elseif ($sub_type == '4') {
				$path = 'resource/poll';
			}
			elseif ($sub_type == '5') {
				$path = 'resource/website';
			}
			elseif ($sub_type == '6') {
				$path = 'resource/video';
			}
		}
		elseif ($type == '2') {
			$path = 'object-set';
		}
		elseif ($type == '3') {
			$path = 'galleries';
		}
		elseif ($type == '4') {
			$path = 'docent-tours';
		}
		elseif ($type == '5') {
			$path = 'tours';
		}
		elseif ($type == '6') {
			$path = 'tour-set';
		}
		elseif ($type == '7') {
			$path = 'object';
		}
		header( "Location: http://tap.ummaintra.net/$path/$code" ) ;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" version="XHTML+RDFa 1.0" >

<head> 
	<title>Enter Code</title>
</head>

<body class="enter-code-page">

<form method="post" class="keypad-form">
		<span class="keypad-label">Enter code:</span> 
		<input class="keypad-display" type="number" pattern="[0-9\-]*" name="code" value="00000" onclick="if(this.value == '00000') {this.value=''; this.className +=' clicked'}"/></input>
		<input type="submit" value="Go" class="code-submit">
</form>

</body>

</html>