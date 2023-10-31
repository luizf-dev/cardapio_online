<?php if(!class_exists('Rain\Tpl')){exit;}?><main>
        <h3>Nosso Cardápio</h3>
        <p>Cada prato que servimos é uma obra de arte gastronômica cuidadosamente elaborada por nossos talentosos chefs. Nossa culinária é uma fusão de tradição e inovação, com uma paleta de sabores que abraça influências de todo o mundo. Desde pratos clássicos até criações contemporâneas, o nosso cardápio oferece uma variedade de opções para atender a todos os gostos e preferências.</p>

        <div id="link-category">
                <a href="#lanches" class="pill">lanches</a>
                <a href="#massas" class="pill">massas</a>
                <a href="#" class="pill">sobremessas</a>
                <a href="#" class="pill">bebidas</a>
        </div>

        <h4 id="lanches">🍔 lanches</h4>
        <section>
                <?php $counter1=-1;  if( isset($produtos) && ( is_array($produtos) || $produtos instanceof Traversable ) && sizeof($produtos) ) foreach( $produtos as $key1 => $value1 ){ $counter1++; ?>

                <div class="card">                        
                        <img src="<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="food">
                        <div class="card-body">
                                <h5><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                                <p><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                <p class="price"><?php echo formatarPreco($value1["preco"]); ?></p>    
                        </div>
                </div> 
                <?php } ?>        
        </section>

        <h4 id="massas">🍝 massas</h4>
        <section>
                <div class="card">
                <img src="assets/img/massa1.jpg" alt="food">
                <div class="card-body">
                        <h5>carbonara</h5>
                        <p>massa italiana, molho branco, bacon, queijo parmesão e ovo</p>
                        <p class="price">R$ 35,00</p>
                </div>
                </div>
                <div class="card">
                <img src="assets/img/massa1.jpg" alt="food">
                <div class="card-body">
                        <h5>carbonara</h5>
                        <p>massa italiana, molho branco, bacon, queijo parmesão e ovo</p>
                        <p class="price">R$ 35,00</p>
                </div>
                </div>
                <div class="card">
                <img src="assets/img/massa1.jpg" alt="food">
                <div class="card-body">
                        <h5>carbonara</h5>
                        <p>massa italiana, molho branco, bacon, queijo parmesão e ovo</p>
                        <p class="price">R$ 35,00</p>
                </div>
                </div>
        </section>
</main>
