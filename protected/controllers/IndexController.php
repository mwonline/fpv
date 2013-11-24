<?php

Yii::import('ext.nivoslider.CNivoSlider');
Yii::import('application.extensions.phpmailer.JPhpMailer');

class IndexController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/master';
    public $excusas, $listadoExcusas, $totalExcusas;
    public $body = "home";
    public $bodyClass = "";
    var $datosMenu;
    var $datosSubMenu = array();
    var $datosMenuTop;
    var $idCategoriaActual = ""; //Para marcar en el menu el elemento actual
    var $idPadreActual = ""; //Para marcar en el menu el elemento actual cuando es submenu
    public $Metadescripcion;
    public $descripcion;
    public $palabrasClave;
    public $titulo;
    public $alias;
    var $plantilla;
    var $arrayNextPrev = array(0, 0, 0);
    var $datosAdicionales;
    var $ultimosBlog;
    var $BlogAlias;

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'terminos', 'getblogpag', 'categoria', 'filtrar', 'confirm', 'save', 'contenido', 'Deje_su_mensaje', 'blogPDF', 'descargarInterna'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    protected function beforeAction($action) {
        $this->excusas = new Excusas;
        $this->listadoExcusas = $this->excusas->getExcusas();
        $this->totalExcusas = count($this->listadoExcusas);
        return true;
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {



        //Lee Banners
        $criteria = new CDbCriteria;
        $criteria->condition = " idplantilla = '" . 4 . "' AND activo=1 order By orden";
        $modleCategoriaBlog = Categoria::model()->findAll($criteria);
        $modleCategoriaBlog = $modleCategoriaBlog[0];

        //obtener el numero de contenidos de acuerdo al id de la categoria
        $criteria = new CDbCriteria;
        $criteria->condition = " idCategoria = '" . $modleCategoriaBlog->idcategoria . "' AND activo=1 order By fecha_creacion DESC LIMIT 0,5";
        $item_count = Contenido::model()->count($criteria);

        //paginacion
        $pages = new CPagination($item_count);
        $pages->setPageSize(9);

        //obtener todos los contenidos
        $otrosBlog = Contenido::model()->findAll($criteria);

        //obtener todos los banner
        $criteria = new CDbCriteria;
        $criteria->condition = "activo=1 order By orden";
        $modelBanner = Banner::model()->findAll($criteria);

        //Lee Aliados
        $modleCategoria = Categoria::model()->findAll("idPlantilla=3");
        $modleCategoria = $modleCategoria[0];

        //obtener los contenidos asociados al id de la categoria
        $modelContenidos = Contenido::model()->findAll("idCategoria = '" . $modleCategoria->idcategoria . "' AND imagen2!='' AND imagen2  IS NOT NULL order By orden ASC");

        //Lee Sobre inteligencia
        $modelInteligencia = Categoria::model()->findAll("idPlantilla=1");
        $modelInteligencia = $modelInteligencia[0];

        //Cuatro ultimos contenidos del blog
        $this->generaMenuPrincipal();
        $this->render('home', array('totalExcusas' => $this->totalExcusas, 'categoria' => $modleCategoria, 'inteligencia' => $modelInteligencia, 'aliados' => $modelContenidos, 'banners' => $modelBanner, 'cincoBlog' => $otrosBlog, 'categoriaBlog' => $modleCategoriaBlog));
    }

    private function generaMenuPrincipal() {
        //Men� principal
        //obtener todas las categorias padre ordenadas
        //por el campo orden de la tabla Categoria
        $criteria = new CDbCriteria;
        $criteria->condition = "idpadrecategoria IS NULL AND activo=1";
        $criteria->order = "orden";
        $model = Categoria::model()->findAll($criteria);


        //obtener las subcategorias pertenecientes a cada categoria
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
        //obtener todas las categorias
        $criteria = new CDbCriteria;
        $criteria->condition = "idplantilla IN (6,7,8) AND activo=1";
        $criteria->order = "orden";
        $modelTop = Categoria::model()->findAll($criteria);

        //guardar en el controlador los datos de los menu
        $this->datosMenu = $model;
        $this->datosMenuTop = $modelTop;
    }

    public function actionContenido($contenido) {
        
    }

    //alias es el parametro de entrada por la url que pude ser 'calle'
    public function actionCategoria($alias=null, $interna=null) {
        //echo "alias".$alias;

        //obtener todos los datos de la categorias
        if($interna!=null)
            $alias='blog_interna';
        $modelCategoria = Categoria::model()->findAll("alias='" . $alias . "'");

        //tomar el elemento 0 y dejarlo en un objeto.
        $modelCategoria = $modelCategoria[0];

        //obtener la categoria padre de esta categoria
        $this->idPadreActual = $modelCategoria->idpadrecategoria;

        //guardar en este controlador el id de la categoria
        $this->idCategoriaActual = $modelCategoria->idcategoria;

        //Titulo de la pagina
        $this->titulo = " - " . $modelCategoria->titulo;
        $this->Metadescripcion = $modelCategoria->metaDescripcion;

        $this->generaMenuPrincipal();

        //print_r($modelCategoria); 

        if ($alias == 'blog_interna')
            $this->getBlogInterna($modelCategoria,$interna);
        else {
            //obtener la plantilla para esta categoria
            $this->getPlantilla($modelCategoria);
            if (count($modelCategoria) == 0) {
                $categoriaAntes = AliasCategoria::model()->findAll("alias='" . $alias . "'");
                if (count($categoriaAntes) != 0) {
                    $categoriaAntes = $categoriaAntes[0];
                    $nuevoCategoria = Categoria::model()->findByPk($categoriaAntes->idCategoria);
                    Header("HTTP/1.1 301 Moved Permanently");
                    $this->redirect(array('categoria', 'alias' => $nuevoCategoria->alias));
                } else {
                    print_r("El alias \"" . $alias . "\" no fue encontrado");
                }
            }
        }
        //$this->layout = 'principal';
        //$this->render('blog',array('totalExcusas'=> $this->totalExcusas));
    }

    private function getPlantilla($modelCategoria) {

        //Direcciona a funcion correspondiente de capturar los datos necesarios segun idplantilla de la categoria
        //echo $modelCategoria->idplantilla;

        switch ($modelCategoria->idplantilla) {

            case '1': //sobre
                $this->getInfoForP1($modelCategoria);
                break;
            case '3': //aliados
                if (isset($_POST['datos']) || isset($_GET["datosAliados"])) {
                    if (isset($_GET["datosAliados"])) {
                        $this->getInfoForP2($modelCategoria, array("aliados" => $_GET["datosAliados"]));
                    } else {
                        $this->getInfoForP2($modelCategoria, $_POST['datos']);
                    }
                } else {
                    $this->getInfoForP2($modelCategoria, '');
                }

                break;
            case '4': //blog
                $this->getInfoForP3($modelCategoria);
                break;

            case '2': //estudios
                $this->getInfoForP6($modelCategoria);
                break;

            //case '13': //Contacto1
            //  $this->getInfoForP13($modelCategoria);
            // break;

            case '5': //Pida la calle
                $this->getInfoForP5($modelCategoria);
                break;

            case '7': //descargables
                $this->getInfoForP7($modelCategoria);
                break;
        }
    }

    public function actionFiltrar() {
        if (isset($_POST['datos'])) {
            $datos = $_POST['datos'];
            switch ($datos['aliados']) {
                case 1:
                    $titulo = "AND (titulo like 'a%' OR titulo like 'b%' OR titulo like 'c%' OR titulo like 'd%')";
                    break;
                case 2:
                    $titulo = "AND (titulo like 'e%' OR titulo like 'f%' OR titulo like 'g%' OR titulo like 'h%')";
                    break;
                case 3:
                    $titulo = "AND (titulo like 'i%' OR titulo like 'j%' OR titulo like 'k%' OR titulo like 'l%')";
                    break;
                case 4:
                    $titulo = "AND (titulo like 'm%' OR titulo like 'n%' OR titulo like 'o%')";
                    break;
                case 5:
                    $titulo = "AND (titulo like 'p%' OR titulo like 'q%' OR titulo like 'r%' OR titulo like 's%')";
                    break;
                case 6:
                    $titulo = "AND (titulo like 't%' OR titulo like 'u%' OR titulo like 'v%' OR titulo like 'w%')";
                    break;
                case 7:
                    $titulo = "AND (titulo like 'x%' OR titulo like 'y%' OR titulo like 'z%')";
                    break;
                case 8:
                    $titulo = "AND (titulo like '0%' OR titulo like '1%' OR titulo like '2%' OR titulo like '3%' OR titulo like '4%' OR titulo like '5%' OR titulo like '6%' OR titulo like '7%' OR titulo like '8%' OR titulo like '9%')";
                    break;
            }
            $criteria = new CDbCriteria;
            $modelCategoria = Categoria::model()->findAll('idcategoria=:idcategoria', array(':idcategoria' => $datos['idCategoria']));
            $modelCategoria = $modelCategoria[0];
            $this->idPadreActual = $modelCategoria->idpadrecategoria;
            $this->idCategoriaActual = $modelCategoria->idcategoria;
            $this->generaMenuPrincipal();
            $criteria->condition = "idCategoria = '" . $datos['idCategoria'] . "' AND activo=1 " . $titulo . " order By orden ASC";
            $item_count = Contenido::model()->count($criteria);
            $pages = new CPagination($item_count);
            $pages->setPageSize(9);
            $pages->applyLimit($criteria);
            $contenido = Contenido::model()->findAll($criteria);
            $this->generaMenuPrincipal();
            $this->render('aliados', array(
                'model' => $modelCategoria,
                'contenido' => $contenido,
                'pages' => $pages,
                'item_count' => $item_count,
                'page_size' => $page_size,
            ));
        }
    }

    private function getInfoForP1($modelCategoria) {
        $subCategoria = Categoria::model()->findAll("idpadrecategoria=:idpadrecategoria", array(":idpadrecategoria" => $modelCategoria->idcategoria));
        $subCategoria = $subCategoria[0];
        $this->getUltimosBlog();
        $criteria = new CDbCriteria;
        $criteria->condition = " idCategoria = '" . $subCategoria->idcategoria . "' AND activo=1 order By orden ASC";
        $criteria2 = new CDbCriteria;
        $criteria2->condition = " idCategoria = '" . $modelCategoria->idcategoria . "' AND activo=1 order By orden ASC";
        $item_count = Contenido::model()->count($criteria);
        $pages = new CPagination($item_count);
        $pages->setPageSize(4);
        $pages->applyLimit($criteria);
        $contenidoSubcat = Contenido::model()->findAll($criteria);
        $this->generaMenuPrincipal();
        $this->body = "sobre-inteligencia-vial";
        $contenido = Contenido::model()->findAll($criteria2);
        $this->render('sobreInteligencia', array(
            'model' => $modelCategoria,
            'contenido' => $contenido,
            'contenidoSubcat' => $contenidoSubcat,
            'subCategoria' => $subCategoria,
            'pages' => $pages,
            'item_count' => $item_count,
            'page_size' => $page_size,
        ));
    }

    private function getInfoForP6($modelCategoria) {

        $criteria = new CDbCriteria;

        $criteria->condition = " idCategoria = '" . $modelCategoria->idcategoria . "' AND activo=1 order By orden DESC ";
        $page_size = 3;
        if ($_REQUEST['page'] == '')
            $_REQUEST['page'] = 1;
        $item_count = Contenido::model()->count($criteria);
        $total_pages = ceil($item_count / $page_size);
        $pages = new CPagination($item_count);
        $pages->setPageSize($page_size);
        $pages->applyLimit($criteria);
        $contenido = Contenido::model()->findAll($criteria);




        $this->generaMenuPrincipal();
        $this->getUltimosBlog();
        $this->body = "estudios";


        //	print_r($pages);
        $this->render('estudios', array(
            'model' => $modelCategoria,
            'contenido' => $contenido,
            'contenidoSubcat' => $contenidoSubcat,
            'subCategoria' => $subCategoria,
            'pages' => $pages,
            'item_count' => $item_count,
            'page_size' => $page_size,
            'total_pages' => $total_pages,
        ));
    }

    private function getInfoForP2($modelCategoria, $filtro) {
        //print_r($filtro);
        $this->getUltimosBlog();
        $criteria = new CDbCriteria;
        if ($filtro != "") {
            $datos = $filtro;
            switch ($datos['aliados']) {
                case 1:
                    $titulo = "AND (titulo like 'a%' OR titulo like 'b%' OR titulo like 'c%' OR titulo like 'd%')";
                    break;
                case 2:
                    $titulo = "AND (titulo like 'e%' OR titulo like 'f%' OR titulo like 'g%' OR titulo like 'h%')";
                    break;
                case 3:
                    $titulo = "AND (titulo like 'i%' OR titulo like 'j%' OR titulo like 'k%' OR titulo like 'l%')";
                    break;
                case 4:
                    $titulo = "AND (titulo like 'm%' OR titulo like 'n%' OR titulo like 'o%')";
                    break;
                case 5:
                    $titulo = "AND (titulo like 'p%' OR titulo like 'q%' OR titulo like 'r%' OR titulo like 's%')";
                    break;
                case 6:
                    $titulo = "AND (titulo like 't%' OR titulo like 'u%' OR titulo like 'v%' OR titulo like 'w%')";
                    break;
                case 7:
                    $titulo = "AND (titulo like 'x%' OR titulo like 'y%' OR titulo like 'z%')";
                    break;
                case 8:
                    $titulo = "AND (titulo like '0%' OR titulo like '1%' OR titulo like '2%' OR titulo like '3%' OR titulo like '4%' OR titulo like '5%' OR titulo like '6%' OR titulo like '7%' OR titulo like '8%' OR titulo like '9%')";
                    break;
            }
            $modelCategoria = Categoria::model()->findAll('idcategoria=:idcategoria', array(':idcategoria' => $modelCategoria->idcategoria));
            $modelCategoria = $modelCategoria[0];
            $this->idPadreActual = $modelCategoria->idpadrecategoria;
            $this->idCategoriaActual = $modelCategoria->idcategoria;
            $this->generaMenuPrincipal();
            $criteria->condition = "idCategoria = '" . $modelCategoria->idcategoria . "' AND activo=1 " . $titulo . " order By orden ASC";
            $item_count = Contenido::model()->count($criteria);
            $pages = new CPagination($item_count);
            $pages->setPageSize(9);
            $pages->params = array("alias" => $modelCategoria->alias, "datosAliados" => $datos['aliados']);
            $pages->applyLimit($criteria);
            $contenido = Contenido::model()->findAll($criteria);
            $this->generaMenuPrincipal();
            $this->render('aliados', array(
                'model' => $modelCategoria,
                'contenido' => $contenido,
                'pages' => $pages,
                'item_count' => $item_count,
                'page_size' => $page_size,
                'filtro' => $datos['aliados'],
            ));
        } else {
            $criteria->condition = " idCategoria = '" . $modelCategoria->idcategoria . "' AND activo=1 order By orden ASC";
            $item_count = Contenido::model()->count($criteria);
            $pages = new CPagination($item_count);
            $pages->setPageSize(9);
            echo $pages->route;
            $pages->applyLimit($criteria);
            $contenido = Contenido::model()->findAll($criteria);
            $this->generaMenuPrincipal();
            $this->render('aliados', array(
                'model' => $modelCategoria,
                'contenido' => $contenido,
                'pages' => $pages,
                'item_count' => $item_count,
                'page_size' => $page_size,
                'confirma' => $_GET['datosEnviados']
            ));
        }
    }

    ///obtener informacion para la categoria p5 (pida la calle)
    private function getInfoForP5($modelCategoria) {
        $titulo = "Pida la calle";
        $this->body = "pida-la-calle";

        //obtener el numero de contenidos asocialdas a la categoria 5 pida la calle
        $criteria = new CDbCriteria;
        $criteria->condition = " idCategoria = '" . $modelCategoria->idcategoria . "' AND activo=1 order By orden ASC";

        $item_count = Contenido::model()->count($criteria);
        $pages = new CPagination($item_count);
        echo $pages->route;
        $pages->applyLimit($criteria);


        //obtener los contenidos pertenecientes a la categoria.
        $contenido = Contenido::model()->findAll($criteria);


        //obtener los mensajes de facebook con su paginacion
        $criteria = new CDbCriteria;
        $criteria->condition = "tipo='f'";
        $count_f = Mensajes::model()->count($criteria);
        $pages_f = new CPagination($count_f);
        $pages_f->pageVar = "facebook";
        $pages_f->setPageSize(5);
        $pages_f->applyLimit($criteria);
        $mensajes_face = Mensajes::model()->findAll($criteria);


        //obtener los mensajes de twitter con su paginacion
        $criteria = new CDbCriteria;
        $criteria->condition = "tipo='t'";
        $count_t = Mensajes::model()->count($criteria);
        $pages_t = new CPagination($count_t);
        $pages_t->pageVar = "tweeter";
        $pages_t->setPageSize(5);
        $pages_t->applyLimit($criteria);
        $mensajes_tw = Mensajes::model()->findAll($criteria);

        //obtener los archivos descargables
        /* esto ya no va
          $criteria = new CDbCriteria;
          $criteria->condition = "habilitado='s'" ;
          $count_d= Descargas::model()->count($criteria);
          $pages_d=new CPagination($count_d);
          $pages_d->pageVar="descargas";
          $pages_d->setPageSize(3);
          $pages_d->applyLimit($criteria);
          $descargas= Descargas::model()->findAll($criteria);
         */

        //Leer mensaje especifico
        $criteria = new CDbCriteria;
        $criteria->condition = " id = '" . $_GET["idm"] . "' AND tipo='f'";

        $mensajeC = Mensajes::model()->findAll($criteria);
        //echo "Mensaje;".$mensajeC[0]->nombre;

        $this->generaMenuPrincipal();

        //evaluar si se muestra o no el mensaje de no hay mas kit
        if ($this->hayKits()) {
            $hayKits = true;
        } else {
            $hayKits = false;
        }

        //mostrar la vista con el contenido
        if ($mensajeC[0]->id == "") {
            //Si el mensaje viene vacio se va a la pagina principañ
            $this->render('pidaLaCalle', array(
                'model' => $modelCategoria,
                'contenido' => $contenido,
                'pages' => $pages,
                'item_count' => $item_count,
                'page_size' => $page_size,
                'confirma' => $_GET['datosEnviados'],
                'mensajes_face' => $mensajes_face,
                'pages_f' => $pages_f,
                'mensajes_tw' => $mensajes_tw,
                'pages_t' => $pages_t,
                'descargas' => $descargas,
                'pages_d' => $pages_d,
                'hayKits' => $hayKits
            ));
        } else {
            $this->Metadescripcion = $mensajeC[0]->mensaje;
            //Si el mensaje es una URL de facebook, se muestra mensaje destacado
            $this->render('pidaLaCalleMensaje', array(
                'model' => $modelCategoria,
                'contenido' => $contenido,
                'pages' => $pages,
                'item_count' => $item_count,
                'page_size' => $page_size,
                'confirma' => $_GET['datosEnviados'],
                'mensajes_face' => $mensajes_face,
                'pages_f' => $pages_f,
                'mensajes_tw' => $mensajes_tw,
                'pages_t' => $pages_t,
                'descargas' => $descargas,
                'pages_d' => $pages_d,
                'hayKits' => $hayKits,
                'mensajeC' => $mensajeC
            ));
        }
    }

    //fin getinfoforp5 (pida la calle)
    //inicio getinfofor P7 (descargables)
    private function getInfoForP7($modelCategoria) {
        $titulo = "Descargables";
        $this->body = "descargables";

        //obtener todas las categorias padre  ordenadas y activas
        $criteria=new CDbCriteria;
        $criteria->select='id, titulo, orden';
        $criteria->condition="padre is null and activo='s'";
        $criteria->order="orden ASC";
        $categ_desc_padres=Categoriadesc::model()->findAll($criteria);
        //$categ_desc_padres = Categoriadesc::model()->findAllByAttributes(array('padre' => null));
        $this->render('descargables', array('categ_desc_padres' => $categ_desc_padres));
    }

    //fin getinfofor p7 (descargables)







    public function actionConfirm($msg) {
        $this->layout = 'dsfd';
        $this->render(_confirm, array('msg' => $msg));
    }

    public function actionSave($alias) {
        $model = new Aliados;
        if (isset($_POST['Excusas'])) {
            $model->attributes = $_POST['Excusas'];
            if ($model->save())
            //Envío del correo
                $msg = "</br>";
            foreach ($_POST['Excusas'] as $clave => $valor) {
                if ($clave == "excusa") {
                    $clave = "mensaje";
                }
                $msg = $msg . "<br>" . $clave . ":" . $valor;
            }
            $mail = new JPhpMailer;
            $mail->IsSMTP();
            $mail->Mailer = "smtp";
            $mail->Host = 'mail.inteligenciavial.com';
            $mail->SMTPAuth = true;
            $mail->Port = '25';
            $mail->Username = 'contacto@inteligenciavial.com';
            $mail->Password = 'c0nt4ct0m41l';
            $mail->SetFrom('contacto@inteligenciavial.com', 'Inteligencia Vial');
            $mail->Subject = 'Nuevo Registro de aliado';
            $mail->AltBody = 'Nuevo Registro de aliado';
            $mail->MsgHTML('<h1>DATOS DEL REGISTRO</h1>' . $msg);
            $mail->AddAddress('empresasegura@fpv.org.co', 'Inteligencia Vial');
            $mail->AddAddress('contacto@inteligenciavial.com', 'Inteligencia Vial');
            $mail->Send();
            $this->redirect(array('categoria', 'alias' => $alias, 'datosEnviados' => 'true'));
        } else {
            echo "Se perdio la información";
        }
    }

    private function getInfoForP3($modelCategoria) {
        //Metatags
        $categoria = Categoria::model()->findAll('idplantilla=:idplantilla', array(':idplantilla' => 3));
        $this->Metadescripcion = $categoria[0]->metaDescripcion;
        $this->descripcion = $categoria[0]->descripcion;
        $this->titulo = $categoria[0]->titulo;
        $this->alias = "http://www.inteligenciavial.com" . Yii::app()->createUrl('site', array('categoria' => $categoria[0]->alias));


        $this->body = "blog";
        $this->plantilla = 'blog';
        $servicios = array();
        //Traer la informcion de las ultimas noticias publicadas
        $seccionServicios = Categoria::model()->findAll('idplantilla=:idplantilla order by orden AND activo=:activo', array(
            ':idplantilla' => '2',
            ':activo' => 1,
                ));
        if ($seccionServicios[0]["titulo"]) {
            $servicios = Categoria::model()->findAll('idpadrecategoria=:idpadrecategoria order by orden', array(':idpadrecategoria' => $seccionServicios[0]["idcategoria"]));
        }



        $criteria = new CDbCriteria;
        if ($_REQUEST['tag'] != '') {
            $tag_search = $_REQUEST['tag'];
            $criteria->condition = "tags LIKE '%$tag_search%' and idCategoria = '" . $modelCategoria->idcategoria . "' AND activo=1 order By fecha_creacion DESC LIMIT 0,3";
            $is_tag = 1;
        } else {
            $is_tag = 0;
            $criteria->condition = " idCategoria = '" . $modelCategoria->idcategoria . "' AND activo=1 order By fecha_creacion DESC LIMIT 0,5";
        }

        $item_count = Contenido::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize(9);
        //  $pages->applyLimit($criteria);
        $contenido = Contenido::model()->findAll($criteria);
        //print_r($contenido);
        foreach ($contenido as $ck => $cnt) {
            //$contenido[$ck]['mes']= $this->getMes($cnt['fecha_creacion']);
        }

        // print_r($contenido);
        /* $this->render('aliados', array(
          'model' => $modelCategoria,
          'contenido' => $contenido,
          'pages' => $pages,
          'item_count' => $item_count,
          'page_size' => $page_size,
          )); */


        //$this->render('home',array('totalExcusas'=> $this->totalExcusas));

        $this->getUltimosBlog();
        if ($is_tag == 0)
            $this->render($this->plantilla, array(
                'categoria' => $modelCategoria,
                'servicios' => $servicios,
                'model' => $modelCategoria,
                'contenido' => $contenido,
                'item_count' => $item_count
            ));
        else {
            $this->body = "blog-tag";
            $this->plantilla = 'blog_tag';
            $this->render($this->plantilla, array(
                'categoria' => $modelCategoria,
                'servicios' => $servicios,
                'model' => $modelCategoria,
                'contenido' => $contenido,
                'name_tag' => $tag_search,
                'item_count' => $item_count
            ));
        }
    }

    public function actionGetBlogPag() {

        //echo 'test';
        $contenido = array();
        $this->layout = '//layouts/empty';
        ;
        $this->body = "blog_pag";
        $this->plantilla = 'blog_pag';

        $criteria = new CDbCriteria;
        $criteria2 = new CDbCriteria;

        if ($_REQUEST['tag'] != '') {
            $tag_search = $_REQUEST['tag'];

            //$criteria2->condition = "tags LIKE '%$tag_search%' and idCategoria = '8' AND activo=1 order By fecha_creacion DESC LIMIT 0,3";

            $is_tag = 1;
        } else {
            $is_tag = 0;

            $criteria2->condition = " idCategoria = '8' AND activo=1 order By fecha_creacion DESC LIMIT 0,2";
        }

        $contenido_prim = Contenido::model()->findAll($criteria2);
        $arr_prs = array();
        foreach ($contenido_prim as $primeros)
            $arr_prs[] = $primeros['idContenido'];
        $str_prs = implode(",", $arr_prs);
        //print_r($str_prs);

        if ($_REQUEST['tag'] != '') {
            $tag_search = $_REQUEST['tag'];
            $criteria->condition = "tags LIKE '%$tag_search%' and idCategoria = '8' AND activo=1  order By fecha_creacion DESC";


            $is_tag = 1;
        } else {
            $is_tag = 0;
            $criteria->condition = " idCategoria = '8' AND activo=1 AND idContenido NOT IN ($str_prs) order By fecha_creacion DESC";
        }

        $item_count = Contenido::model()->count($criteria);
        //print_r($item_count);

        if ($_REQUEST['page'] <= ceil($item_count / 3)) {
            $pages = new CPagination($item_count);
            $pages->setPageSize(3);
            $pages->applyLimit($criteria);
            $pages->validateCurrentPage = true;

            $contenido = Contenido::model()->findAll($criteria);
            $final = 0;
            if ($_REQUEST['page'] == ceil($item_count / 3)) {
                $final = 1;
            }


            $this->render($this->plantilla, array(
                'categoria' => $modelCategoria,
                'servicios' => $servicios,
                'model' => $modelCategoria,
                'contenido' => $contenido,
                'name_tag' => $tag_search,
                'final' => $final
            ));
        }
        else
            echo -1;
    }

    public function getMes($fecha) {
        $datos_fecha = explode("-", $fecha);
        $mes = $datos[1];

        switch ($fecha) {
            case '01': $mes_r = 'Ene';
                break;
            case '02': $mes_r = 'Feb';
                break;
        }

        return $mes_r;
    }

    private function getBlogInterna($modelCategoria, $idBlog) {
        $idContenido = $idBlog;
        //retorna un arreglo de un elemento que contiene un solo objto
        $categoria = Categoria::model()->findAll('idplantilla=:idplantilla', array(':idplantilla' => 3));

        $this->Metadescripcion = $categoria[0]->metaDescripcion;
        $this->descripcion = $categoria[0]->descripcion;
        $this->titulo = $categoria[0]->titulo;
        $this->alias = "http://www.inteligenciavial.com" . Yii::app()->createUrl('site', array('categoria' => $categoria[0]->alias));

        $criteria = new CDbCriteria;
        $criteria->condition = "idCategoria = '8' AND activo=1";
        $criteria->order = 'fecha_creacion DESC';

        $this->datosAdicionales = Contenido::model()->findAll($criteria);

        $i = 1;
        //print_r($this->datosAdicionales);
        foreach ($this->datosAdicionales as $noticias) {

            //$arrayNextPrev[0] = $noticias->idContenido;

            if ($noticias->alias == $idContenido) {
                $this->arrayNextPrev[0] = $i;
            } elseif ($this->arrayNextPrev[0] == 0) {
                $this->arrayNextPrev[1] = $noticias->alias;
            } elseif ($this->arrayNextPrev[0] == ($i - 1)) {
                $this->arrayNextPrev[2] = $noticias->alias;
            }
            $i++;
        }



        $criteria = new CDbCriteria;
        $criteria->condition = " idContenido = '" . $idContenido . "' AND activo=1 order By fecha_creacion DESC";
        $contenido = Contenido::model()->findAll($criteria);


        $this->getUltimosBlog();

        $this->body = "blog-detalle";
        $this->plantilla = 'blog_interna';
        $this->render($this->plantilla, array(
            'categoria' => $modelCategoria,
            'model' => $modelCategoria,
            'contenido' => $contenido,
            'name_tag' => $tag_search
        ));
    }

    public function actionBlogPDF($alias) {
        $idContenido = $alias;
        //retorna un arreglo de un elemento que contiene un solo objto
        $categoria = Categoria::model()->findAll('idplantilla=:idplantilla', array(':idplantilla' => 3));

        $this->Metadescripcion = $categoria[0]->metaDescripcion;
        $this->descripcion = $categoria[0]->descripcion;
        $this->titulo = $categoria[0]->titulo;
        $this->alias = "http://www.inteligenciavial.com" . Yii::app()->createUrl('site', array('categoria' => $categoria[0]->alias));

        $criteria = new CDbCriteria;
        $criteria->condition = "idCategoria = '8' AND activo=1";
        $criteria->order = 'fecha_creacion DESC';

        $this->datosAdicionales = Contenido::model()->findAll($criteria);

        $i = 1;
        //print_r($this->datosAdicionales);
        foreach ($this->datosAdicionales as $noticias) {

            //$arrayNextPrev[0] = $noticias->idContenido;

            if ($noticias->idContenido == $idContenido) {
                $this->arrayNextPrev[0] = $i;
            } elseif ($this->arrayNextPrev[0] == 0) {
                $this->arrayNextPrev[1] = $noticias->idContenido;
            } elseif ($this->arrayNextPrev[0] == ($i - 1)) {
                $this->arrayNextPrev[2] = $noticias->idContenido;
            }
            $i++;
        }



        $criteria = new CDbCriteria;
        $criteria->condition = " idContenido = '" . $idContenido . "' AND activo=1 order By fecha_creacion DESC";
        $contenido = Contenido::model()->findAll($criteria);


        $this->getUltimosBlog();
        $html2pdf = Yii::app()->ePdf->HTML2PDF('P',  array(250,500),'en');
        $this->layout = "_blank";
        $html2pdf->WriteHTML($this->renderPartial('BlogPDF', array(
                                                                      'categoria' => $modelCategoria,
                                                                      'model' => $modelCategoria,
                                                                      'contenido' => $contenido,
                                                                      'name_tag' => $tag_search,
                                                                    ), true));
        $html2pdf->Output("documento.pdf",'D');
    }

    public function getUltimosBlog() {
        //retorna un arreglo con el id de la plantilla y su nombre
        $categoria = Categoria::model()->findAll('idplantilla=:idplantilla', array(':idplantilla' => 4));

        $criteria = new CDbCriteria;
        $criteria->condition = " idCategoria = '" . $categoria[0]->idcategoria . "' AND activo=1 order By fecha_creacion DESC LIMIT 0,3";


        $item_count = Contenido::model()->count($criteria);
        $pages = new CPagination($item_count);
        $pages->setPageSize(9);
        //  $pages->applyLimit($criteria);
        $otrosBlog = Contenido::model()->findAll($criteria);
        //	print_r($otrosBlog);
        $this->ultimosBlog = $otrosBlog;
        $this->BlogAlias = $categoria[0]->alias;
    }

    public function actionTerminos() {
        $this->generaMenuPrincipal();
        $this->body = "terminos";
        $this->render('terminos');
    }



    public function actionDescargarInterna($id_padre = '', $id_hijo = '') {
        $titulo = "Descargables";
        $this->body = "descargables";
        $this->bodyClass="interna";
        $this->layout = '//layouts/master';

        //si se solicita una categoria padre con sus subcategorias:
        if($id_padre!=''){
        
            //obtener las categorias padre para el menu izquierdo
            $criteria=new CDbCriteria;
            $criteria->condition='padre is null and activo="s"';
            $criteria->order="orden asc";
            $categ_desc_padres=Categoriadesc::model()->findAll($criteria);

            $criteria = new CDbCriteria;
            //$criteria->join="JOIN categoriadesc ON descarga.categoria=categoriadesc.id";
            $criteria->mergeWith(array(
                'join'=>'JOIN categoriadesc ch ON ch.id = t.categoria',
                'condition'=>'ch.padre='.$id_padre.' AND t.activo="s" order by t.fecha desc',
            ));
            //$criteria->condition="categoriadesc.padre=".$id_p." and descarga.activo='s' order by descarga.orden desc";
            $page_size = 7;
            if ($_REQUEST['page'] == '')
                $_REQUEST['page'] = 1;
            $item_count = Descarga::model()->count($criteria);
            $total_pages = ceil($item_count / $page_size);
            $pages = new CPagination($item_count);
            $pages->setPageSize($page_size);
            $pages->applyLimit($criteria);
            $descargas = Descarga::model()->findAll($criteria);

            $categoria_padre = Categoriadesc::model()->findByPk($id_padre);

            $this->generaMenuPrincipal();
            $this->render('descargables-interna', array(
                'padre_activo'=>$id_padre,
                'titulo_interna'=>$categoria_padre->titulo,
                'categ_desc_padres'=>$categ_desc_padres,
                'categoria_padre' => $categoria_padre,
                'descargas'=>$descargas,
                'pages' => $pages,
                'item_count' => $item_count,
                'page_size' => $page_size,
                'total_pages' => $total_pages,));
        }
        //si se solicita una categoria hijo con sus descargas
        else if($id_hijo!=''){
            //buscar el id del padre
            $categoria_hijo=Categoriadesc::model()->findByAttributes(array('id'=>$id_hijo));
            $titulo_hijo=$categoria_hijo->titulo;
            $id_padre=$categoria_hijo->padre;
            $categoria_padre = Categoriadesc::model()->findByPk($id_padre);

            //obtener las categorias padre para el menu izquierdo
            $criteria=new CDbCriteria;
            $criteria->condition='padre is null and activo="s"';
            $criteria->order="orden asc";
            $categ_desc_padres=Categoriadesc::model()->findAll($criteria);

            $criteria = new CDbCriteria;
            //$criteria->join="JOIN categoriadesc ON descarga.categoria=categoriadesc.id";
            $criteria->mergeWith(array(
                'join'=>'JOIN categoriadesc ch ON ch.id = t.categoria',
                'condition'=>'ch.padre='.$id_padre.' AND t.activo="s" AND ch.id='.$id_hijo.' order by t.fecha desc',
            ));
            //$criteria->condition="categoriadesc.padre=".$id_p." and descarga.activo='s' order by descarga.orden desc";
            $page_size = 7;
            if ($_REQUEST['page'] == '')
                $_REQUEST['page'] = 1;
            $item_count = Descarga::model()->count($criteria);
            $total_pages = ceil($item_count / $page_size);
            $pages = new CPagination($item_count);
            $pages->setPageSize($page_size);
            $pages->applyLimit($criteria);
            $descargas = Descarga::model()->findAll($criteria);

            $this->generaMenuPrincipal();
            $this->render('descargables-interna', array(
                'padre_activo'=>$id_padre,
                'hijo_activo'=>$id_hijo,
                'categ_desc_padres'=>$categ_desc_padres,
                'categoria_padre' => $categoria_padre,
                'titulo_interna'=>$titulo_hijo,
                'descargas'=>$descargas,
                'pages' => $pages,
                'item_count' => $item_count,
                'page_size' => $page_size,
                'total_pages' => $total_pages,));
        }
    }

    public function hayKits() {
        $criteria = new CDbCriteria;
        $criteria->condition = "nombre != ''";
        $kits_pedidos = Solicitudeskit::model()->count($criteria);

        // obtener el numero de kits disponibles
        $criteria = new CDbCriteria;
        $criteria->condition = "id='1'";
        $kits_disponibles = Kits::model()->find($criteria)->numero;

        if ($kits_pedidos < $kits_disponibles) {
            return true;
        } else {
            return false;
        }
    }

}
