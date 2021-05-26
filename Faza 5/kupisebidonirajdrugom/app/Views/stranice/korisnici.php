<form action="<?php  echo site_url("$controller/brisi"); ?>" >
<div class="korisnici">
<table  class="table table-striped table-dark tabelakor">
<tr>
<td>Ime</td>
<td>Prezime</td>
<td>Adresa</td>
<td>Grad</td>
<td>Telefon</td>
<td>Korisničko ime</td>
<td>Ocena</td>
<td>Obriši</td>
</tr>

<?php

foreach($korisnici as $korisnik){
   $ocena=0;
   $count=0;
   
   foreach($recenzije as $recenzija){
if($recenzija['Korisnik_idKorisnik']==$korisnik['idKorisnik']){$ocena+=$recenzija['Ocena'];$count++;}
   }
   $avg=0;
   if($count!=0)$avg=$ocena/$count;

   echo"<tr>
   <td>{$korisnik['ime']}</td>
   <td>{$korisnik['prezime']}</td>
   <td>{$korisnik['adresa']}</td>
   <td>{$korisnik['grad']}</td>
   <td>{$korisnik['telefon']}</td>
   <td>{$korisnik['korisnickoime']}</td>
   <td>{$avg}</td>
   <td><button class='btn btn-light '>".anchor("$controller/brisi/{$korisnik['idKorisnik']}",'Obriši')."</button> </td>
   </tr>";
   
}

?>
</table>
</div>
</form>

