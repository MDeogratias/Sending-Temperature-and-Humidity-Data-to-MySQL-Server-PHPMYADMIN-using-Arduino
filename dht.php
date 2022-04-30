<?php
class dht11{
 public $link='';
 function __construct($Temperature, $Humidity){
  $this->connect();
  $this->storeInDB($Temperature, $Humidity);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'<Your Database Name>') or die('Cannot select the DB');
 }
 
 function storeInDB($Temperature, $Humidity){
  $query = "insert into <Your table name> set Humidity='".$Humidity."', Temperature='".$Temperature."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['Temperature'] != '' and  $_GET['Humidity'] != ''){
 $dht11=new dht11($_GET['Temperature'],$_GET['Humidity']);
}


?>
