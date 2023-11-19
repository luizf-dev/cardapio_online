<?php if(!class_exists('Rain\Tpl')){exit;}?><main>
    <h3>Cadastrar Imagem</h3>

    <?php if( $msgErro != '' ){ ?>        
        <script>
            msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
        </script>
    <?php } ?>



    <form action="/cardapio_online/cadastrar-imagem/<?php echo htmlspecialchars( $produtos["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/new/" method="POST" enctype="multipart/form-data">
        

    <!--    <input type="hidden" name="id" value="<?php echo htmlspecialchars( $produtos["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> -->

        <div class="input-group">
            <label for="image"></label>
            <input type="file" name="imagem" id="imagem">
        </div>

        <div class="form-actions">
            <a href="/cardapio_online/listar-produtos" class="btn default">
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