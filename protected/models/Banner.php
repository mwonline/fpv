<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property string $Titulo
 * @property string $Descripcion
 * @property string $imagen
 * @property string $url
 * @property integer $orden
 * @property string $activo
 * @property string $fecha_de_creación
 * @property integer $id
 */
class Banner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Banner the static model class
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
		return 'banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Titulo, Descripcion, imagen, orden, activo, fecha_de_creacion', 'required'),
			array('orden', 'numerical', 'integerOnly'=>true),
			array('Titulo', 'length', 'max'=>56),
			array('Descripcion', 'length', 'max'=>220),
			array('activo', 'length', 'max'=>1),
			array('url', 'type', 'allowEmpty'=>true),			
			//array('', 'type', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Titulo, Descripcion, imagen, url, orden, activo, fecha_de_creacion, id', 'safe', 'on'=>'search'),
			
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
			'Titulo' => 'Titulo (Máximo 54 caracteres)',
			'Descripcion' => 'Descripción (Máximo 220 caracteres)',
			'imagen' => 'Imagen(960 x 336)',
			'url' => 'Url',
			'orden' => 'Orden',
			'activo' => 'Activo',
			'fecha_de_creacion' => 'Fecha De Creación',
			'id' => 'ID',
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

		$criteria->compare('Titulo',$this->Titulo,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('imagen',$this->imagen);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('activo',$this->activo,true);
		$criteria->compare('fecha_de_creacion',$this->fecha_de_creacion,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}