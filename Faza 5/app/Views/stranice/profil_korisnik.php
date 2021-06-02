<div class="profil" id="profil">
  <h1>Profil korisnika</h1>

  <div class="formaprofil">

    <form method="post">

      <table width="100%" cellpadding="5px" >
        <tr>
          <td>Ime: </td>
          <td><?php echo $korisnik['ime']; ?></td>

        </tr>

        <tr>
          <td>Prezime: </td>
          <td><?php echo $korisnik['prezime']; ?></td>
        </tr>

        <tr>
          <td>Adresa:</td>
          <td><?php echo $korisnik['adresa']; ?></td>
        </tr>

        <tr>
          <td>Grad:</td>
          <td><?php echo $korisnik['grad']; ?></td>
        </tr>

        <tr>
          <td>Pol:</td>
          <td><?php echo $korisnik['pol']; ?></td>
        </tr>

        <tr>
          <td>Telefon:</td>
          <td><?php echo $korisnik['telefon']; ?></td>
        </tr>

        <tr>
          <td> Korisničko ime:</td>
          <td><?php echo $korisnik['korisnickoime']; ?></td>
        </tr>

        <tr>
          <td align="center"> <button class="btn btn-dark" value="Izmeni">Izmeni</button></td>
    </form>
    <form action= "<?= site_url('Korisnik/index')?>">
      <td align="center"> <button class="btn btn-dark" value="Nazad">Nazad</button></td>
    </form>
    </tr>
    </table>

  </div>