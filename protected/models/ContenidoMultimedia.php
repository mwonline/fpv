<?php

/**
 * This is the model class for table "contenido_multimedia".
 *
 * The followings are the available columns in table 'contenido_multimedia':
 * @property integer $idContenido
 * @property integer $idmultimedia
 * @property integer $orden
 * @property string $fecha_de_creacion
 * @property integer $idcontenidomultimedia
 */
class ContenidoMultimedia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContenidoMultimedia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contenido_multimedia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idContenido, idmultimedia', 'required'),
			array('idContenido, idmultimedia, orden', 'numerical', 'integerOnly'=>true),
			array('fecha_de_creacion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idContenido, idmultimedia, orden, fecha_de_creacion, idcontenidomultimedia', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idContenido' => 'Id Contenido',
			'idmultimedia' => 'Idmultimedia',
			'orden' => 'Orden',
			'fecha_de_creacion' => 'Fecha De Creacion',
			'idcontenidomultimedia' => 'Idcontenidomultimedia',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idContenido',$this->idContenido);
		$criteria->compare('idmultimedia',$this->idmultimedia);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('fecha_de_creacion',$this->fecha_de_creacion,true);
		$criteria->compare('idcontenidomultimedia',$this->idcontenidomultimedia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}