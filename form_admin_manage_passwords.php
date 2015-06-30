<?php
readfile('navigation.tmpl.html');
?>

<!DOCTYPE html>
<html>
<head>
	<title>BHRA Leaf Raking</title>
</head>
<body>

	<h3>Generate Password File and/or Send Email</h3>

	<?php

$rtn = "";

	// database code
	$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
	$sql = "SELECT * FROM rakers";
	$result = mysqli_query($db, $sql);
	mysqli_close($db);

	// initialize radio button values
	foreach ($result as $row) {
		$radios[$row['id']] = "";
	}

	// extract and validate the POST
	$numActions = 0;
	foreach($radios as $rNum=>$rVal) {
		if (isset($_POST['formClear'])) {
			$radios[$rNum] = '';
		}
		if (isset($_POST['formSetAllPassword'])) {
			$radios[$rNum] = 'gpw';
			$numActions++;
		}
		if (isset($_POST['formSetAllGenMail'])) {
			$radios[$rNum] = 'gem';
			$numActions++;
		}
		if (isset($_POST['formPreSubmit'])) {
			if (isset($_POST[$rNum]) && (
				($_POST[$rNum] == '') ||
				($_POST[$rNum] == 'gpw') ||
				($_POST[$rNum] == 'gem') ||
				($_POST[$rNum] == 'both')
				)) {
				$radios[$rNum] = $_POST[$rNum];
			if (!$_POST[$rNum] == '') {
				$numActions++;
			} else {
				$radios[$rNum] = "";
			}
		}
		if (isset($_POST['submit'])) {
			if (isset($_POST[$rNum]) && ($_POST[$rNum] == 'gpw')) {
				$rtn = function_admin_create_login($rNum);
							if ($rtn) {
					printf($rtn);
					exit($rtn);
				}
			}
			$radios[$rNum] = $_POST[$rNum];
			if (!$_POST[$rNum] == '') {
				$numActions++;
			} else {
				$radios[$rNum] = "";
			}
			$radios[$rNum] = '';
		}
	}
}
?>


	<form method="post" actions="">

<br>
<input type="submit" name="formClear" value="formClear">
<input type="submit" name="formSetAllPassword" value="formSetAllPassword">
<input type="submit" name="formSetAllGenMail" value="formSetAllGenMail">
<input type="submit" name="formPreSubmit" value="formPreSubmit">
<input type="submit" name="submit" value="submit">
<br>
	<?php
	printf("numActions = $numActions<br>");
	printf("here %sM<br>",$rtn);
	foreach($radios as $rNum=>$rVal) {

// do the work - 
	// database code
	//$rower = mysqli_query($result, "SELECT * FROM rakers WHERE id=$rNum");;
	//printf("%d %s %s",
	//	$result[$rNum], $result['firstname'], $result['lastname'], 

		printf("<input type=\"radio\" name=%s value=\"\"%s>neither\n",
			$rNum, ($rVal == '') ? " checked" : "");

		printf("<input type=\"radio\" name=%s value=\"gpw\"%s>genPw\n",
			$rNum, ($rVal == 'gpw') ? " checked" : "");

		printf("<input type=\"radio\" name=%s value=\"gem\"%s>genEm\n",
			$rNum, ($rVal == 'gem') ? " checked" : "");

		printf("<input type=\"radio\" name=%s value=\"both\"%s>both<br>\n",
			$rNum, ($rVal == 'both') ? " checked" : "");
	}

	?>

	<br>
</p>

</form>
</body>

</html>




