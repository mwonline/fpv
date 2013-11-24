<?php


/**
 * This is the model class for table "categoria".
 *
 * The followings are the available columns in table 'categoria':
 * @property string $titulo
 * @property integer $orden
 * @property integer $activo
 * @property string $fecha_de_creación
 * @property string $usuario_creación
 * @property integer $idplantilla
 * @property integer $idcategoria
 * @property integer $idContenidoRef
 * @property integer $idpadrecategoria
 * @property string $alias
 * @property string $palabrasClave
 * @property string $metaDescripcion
 * @property string $altImage
 * @property string $textoComplementario
 * @property string $fecha_actualizacion
 * 
 *
 * The followings are the available model relations:
 * @property Categoria $idpadrecategoria0
 * @property Categoria[] $categorias
 * @property Contenido $idContenidoRef0
 */
 
class AliasContenido extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Categoria the static model class
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
		return 'aliasContenido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aliasContenido, idCategoria', 'required'),
			array('idContenido', 'numerical', 'integerOnly'=>true),
			array('aliasContenido', 'length', 'max'=>255),
			array('aliasContenido', 'unique'),
			// The followin'g rule is used by search().
			// Please remove those attributes that should not be searched.
			array('aliasContenido, idContenido, idAliasContenido', 'safe', 'on'=>'search'),
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
			'idAliasContenido' => 'id Alias',
			'aliasContenido' => 'Alias',
			'idContenido' => 'id Categoria',
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

		$criteria->compare('idAliasContenido',$this->titulo,true);
		$criteria->compare('aliasContenido',$this->orden);
		$criteria->compare('idContenido',$this->activo);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}