<form>
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

         foreach ($licitacije as $licitacija)
          {

            if($licitacija['aktivna']==0) // && //($licitacija[]) da li je uplaceno????
            {
                $licitacija['aktivna']=1;
            }
            
      
            //!!!!!!!!!!!!!!!!!!!!!
            echo "<tr>
            <td>{$licitacija['idLicitacija']}</td>
            <td>{$licitacija['aktivna']}</td>
            ??<td>{$licitacija['']}</td> trenutna cena
            ??<td>{$licitacija['']}</td> uplaceno
            <td><input type="radio" name="Opcija" value="brisanje">&nbsp;&nbsp;Obriši</td>
            <td><input type="radio" name="Opcija" value="reaktivacija">&nbsp;&nbsp;Reaktiviraj</td>
            ???????????????<td><button class='btn btn-light '>" . anchor("$controller/brisi_licitaciju/{$licitacija['idLicitacija']}", 'Azuriraj') . "</button> </td>
             </tr>";
         }

         ?>
      </table>
   </div>
</form>

