
var copiaAvaliacao = 0;
function Avaliar(estrela) {
  var url = window.location;
  url = url.toString()
  url = url.split("index.html");
  url = url[0];

  var s1 = document.getElementById("s1").src;
  var s2 = document.getElementById("s2").src;
  var s3 = document.getElementById("s3").src;
  var s4 = document.getElementById("s4").src;
  var s5 = document.getElementById("s5").src;
  var avaliacao = 0;

  if (estrela == 5) {
    if (s5 == url + "../img/star0.png") {
      document.getElementById("s1").src = "../img/star1.png";
      document.getElementById("s2").src = "../img/star1.png";
      document.getElementById("s3").src = "../img/star1.png";
      document.getElementById("s4").src = "../img/star1.png";
      document.getElementById("s5").src = "../img/star0.png";
      avaliacao = 4;
    } else {
      document.getElementById("s1").src = "../img/star1.png";
      document.getElementById("s2").src = "../img/star1.png";
      document.getElementById("s3").src = "../img/star1.png";
      document.getElementById("s4").src = "../img/star1.png";
      document.getElementById("s5").src = "../img/star1.png";
      avaliacao = 5;
    }
  }

  //ESTRELA 4
  if (estrela == 4) {
    if (s4 == url + "../img/star0.png") {
      document.getElementById("s1").src = "../img/star1.png";
      document.getElementById("s2").src = "../img/star1.png";
      document.getElementById("s3").src = "../img/star1.png";
      document.getElementById("s4").src = "../img/star0.png";
      document.getElementById("s5").src = "../img/star0.png";
      avaliacao = 3;
    } else {
      document.getElementById("s1").src = "../img/star1.png";
      document.getElementById("s2").src = "../img/star1.png";
      document.getElementById("s3").src = "../img/star1.png";
      document.getElementById("s4").src = "../img/star1.png";
      document.getElementById("s5").src = "../img/star0.png";
      avaliacao = 4;
    }
  }

  //ESTRELA 3
  if (estrela == 3) {
    if (s3 == url + "../img/star0.png") {
      document.getElementById("s1").src = "../img/star1.png";
      document.getElementById("s2").src = "../img/star1.png";
      document.getElementById("s3").src = "../img/star0.png";
      document.getElementById("s4").src = "../img/star0.png";
      document.getElementById("s5").src = "../img/star0.png";
      avaliacao = 2;
    } else {
      document.getElementById("s1").src = "../img/star1.png";
      document.getElementById("s2").src = "../img/star1.png";
      document.getElementById("s3").src = "../img/star1.png";
      document.getElementById("s4").src = "../img/star0.png";
      document.getElementById("s5").src = "../img/star0.png";
      avaliacao = 3;
    }
  }

  //ESTRELA 2
  if (estrela == 2) {
    if (s2 == url + "../img/star0.png") {
      document.getElementById("s1").src = "../img/star1.png";
      document.getElementById("s2").src = "../img/star0.png";
      document.getElementById("s3").src = "../img/star0.png";
      document.getElementById("s4").src = "../img/star0.png";
      document.getElementById("s5").src = "../img/star0.png";
      avaliacao = 1;
    } else {
      document.getElementById("s1").src = "../img/star1.png";
      document.getElementById("s2").src = "../img/star1.png";
      document.getElementById("s3").src = "../img/star0.png";
      document.getElementById("s4").src = "../img/star0.png";
      document.getElementById("s5").src = "../img/star0.png";
      avaliacao = 2;
    }
  }

  //ESTRELA 1
  if (estrela == 1) {
    if (s1 == url + "../img/star0.png") {
      document.getElementById("s1").src = "../img/star0.png";
      document.getElementById("s2").src = "../img/star0.png";
      document.getElementById("s3").src = "../img/star0.png";
      document.getElementById("s4").src = "../img/star0.png";
      document.getElementById("s5").src = "../img/star0.png";
      avaliacao = 0;
    } else {
      document.getElementById("s1").src = "../img/star1.png";
      document.getElementById("s2").src = "../img/star0.png";
      document.getElementById("s3").src = "../img/star0.png";
      document.getElementById("s4").src = "../img/star0.png";
      document.getElementById("s5").src = "../img/star0.png";
      avaliacao = 1;
    }
  }

  document.getElementById('rating').innerHTML = avaliacao;
  copiaAvaliacao = avaliacao;
}

//chamar duas funções com onclick
var clickMe = document.getElementById("botao");
var reduce = Function.call.bind(Array.prototype.reduce);

var bitAnd = function (f, g) {
  return function () {
    return g.apply(this, arguments) & f.apply(this, arguments);
  }
}

bitAnd.all = function () {
  return reduce(arguments, bitAnd);
}

function Avaliacao() {
  var input = document.querySelector("#caixa");
  var comentario = input.value;
  var idservico = document.getElementById("botao").value;
  console.log(idservico);
  console.log(comentario);
  console.log(copiaAvaliacao);


  //Criando requisição
  var req = new XMLHttpRequest();


  // Definindo a url
  var url = "../action/avaliaProfissional.php";



  // Obtendo os dados
  var dados = "";
  dados += "idservico=" + idservico;
  dados += "&copiaAvaliacao=" + copiaAvaliacao;
  dados += "&comentario=" + comentario;



  // Abrindo a requisição
  req.open("GET", url + "?" + dados, true);


  // Definindo função que vai tratar o retorno
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      alert("Avaliação Salva com Sucesso!");
      window.location.href = "../pgs/relatorioCliente.php";

    }
  }
  // Enviando requisição
  req.send();

}

function AvaliacaoFoto() {
  var idserv = document.getElementById("botao").value;
  console.log(idserv);


  //Criando requisição
  var req = new XMLHttpRequest();

  // Definindo a url
  var url = "../action/avaliaFoto.php";


  // Obtendo os dados
  var dados = "";
  dados += "idserv=" + idserv;

  // Abrindo a requisição
  req.open("GET", url + "?" + dados, true);

  // Definindo função que vai tratar o retorno
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      alert("Avaliação Salva com Sucesso!");
      //window.location.href = "../pgs/relatorioCliente.php";

    }
  }
  // Enviando requisição
  req2.send();
}

clickMe.addEventListener('click', bitAnd.all(Avaliacao, AvaliacaoFoto));

let fileInput = document.getElementById("file-input");
let imageContainer = document.getElementById("images");
let numOfFiles = document.getElementById("num-of-files");

function preview() {
  imageContainer.innerHTML = "";
  numOfFiles.textContent = `${fileInput.files.length} Fotos selecionadas`;

  for (i of fileInput.files) {
    let reader = new FileReader();
    let figure = document.createElement("figure");
    let figCap = document.createElement("figcaption");
    figCap.innerText = i.name;
    figure.appendChild(figCap);
    reader.onload = () => {
      let img = document.createElement("img");
      img.setAttribute("src", reader.result);
      figure.insertBefore(img, figCap);
    }
    imageContainer.appendChild(figure);
    reader.readAsDataURL(i);
  }
}






