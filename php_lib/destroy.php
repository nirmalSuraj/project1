<?php
function destroy(){
    
         session_unset();
            session_destroy();
            
            return true;
}
