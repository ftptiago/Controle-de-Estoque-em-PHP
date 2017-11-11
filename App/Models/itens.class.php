  <?php

  /*
   Class produtos
  */

   require_once 'connect.php';

   class Itens extends Connect
   {
   	
   	public function index($value)
   	{
   		$this->query = "SELECT * FROM `itens`,`fabricante`,`produtos` WHERE (`Fabricante_idFabricante` = `idFabricante` AND `Produto_CodRefProduto` = `CodRefProduto`) AND `itensPublic` = '$value'";
   		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

   		if($this->result){

        echo '<table class="table">
    <thead class="thead-inverse">
      <tr>
        <th>Ativo</th>
        <th>Nome Produto</th>
        <th>Fabricante</th>
        <th>Quant. Estoque</th>
        <th>Quant. Vendido</th>
        <th>V. Compra.</th>
        <th>V. Vendido</th>
        <th>Data Compra</th>
        <th>Data Vencimento</th>
        <th>Edit</th>
        <th>Public</th>
      </tr>
    </thead>
    <tbody>';

   			while ($row = mysqli_fetch_array($this->result)) {

          if($row['ItensAtivo'] == 0){ $c ='class="label-warning"'; }else{ $c =" ";}
          echo '<tr '.$c.'><th>
          <!-- drag handle -->
          <span class="handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
          </span>

          <!-- checkbox -->';
          $id = $row['idItens'];
          $Ativo = $row['ItensAtivo'];

          echo '<form class="label" name="ativ'.$id.'" action="../../App/Database/action.php" method="post">
          <input type="hidden" name="id" id="id" value="'.$id.'">
          <input type="hidden" name="status" id="status" value="'.$Ativo.'">
          <input type="hidden" name="tabela" id="tabela" value="itens">  
          <input type="checkbox" id="status" name="status" ';
          if($Ativo == 1){ echo 'checked'; } 
          echo ' value="'.$Ativo.'" onclick="this.form.submit();"></form>
          </th>
          <td>'.$row['NomeProduto'].'</td>
          <td>'.$row['NomeFabricante'].'</td>
          <td>'.$row['QuantItens'].'</td>
          <td>'.$row['QuantItensVend'].'</td>
          <td>'.$row['ValCompItens'].'</td>
          <td>'.$row['ValVendItens'].'</td>
          <td>'.$row['DataCompraItens'].'</td>
          <td>'.$row['DataVenci_Itens'].'</td>        
          
          <td>
                <a href="edititens.php?q='.$row['idItens'].'"><i class="fa fa-edit"></i></a>
          </td>
          <td>
              <!-- Button trigger modal -->
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['idItens'].'">';

                    if($row['Public'] == 0){echo '<i class="glyphicon glyphicon-remove" aria-hidden="true"></i>';}else{ echo '<i class="glyphicon glyphicon-ok" aria-hidden="true"></i>';}

                    echo '</a>


    <!-- Modal -->
  <div>
    <form id="delItens'.$row['idItens'].'" name="delItens'.$row['idItens'].'" action="../../App/Database/delItens.php" method="post" style="color:#000;">
    <div class="modal fade" id="myModal'.$row['idItens'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem serteza que deseja alterar o status deste item na sua lista.</h4>
          </div>
          <div class="modal-body">
            Código: '.$row['idItens'].' - '.$row['NomeProduto'].' - '.$row['NomeFabricante'].'
          </div>
          <input type="hidden" id="id" name="id" value="'.$row['idItens'].'">
          <div class="modal-footer">
            <button type="submit" value="Cancelar" class="btn btn-default">Não</button>
            <button type="submit" name="update" value="Cadastrar" class="btn btn-primary">Sim</button>
          </div>
        </div>
      </div>
    </div>
    </form></div>

          </td>
            </tr>';

          }
          echo '</tbody>
  </table>';
        }

      }

      public function InsertItens($QuantItens, $ValCompItens, $ValVendItens, $DataCompraItens, $DataVenci_Itens, $Produto_CodRefProduto, $Fabricante_idFabricante, $idusuario){

       $this->query = "INSERT INTO `itens`(`idItens`, `QuantItens`, `QuantItensVend`, `ValCompItens`, `ValVendItens`, `DataCompraItens`, `DataVenci_Itens`, `ItensAtivo`,`ItensPublic`, `Produto_CodRefProduto`, `Fabricante_idFabricante`, `Usuario_idUser`) VALUES (NULL, '$QuantItens', 0, '$ValCompItens', '$ValVendItens', '$DataCompraItens', '$DataVenci_Itens', 1, 1, '$Produto_CodRefProduto', '$Fabricante_idFabricante', '$idusuario')";
       if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

        header('Location: ../../views/itens/index.php?alert=1');
      }else{
        header('Location: ../../views/itens/index.php?alert=0');
      }
   	}//InsertItens

    public function editItens($value)
    {
      $this->query = "SELECT *FROM `itens` WHERE `idItens` = '$value'";
      $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

      if($row = mysqli_fetch_array($this->result)){

        $idItens = $row['idItens'];
        $QuantItens = $row['QuantItens'];
        $ValCompItens = $row['ValCompItens'];
        $ValVendItens = $row['ValVendItens'];
        $DataCompraItens= $row['DataCompraItens'];
        $DataVenci_Itens = $row['DataVenci_Itens'];
        $Produto_CodRefProduto = $row['Produto_CodRefProduto'];
        $Fabricante_idFabricante = $row['Fabricante_idFabricante'];

        return $resp = array('Itens' => ['idItens' => $idItens,
          'QuantItens'   => $QuantItens,
          'ValCompItens' => $ValCompItens,
          'ValVendItens' => $ValVendItens,
          'DataCompraItens' => $DataCompraItens,
          'DataVenci_Itens' => $DataVenci_Itens,
          'CodRefProduto' => $Produto_CodRefProduto,
          'idFabricante' => $Fabricante_idFabricante ] , );  
      }
      
    }

    public function updateItens($idItens, $QuantItens, $ValCompItens, $ValVendItens, $DataCompraItens, $DataVenci_Itens, $Produto_CodRefProduto, $Fabricante_idFabricante, $idusuario)
    {
      $this->query = "UPDATE `itens` SET 
      `QuantItens`= '$QuantItens',
      `ValCompItens`='$ValCompItens',
      `ValVendItens`='$ValVendItens',
      `DataCompraItens`='$DataCompraItens',
      `DataVenci_Itens`='$DataVenci_Itens',
      `Produto_CodRefProduto`='$Produto_CodRefProduto',
      `Fabricante_idFabricante`='$Fabricante_idFabricante',
      `Usuario_idUser`='$idusuario' 
      WHERE `idItens`= '$idItens'";

      if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

        header('Location: ../../views/itens/index.php?alert=1');
      }else{
        header('Location: ../../views/itens/index.php?alert=0');
      }

    }

    public function QuantItensVend($value, $idItens)
    { 
      $this->query = "UPDATE `itens` SET `QuantItensVend` = '$value' WHERE `idItens`= '$idItens'";
      
      if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

        header('Location: ../../views/itens/index.php?alert=1');
      }else{
        header('Location: ../../views/itens/index.php?alert=0');
      }
    }

     public function DelItens($value)
      {

        $this->query = "SELECT * FROM `itens` WHERE `idItens` = '$value'";
        $this->result = mysqli_query($this->SQL, $this->query);
        if($row = mysqli_fetch_array($this->result)){

                $id = $row['idItens'];
                $public = $row['ItensPublic'];

                if($public == 1){
                  $p = 0;
                }else{
                  $p = 1;
                }

                mysqli_query($this->SQL, "UPDATE `itens` SET `ItensPublic` = '$p' WHERE `idItens` = '$id'") or die(mysqli_error($this->SQL));
                header('Location: ../../views/itens/index.php?alert=1');
        }else{
                header('Location: ../../views/itens/index.php?alert=0');
              }
    } 

    public function Ativo($value, $id)
    {

      if($value == 0){ $v = 1; }else{ $v = 0; }

      $this->query = "UPDATE `itens` SET `ItensAtivo` = '$v' WHERE `idItens` = '$id'";
      $this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));

      header('Location: ../../views/itens/');
      

    }//ItensAtivo



  }

  $itens = new Itens;