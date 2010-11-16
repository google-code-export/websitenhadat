READ ME:

-------------------------------
HIOX Unique Counter 1.0
-------------------------------

This software is developed and copyrighted by HIOX Softwares.
This is given under The GNU General Public License (GPL).
This version is HUC 1.0

Feature:
  a)counter that counts the visitor clicks on a web page
  b)This counts only unique clicks based on ipAddress.
  c)The visit from a ipAddress to a webpage will be counted only once every 24hrs.
  d)Intial/Starting count value can be set.
  e)Easy to use.

How To Use:
- unzip HUC_1_0.zip, You will get HUC/count.txt, HUC/ip.txt, HUC/huc.php
- Set the intital value of counter in HUC/count.txt. Dont edit any other files
- Copy the below code in the webpage where you want the count to be viewed.

<?php
include "./HUC/huc.php";
?>

You can edit the HUC/count.txt file and give any value to begin with.
If you give 9999, then the count will start from 10000.

NOTE: if you use the counter in a page ./test.html, HUC dir should be present under the same path (i.e ./HUC/*).
I.e unzip the file under the directory where you have the webpage to use this counter.

Release Date HUC 1.0 : 20-05-2004

On any suggestions mail to us at pro@hioxindia.com

Visit us at http://www.hscripts.com
Visit us at http://www.hioxindia.com
