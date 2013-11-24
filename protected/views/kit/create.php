<?php
/* @var $this SolicitudeskitController */
/* @var $model Solicitudeskit */

$this->breadcrumbs = array(
    'Solicitudeskits' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Solicitudeskit', 'url' => array('index')),
    array('label' => 'Manage Solicitudeskit', 'url' => array('admin')),
);
?>

<div class="main wrapper clearfix">
    <article>
        <section>
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </section>
    </article>
</div>