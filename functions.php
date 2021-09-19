<?php
$mysql=false;
function connectDB() {
global $mysql;
$mysql=new mysqli("localhost","root","","ex4");
}
function adduser(){
global $mysql;
connectDB();
$success=$mysql->query("INSERT INTO `users`(`username`,`snetwork`,`FirstEnterDate`,`LastEnterDate`)VALUES('Docker','odnoklassniki','19-02-19','21-03-13')") ;
closeDB();
return $success;
}
function filtrtable() {
    global $mysql;
    connectDB();
    if (!$_GET["tname"]){$order1="id";}
    else{$order1=$_GET["tname"];}
    $filtr=$_POST['filtrnetwork'];
    $result_set=$mysql->query("SELECT * FROM `users` WHERE `snetwork`='$filtr' ORDER BY $order1 ASC  ");
    closeDB();
    return resultSetToArray($result_set);
    }
    function filtrtablestat() {
        global $mysql;
        connectDB();
        if (!$_GET["tname"]){$order1="id";}
        else{$order1=$_GET["tname"];}
        $filtr=$_POST['filtrstatus'];
        $result_set=$mysql->query("SELECT * FROM `users` WHERE `status`='$filtr' ORDER BY $order1 ASC  ");
        closeDB();
        return resultSetToArray($result_set);
        }
    function getallusers() {
    global $mysql;
    connectDB();
    if (!$_GET["tname"]){$order1="id";}
    else{$order1=$_GET["tname"];}
    
   $result_set=$mysql->query("SELECT * FROM `users` ORDER BY $order1 ASC ");
    closeDB();
    return resultSetToArray($result_set);
    }
    function resultSetToArray($result_set){
        $array=array();
        while (($row=$result_set->fetch_assoc()) !=false)
        $array[]=$row;
        return $array;
        }
function closeDB(){
global $mysql;
$mysql->close();
}
function deluser(){
    global $mysql;
    connectDB();
    $formuser=$_POST['formuser'];
    $N = count($formuser);
    for($i=0; $i < $N; $i++){
       
    $success=$mysql->query("DELETE FROM users WHERE `id`=$formuser[$i]") ;
    }
    closeDB();
    return $success;
    }
    function blockuser(){
        global $mysql;
        connectDB();
        $formuser=$_POST['formuser'];
    $N = count($formuser);
    for($i=0; $i < $N; $i++){
        $success=$mysql->query("UPDATE `ex4`.`users` SET `status`='blocked' WHERE  `id`=$formuser[$i];") ;
    }
        
        closeDB();
        return $success;
        }
        function unblockuser(){
            global $mysql;
        connectDB();
        $formuser=$_POST['formuser'];
    $N = count($formuser);
    for($i=0; $i < $N; $i++){
        $success=$mysql->query("UPDATE `ex4`.`users` SET `status`='active' WHERE  `id`=$formuser[$i];") ;
    }
        
        closeDB();
        return $success;
            }


?>
<script language="JavaScript" type="text/JavaScript">
function CheckAll()
{
  var i;
  for(i=0; i<document.formusers.elements.length; i++)
  {
    if(document.formusers.check.checked==true)
    {document.formusers.elements[i].checked=true;}
    else {document.formusers.elements[i].checked=false;}
  }
}
</script>