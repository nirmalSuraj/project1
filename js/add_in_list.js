
(function(){})()
let timer_active;
let carN=document.querySelector("#carclick");
//knoppen

function koppen_en_elementen(button){


    vergelijken(button)

    //lopen op buttons
    for(let i=0;i < button.length;i++){

        button[i].addEventListener("click",style_buttons);


    }


    hide_volgend(button)
}



//*deze functie gaat bij klikken van button, button verbergen en input toenen voor aantal prducten toe te voegen*/
function vergelijken(button){

    let id;
    for(let i=0;i < button.length;i++){

        id=button[i].previousElementSibling 

        check_table(id)


    }


}

function style_buttons(e){

    let button= e.target,
        minknop=button.nextElementSibling,
        aantal=minknop.nextElementSibling,
        plusknop=aantal.nextElementSibling,
        id=button.previousElementSibling;


    //als button is hidden dan is true anderes is het false

    hide_button(button);

    //als button is none dan gaat volgende element wordt in zicht gebracht
    if(window.getComputedStyle(button).getPropertyValue("display") == "none"){
        //type minkop veranderen naar button
        minknop.style.display="inline-block";
        //type aantal veranderen naar button
        aantal.type="text";
        //standard waarde van 1 geven
        aantal.value="1";

        //type pluskop veranderen naar button
        plusknop.style.display="inline-block";
        //addEventListener
        evnlist(minknop,aantal,plusknop,id,"check",button)

in_car()
    }



}

/* deze dient om toevoegen knop te */
function hide_button(button){
    //hide button
    let buttonValue=window.getComputedStyle(button).getPropertyValue("display");

    if(buttonValue == "inline-block"){
        button.style.display="none";

    }else{
        button.style.display="inline-block";


    }
}



//via deze word de getallen afgeteld en opgeslagen
function product_aftellen(e){

    let minknop=e.target,
        aantal=minknop.nextElementSibling,
        button=minknop.previousElementSibling,
        plusknop= aantal.nextElementSibling,
        id=button.previousElementSibling;
    hulp_aftellen(aantal,id,button,minknop,plusknop)

}
//producten optellen en opslaan in database
function product_optellen(e){
    let aantal=e.target.previousElementSibling,
        teller=aantal.value,
        minknop=aantal.previousElementSibling,
        button=minknop.previousElementSibling,
        id=button.previousElementSibling;


    teller++;
    aantal.value=teller;

    add_in_list(aantal,id,"update",button)



}

//bij buiten clicken ingegeven waarde opslaan in database
function blur(e){
    let aantal=e.target,
        minknop=aantal.previousElementSibling,
        button=minknop.previousElementSibling,
        id=button.previousElementSibling,
        plusknop=aantal.nextElementSibling;
    add_in_list(aantal,id,'update',button)

    //als minder dan 0 of 0 is verwijderen uit de database en toevoegknop tonen
    if(aantal.value <= 0){

        button.style.display="inline-block";
        minknop.style.display="none";
        plusknop.style.display="none";
        aantal.type="hidden";
        if(minknop.getAttribute("data-list") == "delet"){

            minknop.parentElement.style.display="none";
        }
    }



}

/*deze treed in actie wanner de producten opzijn*/

function product_op(bool,button){

    if(bool == true){
        let minknop=button.nextElementSibling,
            aantal=minknop.nextElementSibling,
            plusknop=aantal.nextElementSibling,
            id=button.previousElementSibling;


       button.style.display="inline-block";
        //als button is none dan gaat volgende element wordt in zicht gebracht
        if(window.getComputedStyle(button).getPropertyValue("display") == "inline-block"){
            //type minkop veranderen naar button
            minknop.style.display="none";
            //type aantal veranderen naar button
            aantal.type="hidden";
            button.disabled =true;

            //type pluskop veranderen naar button
            plusknop.style.display="none";
            button.value="deze product is op";
        }

    }


}
/*deze funtie dient te communiceren met de php script tovoegen_in_list
 via tovoegen_in_list worden alle gegevens opgeslagen in database
*/


function add_in_list(aantal,id,check,button){

    let xml=new XMLHttpRequest();
    let teller=0;

    xml.open("POST","../scripts/tovoegen_in_list.php",true)
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(`aantal=${aantal.value}&&id=${id.value}&&toegang=ja&&check=${check}`)

    xml.onload=()=>{
        if(xml.status == 200){
       console.log(xml.response)
           product_op(xml.response,button)

       
            

        }else if(xml.status == 404){
            console.log("pagina niet gevonden");
        }

    }

}




function check_table(id){

    let xml=new XMLHttpRequest();


    xml.open("POST","../scripts/check_table.php",true)
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(`toegang=ja&&id=${id.value}`)

    xml.onload=()=>{
        if(xml.status == 200){
            let tmp = xml.response.split("-"),
                buuton,
                plusknop,
                minknop,
                aantal;;

            if(tmp[0] == true ){



                button=id.nextElementSibling
                minknop=button.nextElementSibling,
                    aantal=minknop.nextElementSibling,
                    plusknop=aantal.nextElementSibling;
                hide_button(button)
                minknop.style.display="inline-block";
                plusknop.style.display="inline-block";
                aantal.type="text";
                aantal.value=tmp[1];


                evnlist(minknop,aantal,plusknop,id,"update",buuton)

            }

        }else if(xml.status == 404){
            console.log("pagina niet gevonden");
        }

    }


}

function in_car(){
    
    let start=(timer_active == 0?"":setTimeout(in_car,100))
    let xml=new XMLHttpRequest();
 console.log(timer_active)

    xml.open("POST","../scripts/car.php",true)
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(`toegang=ja`)

    xml.onload=()=>{
        if(xml.status == 200){
             timer_active=xml.response;
           
            carN.innerHTML=" €"+xml.response;
        }



    }


} 


function hulp_aftellen(aantal,id,button,minknop,plusknop){

    teller=aantal.value;
    if(teller !=0){
        teller--;
    }


    aantal.value=teller;
    //opslaan in table
  
    add_in_list(aantal,id,"update")
    //minder dan 0 is dan verwijderen uit de table en toon toevoegknop

    if(aantal.value <= 0){

        hide_button(button);

        minknop.style.display="none"  

        plusknop.style.display="none"

        aantal.type="hidden";
        if(minknop.getAttribute("data-list") == "delet"){

            minknop.parentElement.style.display="none";
        }


    }




}






function evnlist(minknop,aantal,plusknop,id,type,button){
    //aantal.addEventListener("",toevoegen_list);
    aantal.addEventListener("blur",blur);
    //onclick agtellen en opslaan in table 
    minknop.addEventListener("click",product_aftellen);
    //optellen en opslaan in table
    plusknop.addEventListener("click",product_optellen);
    //aantal.addEventListener("",toevoegen_list);


    //Op click van knop 'toevoegen' standard waarden 1 toevoegen
    add_in_list(aantal,id,type,button);
}


addEventListener("click",in_car)
addEventListener("load",in_car)


