<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="/mila.css">
    <link rel="stylesheet" href="/masa.css">
    
    
    <title>PSI</title>
</head>
  <body>
    <header>
        <div class="container.fluid">
          <div class="row">
            <div class="col-sm-12">
              <nav class="navbar navbar-expand ">
                
                <img class="navbar-brand" src="/slike/slika.png" alt="Logo" style="width:90px;">
               
                <h4> Kupi sebi, doniraj drugom</h4>
            </div>
            <div class="topnav col-sm-12">
            <?php echo anchor('Korisnik/index','Početna');?>
              <?php echo anchor('','Postavi licitaciju');?>
              <?php echo anchor('','Ostavi recenziju');?>
              <?php echo anchor('Korisnik/logout','Izloguj se');?>

              <div class="search-container">
                <form action="">
                  <input type="text" placeholder="Search.." name="search">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </header>