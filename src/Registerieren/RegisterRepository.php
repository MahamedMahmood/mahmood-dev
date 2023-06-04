<?php 

namespace App\Registerieren;

use App\Core\AbstractRepository;
use PDO;

class RegisterRepository extends AbstractRepository
{

    public function getTableName() {
        return 'users';
    }


    public function getModelName() {
        return "App\\Registerieren\\RegisterModel";
    }

    public function findByUser($username, $mail, $password){
        $table = $this->getTableName();
        $model = $this->getModelName();
        $stt = $this->pdo->prepare("INSERT INTO `$table` (`username`,  `mail`, `password`) VALUES (:username, :mail, :password)");
        $stt->execute([
            'username' => $username,
            'mail' => $mail,
            'password' => $password
    ]);
        // $stt->setFetchMode(PDO::FETCH_CLASS, "$model");
        // $user = $stt->fetch(PDO::FETCH_CLASS);
        // return $user;
    
       
    }


 }


?>

<?php 
// $stt = $this->pdo->prepare("SELECT * FROM `$table` WHERE username = :username");
//$stt = $this->pdo->prepare("INSERT INTO $table (username,  mail, password) VALUES(:username, :mail, :password)");

?>