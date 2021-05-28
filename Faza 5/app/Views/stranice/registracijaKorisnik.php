


<div class="regKorisnik" id="regKorisnik">
    <div class="forma">
      <h1>Registracija korisnika</h1>
      <span class="greskaprijava" ><?php if(isset($validation)) echo $validation->listErrors() ?></span> 

      
      <form action= "<?= site_url('Gost/proveraRegKor')?>" method="post">
      
                <table class="masinaUplata" width="70%"  align="center">
                    <tr>
                    <td>Pol:</td><td>Ime:</td>
                    </tr>
                    <tr>
                    <td align="justify"><input type="radio" name="pol" value="musko" >Muško &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="pol" value="zensko" >&nbsp;&nbsp;Žensko</td>
                    <td><input type="text" name="ime" value="<?=set_value('ime')?>"> </td></td>
                    </tr>

                    <tr>
                        <td >Prezime: </td>
                        <td> Adresa: </td>
                    </tr>
                    <tr>
                    <td > <input type="text" name="prez" value="<?=set_value('prez')?>"> </td>
                    <td> <input type="text" name="adr" value="<?=set_value('adr')?>"> </td>
                    </tr>

                    <tr><td >Telefon:</td><td>Grad:</td></tr>
                    <tr>
                    <td> <input type="text" name="fon" value="<?=set_value('fon')?>"> </td>
                    <td> <input type="text" name="grad" value="<?=set_value('grad')?>"> </td>
                    </tr>

                    <tr>
                        <td>Korisničko ime:</td><td>Lozinka:</td>
                    </tr>

                    <tr>
                        <td><input type="text"name="korime" value="<?=set_value('korime')?>">
                        <td><input type="password"name="lozinkareg" value="<?=set_value('lozinkareg')?>" placeholder="Unesite lozinku"></td>
                    </tr>

                        
                    <tr>
                        <td align="center" colspan="2"><button class="btn btn-dark" style="margin-top:25px" type="submit" >Registruj se</button></td>
                    </tr>

                </table>
            
        
    
        </form>

    </div>
  </div>

  