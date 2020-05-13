/*
 in deze script gaan limit van producten bepalen
*/

function get_volgend(id,script){


    id.addEventListener("click",limit)

}



function limit(){
    //url van huidige pagina  ophalen
    let url=window.location.href;
    //slipt op /
    url=url.split("/");
    //de script naam eruit halen script.php
    url=url.pop();


    waarde+=5;

    //xml object aanmaken 
    let xml = new XMLHttpRequest()

    xml.onload=()=>{
        // als satus is gelijk aan 200, resultaat toevoegen in  product
        if(xml.status == 200){

            console.log(xml.response)
        }else if(xml.status == 404){
            console.log("pagina bestaat niet");

        }
    }

    xml.open("post","../scripts/show_product.php",true);

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xml.send(`toegang=1 && limit=${waarde} && soort=${sub.value}`);

   
    if(url != "show_list.php" && url == "shoppen.php"){
        submit(); 
    }else{

        list_car()  
    }


}
