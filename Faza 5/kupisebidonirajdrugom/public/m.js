function uplata(){

let fondacija;
let kompanija;
document.getElementById("greskaodabir").innerHTML="";
let fondacije=document.getElementsByName("fond");
let izbor=false;

for(let i=0;i<fondacije.length;i++){
if(fondacije[i].checked==true){
    izbor=true;
    fondacija=fondacije[i].value;
    localStorage.setItem("fondacija",fondacija);
}
}

if(izbor==false){

    document.getElementById("greskaodabir").innerHTML="Morate izabrati fondaciju";

}else {
kompanija=document.getElementById("nazivkompanije").innerHTML;
localStorage.setItem("kompanija",kompanija);
    window.location.href="uplata.html";
    
}

}


function inicuplata(){
    let fondacija=localStorage.getItem("fondacija");
    let kompanija=localStorage.getItem("kompanija");

    document.getElementById("uplatilac").value=kompanija;
    document.getElementById("primalac").value=fondacija;
    document.getElementById("svrhauplate").value="Donacija";

    fondacija="";
    kompanija="";
    localStorage.setItem("kompanija",kompanija);
    localStorage.setItem("fondacija",fondacija);
}

function placanje(){
    let iznos=document.getElementById("iznos").value;
    let racun=document.getElementById("racun").value;
    let model=document.getElementById("model").value;
    let poziv=document.getElementById("pozivnabroj").value;
  
 if(iznos==""){
    document.getElementById("greskauplata").innerHTML="Morate uneti iznos koji uplaćujete.";

}
else if(racun==""){
        document.getElementById("greskauplata").innerHTML="Morate uneti račun primaoca.";

}else if(model==""){
        document.getElementById("greskauplata").innerHTML="Morate uneti model plaćanja.";
 }else if(poziv==""){
        document.getElementById("greskauplata").innerHTML="Morate uneti poziv na broj.";

}else if(/^[0-9]+$/.test(iznos)==false){
    document.getElementById("greskauplata").innerHTML="Iznos mora sadržati samo cifre.";

}else if(/^[0-9]{3}-[0-9]{13}-[0-9]{2}$/.test(racun)==false){
    document.getElementById("greskauplata").innerHTML="Racun mora biti u formatu XX-XXXXXXXXXXXXX-XX";

}else if(/^[0-9]{3}$/.test(model)==false){
    document.getElementById("greskauplata").innerHTML="Model mora biti u formatu XXX.";

}
    else{
    let conf=confirm("Uspešno ste obavili plaćanje.");
    window.location.href="odabir_fondacije.html";
    }
}

