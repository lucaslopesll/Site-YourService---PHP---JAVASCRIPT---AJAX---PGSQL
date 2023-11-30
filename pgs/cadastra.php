<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../css/cadastra.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="box">
  <a href="../index.php"><img id="logo" src="../img/photo2.png"></a>
    <fieldset>
      <legend><b>Cadastro</b></legend>
      <br><br>
      <button onclick="mostrarformulario('formulariocliente', 'formularioprof')" id="botao">Cliente</button>
      <br><br>
      <button onclick="mostrarformulario('formularioprof', 'formulariocliente')" id="botao">Prestador de
        Serviço</button>
      <div id="mostrar_cliente">
        <form method="post" action="../action/cadastraCliente.php" id="formulariocliente">
          <br><br>
          <div class="inputBox">
            <input type="text" name="nome" class="inputUsuario" required>
            <label for="nome" class="labelInput">Nome: </label>
          </div>
          <br><br>
          <div class="inputBox">
            <input type="text" name="endereco" class="inputUsuario" required>
            <label for="endereco" class="labelInput">CPF: </label>
          </div>
          <br><br>
          <div class="inputBox">
            <label for="datanasc">Data de Nascimento: </label>
            <input type="date" name="datanasc" class="inputUsuario" required>
          </div>
          <br><br>
          <div class="inputBox">
            <input type="text" name="email" class="inputUsuario" required>
            <label for="email" class="labelInput">Email: </label>
          </div>
          <br><br>
          <div class="inputBox">
            <input type="text" name="telefone" class="inputUsuario" required>
            <label for="telefone" class="labelInput">Telefone: </label>
          </div>
          <br>
          <br>
          <div class="inputBox">
            <input type="password" name="senha" class="inputUsuario" required>
            <label for="senha" class="labelInput">Senha: </label>
          </div>
          <br><br>
          <input type="submit" value="Enviar" id="botao" onclick="cadastraCliente()" required>
        </form>
      </div>
      <div id="mostrar_Motorista">
        <form method="post" action="../action/cadastraProfissional.php" id="formularioprof">
          <br><br>
          <div class="inputBox">
            <input type="text" name="nome" class="inputUsuario" required>
            <label for="nome" class="labelInput">Nome: </label>
          </div>
          <br><br>
          <div class="inputBox">
            <input type="text" name="cpf" class="inputUsuario" required>
            <label for="cpf" class="labelInput">CPF: </label>
          </div>
          <br><br>
          <div class="inputBox">
            <input type="text" name="endereco" class="inputUsuario" required>
            <label for="endereco" class="labelInput">Endereço: </label>
          </div>
          <br><br>
          <div class="inputBox">
            <label for="datanasc">Data de Nascimento: </label>
            <input type="date" name="datanasc" class="inputUsuario" required>
          </div>
          <br><br>
          <div class="inputBox">
            <input type="text" name="email" class="inputUsuario" required>
            <label for="email" class="labelInput">Email: </label>
          </div>
          <br><br>
          <div class="inputBox">
            <input type="text" name="telefone" class="inputUsuario" required>
            <label for="telefone" class="labelInput">Telefone: </label>
          </div>
          <br><br>
          <div class="inputBox">
            <label for="profissao">Selecione a sua Profissão: </label>
            <select  onclick="selected(value)" name="profissao" id="select">
              <option value="Selecionar" selected>Selecionar</option>
              <option value="Eletricista">Eletricista</option>
              <option value="Pedreiro">Pedreiro</option>
              <option value="Pintor">Pintor</option>
            </select>
          </div>
          <div class="pai">
            <div class="Eletricista" style="display:none;">
              <fieldset>

                <legend id="check">Qual serviço de Eletricista está prestando?</legend>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="1E">
                  <label id="words" for="scales" >Reparos e Manutenção da Rede Elétrica
                  </label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="2E">
                  <label for="horns" id="words" >Troca de Fiação Elétrica</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="3E">
                  <label for="horns" id="words" >Instalação e Conserto de Chuveiro
                  </label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="4E">
                  <label for="horns" id="words" >Instalação de Tomadas</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="5E">
                  <label for="horns" id="words" >Instalação de Lâmpadas e Luminárias</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="6E">
                  <label for="horns" id="words" >Instalação de Ar Condicionado</label>
                </div>

              </fieldset>
            </div>



            <div class="Pedreiro" style="display:none;">
              <fieldset>

                <legend id="check">Qual serviço de Pedreiro está prestando?</legend>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="1P">
                  <label id="words" for="scales" >Construção de Parede</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="2P">
                  <label for="horns" id="words" >Construção de Fundação</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="3P">
                  <label for="horns" id="words" >Aplicação de Reboco</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="4P">
                  <label for="horns" id="words" >Aplicação de Massa Corrida</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="5P">
                  <label for="horns" id="words" >Demolição</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="6P">
                  <label for="horns" id="words" >Instalação de novo revestimento</label>
                </div>

              </fieldset>
            </div>


            <div class="Pintor" style="display:none;">
              <fieldset>

                <legend id="check">Qual serviço de Pintor está prestando?</legend>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="1PT">
                  <label id="words" for="scales" >Pintura de Paredes, Tetos e Telhados.
                  </label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="2PT">
                  <label for="horns" id="words" >Pintura Externa e Interna</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="3PT">
                  <label for="horns" id="words" >Pintura de Apartamentos</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="4PT">
                  <label for="horns" id="words" >Pintura de Prédios</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="5PT">
                  <label for="horns" id="words" >Pintura de Móveis</label>
                </div>
                <br>
                <div id="set">
                  <input type="checkbox" id="scales" name="servico[]" value="6PT">
                  <label for="horns" id="words" >Pintura Decorativa</label>
                </div>
              </fieldset>
            </div>

          </div>

          <br><br>
          <div class="inputBox">
            <input type="text" name="tempo" class="inputUsuario" required>
            <label for="tempo" class="labelInput">Informe o tempo de serviço: </label>
          </div>
          <br><br>
          <div class="inputBox">
            <input type="password" name="senha" class="inputUsuario" required>
            <label for="senha" class="labelInput">Senha: </label>
          </div>
          <br><br>
          <input type="submit" value="Enviar" id="botao" onclick="cadastraProfissional()" required>
        </form>
      </div>
    </fieldset>
  </div>
  <script src="../js/cadastro.js"></script>
</body>

</html>