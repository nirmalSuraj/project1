let volgende=document.querySelector("#volgende");
let afrekenen=document.querySelector("#afreken");
let msg=document.querySelector("#msg");
let error=document.querySelector("#error"),
    tussen=(msg.innerHTML != ""?msg:error);
let print=document.querySelector("#print"),
    owner=document.querySelector("#owner");



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


