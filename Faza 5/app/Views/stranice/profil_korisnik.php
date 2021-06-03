<div class="profil" id="profil">
  <h1>Profil korisnika</h1>

  <div class="formaprofil">
  <span class="greskaprijava"><?php if (!empty($greskaizmena)) echo $greskaizmena  ?></span>

    
<form  method="post">

      <table width="100%" cellpadding="5px">
        <tr>
          <td>Ime: </td>
          <td><?php
              echo $korisnik['ime'];

              ?></td>

        </tr>

        <tr>
          <td>Prezime: </td>
          <td><?php echo $korisnik['prezime']; ?></td>


        </tr>

        <tr>
          <td>Adresa:</td>
          <td><?php
              if (isset($rezimizmena)) echo "<input type='text' name='adresa'  value='". set_value('adresa')."' placeholder='Unesite novu adresu'  >";
              else echo $korisnik['adresa']; ?></td>
        </tr>

        <tr>
          <td>Grad:</td>
          <td><?php
              if (isset($rezimizmena)) echo "<input type='text' name='grad'  value='". set_value('grad')."' placeholder='Unesite novi grad' >";
              else echo $korisnik['grad'];
              ?></td>
        </tr>

        <tr>
          <td>Pol:</td>
          <td><?php echo $korisnik['pol']; ?></td>
        </tr>

        <tr>
          <td>Telefon:</td>
          <td><?php
              if (isset($rezimizmena)) echo "<input type='text' name='telefon'  value='". set_value('telefon')."' placeholder='Unesite novi telefon' >";
              else echo $korisnik['telefon']; ?></td>
        </tr>

        <tr>
          <td> Korisničko ime:</td>
          <td><?php echo $korisnik['korisnickoime']; ?></td>
        </tr>
        </form>

        <tr>
      
         <?php if (!isset($rezimizmena)) echo '  <form method="post" action='. site_url("Korisnik/izmena").'><td align="center"> <button class="btn btn-dark" value="Izmeni">Izmeni</button></td>   </form>';
         else echo '  <form method="post" action='. site_url("Korisnik/proveraIzmena").'><td align="center"> <button class="btn btn-dark" value="Izmeni">Sačuvaj</button></td>   </form>'
         
         ?>

  <?php if (!isset($rezimizmena)) echo '  <form method="post" action='. site_url("Korisnik/index").'><td align="left"> <button class="btn btn-dark" value="Izmeni">Nazad</button></td>   </form>';
         else echo '  <form method="post" action='. site_url("Korisnik/profil").'><td align="left"> <button class="btn btn-dark" value="Izmeni">Odustani</button></td>   </form>'
         
         ?>
     
    
    </tr>
    </table>
    
  </div>