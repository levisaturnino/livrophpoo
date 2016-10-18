<?php

	require_once 'classes/ar/ProdutoComTransacaoELog.php';
	require_once 'classes/api/Connection.php';
	require_once 'classes/api/Transaction.php';
	require_once 'classes/api/Logger.php';
	require_once 'classes/api/LoggerTXT.php';
	
	try{ 

		Transaction::open('estoque');

		Transaction::setLogger(new LoggerTXT('tmp/log.txt'));
		Transaction::log('Inserindo produto novo');

		$p1 = new Produto;

	$p1->descricao = "Vindo Brasileiro Tinto Merlot";
	$p1->estoque   = 10;
	$p1->preco_custo = 12;
	$p1->preco_venda = 18;
	$p1->codigo_barras = '13523453234234';
	$p1->data_cadastro = date('Y-m-d');
	$p1->origem = 'N';
	$p1->save();

	//throw new Exception('Exceção proposital');
	
	$p2 = new Produto;
	$p2->descricao = "Vindo Importado Tinto Carmenere";
	$p2->estoque   = 10;
	$p2->preco_custo = 18;
	$p2->preco_venda = 29;
	$p2->codigo_barras = '734550345423423';
	$p2->data_cadastro = date('Y-m-d');
	$p2->origem = 'I';
	$p2->save();

	Transaction::close();

	}catch(Exception $e){ 
		Transaction::rollback();
		print $e->getMessage();

	}