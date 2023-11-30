var btn = document.querySelector('#show-or-hide');
var btn2 = document.querySelector('.btn-quadros');
var contain = document.querySelector('#perfil'); 
let modal = document.querySelector('.modal');
let modalImg = document.querySelector('#modal_img');
let btClose = document.querySelector('#bt_close');
let srcVal = "";
let idCliente_Realiza = document.getElementById('IdCliente_realiza');
let idProf_Realiza = "";
let idServico_Realiza = "";
let copia_id = "";


function selected(value) {
  var divpai = document.getElementsByClassName('pai');
  var divelericista = document.getElementsByClassName('Eletricista');
  var divpedreiro = document.getElementsByClassName('Pedreiro');
  var divpintor = document.getElementsByClassName('Pintor');
  if (value == "Selecionar") {
    divpai[0].style.display = 'block';
    divelericista[0].style.display = 'none';
    divpedreiro[0].style.display = 'none';
    divpintor[0].style.display = 'none';
  } else {
    if (value == "Eletricista") {
      divelericista[0].style.display = 'block';
      divpedreiro[0].style.display = 'none';
      divpintor[0].style.display = 'none';
    }
    if (value == "Pedreiro") {
      divelericista[0].style.display = 'none';
      divpedreiro[0].style.display = 'block';
      divpintor[0].style.display = 'none';
    }
    if (value == "Pintor") {
      divelericista[0].style.display = 'none';
      divpedreiro[0].style.display = 'none';
      divpintor[0].style.display = 'block';
    }
  }
}
    ConsultaServico = function(){ 
      var descendentes = document.getElementsByName("b1");
        contain.style.display = "block";
      for (var j = 0; j < descendentes.length; j++) {
        descendentes[j].addEventListener("click", function (f) {
          
        
          var idProf = (f.target.value);
          copia_id = idProf;

          //Criando requisição
             var req = new XMLHttpRequest();
         
             // Definindo a url
             var url = "../action/consultaservicos.php";
             
             // Obtendo os dados
             var dados = "";
             dados += "idProf="+ idProf;
            
         
             // Abrindo a requisição
             req.open("GET", url+"?"+dados, true);
               
         
             // Definindo função que vai tratar o retorno
             req.onreadystatechange = function(){
                 if(req.readyState == 4 && req.status == 200){
                    let nome = document.getElementById("camponome");
                    let prof = document.getElementById("profi");
                    let atua = document.getElementById("atua");
                    let service = document.getElementById("service");
                    
                    let d = req.responseText;
                    let d2 = d.split("|");

                    nome.innerHTML = d2[0];
                    prof.innerHTML = d2[1];
                    atua.innerHTML = d2[2];
                    service.innerHTML = d2[3];
                    
                 } 
                 id_prof_botao.innerHTML = copia_id;

                
             }
             // Enviando requisição
             req.send();    
        })
      }
       }
  


  NovoServico = function(){  
    var descendentes = document.getElementsByName("b2");
      for (var j = 0; j < descendentes.length; j++) {
        
        descendentes[j].addEventListener("click", function (f) {
          if (confirm('Tem certeza que deseja contratar este Profissional?')){
        
          var idProfServico = (f.target.value);
      console.log(idProfServico);
      //Criando requisição
         var req = new XMLHttpRequest();
     
         // Definindo a url
         var url = "../action/cadastraServico.php";
         
         // Obtendo os dados
         var dados = "";
         dados += "idProfServico="+ idProfServico;
        
     
         // Abrindo a requisição
         req.open("GET", url+"?"+dados, true);
           
     
         // Definindo função que vai tratar o retorno
         req.onreadystatechange = function(){
             if(req.readyState == 4 && req.status == 200){      
              let tel;
                    let d = req.responseText;
                    let d2 = d.split("|");
                    tel = d2[0];
              window.open('https://api.whatsapp.com/send?1=pt_BR&phone=55'+(tel), '_blank');
              //window.location.href.target.blank = 'https://api.whatsapp.com/send?1=pt_BR&phone=55'+(tel);

             }
         }  
         // Enviando requisição
         req.send();     
        /*})
      }*/
     
         
        
        }})
    }
 }
  var check = document.getElementById("check");
  var selecao = document.getElementById("selecao");
  check.document.addEventListener("click", principal);
  var i;
  function principal() {
      document.addEventListener("click", i = true);
      
      if (i=true){
        console.log(i);
        document.addEventListener("click", i=false);
        document.getElementById("selecao").style.width ="84.5%";
        document.getElementById("selecao").style.marginLeft ="13.3%";
        document.getElementById("selecao").style.transition=".3s";
        
      }else if (i=false) {
        console.log(i);
        document.getElementById("selecao").style.width ="100%";
        document.getElementById("selecao").style.marginLeft ="53px";
        document.addEventListener("click", i=true);
      }
  }  
  ;

  
  /*function abrirNav(){
    
    document.getElementById("menuOculto").style.transform ="250px";
    
  }
  function fecharNav(){
    document.getElementById("selecao").style.width ="100%";
    document.getElementById("selecao").style.marginLeft ="53px";
  }

  if($teste == true){
        
  } else{
    document.getElementById("selecao").style.width ="100%";
    document.getElementById("selecao").style.marginLeft ="53px";
  }*/
  

