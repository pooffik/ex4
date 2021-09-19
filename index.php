<?php require $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
session_start();
if(!empty($_POST["delete"])){deluser();}
if(!empty($_POST["block"])){blockuser();}
if(!empty($_POST["unblock"])){unblockuser();}
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<head>
</head>
<body>
<form action="index.php" name=formusers method="post">
<input  name="block" type="submit" value="BLOCK" />
<input  name="unblock" type="submit" value="UNBLOCK" />
<input  name="delete" type="submit" value="DELETE" />
<table border="1">
   <caption>Users:</caption>
   <tr>
   <th><input name="check" type="checkbox" onClick="CheckAll()">All<br><br></th>
   <th><a href='../index.php?tname=id'>User id</th>
    <th><a href='../index.php?tname=username'>Username</a></th>
    <th><a href='../index.php?tname=snetwork'>Social network</th>
    <th><a href='../index.php?tname=FirstEnterDate'>First enter date</th>
    <th><a href='../index.php?tname=LastEnterDate'>Last enter date</th>
    <th><a href='../index.php?tname=status'>status</th>
   </tr>
   <?php
if (!empty($_POST["filtrsn"]&&$_POST["filtrnetwork"]!="All")){
  $users=filtrtable();
}

else if (!empty($_POST["filtrstat"]&&$_POST["filtrstatus"]!="All")){
  $users=filtrtablestat();
}
else{
$users=getallusers();
}
for($i=0;$i<count($users); $i++){
    $snetwork=$users[$i]["snetwork"];
    $username=$users[$i]["username"];
    $LastEnterDate=$users[$i]["LastEnterDate"];
    $FirstEnterDate = $users[$i]["FirstEnterDate"];
    $status=$users[$i]["status"];
    $id=$users[$i]["id"];
    echo "<tr><td><input type='checkbox' name='formuser[]' value=".$id."></td><td>".$id."</td><td>".$username."</td><td>".$snetwork."</td><td>".$LastEnterDate."</td><td>".$FirstEnterDate."</td><td>".$status."</td></tr>";
}
?>  
</table>
</form>
Select only(network/status):
<form action="index.php" name=filtrsnet method="post">
<select  name="filtrnetwork">
<option>All</option>
  <option>vk</option>
  <option>odnoklassniki</option>
  <option>twitter</option>
</select>
<input  name="filtrsn" type="submit" value="Выбрать" />
</form>
<form action="index.php" name=filtrst method="post">
<select name="filtrstatus">
<option>All</option>
  <option>active</option>
  <option>blocked</option>
</select>
<input  name="filtrstat" type="submit" value="Выбрать" />
</form>

</body>