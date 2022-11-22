    <form  method="POST">
        <input type="hidden" name="cadastro" value="interessado">
        <input type="hidden" name="tipo" value="usuario">
        <label class="form-label">
            Nome
        </label>
        <input class="form-control" type="text" name="nome" style="width:100%; margin-bottom:10px;">
        <div class="row">
            <div class="col">
                <label class="form-label">
                    Contato
                </label>
                <input class="form-control" type="tel" name="contato">
            </div>
            <div class="col">
                <label class="form-label">
                    Contato
                </label>
                <select class="form-control" name="tpcontato" >
                    <option value="soligacao">
                            Só Ligação
                    </option>
                    <option value="whastapp">
                            whastapp
                    </option>
                    <option value="telegram">
                            Telegram
                    </option>               
                </select> 
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label">
                    Escolaridade
                </label> 
                <select class="form-control" name="escolaridade" >
                    <option value="fundamental">
                            Fundamental
                    </option>
                    <option value="medio">
                            Médio   
                    </option>
                    <option value="superior">
                            Superior   
                    </option>
                    <option value="posgraduado">
                            posgraduado   
                    </option>
                </select>       
            </div>
            <div class="col">
                <label class="form-label">
                    Data de Nascimento
                </label>
                <input class="form-control" style="width:100%; margin-bottom:10px; "type="date" name="dtNasc">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label">
                    Email
                </label>
                <input class="form-control" type="email" name="email"> 
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="form-label">
                   Senha
                </label>
                <input class="form-control" type="password" name="senha"> 
            </div>
        </div>
        <div class="row">
            <div class="col mt-2 d-flex justify-content-end">
                <button class="btn btn-primary">
                    Cadastrar
                </button>
            </div>
        </div>           
</form>