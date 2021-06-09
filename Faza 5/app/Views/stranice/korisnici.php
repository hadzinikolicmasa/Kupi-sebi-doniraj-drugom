
<?php
    /**
     * @author Masa Hadzi-Nikolic  18/0271
     *
     */
?>
<form method='post' action="<?= site_url("$controller/brisi") ?>" >

   <div class="korisnici">
      <table class="table table-striped tabelakor">
         <tr>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Adresa</th>
            <th>Grad</th>
            <th>Telefon</th>
            <th>Korisničko ime</th>
            <th>Ocena</th>
            <th>Obriši</th>
         </tr>

         <?php

         foreach ($korisnici as $korisnik) {
            $ocena = 0;
            $count = 0;

            foreach ($recenzije as $recenzija) {
               if ($recenzija['Korisnik_idKorisnik'] == $korisnik['idKorisnik']) {
                  $ocena += $recenzija['Ocena'];
                  $count++;
               }
            }
            $avg = 0;
            if ($count != 0) $avg = $ocena / $count;

            echo "<tr>
   <td>{$korisnik['ime']}</td>
   <td>{$korisnik['prezime']}</td>
   <td>{$korisnik['adresa']}</td>
   <td>{$korisnik['grad']}</td>
   <td>{$korisnik['telefon']}</td>
   <td>{$korisnik['korisnickoime']}</td>
   <td>{$avg}</td>
   <td><button name='dugme' value=".$korisnik['idKorisnik']." class='btn btn-light '>Obriši</button> 
   
   </td>
   </tr>";
         }

         ?>
      </table>
   </div>
</form>