<div class="row">
<div class="sverecenzije col-12">
<h1>Korisnik : <?php echo $korisnik['korisnickoime'];?></h1>
<hr>

<?php
foreach($recenzije as $recenzija){
    echo '<div class="komentar col-8 offset-2">
    <div><img src="/slike/user.png" alt=""></div>
    <p>'.$recenzija['Komentar'].'</p>
    </div>';
}
?>
<form action="<?= site_url("$controller/recenzija") ?>">
<input type="hidden" name="korisnik" value=<?php echo $korisnik['korisnickoime'] ?>>
    <button class="btn btn-dark">Ostavi recenziju</button>
</form>
<form action="<?= site_url("$controller/proizvod/{$licitacija}") ?>">
    <button class="btn btn-dark">Nazad</button>
</form>
</div>
