<html>
<body>
	<form method="POST" action="">
		Input Angka <input type="text" name="angkauser"><br>
		<input type="submit" name="submit" value="submit">
	</form>

	<?php
	if ($_POST)
	{
		$angkauser= $_POST['angkauser'];
		$totalangka = strlen($angkauser);
		$sub = 0;
		echo "Output untuk ".$angkauser." adalah <br>";
		for($i = $totalangka; $i>=1;$i--)
		{
			echo substr($angkauser,$sub,1);
			for($j=1;$j<=$i-1;$j++)
				echo "0";
			echo "<br>";
			$sub++;
		}
	}
	?>
</body>
</html>
