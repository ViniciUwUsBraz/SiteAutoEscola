async function aparecerCadastrar() {
  cad = document.getElementById("mostrar");

  if (cad.style.display === 'none') {
    cad.style.display = 'block';
  } else {
    cad.style.display = 'none';
  }
}

async function aparecerInfoAluno(div) {
  if (div.style.display === 'none') {
    div.style.display = 'block';
  } else {
    div.style.display = 'none';
  }
}

async function formatarCPF(div) {
  let cpf = div.value.replace(/\D/g, '');
  cpf = cpf.substring(0, 11);

  if (cpf.length > 3 && cpf.length <= 6) {
    cpf = cpf.replace(/(\d{3})(\d{1,3})/, '$1.$2');
  } else if (cpf.length > 6 && cpf.length <= 9) {
    cpf = cpf.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
  } else if (cpf.length > 9) {
    cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
  }

  div.value = cpf;

}

async function formatarPlaca(div) {
  placa = div.value.replace(/[^a-zA-Z0-9]/g, '');
  placa = placa.substring(0, 7);
  if (placa.length > 3) {
    placa = placa.replace(/([a-zA-Z]{3})([0-9]{1,2})/, '$1-$2');
  }

  div.value = placa.toUpperCase();
}

async function exibirOp(){
  alert("Operação efetuada com sucesso!!")
}

