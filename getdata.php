<?php
$typeforespørsel = $_GET['requesttype'];

$db = new mysqli("student.cs.hioa.no", "s315584", "", "s315584");
if($db->connect_error)
{
    echo json_encode(null);
    die();
}

switch($typeforespørsel){
    case "getUsers":
        $sql = "SELECT userid, username, fullnavn, email, phonenr, address from users";
        break;
    case "getAthleates":
        $sql = "SELECT athleteid, athletename from athletes";
        break;
}
$resultat = $db->query($sql);
if(!$resultat)
{
    echo json_encode(null);
    die();
}
$rows = array();
while($r = mysqli_fetch_assoc($resultat)){
$rows[] = $r;
}
$utdata = json_encode($rows);
echo $utdata;