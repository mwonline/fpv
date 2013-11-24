<?php
//Yii::import('ext.fancybox.EFancyBox');
class FormController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/master';
	public $excusas,$listadoExcusas,$totalExcusas;
	public $body="deje-su-excusa";
	public $bodyClass="";
	var $datosMenu;
    var $datosSubMenu = array();
    var $datosMenuTop;
    var $idCategoriaActual = ""; //Para marcar en el menu el elemento actual
    var $idPadreActual = ""; //Para marcar en el menu el elemento actual cuando es submenu
	/*public function FormController()
	{
		$this->excusas = new Excusas;
        $this->listadoExcusas = $this->excusas->getExcusas();
        $this->totalExcusas = count( $this->listadoExcusas);
	}*/
	public $descripcion;
	public $palabrasClave;
	public $titulo;
	    public $Metadescripcion;


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
				'actions'=>array('index','view','create','createf'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	protected function beforeAction($action)
	{
		$this->excusas = new Excusas;
        $this->listadoExcusas = $this->excusas->getExcusas();
        $this->totalExcusas = count( $this->listadoExcusas);
		$this->generaMenuPrincipal();
		
		return true;
	}
	
	/**
	 * Lists all models.
	 */
	 

	public function actionIndex()
	{
		$this->excusas = new Excusas;
        $this->listadoExcusas = $this->excusas->getExcusas();
        $this->totalExcusas = count( $this->listadoExcusas);
		$this->render('home',array('totalExcusas'=> $this->totalExcusas));
		
		
	}
	
	private function generaMenuPrincipal() {
        //Men? principal
        $criteria = new CDbCriteria;
        $criteria->condition = "idpadrecategoria IS NULL AND activo=1";
        $criteria->order = "orden";

        $model = Categoria::model()->findAll($criteria);



        if (!empty($model)) {
            foreach ($model as $menu) {

                $submenu = Categoria::model()->findAllByAttributes(array('idpadrecategoria' => $menu->idcategoria, 'activo' => 1), array('order' => 'orden ASC'));
                $i = 0;
                if (count($submenu) > 0) {
                    foreach ($submenu as $datossubmenu) {
                        $this->datosSubMenu[$menu->idcategoria][$i]['titulo'] = $datossubmenu->titulo;
                        $this->datosSubMenu[$menu->idcategoria][$i]['idcategoria'] = $datossubmenu->idcategoria;
                        $this->datosSubMenu[$menu->idcategoria][$i]['alias'] = $datossubmenu->alias;
                        $i++;
                    }
                }
                // echo ($menu->titulo);
                //print_r(count($submenu));
            }

            //  print_r($this->datosSubMenu);
        }

        //Menu TOP
        $criteria = new CDbCriteria;
        $criteria->condition = "idplantilla IN (6,7,8) AND activo=1";
        $criteria->order = "orden";

        $modelTop = Categoria::model()->findAll($criteria);

        $this->datosMenu = $model;
        $this->datosMenuTop = $modelTop;
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
	 */
	public function actionCreate()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model=new Excusas;
		if(isset($_POST['Excusas']))
		{
			$model->attributes=$_POST['Excusas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreatef()
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$this->bodyClass='  class="fb"';
		$model=new Excusas;
		if(isset($_POST['Excusas']))
		{
			$model->attributes=$_POST['Excusas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('createf',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Excusas']))
		{
			$model->attributes=$_POST['Excusas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Excusas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Excusas']))
			$model->attributes=$_GET['Excusas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Excusas::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='excusas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
