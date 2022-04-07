<?php
	require_once 'includes/common.php';
	require_once 'includes/database.php';

	$error = FALSE;

	// Form was submitted 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nome = $_POST['nome'];
        $email = $_POST['email'];
		$numconselho = $_POST['numconselho'];
        $uf = $_POST['uf'];
        $produto = implode(',', $_POST['checkbox']);
        $outro = $_POST['outro'];
        $solicitacao = $_POST['solicitacao'];

		// Insert user data into the database
		$sql = "INSERT INTO cadastroMain (nome, email, numconselho, uf, produto, outro, solicitacao) VALUES ('{$nome}', '{$email}', '{$numconselho}', '{$uf}', '{$produto}', '{$outro}', '{$solicitacao}')";
		if ($conn->query($sql) === TRUE) {
            session_destroy();
			header("Location:" . BASE_URL . "success.php");
			exit();
		} else {
			// Store error msg
			$error = $conn->error;
		}
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Solicitação</title>
	<link rel="stylesheet" href="css/bulma.min.css">
	<link rel="stylesheet" href="css/estilo.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@400;700;800&display=swap" rel="stylesheet">
</head>
</head>
<body>

<nav class="navbar">
  
  <img src="img/logo.png" width="9%" alt="MedInfo Bayer Brasil">

</nav>
</br></br></br>
<section style="justify-content: center;" class="form">
          
                <div class="columns is-centered">
                    <div class="column">
                        <h1 class="title has-text-centered">Para fazer sua solicitação, preencha os campos abaixo:</h1>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="field">
                                <label class="label" color="#000000" for="nome">Nome Completo:*</label>
                                <div class="control">
                                    <input id="nome" name="nome" class="input" type="text" placeholder="Seu nome" maxlength="30" required />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label" color="#000000" for="email">E-mail:*</label>
                                <div class="control">
                                    <input id="email" name="email" class="input" type="email" placeholder="Seu email" required />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label" color="#000000" size="10" for="crm">Número de Conselho:*</label>
                                <div class="control">
                                    <input id="numconeslho" name="numconselho" class="input" type="text" placeholder="Seu Número de Conselho" required />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label" color="#000000" for="crm">UF:*</label>
                                </br>
                                <select class="uf" name="uf" id="uf" required >
                                <option value="">Selecione</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>

                        <div class="field">
                                <label class="label" color="#000000" for="email">Produto:*</label>
                                <div class="control">
                        <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkAutorizo" name="checkbox[]" value="Mirena" />
                                <label class="label" style="font-size: 110%; color: #000000" for="checkAutorizo">
                                Mirena
                                </label>
                            </div>                        <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkAutorizo" name="checkbox[]" value="Kyleena" />
                                <label class="label" style="font-size: 110%; color: #000000" for="checkAutorizo">
                                Kyleena
                                </label>
                            </div>                        <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkAutorizo" name="checkbox[]" value="Natele" />
                                <label class="label" style="font-size: 110%; color: #000000" for="checkAutorizo">
                                Natele
                                </label>
                            </div>                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkAutorizo" name="checkbox[]" value=" " />
                                <label class="label" style="font-size: 110%; color: #000000" for="checkAutorizo">
                                Outro
                                <input name="outro" class="input" type="text" placeholder="Digite aqui">
                                </label>
                                </div></div></div>
                        
                                <label class="label" style="font-size: 110%; color: #000000" for="checkAutorizo">
                                Solicitação:*</br>                                </label> 
                                <textarea style="height: 100px; margin-left: -3px;" name="solicitacao"  class="input" type="text" rows="10" cols="100" wrap="hard" placeholder="Digite aqui"> </textarea>
                                </br></br>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkConfirmo" name="confirmo" required />
                                <label class="label" style="font-size: 110%; color: #000000" for="checkConfirmo">
                                     *Concordo com a Política de Privacidade.
                                </label>
                            </div>
                            <br />


                            <br />
                            <div class="field is-grouped" style="justify-content: center;">
                                <div class="control">
                                <input type="hidden" name="acao" value="enviar"/>
                                    <input value="CONFIRMAR" type="submit" class="button" style="color:#000000"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </section>

</body>
</html>

