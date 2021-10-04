<?php
require_once '../../App/auth.php';
require_once '../../App/Models/relatorios.class.php';

   header( 'Content-type: application/csv' );   
   header( 'Content-Disposition: attachment; filename=relatorio.csv' );   
   header( 'Content-Transfer-Encoding: binary' );
   header( 'Pragma: no-cache');

   $relatorio = new Relatorio(); 
   $out = fopen( 'php://output', 'w' );
    fputs($out, $result = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
    
   if(isset($_POST['idproduto']) != null && isset($_POST['statusR'])!= null){
        $idProduto = $_POST['idproduto'];
        $status = $_POST['statusR'];
        $rows = $relatorio->qtdeItensEstoque($perm, $status, $idProduto);

    }elseif(isset($_POST['statusR'])!= null){
        $idProduto = null;
        $status = $_POST['statusR'];
        $rows = $relatorio->qtdeItensEstoque($perm, $status, $idProduto);
    }else{
        $rows = $relatorio->qtdeItensEstoque($perm);
    }
    
                        
                        $rows = json_decode($rows, true);

                        $result = array('Planilha de produtos em estoque','','','','');
                        fputcsv( $out, $result);

                        $result = array('Cód.:', 'Nome', 'Qtde comprada', 'Qtde vendida' ,'Qtde em estoque');
                 		fputcsv( $out, $result);

                        foreach($rows as $row){ 
                          if(isset($row['QuantItens'])!= null){

                              $qi = $row['QuantItens'];
                              $qiv = $row['QuantItensVend'];
                              $r = $qi - $qiv;
 				$result = array($row['Produto_CodRefProduto'], $row['NomeProduto'], $row['QuantItens'], $row['QuantItensVend'], $r);
                            fputcsv( $out, $result);  
                        }
                        
                        
                    }

                    


                    
                        unset($_POST);

   fclose( $out );
