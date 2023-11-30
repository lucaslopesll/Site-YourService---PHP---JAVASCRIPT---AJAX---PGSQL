 
 //Funções do botão aceitar serviço
 function aceitarServico(){

    /*document.querySelectorAll("button").forEach( function(button) {
    
    button.addEventListener("click", function(event) {
    const el = event.target || event.srcElement;
    const id = el.id;
    console.log(id);
  });
  
});*/

  var idservico = document.getElementById("aceitar").value;
      
          //Criando requisição
             var req = new XMLHttpRequest();
         
             // Definindo a url
             var url = "../action/relatorioProf.php";
             
             // Obtendo os dados
             var dados = "";
             dados += "idservico="+ idservico;
            
         
             // Abrindo a requisição
             req.open("GET", url+"?"+dados, true);
               
         
             // Definindo função que vai tratar o retorno
             req.onreadystatechange = function(){
                 if(req.readyState == 4 && req.status == 200){
                  window.location.reload(true);
                    
                 } 
             }
             // Enviando requisição
             req.send();    
      
      }

      //Função do botão recusar serviço
      function recusarServico(){
        var idservico = document.getElementById("recusar").value;
            
                //Criando requisição
                   var req = new XMLHttpRequest();
               
                   // Definindo a url
                   var url = "../action/relatorioProfRecusar.php";
                   
                   // Obtendo os dados
                   var dados = "";
                   dados += "idservico="+ idservico;
                  
               
                   // Abrindo a requisição
                   req.open("GET", url+"?"+dados, true);
                     
               
                   // Definindo função que vai tratar o retorno
                   req.onreadystatechange = function(){
                       if(req.readyState == 4 && req.status == 200){
                        window.location.reload(true);
                          
                       } 
                   }
                   // Enviando requisição
                   req.send();    
            
            }

                  //Função do botão cancelar serviço

            function cancelarServico(){
              var idservico = document.getElementById("cancelar").value;
                  
                      //Criando requisição
                         var req = new XMLHttpRequest();
                     
                         // Definindo a url
                         var url = "../action/relatorioProfCancelar.php";
                         
                         // Obtendo os dados
                         var dados = "";
                         dados += "idservico="+ idservico;
                        
                     
                         // Abrindo a requisição
                         req.open("GET", url+"?"+dados, true);
                           
                     
                         // Definindo função que vai tratar o retorno
                         req.onreadystatechange = function(){
                             if(req.readyState == 4 && req.status == 200){
                              window.location.reload(true);
                                
                             } 
                         }
                         // Enviando requisição
                         req.send();    
                  
                  }


           

            //Função do botão concluir serviço
      function  concluirServico(){
        var idservico = document.getElementById("concluir").value;
            
                //Criando requisição
                   var req = new XMLHttpRequest();
               
                   // Definindo a url
                   var url = "../action/relatorioProfConcluir.php";
                   
                   // Obtendo os dados
                   var dados = "";
                   dados += "idservico="+ idservico;
                  
               
                   // Abrindo a requisição
                   req.open("GET", url+"?"+dados, true);
                     
               
                   // Definindo função que vai tratar o retorno
                   req.onreadystatechange = function(){
                       if(req.readyState == 4 && req.status == 200){
                        window.location.reload(true);
                          
                       } 
                   }
                   // Enviando requisição
                   req.send();    
            
            }
 

 //Funções do botão aceitar serviço
 function detalharServico(){
  var idservico = document.getElementById("detalhar").value;
   console.log(idservico);
          //Criando requisição
             var req = new XMLHttpRequest();
         
             // Definindo a url
             var url = "../action/consultaModalDetalhes.php";
             
             // Obtendo os dados
             var dados = "";
             dados += "idservico="+ idservico;
            
         
             // Abrindo a requisição
             req.open("GET", url+"?"+dados, true);
               
         
             // Definindo função que vai tratar o retorno
             req.onreadystatechange = function(){
                 if(req.readyState == 4 && req.status == 200){
                 
                    let id_prof = document.getElementById("id_prof");
                    let nome_pro = document.getElementById("nome_pro");
                    let data_ini = document.getElementById("data_ini_real");
                    let data_fim = document.getElementById("data_fim_real");
                    let dataa_s = document.getElementById("datanascprof");
                    let email_prof = document.getElementById("email_prf");
                    let telefone_prof = document.getElementById("telefoneprof");
                    
                    let d = req.responseText;
                    let d2 = d.split("|");
                    id_prof.innerHTML = d2[0];
                    nome_pro.innerHTML = d2[1];
                    data_ini.innerHTML = d2[2];
                    data_fim.innerHTML = d2[3];
                    dataa_s.innerHTML = d2[4];
                    email_prof.innerHTML = d2[5];
                    telefone_prof.innerHTML = d2[6];    
                    window.location.href = "../pgs/detalhesServico.php"; 

                 } 
             }
             // Enviando requisição
             req.send();  
              
               
      
      }







//Função de apresentação da tabela apartir do select
function selected(value){
    var divpai = document.getElementsByClassName('pai');
    var divaberto = document.getElementsByClassName('aberto');
    var divandamento = document.getElementsByClassName('andamento');
    var divfinalizado = document.getElementsByClassName('finalizado');
    var divcancelar = document.getElementsByClassName('cancelar');


      if(value == "selecionado"){
        divpai[0].style.display = 'block';
        divaberto[0].style.display = 'none';
        divandamento[0].style.display = 'none';
        divfinalizado[0].style.display = 'none';
        divcancelar[0].style.display = 'none';

    } else{
      if (value == "aberto"){
        divaberto[0].style.display = 'block';
        divandamento[0].style.display = 'none';
        divfinalizado[0].style.display = 'none';
        divcancelar[0].style.display = 'none';
      }
      if (value == "andamento"){
        divaberto[0].style.display = 'none';
        divandamento[0].style.display = 'block';
        divfinalizado[0].style.display = 'none';
        divcancelar[0].style.display = 'none';
      }
      if (value == "finalizado"){
        divaberto[0].style.display = 'none';
        divandamento[0].style.display = 'none';
        divfinalizado[0].style.display = 'block';
        divcancelar[0].style.display = 'none';
      }
    }
    if (value == "cancelar"){
      divaberto[0].style.display = 'none';
      divandamento[0].style.display = 'none';
      divfinalizado[0].style.display = 'none';
      divcancelar[0].style.display = 'block';
    }
  }


//Função de busca
  var search = document.getElementById('pesquisar');
  search.addEventListener("keydown", function(event){
    if(event.key === "Enter")
    {
      searchData();
    }
  });
  
  function searchData()
  {
    window.location = 'relatorioProfi.php?search='+search.value;
  
  }

 