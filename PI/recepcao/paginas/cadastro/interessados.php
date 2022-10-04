<h1 style="text-align:center;">
    Interessados
</h1>
<?php
    if(isset($_POST['sucesso'])){
        $sucesso = $_POST['sucesso'];
        if($sucesso == "true"){
            print "
                <div style='width:60vw; margin:auto; font-size:1.2em; padding:5px; border: solid 2px green; border-radius:10px; background:lightgreen;'>
                    <p style='text-align:center; color:darkgreen; font-weight:900;'>
                        Cadastro realizado com sucesso!
                    </p>
                </div>
            ";
        }
    }
?>
<div style="display:flex; justify-content:center;">
    <div style="width:30vw; margin:auto; font-size:1.2em">
        <form  method="POST">
            <input type="hidden" name="pagina" value="cadastro">
            <input type="hidden" name="cad" value="interessados">
            <input type="hidden" name="sucesso" value="true">
            <?php
                if(isset($ratualiza)){
                    print "<input type='hidden' name='atualizar' value='".$edicao."'>";                    
                }
            ?>
            <label>
                Nome
            </label>
            <input type="text" name="nome" style="width:100%; margin-bottom:10px;">
            <table style="width:100%">
                <tr>
                    <td>
                        <label>
                           Contato
                        </label>
                    </td>
                    <td>
                        <label>
                            Tipo de Contato
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="tel" name="contato" style="width:100%; margin-bottom:10px;">
                    </td>
                    <td>
                    <select style="width:100%; margin-bottom:10px;" name="tpcontato" >
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
                    </td>
                </tr>
            </table>               
            <label>
                Email
            </label>
            <input type="email" name="email" style="width:100%; margin-bottom:10px;">            
            <table style = "width:100%;">
                <tr>
                    <td>
                        <label>
                            Escolaridade
                        </label>
                    </td>
                    <td>
                        <label>
                            Data de Nascimento
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select style="width:100%; margin-bottom:10px;" name="escolaridade" >
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
                    </td>
                    <td>
                        <input style="width:100%; margin-bottom:10px; "type="date" name="dataNascimento">
                    </td>
                </tr>
            </table>
            <button>
                cadastrar
            </button>
        </form>
    </div>
    <div style="width:40vw; margin:auto; font-size:0.9em">
         <?php
            $conexao = new PDO("mysql:dbname=recepcao;host=localhost","root","");
            $selectInteressados = $conexao->PREPARE("select * FROM interessados");
            $selectInteressados->execute();
            $interessados = $selectInteressados->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($cursos);
         ?>
        <table>
            <thead>
                <tr style="font-weight:900; text-align:center;">
                    <td>id</td>
                    <td>Nome</td>
                    <td>Contato</td>
                    <td>Tipo</td>
                    <td>Email</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($interessados as $interessado){
                        print
                            "
                            <tr style='text-align:center;'>
                                <td>".$interessado['id']."</td>
                                <td>".$interessado['nome']."</td>                                    
                                <td>"."
                                <a href='https://api.whatsapp.com/send?phone='"
                                .$interessado['contato'].">"
                                    .$interessado['contato'].
                                "</a>"
                                ."</td>
                                <td>".$interessado['tpcontato']."   </td>
                                <td>".$interessado['email']."</td>
                                <td>"."
                                    <a href='?pagina=cadastro&cad=interessado&editar=".$interessado['id']."'><i style='color:orange;'class='fa-solid fa-pencil'></i></a>
                                    <a href='?pagina=cadastro&cad=interessado&excluir=".$interessado['id']."'><i style='color:red;' class='fa-solid fa-trash'></i></a> 
                                    <a href='?pagina=cadastro&cad=interessado&detalhes=".$interessado['id']."'><i style='color:blue;'class='fa-solid fa-eye'></i></a>"."</td>
                            </tr>";
                        }
                ?>
            </tbody>
        </table>
    </div>
</div>