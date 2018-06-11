<?php
require_once("../includes.php");

Class Foo {
	
	function trasServicosTeste(){
		$dao = new ServicoDao();
		$result = $dao->buscaAtivos();
		echo "<p>Result: ";
		print_r($result);
		echo "<br>";
	}
	
	function trasFornecedoresTeste(){
		$dao = new FornecedorDao();
		$result = $dao->buscaAtivos();
		echo "<p>Result: ";
		print_r($result);
		echo "<br>";
	}


	function insereProdutoTeste(){
		$daoProduto = new ProdutoDao();
		$daoCategoria = new CategoriaProdutoDao();
		$daoUnidade = new UnidadeMedidaDao();
		$unidade = $daoUnidade->buscaById(2);
		$categoria = $daoCategoria->buscaById(1);
		if($categoria && $unidade){
			$produto = new Produto(7894561238905,"Tintura 8.0 Loiro Claro", 6, $unidade, $categoria, 2, ATIVO);
			if($produto){
				$result = $daoProduto->save($produto);
				echo "<br>Result: ". $result. "<br>";
			} else {
				echo "Erro no Servico!";
			}
		} else {
			echo "Erro na categoria ou Unidade de Medida !";
		}
	}

	function insereCategoriaProdutoTeste(){
		$dao = new CategoriaProdutoDao();
		$model = new CategoriaProduto(0, "Pedicure");
		$result =  $dao->save($model);
		echo "<br>Result: ". $result. "<br>";
	}

	function insereUnidadeMedidaTeste(){
		$dao = new UnidadeMedidaDao();
		$model = new UnidadeMedida(0, "Ano Luz");
		$result =  $dao->save($model);
		echo "<br>Result: ". $result. "<br>";
	}

	function insereCategoriaServicoTeste(){
		$dao = new CategoriaServicoDao();
		$model = new CategoriaServico(0, "Pedicure");
		$result =  $dao->save($model);
		echo "<br>Result: ". $result. "<br>";
	}

	function insereCargoTeste(){
		$dao = new CargoDao();
		$model = new Cargo(0, "Cabeleireira");
		$result =  $dao->save($model);
		echo "<br>Result: ". $result. "<br>";
	}

	function insereServicoTeste(){
		$daoServico = new ServicoDao();
		$daoCategoria = new CategoriaServicoDao();
		$categoria = $daoCategoria->buscaById(2);
		if($categoria){
			$servico = new Servico(0,"Progressiva", $categoria, 250, 180, ATIVO);
			if($servico){
				$result = $daoServico->save($servico);
				echo $result;
			} else {
				echo "Erro no Servico!";
			}
		} else {
			echo "Erro na categoria!";
		}
	}	

	function insereFornecedor(){
		$daoFornecedor = new FornecedorDao();
		$daoCategoria = new CategoriaProdutoDao();
		$categoria = $daoCategoria->buscaById(3);
		if($categoria){
			$fornecedor = new Fornecedor(0,"Hinode", "João Sant'Anna", "+55 (51) 9 9999-9999", $categoria, ATIVO);
			if($fornecedor){
				$result = $daoFornecedor->save($fornecedor);
				echo "<br>Result: ". $result. "<br>";
			} else {
				echo "Erro no Servico!";
			}
		} else {
			echo "Erro na categoria!";
		}	
	}

	function insereClienteTeste(){
		$dao = new ClienteDao();
		$usuario = new Usuario(1, "willow", "senha");
		$cliente = new Cliente(1, 1, "Willow", "Rocha", "+55 (51) 9 9999-9999", "Rua Orfanatrófio, 555, Porto Alegre - RS", "1997-02-19", "1234567890", "012.456.789-00", ATIVO, "UniRitter", $usuario);
		$result = $dao->save($cliente);
		echo "<br>Result: ". $result. "<br>";
	}

	function insereProfissionalTeste(){
		$dao = new ProfissionalDao();
		$daoServico = new ServicoDao();
		$daoCargo = new CargoDao();
		$cargo = $daoCargo->buscaById(2);
		$ser1 = $daoServico->buscaById(1);
		$ser2 = $daoServico->buscaById(2);
		$ser3 = $daoServico->buscaById(3);

		$servicos = array($ser1, $ser2, $ser3);

		$profissional = new Profissional(1, 2, "Karise", "Rocha", "+55 (51) 9 6666-6666", "Alguma Rua, 666, Porto Alegre - RS", "1971-09-21", "1234567890", "012.456.789-00", $cargo, ATIVO, $servicos, new Usuario(1,0,0));
		$result = $dao->save($profissional);
		echo "<br>Result: ". $result. "<br>";
	}
}

$foo = new Foo();
//$foo->insereServicoTeste();
//$foo->trasServicosTeste();
//$foo->insereUnidadeMedidaTeste();
//$foo->insereCategoriaProdutoTeste();
//$foo->insereProdutoTeste();
//$foo->insereFornecedor();
//$foo->trasFornecedoresTeste();
//$foo->insereClienteTeste();
//$foo->insereCargoTeste();
$foo->insereProfissionalTeste();

echo "Nada";







