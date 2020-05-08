//icone element
let carN=document.querySelector('#carclick');
//hidden div with id list
let car=document.querySelector('#list');
let clickbody=false;
let up=-610;
let exi=document.querySelector('#exit')



function list(){



    let stop =setTimeout(list,5);
    
    if(clickbody){
        
        up-=20;
        car.style.right=`${up}px`;
    }
    
    if(up < -610){
       
        clickbody=false;
        clearTimeout(stop);
        
    }

    

    if(up < 0){
        up+=10;

        car.style.right=`${up}px`;

    }else{
        clickbody=true;
        clearTimeout(stop);
    }
    
    


}



carN.addEventListener("click",list)

 exi.addEventListener("click",list)







