<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Usuario}}".
 *
 * @property int $idUsuario
 * @property string $Institucion
 * @property string $NombreUsuario
 * @property string $Descripcion
 * @property string $Clave
 * @property int $idRol
 * @property string $Email
 * @property int $idLenguaje
 * 
 * @property CambioClave[] $cambioClaves
 * @property Resolucion[] $resolucions
 * @property TorneoUsuario[] $torneoUsuarios
 * @property Rol $rol
 * @property Lenguaje $lenguaje
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Usuario}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Institucion', 'NombreUsuario', 'Descripcion', 'idRol', 'Email', 'idLenguaje'], 'required'],
            [['idRol', 'idLenguaje'], 'integer'],
            [['Institucion', 'NombreUsuario'], 'string', 'max' => 100],
            [['Descripcion'], 'string', 'max' => 1000],
            [['Email'], 'string', 'max' => 255],
            [['Email'],'email'],
            [['NombreUsuario'], 'unique'],
            [['idRol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['idRol' => 'idRol']],
            [['idLenguaje'], 'exist', 'skipOnError' => true, 'targetClass' => Lenguaje::className(), 'targetAttribute' => ['idLenguaje' => 'idLenguaje']],
       
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'Institucion' => 'Institucion/Escuela/Universidad',
            'NombreUsuario' => 'Nombre de Usuario',
            'Descripcion' => 'Nombre y Apellido de cada uno de los Participantes del equipo',
            'Clave' => 'Clave',
            'idRol' => 'Rol',
            'Email' => 'Email',
            'idLenguaje' => 'Lenguaje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCambioClaves()
    {
        return $this->hasMany(CambioClave::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResolucions()
    {
        return $this->hasMany(Resolucion::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneoUsuarios()
    {
        return $this->hasMany(TorneoUsuario::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['idRol' => 'idRol']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLenguaje()
    {
        return $this->hasOne(Lenguaje::className(), ['idLenguaje' => 'idLenguaje']);
    }
}
