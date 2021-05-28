


<div class="regKorisnik" id="regKorisnik">
    <div class="forma">
      <h1>Registracija korisnika</h1>
      <span class="greskaRegKor" ><?php if(!empty($greskaRegKor))echo $greskaRegKor  ?></span> 

      
      <form action= "<?= site_url('Gost/proveraRegKor')?>" method="post">
      
                <table width="70%"  align="center">
                    <tr>
                    <td align="center" colspan="2" >Pol:</td>
                    </tr>
                    <tr>
                    <td ><input type="radio" name="pol" value="<?=set_value('musko')?>" >Muško</td>
                    <td><input type="radio" name="pol" value="<?=set_value('zensko')?>" >Žensko</td>
                    </tr>

                    <tr>
                        <td > Ime i prezime: </td>
                        <td> Adresa: </td>
                    </tr>
                    <tr>
                    <td > <input type="text" name="imePrez" value="<?=set_value('imePrezime')?>"> </td>
                    <td> <input type="text" name="adr" value="<?=set_value('adresa')?>"> </td>
                    </tr>

                    <tr><td >Telefon:</td><td>Grad:</td></tr>
                    <tr>
                    <td> <input type="text" name="fon" value="<?=set_value('telefon')?>"> </td>
                    <td> <input type="text" name="grad" value="<?=set_value('grad')?>"> </td>
                    </tr>

                    <tr>
                        <td>Korisničko ime:</td><td>Lozinka:</td>
                    </tr>

                    <tr>
                        <td><input type="text"name="korime" value="<?=set_value('korisnickoIme')?>">
                        <td><input type="password"name="lozinkaprijava" value="<?=set_value('lozinkaprijava')?>" placeholder="Unesite lozinku"></td>
                    </tr>

                        
                    <tr>
                        <td align="center" colspan="2" ><button class="btn btn-dark" type="submit">Prijavi se</button></td>
                    </tr>

                </table>
            
        
    
        </form>

    </div>
  </div>

  