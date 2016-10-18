<?php
require_once 'classes/tdg/ProdutoGateway.php';

	$data1 = new stdClass;

	$data1->descricao = "Vindo Brasileiro Tinto Merlot";
	$data1->estoque   = 10;
	$data1->preco_custo = 12;
	$data1->preco_venda = 18;
	$data1->codigo_barras = '13523453234234';
	$data1->data_cadastro = date('Y-m-d');
	$data1->origem = 'N';

	$data2 = new stdClass;

	$data2->descricao = "Vindo Importado Tinto Carmenere";
	$data2->estoque   = 10;
	$data2->preco_custo = 18;
	$data2->preco_venda = 29;
	$data2->codigo_barras = '734550345423423';
	$data2->data_cadastro = date('Y-m-d');
	$data2->origem = 'I';

	try{

		$conn = new PDO('sqlite:' . __DIR__ . '/database/estoque.db');

	 $conn->exec("CREATE TABLE produto (id integer PRIMARY KEY NOT NULL,
descricao text,
estoque float,
preco_custo float,
preco_venda float,
codigo_barras text,
data_cadastro date,
origem char(1));



CREATE TABLE venda ( id integer primary key not null, data_venda date);

CREATE TABLE item_venda( id integer primary key not null,
id_produto integer references produto(id),
id_venda integer references venda(id),
quantidade float,
preco float);




" 




);  
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		ProdutoGateWay::setConnection($conn);

		$gw = new ProdutoGateWay;
		$gw->save($data1);
		$gw->save($data2);


		$produto = $gw->find(1);
		$produto->estoque +=2;
		$gw->save($produto);

		foreach($gw->all(" estoque<=10") as $produto){
			print $produto->descricao . "<br>\n";
		}
	}catch(Exception $e){
		print $e->getMessage();
	}

