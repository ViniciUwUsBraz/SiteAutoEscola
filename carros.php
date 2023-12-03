<link rel="stylesheet" href="style.css">
<?php
include_once("conexao.php");
$edt = "none";
if ($_GET != null) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM CARROS WHERE ID = '$id'";
    $editar = $conexao->query($sql);

    $dados = $editar->fetch_assoc();

    $edtId     = $dados["id"];
    $edtMarca  = $dados["marca"];
    $edtModelo = $dados["modelo"];
    $edtAno    = $dados["ano"];
    $edtPlaca  = $dados["placa"];
    $edtCap    = $dados["capacidade_passageiros"];
    $edt       = "block";
}


?>

<a href="index.php"><button class="btn">Voltar</button></a>



<div style="text-align: center;">
    <button class="btn" onclick="aparecerCadastrar()">+Cadastrar Carro</button>


    <!--  PARTE DE CADASTRAR  -->


    <div id="mostrar" style="display: none;">
        <div>
            <form action="cadastrarCarro.php" method="post">
                <div style="background-color: darkslategray; text-align:center">
                    <h2 style="color: white">Cadastrar Carro</h2>

                    <div style="background-color:cadetblue; width:100%;">
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="marca" style="width: 8%; text-align:right">Marca: </label>
                                <input type="text" id="marca" name="marca">
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="modelo" style="width: 8%; text-align:right">Modelo: </label>
                                <input type="text" id="modelo" name="modelo">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="ano" style="width: 8%; text-align:right">Ano:</label>
                                <input type="text" id="ano" name="ano">
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="placa" style="width: 8%; text-align:right">Placa</label>
                                <input type="text" id="placa" name="placa">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="capacidade" style="width: 8%; text-align:right">Capacidade</label>
                                <input type="number" id="capacidade" name="capacidade">
                            </div>
                            <input class="btn" type="submit" value="Enviar">
                        </div>


                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--  PARTE DE EDITAR  -->

    <div id="edt" style="display: <?= $edt ?>;">
        <div>
            <form action="editarCarro.php" method="post">
                <div style="background-color: darkslategray; text-align:center">
                    <h2 style="color: white">Editar Carro</h2>

                    <div style="background-color:cadetblue; width:100%;">
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="marca" style="width: 8%; text-align:right">Marca: </label>
                                <input type="text" id="marca" name="marca" value="<?= $edtMarca ?>">
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="modelo" style="width: 8%; text-align:right">Modelo: </label>
                                <input type="text" id="modelo" name="modelo" value="<?= $edtModelo ?>">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="ano" style="width: 8%; text-align:right">Ano:</label>
                                <input type="text" id="ano" name="ano" value="<?= $edtAno ?>">
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="placa" style="width: 8%; text-align:right">Placa</label>
                                <input type="text" id="placa" name="placa" value="<?= $edtPlaca ?>">
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="capacidade" style="width: 8%; text-align:right">Capacidade</label>
                                <input type="number" id="capacidade" name="capacidade" value="<?= $edtCap ?>">
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="id" style="width: 8%; text-align:right">ID:</label>
                                <input type="text" id="edtId" name="edtId" value="<?= $edtId ?>" readonly>
                                <input class="btn" type="submit" value="Editar">
                            </div>

                        </div>


                    </div>
                </div>
            </form>
        </div>



    </div>

    <div style="padding: 8px;">
        <div style="text-align: center; background-color:darkslategray;">
            <h2 style="color: white;">Lista Carros</h2>
            <div style="width: 100%; display:flex; background-color:cadetblue">
                <div style="width: 14%;">ID</div>
                <div style="width: 18%;">Marca</div>
                <div style="width: 18%;">Modelo</div>
                <div style="width: 10%;">Ano</div>
                <div style="width: 18%;">Placa</div>
                <div style="width: 12%;">Capacidade</div>
                <div style="width: 10%;">Ações</div>
            </div>
        </div>

        <?php
        $sql = "SELECT * FROM CARROS";
        $result = $conexao->query($sql);
        $a = 0;

        foreach ($result as $carro) {
            $carroId = $carro["id"];
            if ($a % 2 == 0) {
                $cor = "azure";
            } else {
                $cor = "white";
            }
            $carroMarca = $carro["marca"];
            $carroModelo = $carro["modelo"];
            $carroAno = $carro["ano"];
            $carroPlaca = $carro["placa"];
            $carroCap = $carro["capacidade_passageiros"];
        ?>
            <div name="<?= $carroId ?>" style="display: flex; background-color:<?= $cor ?>; text-align: center">
                <div style="width: 14%;"><?= $carroId ?></div>
                <div style="width: 18%;"><?= $carroMarca ?></div>
                <div style="width: 18%;"><?= $carroModelo ?></div>
                <div style="width: 10%;"><?= $carroAno ?></div>
                <div style="width: 18%;"><?= $carroPlaca ?></div>
                <div style="width: 12%;"><?= $carroCap ?></div>
                <div style="width: 10%;">
                    <div style="margin-left: 10%; display: flex; ">
                        <a href="carros.php?id=<?= $carroId ?>"><button class="btn">Editar</button>
                        <a href="excluirCarro.php?id=<?= $carroId ?>"><button class="btn-danger">Excluir</button></a>
                    </div>
                </div>

            </div>
        <?php
        $a++;
        }
        ?>
    </div>
    <script src="script.js"></script>

</div>