<div class="main wrapper clearfix">

                
                
                <article>
                    
                    <section>
                        
					  <div class="formulario">
                       <div class="top">
                        <span class="titulo">Pida su kit de inteligencia vial</span>
                        <div class="texto1">¡Gracias!</div>
                        <div class="texto2">Sus datos se han enviado con éxito</div>
                            
                            
                        </div><!-- fin top -->
                            
                            
                       <div class="bottom">
                     <div style="display:none">
<div class="titulo2" id="data">
<div class="titulo2">El formulario tiene algunos errores, por favor verifique los campos en rojo</div>
</div>
</div>
<div method="post" action="/index.php?r=form/create" id="mensaje">	
<a href="#data" id="fancy-link"></a> 
					
                      <div class="titulo2">Pronto recibirá su kit de Inteligencia Vial<br>
 
para que pida la calle que quiere</div>
            <label class="required" for="Excusas_nombre_usuario">Nombre</label>                   <input disabled="disabled" name="Excusas[nombre_usuario]" type="text" id="nombre" value="<?php 
echo $model->nombre;
 ?>" size="60" maxlength="250"> 
                      <label disabled="disabled" class="required" for="Excusas_email">Apellidos</label>                      					  
                      <input disabled name="Apellidos" type="text" id="correo" value="<?php 
echo $model->apellidos;
 ?>" size="60" maxlength="200">		
                      <label class="required" for="Excusas_nombre_usuario">Ciudad</label>                   
                      <input disabled="disabled" name="Excusas[nombre_usuario]" type="text" id="nombre" value="<?php 
echo $model->ciudad;
 ?>" size="60" maxlength="250">	
                      <label class="required" for="Excusas_nombre_usuario">Dirección</label>                   
                      <input disabled="disabled" name="Excusas[nombre_usuario]" type="text" id="nombre" value="<?php 
echo $model->direccion;
 ?>" size="60" maxlength="250">
                      <label class="required" for="Excusas_nombre_usuario">Número de cédula</label>                   
                      <input disabled="disabled" name="Excusas[nombre_usuario]" type="text" id="nombre" value="<?php 
echo $model->cedula;
 ?>" size="60" maxlength="250">
                      <label class="required" for="Excusas_nombre_usuario">Correo electrónico</label>                   <input disabled="disabled" name="Excusas[nombre_usuario]" type="text" id="nombre" value="<?php 
echo $model->correo;
 ?>" size="60" maxlength="250">
</div>                      
</div>   <!-- fin bottom --> 
                      </div><!-- fin formulario -->

                    </section>
                    
                    
                </article>

                

            </div>