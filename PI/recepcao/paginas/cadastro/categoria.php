<h1 style="text-align:center;">
    Categoria
</h1>
<div style="display:flex; justify-content:center;">
    <div style="width: 30vw; margin:auto;">
        <form method="POST">
            <input type="hidden" name="pagina" value="cadastro">
            <input type="hidden" name="cad" value="categoria">
            <label>
                Nome
            </label>
            <input style="width:100%; margin-bottom:10px;" type="text" name="nomeCategoria">
            <label>
                Modalidade
            </label>
            <select style="width:100%; margin-bottom:10px;" name="modalidade">
                <option value="ead">
                    Ensino à Distância
                </option>
                <option value="presencial">
                    Presencial
                </option>
                <option value="hibrido">
                    Híbrido
                </option>
            </select>
            <br>
            <button>
                Cadastrar
            </button>
        </form> 
    </div>
    <div style="width: 30vw;">
        <h4 style="text-align:center;">
            Listagem de Categorias
        </h4>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Modalidade</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conexao = new PDO("mysql:dbname=recepcao;host:localhost","root","");
                    $sqlselect = $conexao->PREPARE("SELECT * FROM categoria");
                    $sqlselect->execute();
                    $categorias = $sqlselect->fetchAll(PDO::FETCH_ASSOC);
                    foreach($categorias as $categoria){
                        print "
                            <tr>
                                <td>".$categoria['id']."</td>
                                <td>".$categoria['nome']."</td>
                                <td>".$categoria['modalidade']."</td>
                                <td> <a href=''>Editar</a> | <a href='?pagina=cadastro&cad=categoria&excluir=".$categoria['id']."'>Excluir</a></td>
                            </tr>
                        ";
                    }
                ?>              
            </tbody>
        </table>
    </div>
</div>

<?php
  //  print isset($_GET['excluir'])?$_GET['excluir']:"sem info";
?>
    

