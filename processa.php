<?php 

//banco de dados
$servidor = '127.0.0.1:3306';
$usuario = 'root';
$senha = '';
$base = 'agendaajax';

$conexao = new mysqli($servidor, $usuario, $senha, $base) or die("Erro na conexão");


// $servidor = 'mysql2.webcartoriosobradinho.com.br';
// $usuario = 'webcartoriosobr';
// $senha = 'Shakkahou-23';
// $base = 'webcartoriosobradinho';

// $conexao = new mysqli($servidor, $usuario, $senha, $base) or die("Erro na conexão");

 //Formatar data
 function data($data){
    return date("d/m/Y", strtotime($data));
    }

if(isset($_GET['buscanome'])){

	// busca
	$nome = $_GET['buscanome'];
	
	if(empty($nome)){
		$query = "SELECT * FROM clientes WHERE  MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE()) ORDER BY data " ;
	}
	else{
		$query = "SELECT * FROM clientes WHERE NOME LIKE '%$nome%' ORDER BY data";
	}

	$sql = $conexao->query($query);

	$contagem = $sql->num_rows;

	sleep(1);

	if($contagem > 0){

		// exibe
		echo "<table class='table table-hover table-striped table-light'>
				<thead>
					<tr>
						
						<th>NOME</th>
						<th>TELEFONE</th>
						<th>E-MAIL</th>
						<th>SERVIÇO</th>
						<th>DATA</th>
						<th>HORA</th>
						<!--<th>APAGAR</th>-->
					</tr>
				</thead>
			<tbody>";

		while($linha = $sql->fetch_array()){

			echo '<tr>';
			
			echo '<td>'.$linha['nome'].'</td>';
			echo '<td>'.$linha['email'].'</td>';
			echo '<td>'.$linha['telefone'].'</td>';
			echo '<td>'.$linha['servico'].'</td>';
			echo '<td>'.data($linha['data']).'</td>';
			echo '<td>DEFINIDA PELO CARTÓRIO</td>';
			//echo '<td><a href="#" class="btn btn-danger" onclick="deletaUsuario('.$linha['id'].');">Deletar</a></td>';
			echo '</tr>';
		}

		echo '</tbody></table>';
	}
	else{
		echo 'Nenhum registro encontrado.';
	}
}
elseif(
	isset($_GET['nome']) and 
	isset($_GET['telefone']) and
	isset($_GET['servico']) and
	isset($_GET['data']) and 
	isset($_GET['email'])
){
	$nome = $_GET['nome'];
	$telefone = $_GET['telefone'];
	$servico = $_GET['servico'];
	$data = $_GET['data'];
	$email = $_GET['email'];

	$query = "INSERT INTO clientes(nome, telefone, servico, email, data) VALUES('$nome', '$telefone', '$servico', '$email','$data')";
	sleep(1);

	$sql = $conexao->query($query);
	
	echo "<span class='btn btn-success btn-block'>Agendamendo realizado com Sucesso! </br> Aguarde a ligação do cartório para confirmação do seu agendamento.</span>";
	
}
elseif(isset($_GET['deleta'])){
	$id = $_GET['deleta'];
	$query = "DELETE FROM ALUNOS WHERE ID = '$id'";
	sleep(1);

	$sql = $conexao->query($query);
	echo "<span class='btn btn-alert btn-block'>Deletado com sucesso</span>";
}
else{
	echo "<span class='btn btn-danger btn-block'>Um erro ocorreu. Por favor, preencha todos os campos</span>";
}

