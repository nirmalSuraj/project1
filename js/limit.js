/*
 in deze script gaan limit van producten bepalen
*/

function get_volgend(id,waarde){
  
    
    id.addEventListener("click",limit)
    
}



function limit(){
  
    waarde+=10;
    console.log(waarde)
    //xml object aanmaken 
    let xml = new XMLHttpRequest()

    xml.onload=()=>{
        // als satus is gelijk aan 200, resultaat toevoegen in  product
        if(xml.status == 200){
        

        }else if(xml.status == 404){
            console.log("pagina bestaat niet");

        }
    }

    xml.open("post","../scripts/show_product.php",true);

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xml.send(`toegang=ja && limit=${waarde}`);
    
    submit();
}
