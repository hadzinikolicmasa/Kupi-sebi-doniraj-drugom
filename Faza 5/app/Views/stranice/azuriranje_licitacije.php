<form method='post' action="<?= site_url("$controller/azuriranje_licitacije") ?>" >
   <div class="licitacije">
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
            <td><button class='btn btn-light '>Azuriraj</button> </td>
            <input type='hidden' name='id' value=".$licitacija['idLicitacija'].">
            </tr>";
             $i++;
            }

         ?>
      </table>
   </div>
</form>