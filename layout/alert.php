<?php

if(isset($_GET['alert']) || isset($_SESSION['alert']) != NULL){

	if(isset($_GET['alert']) != NULL){

		$value = $_GET['alert'];
	}else{
		$value = $_SESSION['alert'];
	}

echo '<div class="box-body">';
	switch ($value) {
		case '0':
			echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Error! Operação não efetuada tente novamente.</h4>
                </div>';
			break;
			
		case '1':
			echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Operação realizada com sucesso!</h4>
                
              </div>';
			break;

		case '2':
			echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Error! Cliente já cadastrado.</h4>
                </div>';
			break;
		
		}//switch
	echo'</div>';

	unset($_GET['alert'], $_SESSION['alert']);
}