<div class="main wrapper clearfix">

                
                
                <article>
                    
                    <section>
                        
					  <div class="formulario">
                       <div class="top">
                        <span class="titulo">Pida la calle que quiere</span>
                        <div class="texto1">¡Gracias!</div>
                        <div class="texto2">Su mensaje ha sido enviado con éxito</div>
                            
                            
                        </div><!-- fin top -->
                            
                            
                       <div class="bottom">
                     	<div id="mensaje">
                      <div class="titulo2">PRONTO LO REVISAREMOS Y PUBLICAREMOS
                        <br>
              EN NUESTROS CANALES DE REDES SOCIALES</div>
                      <label class="required" for="Excusas_nombre_usuario">Nombre</label>                   <input disabled="disabled" name="Excusas[nombre_usuario]" type="text" id="nombre" value="<?php 
echo $model->nombre;
 ?>" size="60" maxlength="250"> 
                      <label class="required" for="Excusas_email">Apellidos</label>                      					  <input disabled="disabled" name="Apellidos" type="text" id="correo" value="<?php 
echo $model->apellidos;
 ?>" size="60" maxlength="200">		<label class="required" for="Excusas_excusa">Escriba su mensaje</label>		<textarea disabled="disabled" id="mensaje" name="mensaje" cols="50" rows="6"><?php 
echo $model->mensaje;
 ?></textarea>	
                                    </div></div>   <!-- fin bottom --> 
                      </div><!-- fin formulario -->

                    </section>
                    
                    
                </article>

                

            </div>
