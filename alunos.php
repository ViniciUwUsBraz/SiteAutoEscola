<link rel="stylesheet" href="style.css">
<?php
include_once("conexao.php");

?>

<a href="index.php"><button class="btn">Voltar</button></a>

<div style="text-align: center;">
    <button class="btn" onclick="aparecerCadastrar()">+Cadastrar Aluno</button>
    <div id="mostrar" style="display: none;">
        <div>
            <form onsubmit="exibirOp()" id="form1" action="cadastrarAluno.php" method="post">
                <div style="background-color: darkslategray; text-align:center">
                    <h2 style="color: white">Cadastrar Aluno</h2>

                    <div style="background-color:cadetblue; width:100%;">
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="nome" style="width: 12%; text-align:right">Nome: </label>
                                <input type="text" id="nome" name="nome" required>
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="cpf" style="width: 10%; text-align:right">CPF: </label>
                                <input type="text" id="cpf" name="cpf" oninput="formatarCPF(this)" required>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="dtNas" style="width: 12%; text-align:right">Nascimento:</label>
                                <input type="date" id="dtNas" name="dtNas" style="width: 177px;" required>
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="end" style="width: 10%; text-align:right">Endereço: </label>
                                <input type="text" id="end" name="end" required>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="tel" style="width: 12%; text-align:right">Telefone:</label>
                                <input type="text" id="tel" name="tel" required>
                            </div>
                            <input class="btn" type="submit" value="Enviar">
                        </div>


                    </div>
                </div>
            </form>
        </div>
    </div>



    <div style="padding: 8px;">
        <div style="text-align: center; background-color:darkslategray;">
            <h2 style="color: white;">Lista Alunos</h2>
            <div style="width: 100%; display:flex; background-color:cadetblue">
                <div style="width: 8%;">ID</div>
                <div style="width: 40%;">Nome</div>
                <div style="width: 30%;">CPF</div>
                <div style="width: 22%;">Ações</div>
            </div>
        </div>

        <?php

        $sql = "SELECT * FROM ALUNOS";
        $result = $conexao->query($sql);
        $a = 0;

        foreach ($result as $aluno) {
            $alunoId   = $aluno["id"];
            if ($a % 2 == 0) {
                $cor = "azure";
            } else {
                $cor = "white";
            }
            $alunoNome = $aluno["nome"];
            $alunoCPF  = $aluno["cpf"];
            $alunoNasc = $aluno["data_nascimento"];
            $alunoEnd  = $aluno["endereco"];
            $alunoTel  = $aluno["telefone"];
            $div       = "alunoInfo" . $alunoId;

        ?>
            <div name="<?= $alunoId ?>" style="display: flex; background-color:<?= $cor ?>; text-align: center">
                <div style="width: 8%;"><?= $alunoId ?></div>
                <div style="width: 40%;"><?= $alunoNome ?></div>
                <div style="width: 30%;"><?= $alunoCPF ?></div>
                <div style="width: 22%;">
                    <div style="margin-left:22%; display: flex; ">
                        <button class="btn" onclick="aparecerInfoAluno(<?= $div ?>)">Visualizar</button>
                        <a href="excluirAluno.php?id=<?= $alunoId ?>"><button class="btn-danger">Excluir</button></a>
                    </div>
                </div>

            </div>
            <div id="<?= $div ?>" style="display: none;">
                <form onsubmit="exibirOp()" id="form2" action="editarAluno.php" method="post">


                    <div style="background-color:cadetblue; width:100%;">
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="nome" style="width: 12%; text-align:right">Nome: </label>
                                <input type="text" id="nome" name="nome" value="<?= $alunoNome ?>" required>
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="cpf" style="width: 10%; text-align:right">CPF: </label>
                                <input type="text" id="cpf" name="cpf" oninput="formatarCPF(this)" value="<?= $alunoCPF ?>" required>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="dtNas" style="width: 12%; text-align:right">Data Nascimento:</label>
                                <input type="text" id="dtNas" name="dtNas" value="<?= $alunoNasc ?>" required>
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="end" style="width: 10%; text-align:right">Endereço:</label>
                                <input type="text" id="end" name="end" value="<?= $alunoEnd ?>" required>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div style="display: flex; width:50%">
                                <label for="tel" style="width: 12%; text-align:right">Telefone:</label>
                                <input type="text" id="tel" name="tel" value="<?= $alunoTel ?>" required>
                            </div>
                            <div style="display: flex; width:50%">
                                <label for="edTid" style="width: 10%; text-align:right">ID:</label>
                                <input type="text" id="edtId" name="edtId" value="<?= $alunoId ?>" readonly>
                                <input class="btn" type="submit" value="Editar">
                            </div>

                        </div>
                    </div>


                </form>
            </div>

        <?php
        $a++;
        }
        ?>

    </div>
</div>

<script src="script.js"></script>