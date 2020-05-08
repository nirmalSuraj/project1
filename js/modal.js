let btnmodal=document.querySelectorAll(".btnmodal"),
    modal=document.querySelector('#modal_body');
    
function get_modal(e){
      
    let xml=new XMLHttpRequest(),
        index=e.target.previousElementSibling.value;

      xml.onload=()=>{
          
          if(xml.status == 200){
              
              modal.innerHTML=xml.responseText;
          }
          if(xml.status == 404){
              alert("niet gevonden")
          }
      }
    xml.open("post","../scripts/modal.php",true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(`index=${index} && toegang=1`);

}

btnmodal.forEach((index)=>{
    
    index.addEventListener("click",get_modal)
})