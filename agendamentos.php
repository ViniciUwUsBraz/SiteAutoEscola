<link rel="stylesheet" href="style.css">
<?php
include_once "conexao.php";
?>

<a href="index.php"><button class="btn">Voltar</button></a>

<div style="text-align: center;">
    <button class="btn" onclick="aparecerCadastrar()">+Agendar</button>
    <div id="mostrar" style="display: none;">

        <div>
            <form action="cadastrarAgendamento.php" method="post">
                <div style="background-color: darkslategray; text-align:center">
                    <h2 style="color: white">Agendar</h2>

                    <div style="background-color:cadetblue; width:100%;">
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="idA" style="width: 12%; text-align:right">Aluno: </label>
                                <select name="idA" id="idA">
                                <?php
                                    $sql = "SELECT id, CONCAT(ID, ':', NOME) AS nomeAluno FROM ALUNOS";
                                    $result = $conexao->query($sql);

                                    foreach ($result as $aluno) {
                                        $idAluno   = $aluno["id"];
                                        $nomeAluno = $aluno["nomeAluno"];
                                    ?>
                                        <option value="<?= $idAluno ?>"><?= $nomeAluno ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="idC" style="width: 10%; text-align:right">Carro: </label>
                                <select name="idC" id="idC">
                                    <?php
                                    $sql = "SELECT id, CONCAT(ID, ':', MARCA,' ',MODELO) AS carro FROM CARROS";
                                    $result = $conexao->query($sql);

                                    foreach ($result as $carro) {
                                        $idCarro   = $carro["id"];
                                        $nomeCarro = $carro["carro"];
                                    ?>
                                        <option value="<?= $idCarro ?>"><?= $nomeCarro ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="dt" style="width: 12%; text-align:right">Data:</label>
                                <input type="date" id="dt" name="dt" style="width: 177px;">
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="hr" style="width: 10%; text-align:right">Horario: </label>
                                <input type="time" id="hr" name="hr">
                            </div>
                        </div>
                        <div style="text-align:center">
                            <input class="btn" type="submit" value="Enviar">
                        </div>


                    </div>
                </div>
            </form>
        </div>
    </div>
    <div>
        <div style="text-align: center; background-color:darkslategray;">
            <h2 style="color: white;">Lista Horaios</h2>
            <div style="width: 100%; display:flex; background-color:cadetblue">
                <div style="width: 10%;">ID</div>
                <div style="width: 30%;">Aluno</div>
                <div style="width: 30%;">Carro</div>
                <div style="width: 15%;">Data</div>
                <div style="width: 15%;">Ações</div>
            </div>
        </div>

        <?php
        $sql = "SELECT a.id, a.aluno_id, a.carro_id, a.data_aula, a.horario_aula, al.nome, c.marca, c.modelo  FROM agendamentos a 
                    JOIN alunos al ON (al.id = a.aluno_id)
                    JOIN carros c ON (c.id = a.carro_id)";

        $result2 = $conexao->query($sql);
        $a = 0;                            

        foreach ($result2 as $infos) {

            $agId       = $infos["id"];

            if ($a  % 2 == 0) {
                $cor = "azure";
            } else {
                $cor = "white";
            }
            $ageAlunoId = $infos["aluno_id"];
            $ageCarroId = $infos["carro_id"];
            $ageData    = $infos["data_aula"];
            $ageHorario = $infos["horario_aula"];
            $ageAluno   = $infos["nome"];
            $ageMarca   = $infos["marca"];
            $ageModelo  = $infos["modelo"];
            $ageCarro   = $ageMarca . " " . $ageModelo;
            $div        = "info" . $agId;
        ?>
            <div name="<?= $agId ?>" style="display: flex; background-color:<?= $cor ?>; text-align: center">
                <div style="width: 10%;"><?= $agId ?></div>
                <div style="width: 30%;"><?= $ageAluno ?></div>
                <div style="width: 30%;"><?= $ageCarro ?></div>
                <div style="width: 15%;"><?= $ageData; ?></div>
                <div style="width: 15%;">
                    <div style="margin-left: 10%; display: flex; ">
                        <button class="btn" onclick="aparecerInfoAluno(<?= $div ?>)">Visualizar</button>
                        <a href="excluirAgendamento.php?id=<?= $agId ?>"><button class="btn-danger">Desmarcar</button></a>
                    </div>
                </div>


            </div>
            <div id="<?= $div ?>" style="display:none;">
                <div style="text-align: center;">
                    <div style="display:flex; justify-content:center; background-color:darkslategray; color:white">
                        <p>ID ALUNO: <?= $ageAlunoId ?></p>
                        <p style="margin-left: 40px; margin-right:40px">HORARIO: <?= $ageHorario ?></p>
                        <p>ID CARRO: <?= $ageCarroId ?></p>

                    </div>
                </div>
            </div>
        <?php
        $a++;
        }
        ?>
    </div>

</div>
<script src="script.js"></script>