<?php

Class TOOLS{

    public function check_rights($rights,$current_right){

        foreach($rights as $right){
            if($right['submenu_name'] == $current_right){
                return True;
            }
        }

    }

}





?>