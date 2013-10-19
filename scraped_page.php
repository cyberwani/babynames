<?php
require 'curlfunction.php';
require 'scrape_between.php';
$form = file_get_contents(index.php);
$filename = $_POST['fromyear'] ."". $_POST['top'];
$dir = "cache";
if( file_exists("$dir/$filename.html") )
{ $cache = file_get_contents("$dir/$filename.html"); 
echo "cached";
include 'index.php';
echo $_POST['fromyear'];
echo $cache;

}
else
{ 
    $scraped_page = curl("http://www.socialsecurity.gov/cgi-bin/popularnames.cgi");    // SSC page to variable $scraped_page
    $scraped_data = scrape_between($scraped_page, "<p align=\"center\">", "</p>");   // Scraping downloaded data in $scraped_page for content between tags
  $search  = array('Male name','Number of','males','Female name','bgcolor="#efefef"','bgcolor="#99ccff"');
        $replace = array('Name','Total','','','','');
        $str = str_replace($search, $replace, $scraped_data);
    file_put_contents("$dir/$filename.html",$str);
    echo "not cached";
    include 'index.php';
    echo $_POST['fromyear'];
    echo $_POST['top'];
    echo $_POST['number'];
    echo $str;
    
 }

    
?>

