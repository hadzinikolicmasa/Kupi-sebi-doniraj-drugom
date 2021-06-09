<?php
    /**
     * 
     * @author Nina Savkic 18/0692
     */
?>

<form method='post' action="<?= site_url("$controller/azuriranje_licitacije") ?>" >
   <div class="licitacije">
  <span class="greskaprijava" style="margin-left:100px"> <?php if(isset($poruka))echo $poruka;?></span>
      <table class="table table-striped tabelakor">
         <tr>
            <th>Broj licitacije</th>
            <th>Traje do</th>
            <th>Trenutna cena</th>
            <th>Licitatori</th>
            <th>Uplaceno</th>
            <th>Obrisi</th>
            <th>Reaktiviraj</th>
            <th>Prosledi</th>
         </tr>

         <?php
            $i=0;
            foreach($licitacije as $licitacija)
            {

            echo "
            <tr>
            <td>{$licitacija['idLicitacija']}</td>
            <td>{$licitacija['trajanje']}</td>
            <td>{$trenutnecene[$i]['Cena']}</td>";
           if($trenutnecene[$i]['Korisnik_idKorisnik']!=null)echo " <td>Da</td>";
           else echo "<td>Ne</td>";

          
            echo "
            <td>{$licitacija['uplaceno']}</td>
            <td><input type='radio' name='Opcija' value='brisanje'>&nbsp;&nbsp;Obriši</td>
            <td><input type='radio' name='Opcija' value='reaktivacija'>&nbsp;&nbsp;Reaktiviraj</td>
            <td><button class='btn btn-light ' name='dugme'value='". $licitacija['idLicitacija'] ."'>Azuriraj</button> </td>
           
            </tr>";
             $i++;
            }

         ?>
      </table>
   </div>
</form>