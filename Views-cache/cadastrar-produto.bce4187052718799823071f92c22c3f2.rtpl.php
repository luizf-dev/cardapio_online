<?php if(!class_exists('Rain\Tpl')){exit;}?><main>
    <h3>Cadastrar Produto</h3>

    <?php if( $msgErro != '' ){ ?>        
        <script>
            msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
        </script>
    <?php } ?>


    <form method="POST" action="/cardapio_online/cadastrar-produto">
        <div class="input-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Nome do produto">
        </div>
        <div class="input-group">
            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco" placeholder="Preço do produto">
        </div>
        
        <div class="input-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" cols="30" rows="10"
                placeholder="Descrição do produto"></textarea>
        </div>
        <div class="input-group">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria">
                <option value="lanches">Lanches</option>
                <option value="massas">Massas</option>
                <option value="bebidas">Bebidas</option>
                <option value="sobremesas">Sobremesas</option>
            </select>
        </div>
        <div class="form-actions">
            <a href="/cardapio_online" class="btn default">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Cancelar
            </a>
            <button type="submit" class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                Cadastrar
            </button>
        </div>
    </form>


</main>