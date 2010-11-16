<?php

$file = "./hitcounter/hitcount.txt";
$open = fopen($file, "r");
$size = filesize($file);
$count = fread($open, $size);
$count1 = $count+1;
fclose($open);

$file1 = "./hitcounter/ip.txt";
$lines = file($file1);
//$count = count($lines);

foreach ($lines as $line_num => $line)
{
//echo $line;
$firstPos = strpos($line,'"');
$secPos = strpos($line,'"');
$ddate = substr($line,$firstPos+1,($secPos-$firstPos)-2);
//echo $ddate;
//echo $DeleteLength;
break;
}

$dat = date('d');
//echo("<br>".$dat);


$rip = $_SERVER['REMOTE_ADDR'];

if($dat != $ddate)
{
	//To write in to
	$open2 = fopen($file1, "w");
	fwrite($open2, "DATE= \"$dat\"");
	fwrite($open2, "\n\n$rip");
	fclose($open2);

	$open = fopen($file, "w");
	fwrite($open, $count1);
	fclose($open);
	$count = $count1;
}
else
{
	$open2 = fopen($file1, "r");
	$size = filesize($file1);
	$ips = fread($open2, $size);

	if(strpos($ips,$rip))
	{
	//	echo($rip);
	}
	else
	{
		$open = fopen($file, "w");
		fwrite($open, $count1);
		fclose($open);
		$count = $count1;

		$open3 = fopen($file1, "a");
		fwrite($open3,"\n\n");
		fwrite($open3, $rip);
		fclose($open3);
		//echo($rip);
	}
	fclose($open2);

}

echo("<font color=red><b>$count</b></font>");
?>

