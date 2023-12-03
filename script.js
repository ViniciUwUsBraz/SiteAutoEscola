async function aparecerCadastrar() {
  cad = document.getElementById("mostrar");

  if (cad.style.display === 'none') {
    cad.style.display = 'block';
  } else {
    cad.style.display = 'none';
  }
}

async function aparecerInfoAluno(div) {
  console.log("Jacaré");
  if (div.style.display === 'none') {
    div.style.display = 'block';
  } else {
    div.style.display = 'none';
  }
}

