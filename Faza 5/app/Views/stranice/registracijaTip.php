<div class="registracijaTip" id="registracijaTip">
<h1><b>Registracija:</b></h1>
  <div class="formaprijava">
    
    <span class="greskaprijava"><?php if (!empty($greskaRegTip)) echo $greskaRegTip  ?></span>


    <form action="<?= site_url('Gost/proveraTipa') ?>" method="post">
      <table width="100%" cellpadding="5px">


        <tr>
          <td>Korisničko ime/naziv kompanije:</td>
        </tr>

        </td>
        </tr>

        <tr>
          <td><input type="radio" name="Tip" value="tipKompanija">&nbsp;&nbsp;Kompanija</td>
        </tr>
        <tr>
          <td><input type="radio" name="Tip" value="tipKorisnik">&nbsp;&nbsp;Korisnik</td>
        </tr>



        <tr>
          <td align="center"><button class="btn btn-dark" type="submit">Dalje</button></td>
        </tr>

      </table>
    </form>

  </div>
  <div class="row">
    <div class="col" height="400px"> &nbsp;</div>
  </div>
</div>