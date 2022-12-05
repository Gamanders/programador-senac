<form method="POST">
    <input type="hidden" name="action" value="logar">    
    <div class="row w-25 mx-auto">                        
        <div class="col-12 text-primary text-center h2">
            Login
        </div>
        <div class="col-12">
            <label class="label-form">Email</label>
        </div>
        <div class="col-12">
            <input type="text" class="form-control" name="usuario">
        </div>
        <div class="col-12">
            <label class="label-form">Senha</label>
        </div>
        <div class="col-12">
            <input type="password" class="form-control" name="senha">
        </div>
        <div class="col-12">            
            <p class="text-end">
                <a href="?pagina=cadinteressado">
                    Não tenho cadastro
                </a>
            </p>    
        </div>
        <div class="offset-8 col-4">
            <button class="btn btn-dark mt-2">
                Acessar
            </button>
        </div>
    </div>     
</form>