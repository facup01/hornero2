<?php

namespace app\models;

use Yii;

/**
 *
 * @property string $Clave
 * @property string $ReClave
 * 
 * @property CambioClave[] $cambioClaves
 *
 **/

class NuevoUsuario extends Usuario
{ 
    public $captcha;
    public $ReClave;

    const SCENARIO_UPDATECLAVE = 'updateclave';
    /**
     * {@inheritdoc}
     */

    public function scenarios()
    {
        $scenacios=parent::scenarios();
        $scenacios[self::SCENARIO_UPDATECLAVE]= ['ReClave', 'Clave'];

        return $scenacios;
    }



    public function rules()
    {
        $rules=parent::rules();
        
        $rules[]=[['Clave', 'ReClave','captcha'], 'required'];//, 'on'=>'insert'];
        $rules[]=[['captcha'], 'required', 'on'=>['insert']];
        $rules[]=['ReClave', 'compare', 'compareAttribute' => 'Clave','operator'=>'==','message'=>"Las claves no coinciden"];
        $rules[]=[['captcha'],'captcha','on'=>['insert']];
        
        return $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {

        $labels=parent::attributeLabels();
        $labels['ReClave']='Reingresar clave';
        
        return $labels;
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
