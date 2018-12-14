<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Problema}}".
 *
 * @property int $idProblema
 * @property int $idTipo
 * @property string $Nombre
 * @property string $Archivo
 * @property string $Enunciado
 * @property int $idComplejidad
 * @property double $TiempoEjecucionMax Tiempo Máximo en Segundos
 *
 * @property Complejidad $complejidad
 * @property TipoProblema $tipo
 * @property Resolucion[] $resolucions
 * @property Solucion[] $solucions
 * @property TorneoProblema[] $torneoProblemas
 */
class Problema extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Problema}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTipo', 'Nombre', 'Enunciado', 'idComplejidad', 'TiempoEjecucionMax'], 'required'],
            [['idTipo', 'idComplejidad'], 'integer'],
            [['Enunciado'], 'string'],
            [['TiempoEjecucionMax'], 'number'],
            [['Nombre', 'Archivo'], 'string', 'max' => 255],
            [['idComplejidad'], 'exist', 'skipOnError' => true, 'targetClass' => Complejidad::className(), 'targetAttribute' => ['idComplejidad' => 'idComplejidad']],
            [['idTipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProblema::className(), 'targetAttribute' => ['idTipo' => 'idTipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProblema' => 'Id Problema',
            'idTipo' => 'Tipo',
            'Nombre' => 'Nombre',
            'Archivo' => 'Archivo',
            'Enunciado' => 'Enunciado',
            'idComplejidad' => 'Complejidad',
            'TiempoEjecucionMax' => 'Tiempo Máximo en Segundos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplejidad()
    {
        return $this->hasOne(Complejidad::className(), ['idComplejidad' => 'idComplejidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(TipoProblema::className(), ['idTipo' => 'idTipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResolucions()
    {
        return $this->hasMany(Resolucion::className(), ['idProblema' => 'idProblema']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolucions()
    {
        return $this->hasMany(Solucion::className(), ['idProblema' => 'idProblema']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTorneoProblemas()
    {
        return $this->hasMany(TorneoProblema::className(), ['idProblema' => 'idProblema']);
    }
}
