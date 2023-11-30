
document.getElementById("formulariocliente").style.display='none';
document.getElementById("formularioprof").style.display='none';
function mostrarformulario(elemento_mostra, elemento_esconde){
    document.getElementById("formulariocliente").style.display='none';
    document.getElementById("formularioprof").style.display='none';
    var display_mostra = document.getElementById(elemento_mostra).style.display;
      if(display_mostra == "none"){
          document.getElementById(elemento_mostra).style.display= 'block';
          document.getElementById(elemento_esconde).style.display = 'none';
      }else{
        document.getElementById(elemento_mostra).style.display= 'none';
        document.getElementById(elemento_esconde).style.display= 'block';
      }
  }

  function selected(value){
    var divpai = document.getElementsByClassName('pai');
    var divelericista = document.getElementsByClassName('Eletricista');
    var divpedreiro = document.getElementsByClassName('Pedreiro');
    var divpintor = document.getElementsByClassName('Pintor');
      if(value == "Selecionar"){
        divpai[0].style.display = 'block';
        divelericista[0].style.display = 'none';
        divpedreiro[0].style.display = 'none';
        divpintor[0].style.display = 'none';
    } else{
      if (value == "Eletricista"){
        divelericista[0].style.display = 'block';
        divpedreiro[0].style.display = 'none';
        divpintor[0].style.display = 'none';
      }
      if (value == "Pedreiro"){
        divelericista[0].style.display = 'none';
        divpedreiro[0].style.display = 'block';
        divpintor[0].style.display = 'none';
      }
      if (value == "Pintor"){
        divelericista[0].style.display = 'none';
        divpedreiro[0].style.display = 'none';
        divpintor[0].style.display = 'block';
      }
    }
    
    }