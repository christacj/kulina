<html>
<body>
	<form method="POST" action="">
		Banyak iterasi <input type="text" name="angkauser"><br>
		<input type="submit" name="submit" value="submit">
	</form>

	<?php
	if ($_POST)
	{
		$angkauser= $_POST['angkauser'];
		echo "Bilangan Fibonacci untuk ".$angkauser." iterasi adalah <br>";
		$angkasebelum = 0;
		$angkasekarang = 1;
		echo $angkasebelum." ".$angkasekarang;
		for($i = 1; $i<=$angkauser;$i++)
		{
			$angkaoutput = $angkasebelum + $angkasekarang;
			echo " ".$angkaoutput;
			
			$angkasebelum = $angkasekarang;
			$angkasekarang = $angkaoutput;
		}
	}
	?>
</body>
</html>
