<?
session_start();
session_destroy();
if(file_exists("thefinal.csv")){
unlink("thefinal.csv");}
if(file_exists("datamail.txt")){
unlink("datamail.txt");}
if(file_exists("datamail2.txt")){
unlink("datamail2.txt");}
header("Location: myindex.php");
?>
