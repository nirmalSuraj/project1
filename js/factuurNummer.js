
let nummer=document.getElementById("factuurnmmer");
let makeFatuurN=document.getElementById("makeFatuurN");

function getFatuur(){
  let d = new Date(),
      nummer;
    nummer= d.getHours()+""+d.getSeconds();
    
    return nummer;
}

function setFatuur(){
    nummer.value=getFatuur();
   
}


makeFatuurN.addEventListener("click",setFatuur);