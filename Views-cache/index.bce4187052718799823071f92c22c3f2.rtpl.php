<?php if(!class_exists('Rain\Tpl')){exit;}?><main>
        <h3>Nosso Cardápio</h3>
        <p>Cada prato que servimos é uma obra de arte gastronômica cuidadosamente elaborada por nossos talentosos chefs. Nossa culinária é uma fusão de tradição e inovação, com uma paleta de sabores que abraça influências de todo o mundo. Desde pratos clássicos até criações contemporâneas, o nosso cardápio oferece uma variedade de opções para atender a todos os gostos e preferências.</p>
        <br>
        <hr>
        <br>      

       <!--
                <div id="link-category">
                        <a href="#lanches" class="pill">Lanches</a>
                        <a href="#massas" class="pill">Massas</a>
                        <a href="#sobremesas" class="pill">Sobremesas</a>
                        <a href="#bebidas" class="pill">Bebidas</a>
                </div>
        -->

        <h4 id="lanches">🍔 Lanches</h4>
        <section>
                <?php $counter1=-1;  if( isset($lanches) && ( is_array($lanches) || $lanches instanceof Traversable ) && sizeof($lanches) ) foreach( $lanches as $key1 => $value1 ){ $counter1++; ?>

                <div class="card">                        
                        <img src="assets/img/<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="food">
                        <div class="card-body">
                                <h5><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                                <p><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                <p class="price"><?php echo formatarPreco($value1["preco"]); ?></p>    
                        </div>
                </div> 
                <?php } ?>        
        </section>
        <br>
        <hr>
        <br>

        <h4 id="massas">🍝 Massas</h4>
        <section>
                <?php $counter1=-1;  if( isset($massas) && ( is_array($massas) || $massas instanceof Traversable ) && sizeof($massas) ) foreach( $massas as $key1 => $value1 ){ $counter1++; ?>

                <div class="card">
                         <img src="assets/img/<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="food">
                        <div class="card-body">
                                <h5><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                                <p><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                <p class="price"><?php echo formatarPreco($value1["preco"]); ?></p>
                        </div>
                </div>   
                <?php } ?>            
        </section>
        <br>
        <hr>
        <br>

        <h4 id="sobremesas">🍝 Sobremesas</h4>
        <section>
                <?php $counter1=-1;  if( isset($sobremesas) && ( is_array($sobremesas) || $sobremesas instanceof Traversable ) && sizeof($sobremesas) ) foreach( $sobremesas as $key1 => $value1 ){ $counter1++; ?>

                <div class="card">
                         <img src="assets/img/<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="food">
                        <div class="card-body">
                                <h5><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                                <p><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                <p class="price"><?php echo formatarPreco($value1["preco"]); ?></p>
                        </div>
                </div>   
                <?php } ?>            
        </section>
        <br>
        <hr>
        <br>

        <h4 id="bebidas">🍝 Bebidas</h4>
        <section>
                <?php $counter1=-1;  if( isset($bebidas) && ( is_array($bebidas) || $bebidas instanceof Traversable ) && sizeof($bebidas) ) foreach( $bebidas as $key1 => $value1 ){ $counter1++; ?>

                <div class="card">
                         <img src="assets/img/<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="food">
                        <div class="card-body">
                                <h5><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                                <p><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                <p class="price"><?php echo formatarPreco($value1["preco"]); ?></p>
                        </div>
                </div>   
                <?php } ?>            
        </section>
        <br>
        <hr>
        <br>
</main>
