<div class="recenzija" id="recenzija">
    <h1>Recenzija</h1>

    <div class="formarecenzija">

    
    <form method="post" action= "<?= site_url('Korisnik/proveraRecenzije')?>" >
    <span class="greskarecenzija" ><?php if(isset($validation)) echo $validation->listErrors() ?></span>
    <span class="greskarecenzija2" ><?php if(!empty($greskarecenzija2))echo $greskarecenzija2  ?></span> 

        <table width="100%" cellpadding="5px" align="center">
    
         <tr>
         <td>Korisničko ime :</td>
         <td>Ocena:</td>
         </tr>

         <tr><td><input type="text" id="korisnickoime" name="korisnickoime" value="<?=set_value('korisnickoime')?>"  placeholder="Unesite korisničko ime"></td>
         <td>
           <select name="ocena" value="<?=set_value('ocena')?>" >
           <option style="display:none">
           <option value="5">5</option>
           <option value="4">4</option>
           <option value="3">3</option>
           <option value="2">2</option>
           <option value="1">1</option>
           </select>
         </td>
         </tr>

         <tr><td>Komentar:</td></tr>
         <tr><td>
         <textarea type="text" id="komentar" name="komentar" value="<?=set_value('komentar')?>"  placeholder="Unesite komentar"></textarea>
         </td></tr>
         <tr height="20px"></tr>
         <tr>
         <td align="center" ><button class="btn btn-dark" type="submit">Pošalji</button></td>
         <td ><a href="/Korisnik" input="button" class="btn btn-dark" type="submit">Odustani</a></td>
         </tr>
    
    
    </table>    

   </form>    
    </div>




</div>
    

