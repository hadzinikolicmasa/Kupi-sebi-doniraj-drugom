<form method='post'>
   <div class="licitacije">
      <table class="table table-striped tabelakor">
         <tr>
            <th>Broj licitacije</th>
            <th>Zavrseno</th>
            <th>Trenutna cena</th>
            <th>Uplaceno</th>
            <th>Obrisi</th>
            <th>Reaktiviraj</th>
            <th>Prosledi</th>
         </tr>

         <?php
            $i=0;
            foreach($licitacije as $licitacija)
            {
            echo "<tr>
            <td>{$licitacija['idLicitacija']}</td>";
            if($licitacija['aktivna']==1) echo "<td>Ne</td>";
            else echo "<td>Da</td>";
            echo "
            <td>{$trenutnecene[$i]['Cena']}</td>
            <td>{$licitacija['uplaceno']}</td>
            <td><input type='radio' name='Opcija' value='brisanje'>&nbsp;&nbsp;Obriši</td>
            <td><input type='radio' name='Opcija' value='reaktivacija'>&nbsp;&nbsp;Reaktiviraj</td>
            <td><button class='btn btn-light '>" . anchor("$controller/azuriranje_licitacije/{$licitacija['idLicitacija']}", 'Azuriraj') . "</button> </td>
            </tr>";
             $i++;
            }

         ?>
      </table>
   </div>
</form>