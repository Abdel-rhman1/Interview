<?php 
    function getCurrentGaurd(){
        foreach(array_keys(config('auth.guards')) as $guard){
            if(auth()->guard($guard)->check()) return $guard;
        }
    }   

?>