<?php

/**
 * This is the model class for table "descarga".
 *
 * The followings are the available columns in table 'descarga':
 * @property integer $id
 * @property integer $categoria
 * @property string $titulo
 * @property string $descripcion
 * @property string $imagen
 * @property string $fecha
 * @property string $activo
 * @property integer $orden
 * @property string $archivo
 */
class Descarga extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'descarga';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoria, titulo, descripcion, fecha, activo, archivo', 'required'),
			array('categoria', 'numerical', 'integerOnly'=>true),
			array('titulo, imagen, archivo', 'length', 'max'=>100),
			array('descripcion', 'length', 'max'=>255),
			array('activo', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, categoria, titulo, descripcion, imagen, fecha, activo, archivo', 'safe', 'on'=>'search'),
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
			'categ' => array(self::BELONGS_TO, 'Categoriadesc', 'categoria')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'categoria' => 'Categoria',
			'titulo' => 'Titulo',
			'descripcion' => 'Descripcion',
			'imagen' => 'Imagen',
			'fecha' => 'Fecha',
			'activo' => 'Activo',
			//'orden' => 'Orden',
			'archivo' => 'Archivo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('categoria',$this->categoria);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('activo',$this->activo,true);
		//$criteria->compare('orden',$this->orden);
		$criteria->compare('archivo',$this->archivo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Descarga the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
