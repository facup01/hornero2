<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Rol}}".
 *
 * @property int $idRol
 * @property string $Rol
 *
 * @property Usuario[] $usuarios
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Rol}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Rol'], 'required'],
            [['Rol'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRol' => 'Id Rol',
            'Rol' => 'Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['idRol' => 'idRol']);
    }
}
