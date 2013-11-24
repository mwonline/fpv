<h2>Nuestros aliados</h2>
<div class="box-carrusel">
    <div id="pequenio" class="foto">
        <img src="img/logo-terpel.jpg" width="219" height="90" alt="terpel">
        <?php
            $this->widget('application.extensions.nivoslider.CNivoSlider', array(
                'images' => array(//@array images with images arrays.
                    array('src' => Yii::app()->request->baseUrl . '/img/logo-terpel.jpg', 'caption' => 'terpel'),
                ),
                'htmlOptions' => array("style" => 'width:219px;height:90px;'),
                    )
            );
            ?>	
    </div>
</div>

<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
<div class="bts"><a href="#">Conozca nuestros aliados
    </a></div>