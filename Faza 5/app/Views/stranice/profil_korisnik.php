<<<<<<< HEAD
<div class="profil" id="profil">
  <h1>Profil korisnika</h1>

  <div class="formaprofil">

    <form method="post">
=======

<?php
    /**
     * 
     * @author Nadja Milojkovic 18/0269
     */
?>
<div class="profil" id="profil">
  <h1>Profil korisnika</h1>

  <div class="formaprofil" >
    <span class="greskaprijava"><?php if (!empty($greskaizmena)) echo $greskaizmena  ?></span>


    <form method="post" action="<?= site_url("$controller/proveraIzmena") ?>">
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01

      <table width="100%" cellpadding="5px" >
        <tr>
          <td>Ime: </td>
<<<<<<< HEAD
          <td><?php echo $korisnik['ime']; ?></td>
=======
          <td><?php
              echo $korisnik['ime'];

              ?></td>
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01

        </tr>

        <tr>
          <td>Prezime: </td>
          <td><?php echo $korisnik['prezime']; ?></td>


        </tr>

        <tr>
          <td>Adresa:</td>
<<<<<<< HEAD
          <td><?php echo $korisnik['adresa']; ?></td>
=======
          <td><?php 
          if (isset($rezimizmena)) echo "<input type='text' name='adresa'  value='" . set_value('adresa') . "' placeholder='Unesite novu adresu' >";
          else echo $korisnik['adresa'];
          ?></td>
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01
        </tr>

        <tr>
          <td>Grad:</td>
<<<<<<< HEAD
          <td><?php echo $korisnik['grad']; ?></td>
=======
          <td><?php
              if (isset($rezimizmena)) echo "<input type='text' name='grad'  value='" . set_value('grad') . "' placeholder='Unesite novi grad' >";
              else echo $korisnik['grad'];
              ?></td>
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01
        </tr>

        <tr>
          <td>Pol:</td>
          <td><?php echo $korisnik['pol']; ?></td>
        </tr>

        <tr>
          <td>Telefon:</td>
<<<<<<< HEAD
          <td><?php echo $korisnik['telefon']; ?></td>
=======
          <td><?php
              if (isset($rezimizmena)) echo "<input type='text' name='telefon'  value='" . set_value('telefon') . "' placeholder='Unesite novi telefon' >";
              else echo $korisnik['telefon']; ?></td>
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01
        </tr>

        <tr>
          <td> Korisničko ime:</td>
          <td><?php echo $korisnik['korisnickoime']; ?></td>
        </tr>
<<<<<<< HEAD

        <tr>
          <td align="center"> <button class="btn btn-dark" value="Izmeni">Izmeni</button></td>
    </form>
    <form action= "<?= site_url('Korisnik/index')?>">
      <td align="center"> <button class="btn btn-dark" value="Nazad">Nazad</button></td>
    </form>
    </tr>
    </table>

  </div>
=======
       

    <tr>

    <?php if (!isset($rezimizmena)) echo '<td align="center"> <button class="btn btn-dark" value="Izmeni">' . anchor("$controller/izmena", 'Izmeni') . '</button></td>  ';
      else echo '  <form method="post" action=' . site_url("Korisnik/proveraIzmena") . '><td align="center"> <button class="btn btn-dark" value="Izmeni">Sačuvaj</button></td>   </form>'

      ?>
 </form>

      <?php if (!isset($rezimizmena)) echo ' <td align="left"> <button class="btn btn-dark" value="Izmeni">'.  anchor("Korisnik/index", 'Nazad') .'</button></td> ';
      else echo '  <form method="post" action=' . site_url("Korisnik/profil") . '><td align="left"> <button class="btn btn-dark" value="Izmeni">Odustani</button></td>   </form>'

      ?>


    </tr>
    </table>

  </div>

  
  
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01
