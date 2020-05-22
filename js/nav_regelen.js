let ul = document.querySelector('ul');
let link = document.querySelector('#nav1');

let buggerbutton = document.querySelector('#buggerbutton');
let p=true,
    mouse=false;
let stop;


function nav(){

    let verander=(p?window.innerWidth < 600:false)


    //timer 
    stop=setTimeout(nav,0) 




    //als de breete van het scherm minder is dan 600 pix verschijn burgerbutton en ul display none
    if(window.innerWidth < 600){


        link.style.position=" fixed";

        buggerbutton.style.display="inline-block";

        link.classList.add("hide"); 
        link.style.top="5px";
        ul.style.display="block";
        ul.style.paddingTop="100px";



    }

    //als burgerbutton is in gedrukt dan ul in block postie 
    if(!p){

        ul.style.display="block";
        link.classList.add("show");


    }else{

        link.classList.remove("show");

    }
    //als breete vanhet scherm is groter dan 600 dan button display none en veschijnt ul in flex

    if(window.innerWidth > 600){
      
        link.style.position=" relative";
        buggerbutton.style.display="none";
        link.classList.remove("hide");
        ul.style.display="flex";
        ul.style.paddingTop="0px";

        p=true;

        buggerbutton.classList.remove("change");


    }


}




function out(){
    if(p == false){
        alert()
        p=!p;
        
       buggerbutton.classList.toggle("change"); 
    }
    
}
function change(){

    p=!p;

    buggerbutton.classList.toggle("change");

}


//addEventListener("mouse",out)
   buggerbutton.addEventListener("click",change)
    




nav()