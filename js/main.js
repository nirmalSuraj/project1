let volgende=document.querySelector("#volgende");
let afrekenen=document.querySelector("#afreken");
let msg=document.querySelector("#msg");
let error=document.querySelector("#error"),
    tussen=(msg.innerHTML != ""?msg:error);
let print=document.querySelector("#print"),
    owner=document.querySelector("#owner");



/* functie error's of msg doorsturen naar php script*/
/*function msg_f(soort,script,waarde){

    let xml=new XMLHttpRequest();
    let teller=0;

    xml.open("GET",`../scripts/${script}`,true)

    xml.send(`${soort}=${waarde}`)
   
    xml.onload=()=>{
        if(xml.status == 200){
           return true;
        }else if(xml.status == 404){
            console.log("pagina niet gevonden");
        }

    }

}*/

console.log(error.innerHTML)
////////communicatie
if(tussen.innerHTML != ""){

    tussen.classList.remove("hidemsg");

    tussen.classList.add("showmsg");

}

addEventListener("click",()=>{

    tussen.classList.remove("showmsg");

    tussen.classList.add("hidemsg");
})


/**print **/

function prin(){
    window.print()

}

print.addEventListener("click",prin);


