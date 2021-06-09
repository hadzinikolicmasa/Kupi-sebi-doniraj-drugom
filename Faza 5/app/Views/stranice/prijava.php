<<<<<<< HEAD
<div class="prijava" id="prijava">
<h1><b>Prijava</b></h1>
  <div class="formaprijava">
    
    <span class="greskaprijava"><?php if (!empty($greskaprijava)) echo $greskaprijava  ?></span>
=======
<?php
    /**
     * 
     * @author Masa Hadzi-Nikolic 18/0271
     * @coauthor Milanka Labovic 18/0689
     */
?>
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01

<div class="prijava" id="prijava">
<h1><b>Prijava</b></h1>
  <div class="formaprijava">
    
    <span class="greskaprijava"><?php if (!empty($greskaprijava)) echo $greskaprijava  ?></span>

    <form action="<?= site_url('Gost/proveraprijave') ?>" method="post">
      <table width="100%" cellpadding="5px">

<<<<<<< HEAD

        <tr>
          <td>Korisničko ime/naziv kompanije:</td>
        </tr>

        </td>
        </tr>

        <tr>
          <td><input type="text" name="korisnickoime" value="<?= set_value('korisnickoime') ?>" placeholder="Unesite korisničko ime"></td>
        </tr>

        <tr>
          <td>Lozinka:</td>
        </tr>

        <tr>
          <td><input type="password" name="lozinkaprijava" value="<?= set_value('lozinkaprijava') ?>" placeholder="Unesite lozinku"></td>
        </tr>


=======
    <form action="<?= site_url('Gost/proveraprijave') ?>" method="post">
      <table width="100%" cellpadding="5px">


        <tr>
          <td>Korisničko ime/naziv kompanije:</td>
        </tr>

        </td>
        </tr>

        <tr>
          <td><input type="text" name="korisnickoime" value="<?= set_value('korisnickoime') ?>" placeholder="Unesite korisničko ime"></td>
        </tr>

        <tr>
          <td>Lozinka:</td>
        </tr>

        <tr>
          <td><input type="password" name="lozinkaprijava" value="<?= set_value('lozinkaprijava') ?>" placeholder="Unesite lozinku"></td>
        </tr>


>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01
        <tr>
          <td align="center"><button class="btn btn-dark" type="submit">Prijavi se</button></td>
        </tr>

      </table>
    </form>

  </div>
</div>