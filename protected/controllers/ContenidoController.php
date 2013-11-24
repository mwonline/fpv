<?php

class ContenidoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','getnames'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','getnames','elfinder.connector','elfinderDos.connector','verificartag'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 
	public function actionCreate()
	{
		$model=new Contenido;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contenido']))
		{
			$model->attributes=$_POST['Contenido'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idContenido));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}*/
	
	public function actionCreate()
	{
		//LEER
		$model=new Contenido();
		//$modelConCat= new CategoriaContenido(); 
                //$modelContMul= new Multimedia();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		/*if(isset($_POST['Contenido']))
		{
			$model->attributes=$_POST['Contenido'];
			if($model->save()){
				if(isset($_POST['CategoriaContenido']))
					{
						$_POST['CategoriaContenido']['idContenido']=$model->idContenido;
						$modelConCat->attributes=$_POST['CategoriaContenido'];
						$modelConCat->idContenido=$model->idContenido;
						//CategoriaContenido::model()->attributes=$_POST['CategoriaContenido'];
						$modelConCat->save();
							//$this->redirect(array('view','id'=>$model->idContenido));
					}	
					$this->redirect(array('view','id'=>$model->idContenido));
					//$this->redirect(array('multimedia/create','idContenido'=>$model->idContenido));
			}
				
		}*/
		if(isset($_POST['Contenido']))
		{
			$model->attributes=$_POST['Contenido'];
			if($model->save()){
					//$this->redirect(array('multimedia/create','idContenido'=>$model->idContenido));
					$this->redirect(array('multimedia/create','idContenido'=>$model->idContenido));
			}
				
		}
        //CREAR REGSITROS DE CATEGORIA, ASOCIAR CONTENIDO DE CATEGORIA
		//$this->render('create',array('modelConCat'=>$modelConCat,'model'=>$model));
		$this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        //$modelConCat=  CategoriaContenido::model()->findAll('idContenido=:idContenido', array(':idContenido' => $id));
      	//$modelConCategoria=new CategoriaContenido(); 
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		/*if(isset($_POST['Contenido']))
		{
			//print_r($_POST);
			$model->attributes=$_POST['Contenido'];
			if($model->save()){
                            if(isset($_POST['CategoriaContenido']))
					{
						$_POST['CategoriaContenido']['idContenido']=$model->idContenido;
						$modelConCat[0]->attributes=$_POST['CategoriaContenido'];
						$modelConCat[0]->idContenido=$model->idContenido;
						//CategoriaContenido::model()->attributes=$_POST['CategoriaContenido'];
						$modelConCat[0]->save();
							//$this->redirect(array('view','id'=>$model->idContenido));
					}
                            
                            //$this->redirect(array('multimedia/admin','idContenido'=>$model->idContenido));	
				$this->redirect(array('view','id'=>$model->idContenido));
                            
                        }
				
		}*/
		if(isset($_POST['Contenido']))
		{
			$model->attributes=$_POST['Contenido'];
			if($model->save()){             	
				$this->redirect(array('multimedia/create','idContenido'=>$model->idContenido));
                            
            }			
		}

		/*$this->render('update',array(
			'model'=>$model,
			'modelConCat'=>$modelConCategoria,
		));*/
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Contenido', array(
    	'criteria'=>array(
        //'condition'=>'status=1',
        'order'=>'orden ASC',
        )));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Contenido('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contenido']))
			$model->attributes=$_GET['Contenido'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	public function actionVerificarTag(){
		
		$sql = 'SELECT idTag as id, nombre as value FROM tag WHERE nombre = :qterm ';
		$sql .= ' ORDER BY nombre ASC';
		$command = Yii::app()->db->createCommand($sql);
		$qterm = $_REQUEST['term'].'';
		$command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
		$result = $command->queryAll();
		$count = count ( $result );
		echo $count;
		if($count ==0)
		{
			$sql2 = "INSERT INTO  `tag` (
					
					`nombre`
					)
					VALUES (
					  '$qterm'
					);";
					
			$command = Yii::app()->db->createCommand($sql2);		
			$result = $command->execute();
		}	
	}
	
	public function  actionGetNames() {
        $r = array(
                array("label"=>"Test 1", "value"=>"Test 1") ,
                array("label"=>"Test 2", "value"=>"Test 2") ,
                array("label"=>"Test 3", "value"=>"Test 3") ,
                array("label"=>"Test 4", "value"=>"Test 4") ,
            );
			
		if (!empty($_GET['term'])) {
		$sql = 'SELECT idTag as id, nombre as value FROM tag WHERE nombre LIKE :qterm ';
		$sql .= ' ORDER BY nombre ASC';
		$command = Yii::app()->db->createCommand($sql);
		$qterm = $_GET['term'].'%';
		$command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
		$result = $command->queryAll();
		echo CJSON::encode($result); exit;
	  } else {
		return false;
	  }	
			
        echo CJSON::encode($r);
    }
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Contenido::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contenido-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actions() {
       return array(
          'elfinder.' => 'widgets.elfinder.FinderWidget',
		   'elfinderDos.' => 'widgets.elfinderDos.FinderWidgetDos',
        );
	}
}
