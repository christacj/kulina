<html>
<body>
	<form method="POST" action="">
		<input type="text" name="angkauser"><br>
		<input type="submit" name="submit" value="submit">
	</form>

	<?php
	if ($_POST)
	{
		echo "Bilangan Prima adalah <br>";
		$angkauser= $_POST['angkauser'];
		for($i = 1; $i<=$angkauser;$i++)
		{
			$totalsama = 0;
			for($j = 1; $j<=$i; $j++)
			{
				if($i%$j==0)
					$totalsama++;
			}
			if($totalsama == 2) //bilangan prima adalah bilangan yang habis dibagi 1 atau bilangan itu sendiri
				echo $i."<br>";
		}
	}
	?>
</body>
</html>
