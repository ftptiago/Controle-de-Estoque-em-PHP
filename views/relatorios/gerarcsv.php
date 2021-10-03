<?php
require_once '../../App/auth.php';
require_once '../../App/Models/relatorios.class.php';

header( 'Content-type: application/csv' );   
   header( 'Content-Disposition: attachment; filename=file.csv' );   
   header( 'Content-Transfer-Encoding: binary' );
   header( 'Pragma: no-cache');

   $relatorio = new Relatorio(); 
   $out = fopen( 'php://output', 'w' );
    fputs($out, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
   if(isset($_POST['idproduto']) != null){
                        $idProduto = $_POST['idproduto'];
                        $rows = $relatorio->qtdeItensEstoque($perm, $idProduto);
                    }else{
                      $rows = $relatorio->qtdeItensEstoque($perm);
                    }
                        
                        $rows = json_decode($rows, true);

                        $result = array('Planilha de produtos em estoque');
                        fputcsv( $out, $result);

                        $result = array('Cód.:', 'Nome', 'Qtde');
                 		fputcsv( $out, $result);

                        foreach($rows as $row){ 
                          if(isset($row['QuantItens'])!= null){

                              $qi = $row['QuantItens'];
                              $qiv = $row['QuantItensVend'];
                              $r = $qi - $qiv;
 				$result = array($row['Produto_CodRefProduto'], $row['NomeProduto'], $r);
                            fputcsv( $out, $result);  
                        }
                        
                        
                    }

                    


                    
                        unset($_POST);

   fclose( $out );
