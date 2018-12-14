<?php
namespace app\models;

//app\models\gii\Users is the model generated using Gii from users table

use app\models\Usuario as Usuario;
use yii\db\Query;

class User extends \yii\base\Object implements \yii\web\IdentityInterface {

public $idUsuario;
public $Institucion;
public $Descripcion;
public $claveRepetida;


public $NombreUsuario;
public $Nombre;
public $fechaNacimiento;    
public $fk_permiso;
public $Clave;
public $authKey;
public $accessToken;
public $Email;
public $user_type;
public $role;
public $idRol;
public $idLenguaje;

const ADMIN=1;
const JUGADOR=2;
const PROFESOR=3;



////////////////////////CREADOS POR FACU ///////////////////
/*public static function isUserAdmin($id){
       if (Persona::findOne(['id' => $id, 'fk_idRole' => 2])){
            return true;
       } else {
            return false;
       }

    }

    public static function isUserSimple($id){
        if (Persona::findOne(['id' => $id, 'fk_idRole' => 1])){
             return true;
        } else {
             return false;
        }
     }
     
     public static function isUserBorrador($id){
        if (Persona::findOne(['id' => $id, 'fk_idRole' => 3])){
             return true;
        } else {
             return false;
        }
     }
*/
     public static function getMyRole(){
        $query=new Query;
        $query=Rol::find()
            ->select('Rol.idRol')->from('Rol')
            ->join('INNER JOIN','Usuario','Usuario.idRol=Rol.idRol');
        $command=$query->createCommand();
        $data=$command->queryAll();
        
        return $data;
     }

//////////////////////// FIN CREADOS POR FACU ///////////////////







/**
 * @inheritdoc
 */
public static function findIdentity($idUsuario) {
    $Usuario = Usuario::find()
            ->where([
                "idUsuario" => $idUsuario
            ])
            ->one();
    if (!count($Usuario)) {
        return null;
    }
    return new static($Usuario);
}

/**
 * @inheritdoc
 */
public static function findIdentityByAccessToken($token, $userType = null) {

    $Usuario = Usuario::find()
            ->where(["accessToken" => $token])
            ->one();
    if (!count($Usuario)) {
        return null;
    }
    return new static($Usuario);
}

/**
 * Finds user by username
 *
 * @param  string      $username
 * @return static|null
 */
public static function findByUsername($NombreUsuario) {
    $Usuario = Usuario::find()
            ->where([
                "NombreUsuario" => $NombreUsuario
            ])
            ->one();
    if (!count($Usuario)) {
        return null;
    }
   //print_r($Usuario);
    //exit();

    return new static($Usuario);
}

/**
 * @inheritdoc
 */
public function getId() {
    return $this->idUsuario;
}

/**
 * @inheritdoc
 */
public function getAuthKey() {
    return $this->authKey;
}

/**
 * @inheritdoc
 */
public function validateAuthKey($authKey) {
    return $this->authKey === $authKey;
}

/**
 * Validates password
 *
 * @param  string  $password password to validate
 * @return boolean if password provided is valid for current user
 */
public function validatePassword($Clave) {
    return $this->Clave === $Clave;
}

}