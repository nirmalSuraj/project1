/*
  wij gaan id van soort doorsturen naar show_product via ajax, 
  de resultaat(xml.responseText) gaan wij gelijk toevoegen in html bestand(innerHTML).
  Dit wil zeggen, als wij een element willen uithalen via js dan moeten wij 
  in status onder xml.responseText doen.

*/
//get element
let soort_car=document.querySelector('#soort_car');
//html div, hier wordt de resultaat toegevoegd 
let product_list=document.querySelector('#product'),
    buttonL;


function list_car(){

    //xml object aanmaken 
    let xml = new XMLHttpRequest()
    sub=soort_car;
    xml.onload=()=>{
        // als satus is gelijk aan 200, resultaat toevoegen in  product
        if(xml.status == 200){

            product.innerHTML=(xml.responseText)
      

            //hier elke button van een andere element uithalen 
            let toevoegen=document.querySelectorAll(".toevoegen");
            //volgende.dataset.list = "delet";

        let volgende=document.querySelector("#volgende");
      
                get_volgend(volgende);

            //lopen set data
            for(let i=0;i < toevoegen.length;i++){
                let button=toevoegen[i],
                    minknop=button.nextElementSibling,
                    aantal=minknop.nextElementSibling,
                    plusknop=aantal.nextElementSibling,
                    verwijderen=plusknop.nextElementSibling; 

                button.dataset.list = "delet";
                minknop.dataset.list = "delet";
                aantal.dataset.list = "delet";
                plusknop.dataset.list = "delet";
                verwijderen.type="button";

                verwijderen.addEventListener("click",verwijderen_div)




            }
            
            afrekenen.dataset.list = "hide_afrekenen";
          
            koppen_en_elementen(toevoegen)
            hide_volgend(toevoegen)
            add_text(toevoegen)


        }else if(xml.status == 404){
            console.log("pagina bestaat niet");

        }
    }

    xml.open("post","../scripts/show_product.php",true);

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xml.send(`soort=${sub.value}&&toegang=1 && limit=${waarde} && table=v_bijwerken`);
}
/*
function reset_waarde(){
    waarde=10;
}
*/



soort_car.addEventListener("change",list_car)
soort_car.addEventListener("change",reset_waarde)
addEventListener("load", list_car);
/*deze functie gaat controleren om lenth van v_bijwerken 
al length van bijwerken gelijk is 0 dan verdijn butoon;
*/



function add_text(button){
    if(button.length <= 0){
        product_list.innerHTML="Lijst is leeg";

    }
}

function verwijderen_div(e){
    
    let verwijderen=e.target,
        plusknop=verwijderen.previousElementSibling,
        aantal=plusknop.previousElementSibling,
        minknop=aantal.previousElementSibling,
        button=minknop.previousElementSibling,
        id=button.previousElementSibling; 
        aantal.value=0;
   
    hulp_aftellen(aantal,id,button,minknop,plusknop)
   
    add_text(button)
    
}


//verbereken van tweeknoppen namelijk meer en afrekenknoppen op script afrekenen
function hide_volgend(button){



        //volgende.style.display="block";
       
    
    
    if(button.length > 0 && afrekenen.getAttribute("data-list") == "hide_afrekenen"){
       
      afrekenen.style.display="inline-block";
    }else{
         
        afrekenen.style.display="none";
    }

}

//length van button 

