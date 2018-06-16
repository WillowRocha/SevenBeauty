<?php
require_once("../includes.php");
class RegistroProdutoService {
	
	private $produto;

	function __construct(){
		
	}

	function novo_atualiza($codigoBarras, $nome, $quantidade, $unidadeMedida, $categoria, $estoqueMinimo){
		$this->produto = new Produto($codigoBarras, $nome, $quantidade, $unidadeMedida, $categoria, $estoqueMinimo, ATIVO);
	}

	function salvar(){
		$dao = new ProdutoDao();
		return $dao->save($this->produto);
	}

	function existe($codigoBarras){
		$dao = new ProdutoDao();
		if($dao->buscaIdPorPropriedade("codigo_barras", $codigoBarras))
			return VERDADEIRO;
		return FALSO;
	}
}

$edited = (isset($_GET['product_id'])) ? $_GET['product_id'] : 0;
$codigoBarras = 	$_POST['barcode'];
$nome = 			$_POST['nome'];
$quantidade = 		$_POST['quantidade'];
$id_unidadeMedida = 	$_POST['medida'];
$id_categoria = 		$_POST['categoria'];
$estoqueMinimo = 	$_POST['min_qtd'];

$page = REGISTER_PRODUCT;

if($codigoBarras && $nome && $quantidade && $id_unidadeMedida && $id_categoria && $estoqueMinimo){
	$class = new RegistroProdutoService();

	$page = "";
	$get = "";

	$dao = new CategoriaProdutoDao();
	$categoria = $dao->buscaById($id_categoria);
	$dao = new UnidadeMedidaDao();
	$unidadeMedida = $dao->buscaById($id_unidadeMedida);

	$class->novo_atualiza($codigoBarras, $nome, $quantidade, $unidadeMedida, $categoria, $estoqueMinimo);

	if($edited){
		$page = EDIT_PRODUCT;
		$status = $class->salvar();
	} else {
		$page = REGISTER_PRODUCT;
		if($class->existe($codigoBarras)){
			$status = 0;
		} else {
			$status = $class->salvar();
		}
	}
} else {
	$status = 0;
}

if($status > 0){
	$get = "?success=1";
} else {
	$get = "?success=0";
}
header("location: ".ROUTE.$page.$get);