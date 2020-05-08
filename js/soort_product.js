/*
  wij gaan id van soort doorsturen naar show_product via ajax, 
  de resultaat(xml.responseText) gaan wij gelijk toevoegen in html bestand(innerHTML).
  Dit wil zeggen, als wij een element willen uithalen via js dan moeten wij 
  in status onder xml.responseText doen.

*/
//get element
let sub=document.querySelector('#soort');
//html div, hier wordt de resultaat toegevoegd 
let product=document.querySelector('#product'),
    waarde=10;



function submit(){

    //xml object aanmaken 
    let xml = new XMLHttpRequest()
   
    xml.onload=()=>{
        // als satus is gelijk aan 200, resultaat toevoegen in  product
        if(xml.status == 200){

            product.innerHTML=(xml.responseText)
     

            //hier elke button van een andere element uithalen 
            let tovoegen=document.querySelectorAll(".toevoegen"),
                volgende=document.querySelector("#volgende");
          
            koppen_en_elementen(tovoegen)
                get_volgend(volgende);
          

        }else if(xml.status == 404){
            console.log("pagina bestaat niet");

        }
    }

    xml.open("post","../scripts/show_product.php",true);

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xml.send(`soort=${sub.value}&&toegang=1 && limit=${waarde} && table=v_selectproducten`);
}

function reset_waarde(){
    waarde=10;
}


sub.addEventListener("change",submit)
sub.addEventListener("change",reset_waarde)
addEventListener("load", submit);

