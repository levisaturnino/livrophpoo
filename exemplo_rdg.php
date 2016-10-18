<?php

	require_once 'classes/rdg/ProdutoGateway.php';

	try{ 

		$conn = new PDO('sqlite:' . __DIR__ . '/database/estoque.db');

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		ProdutoGateway::setConnection($conn);

		$produtos = ProdutoGateway::all();

		//print_r($produtos);

		foreach($produtos as $produto){ 

			$produto->delete();

		}

		$p1 = new ProdutoGateway;

	$p1->descricao = "Vindo Brasileiro Tinto Merlot";
	$p1->estoque   = 10;
	$p1->preco_custo = 12;
	$p1->preco_venda = 18;
	$p1->codigo_barras = '13523453234234';
	$p1->data_cadastro = date('Y-m-d');
	$p1->origem = 'N';
	$p1->save();

	$p2 = new ProdutoGateway;
	$p2->descricao = "Vindo Importado Tinto Carmenere";
	$p2->estoque   = 10;
	$p2->preco_custo = 18;
	$p2->preco_venda = 29;
	$p2->codigo_barras = '734550345423423';
	$p2->data_cadastro = date('Y-m-d');
	$p2->origem = 'I';
	$p2->save();

	$p3 = ProdutoGateway::find(1);

	$p3->estoque +=32;
	$p3->save();






	}catch(Exception $e){

		$e->getMessage();
	}