	<?php 

	require_once 'classes/api/Transaction.php';
	require_once 'classes/api/Connection.php';
	require_once 'classes/api/Expression.php';
	require_once 'classes/api/Criteria.php';
	require_once 'classes/api/Repository.php';
	require_once 'classes/api/Record.php';	
	require_once 'classes/api/Filter.php';	
	require_once 'classes/api/Logger.php';
	require_once 'classes/api/LoggerTXT.php';
	require_once 'classes/model/Produto.php';	

	try{ 

		Transaction::open('estoque');

		Transaction::setLogger(new LoggerTXT('tmp/log_collection_update.txt'));


		$criteria = new Criteria;
		$criteria->add(new Filter('preco_venda','<=',35));
		$criteria->add(new Filter('origem','=','N'));


		$repository = new Repository('Produto');

		$produtos = $repository->load($criteria);
		if($produtos){
			echo "Produtos <br>\n";

			foreach ($produtos as $produto) {
				# code...
				$produto->preco_venda *=1.3;
				$produto->store();
			}
		}

	
		Transaction::close();

	}catch(Exception $e){ 
		Transaction::rollback();
		print $e->getMessage();

	}