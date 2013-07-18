<?php
session_start();
ini_set("display_errors", 1);
define("SESSION_NAME", 'users11111');





$Tableau = array(15, 10, 23, 2, 8, 9, 14, 7);
 
echo "Avant:";
for($K = 0; $K < count($Tableau); $K++) {
 echo  $Tableau[$K].", ";
}
 
for($I = count($Tableau) - 2;$I >= 0; $I--)
 {


echo "#".$I."#";

 	for($J = 0; $J <= $I; $J++) 
 	{
 	
  			if($Tableau[$J + 1] < $Tableau[$J]) 
  			{
   				$t = $Tableau[$J + 1];
   				$Tableau[$J + 1] = $Tableau[$J];
   				$Tableau[$J] = $t;
  			}
	 }
}
 
echo "<br />Après:";
for($L = 0; $L < count($Tableau); $L++) {
  echo $Tableau[$L].", ";
}
echo "<br />";







class User {

    protected $nom;
    protected $age;

    public function __construct() {
        
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getAge() {
        return $this->age;
    }

    public function getName() {
        return $this->name;
    }

    public function save($users) {
        $_SESSION[SESSION_NAME] = serialize($users);
    }

}

if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['age']) && !empty($_POST['age']) && is_numeric($_POST['age'])) {


    $User = new User();
    $User->setName($_POST['name']);
    $User->setAge($_POST['age']);

    $users = (isset($_SESSION[SESSION_NAME]))?unserialize($_SESSION[SESSION_NAME]):array();
    $users[] = $User;

    $User->save($users);
} else {

    echo "Tous les champs sont requis";
}
?>


<form action="" method="POST">
    <input type="name" name="name" value="" />
    <input type="age" name="age" value="" />
    <button type="submit" name="submit">Valider</button>
</form>
<?php
if (isset($_SESSION[SESSION_NAME]))
    $listUsers = unserialize ($_SESSION[SESSION_NAME]);
else
    $listUsers = array();



foreach ($listUsers as $user) {
    echo $user->getName() . " - ";
    echo $user->getAge() . "<br />";
}
?>