<div class="profil" id="profil">
    <h1>Profil korisnika</h1>

    <div class="formaprofil">

    <form method="post" action= "<?= site_url('Korisnik/ispisProfila')?>" >

    <table width="100%" cellpadding="5px">
    <tr>
      <td>Ime i prezime:</td>
      <td colspan="2"><div class="ime"></div></td>

    </tr>
     <tr>
     <td>Adresa:</td>
    <td colspan="2"><div class="adresa"></div></td>
     </tr>
     <tr>
     <td>Grad:</td>
     <td colspan="2"><div class="grad"></div> </td>
     </tr>
     <tr>
     <td>Pol:</td>
     <td colspan="2"><div class="pol"></div></td>
     </tr>
        <tr>
     <td>Telefon:</td>
     <td colspan="2"><div class="telefon"></div></td>
     </tr>
       <tr>
     <td> Korisničko ime:</td>
     <td colspan="2"><div class="korisnicko"></div></td>
       </tr>
    
    <tr>
    <td align="center"> <button class="btn btn-dark" value="Izmeni">Izmeni</button></td>
    <td align="center"> <button class="btn btn-dark" value="Nazad">Nazad</button></td>
    </tr>
    </table>






























</div>