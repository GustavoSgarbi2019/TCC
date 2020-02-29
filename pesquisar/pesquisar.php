<?php
//Incluir a conexão com banco de dados
include_once '../conexao/conexao.php';

$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

$result_user = "SELECT 
tcc.TITULO,
tcc.RESUMO, 
tcc.ARQUIVO, 
tcc.DATA_CAD,
tcc.STATUS,
cursos.NOME  AS NOME_CURSO,
autores.NOME AS NOME_AUTORES,
imagens.NOME AS IMAGENS_IDIMG
FROM tcc 
INNER JOIN cursos  ON tcc.CURSO_IDCURSO = cursos.ID_CURSOS
INNER JOIN autores ON tcc.AUTORES_IDAUTORES = autores.ID_AUTORES
INNER JOIN imagens ON tcc.IMAGENS_IDIMG = imagens.ID_IMG 
WHERE tcc.STATUS = 'A' AND TITULO LIKE '%$usuarios%' ";

$resultado_user = mysqli_query($conn, $result_user);

if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
?>
		<div class="container-fluid">
			<div class="row">
				<?php
					while ($row_usuario = mysqli_fetch_assoc($resultado_user)) {
				?>
					<div class="mt-3 col-12 col-sm-6 col-md-4">
						<div class="card " style="width: 18rem;">
							<img src="../upload/uploads/<?php echo $row_usuario['IMAGENS_IDIMG'] ?>" width="120px" height="277px" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title"><?php echo $row_usuario['TITULO'] ?></h5>
								<p class="card-text">
									<p>Curso: <?php echo $row_usuario['NOME_CURSO']. "<br/>" ?></p>		
									<p>Autores: <?php echo $row_usuario['NOME_AUTORES']. "<br/>" ?></p>		
									<p>Ano: <?php echo $row_usuario['DATA_CAD'] ?></p>
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
		

	<?php
}else{
	echo "Nenhum usuário encontrado ...";
}
?>
