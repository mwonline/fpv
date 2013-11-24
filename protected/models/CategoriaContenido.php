<?php

/**
 * This is the model class for table "categoria_contenido".
 *
 * The followings are the available columns in table 'categoria_contenido':
 * @property integer $idCategoria
 * @property integer $idContenido
 * @property integer $orden
 * @property string $fecha_de_creacion
 * @property integer $idcategoriacontenido
 */
class CategoriaContenido extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CategoriaContenido the static model class
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
		return 'categoria_contenido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCategoria', 'required'),
			//array('idCategoria, idContenido, orden', 'numerical', 'integerOnly'=>true),
			//array('fecha_de_creacion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCategoria, idContenido, orden, fecha_de_creacion, idcategoriacontenido', 'safe', 'on'=>'search'),
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
			'idCategoria' => 'Categoria',
			'idContenido' => 'Id Contenido',
			'orden' => 'Orden',
			'fecha_de_creacion' => 'Fecha De Creacion',
			'idcategoriacontenido' => 'Idcategoriacontenido',
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

		$criteria->compare('idCategoria',$this->idCategoria);
		$criteria->compare('idContenido',$this->idContenido);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('fecha_de_creacion',$this->fecha_de_creacion,true);
		$criteria->compare('idcategoriacontenido',$this->idcategoriacontenido);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}