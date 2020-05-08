function update_producten(){
    let xml=new XMLHttpRequest();
    
    xml.onload=()=>{
        if(xml.status == 200){
       
           product_op(xml.response,button)

       
            

        }else if(xml.status == 404){
            console.log("pagina niet gevonden");
        }

    }
    xml.open("POST","../scripts/update_producten.php");
    xml.getResponseHeader();
    xml.send();
}