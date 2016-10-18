<?php

	require_once 'classes/ar/Produto.php';
	require_once 'classes/api/Connection.php';


	try{ 

		$conn = Connection::open('estoque');
		Produto::setConnection($conn);

	$p1= new Produto;

	$p1->descricao = "Café torrado e moido brasileiro";
	$p1->estoque   = 100;
	$p1->preco_custo = 4;
	$p1->preco_venda = 7;
	$p1->codigo_barras = '349630453930455';
	$p1->data_cadastro = date('Y-m-d');
	$p1->origem = 'N';
	$p1->save();


	}catch(Exception $e){ 

		print $e->getMessage();
	}