
<?php

$rip = $_SERVER['REMOTE_ADDR'];
$sd  = time();
$count = 1;
$maxu = 1;

$file1 = "ip.txt";
$lines = file($file1);
$line2 = "";

foreach ($lines as $line_num => $line)
	{
		if($line_num == 0)
		{
		   $maxu = $line;
		}
		else
		{
			//echo $line."<br>";
			$fp = strpos($line,'****');
			$nam = substr($line,0,$fp);
			$sp = strpos($line,'++++');
			$val = substr($line,$fp+4,$sp-($fp+4));
			$diff = $sd-$val;

			if($diff < 300 && $nam != $rip)
				{
				 $count = $count+1;
				 $line2 = $line2.$line;
				 //echo $line2; 
				}
		}
	}

$my = $rip."****".$sd."++++\n";
if($count > $maxu)
	$maxu = $count;

$open1 = fopen($file1, "w");
fwrite($open1,"$maxu\n");
fwrite($open1,"$line2");
fwrite($open1,"$my");
fclose($open1);

echo "<font color=red><b>$count</b></font>";

?>