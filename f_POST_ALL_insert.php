<!DOCTYPE html>
<html>
<head>
	<title>BHRA Leaf Raking</title>
</head>
<body>
	<p><?php

	$cox = '';
	$novice_varsity = '';
	$first = '';
	$last = '';
	$gender = '';
	$school = '';
	$grade = '';
	$email1 = '';
	$email2 = '';
	$cell = '';
	$home = '';

// validation
	if (isset($_POST['submit'])) {
		$fail = "";

		if (!isset($_POST['cox']) /* || $_POST['cox'] === ''*/) {
			$fail .= " bad_cox";
		} else {
			$cox = $_POST['cox'];
		}

		if (!isset($_POST['novice_varsity']) || $_POST['novice_varsity'] === '') {
			$fail .= " bad_novice_varsity";
		} else {
			$novice_varsity = $_POST['novice_varsity'];
		}

		if (!isset($_POST['first']) || $_POST['first'] === '') {
			$fail .= " bad_firstname";
		} else {
			$first = $_POST['first'];
		}

		if (!isset($_POST['last']) || $_POST['last'] === '') {
			$fail .= " bad_lastname";
		} else {
			$last = $_POST['last'];
		}

		if (!isset($_POST['gender']) || $_POST['gender'] === '') {
			$fail .= " bad_gender";
		} else {
			$gender = $_POST['gender'];
		}

		if (!isset($_POST['school']) || $_POST['school'] === '') {
			$fail .= " bad_school";
		} else {
			$school = $_POST['school'];
		}

		if (!isset($_POST['grade']) || $_POST['grade'] === '') {
			$fail .= " bad_grade";
		} else {
			$grade = $_POST['grade'];
		}

		if (!isset($_POST['email1']) || $_POST['email1'] === '') {
			$fail .= " bad_email1";
		} else {
			$email1 = $_POST['email1'];
		}

			//$_POST['email2'])
		if (!isset($_POST['email2']) || $_POST['email2'] === '') {
// empty input is OK
		} else {
			$email2 = $_POST['email2'];
		}

			//$_POST['cell'])
		if (!isset($_POST['cell']) || $_POST['cell'] === '') {
			$fail .= " bad_cell";
		} else {
			$cell = $_POST['cell'];
		}
			//$_POST['home'])
		if (!isset($_POST['home']) || $_POST['home'] === '') {
			$fail .= " bad_home_phone";
		} else {
			$home = $_POST['home'];
		}


		if ($fail!="") {
			printf('bad input: %s',$fail);
		} else {
			printf('cox: %s
				<br>novice/varsity: %s
				<br>firstname: %s
				<br>lastname: %s
				<br>gender: %s
				<br>school: %s
				<br>grade: %s
				<br>email1: %s
				<br>email2: %s
				<br>cellphone: %s
				<br>homephone: %s',
				htmlspecialchars($cox, ENT_QUOTES),
				htmlspecialchars($novice_varsity, ENT_QUOTES),
				htmlspecialchars($first, ENT_QUOTES),
				htmlspecialchars($last, ENT_QUOTES),
				htmlspecialchars($gender, ENT_QUOTES),
				htmlspecialchars($school, ENT_QUOTES),
				htmlspecialchars($grade, ENT_QUOTES),
				htmlspecialchars($email1, ENT_QUOTES),
				htmlspecialchars($email2, ENT_QUOTES),
				htmlspecialchars($cell, ENT_QUOTES),
				htmlspecialchars($home, ENT_QUOTES));

// database code
			$db = mysqli_connect('localhost', 'root', '', 'bhra_leaf_raking');
			$sql = sprintf("INSERT INTO rakers (
				cox,
				novice_varsity,
				firstname,
				lastname,
				gender,
				school,
				grade,
				email1,
				email2,
				cellphone,
				homephone) VALUES (
				'%s','%s','%s','%s','%s','%s', %d,'%s','%s','%s','%s')",
				mysqli_real_escape_string($db, $cox),
				mysqli_real_escape_string($db, $novice_varsity),
				mysqli_real_escape_string($db, $first),
				mysqli_real_escape_string($db, $last),
				mysqli_real_escape_string($db, $gender),
				mysqli_real_escape_string($db, $school),
				mysqli_real_escape_string($db, $grade),
				mysqli_real_escape_string($db, $email1),
				mysqli_real_escape_string($db, $email2),
				mysqli_real_escape_string($db, $cell),
				mysqli_real_escape_string($db, $home));

// temporary
		//	$sql = sprintf("INSERT INTO rakers () VALUES ()" );

			mysqli_query($db, $sql);
			mysqli_close($db);
			echo '<br><br>User added';
			printf("<br>$sql");
		}
	}

?>


</p>
<form method="post" actions="">

	cox:
	<input type="radio" name="cox" value="coxswain"<?php
	if ($cox === 'coxswain') {
		echo " checked";
	}
	?>>yes
	<input type="radio" name="cox" value=""<?php
	if ($cox === '') {
		echo " checked";
	}
	?>>no<br>

	novice_varsity:
	<input type="radio" name="novice_varsity" value="Novice"<?php
	if ($novice_varsity === 'Novice') {
		echo " checked";
	}
	?>>novice
	<input type="radio" name="novice_varsity" value="Varsity"<?php
	if ($novice_varsity === 'Varsity') {
		echo " checked";
	}
	?>>varsity<br>

	first: <input type="text" name="first" value="<?php
	echo htmlspecialchars($first);
	?>"><br>

	last: <input type="text" name="last" value="<?php
	echo htmlspecialchars($last);
	?>"><br>

	gender:
	<input type="radio" name="gender" value="Male"<?php
	if ($gender === 'Male') {
		echo " checked";
	}
	?>>male
	<input type="radio" name="gender" value="Female"<?php
	if ($gender === 'Female') {
		echo " checked";
	}
	?>>female<br>

	school:
	<select name="school">
		<option value="">Please select</option>
		<option value="Bromfield"<?php
		if ($school === 'Bromfield') {
			echo " selected";
		}
		?>>Bromfield</option>
		<option value="Acton-Boxborough"<?php
		if ($school === 'Acton-Boxborough') {
			echo " selected";
		}
		?>>Acton-Boxborough</option>
	</select><br>

	grade: <input type="number" name="grade" value="<?php
	echo htmlspecialchars($grade);
	?>"><br>

	email1: <input type="text" name="email1" value="<?php
	echo htmlspecialchars($email1);
	?>"><br>

	email2: <input type="text" name="email2" value="<?php
	echo htmlspecialchars($email2);
	?>"><br>

	cellphone: <input type="text" name="cell" value="<?php
	echo htmlspecialchars($cell);
	?>"><br>

	homephone: <input type="text" name="home" value="<?php
	echo htmlspecialchars($home);
	?>"><br>

	<input type="submit" name="submit" value="Submit">
</form>
</body>

</html>