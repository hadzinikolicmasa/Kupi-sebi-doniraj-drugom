<div class="adminpocetna">
<div class="card "  >
         <img class="card-imgtop rounded-circle"  src="/slike/admin.png" alt="Card image">
         <div class="card-body"> 
         <h4 class="cardtitle"style="font-family: 'Courier New', monospace;">
         <?php echo $admin['korisnickoime'];?> 
         </h4>
         <p class="cardtext" >Admin</p>
         
     </div>
    </div>

    <div class="fondacijeSpisak"> 
        <table class="fondacije" style="margin-left: 50%;">
            <tr><th><h2>Fondacije:<h2></th></tr>
            <tr> <td align="left"><ul>
            <?php 
            
            foreach ($fondacije as $f) {
                echo "<li>".$f['naziv']."</li>";
            }
           
            ?>
            </ul></td></tr>

            <tr><td>
            <div class="dodavanjeFonBtn" style="width:100%;text-align:center">
            <form method="post" action= "<?= site_url('Admin/dodavanjeFond')?>"><button class="btn btn-dark " style="margin-top:25px;">Dodaj fondaciju</button></form></div></td>
            </tr>
        </table>
        
    
    
    </div>
 </div>
 <div style="text-align:center">
<img src="/slike/ruke.png" alt="" style="height:200px;width:50%; ">


</div>