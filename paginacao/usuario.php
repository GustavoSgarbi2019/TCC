<?php
session_start();
if(!empty($_SESSION['ID_USUARIO'])){
	echo "Olá ".$_SESSION['NOME'].", Bem vindo <br>";
	echo "<a href='./login/sair.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
	header("Location: ./login/login.php");	
}
?>


<?php
include_once "../conexao/conexao.php";

$ID_USUARIO = $_SESSION['ID_USUARIO'];

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados

$result_usuario = "SELECT 
tcc.TITULO,
tcc.RESUMO, 
tcc.ARQUIVO, 
tcc.DATA_CAD, 
tcc.MELHORIAS,
cursos.NOME  AS NOME_CURSO,
autores.NOME AS NOME_AUTORES,
imagens.NOME AS IMAGENS_IDIMG

from tcc
INNER JOIN cursos  ON tcc.CURSO_IDCURSO = cursos.ID_CURSOS
INNER JOIN autores ON tcc.AUTORES_IDAUTORES = autores.ID_AUTORES
INNER JOIN imagens ON tcc.IMAGENS_IDIMG = imagens.ID_IMG 
WHERE tcc.`STATUS` = 'D' AND tcc.AUTORES_IDAUTORES = 18
ORDER BY tcc.TITULO DESC LIMIT $inicio, $qnt_result_pg";


//mudar
//$result_usuario = "SELECT * FROM tcc ORDER BY tcc.TITULO DESC LIMIT $inicio, $qnt_result_pg";
$resultado_usuario = mysqli_query($conn, $result_usuario);

//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <?php
                while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
            ?>
			<div class="mt-5 col-12 col-sm-6 col-md-4">
				<div class="card " style="width: 18rem;">
					<img src="../upload/uploads/<?php echo $row_usuario['IMAGENS_IDIMG'] ?>" width="120px" height="277px" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?php echo $row_usuario['TITULO'] ?></h5>
						<p class="card-text">
							<p>Curso: <?php echo $row_usuario['NOME_CURSO']. "<br/>" ?></p>		
							<p>Autores: <?php echo $row_usuario['NOME_AUTORES']. "<br/>" ?></p>		
							<p>Ano: <?php echo $row_usuario['DATA_CAD'] ?></p>
							<p>Melhorias: <?php echo $row_usuario['MELHORIAS'] ?></p>
						</p>
						
						<a href="../<?php echo $row_usuario['ARQUIVO'] ?>"> PDF</a>
					</div>
				</div>  
			</div>


            <?php
                }
            ?>
        </div>
	</div>
	
	<br>
    
    
    <?php

	//Paginação - Somar a quantidade de usuários
	$result_pg = "SELECT COUNT(tcc.ID_TCC) AS num_result FROM tcc";
	$resultado_pg = mysqli_query($conn, $result_pg);
	$row_pg = mysqli_fetch_assoc($resultado_pg);

	//Quantidade de pagina
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

	//Limitar os link antes depois
	$max_links = 2;

	echo '<nav aria-label="paginacao">';
	echo '<ul class="pagination">';
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_usuario(1, $qnt_result_pg)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if($pag_ant >= 1){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_usuario($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
		}
	}
	echo '<li class="page-item active">';
	echo '<span class="page-link">';
	echo "$pagina";
	echo '</span>';
	echo '</li>';

	for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
		if($pag_dep <= $quantidade_pg){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_usuario($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';

}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
