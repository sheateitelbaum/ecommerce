<?php
    if(!isset($_SESSION['loggedIn'])){
session_set_cookie_params(60*5);
session_start();
}
    if($action!=='administrators'){
        $table = $action;}
    if(!empty($_POST['table'])){
        $table = $_POST['table'];
    }
    if(!empty($_POST['site'])){
        $site = $_POST['site'];
        }
    if(substr( $action, 0, 6 ) === "secure" && lcfirst(substr($action,6))==='clothing'||lcfirst(substr($action,6))==='electronics'){
          $table = lcfirst(substr($action,6));
    }
          
      
    function switchSite($table){
        if($table==='electronics'){
                $action = 'clothing';
                return $action;
                }
        if($table==='clothing'){
            $action = 'electronics';
            return $action;
        }
        }    
    function switchSiteTag($table){
        if($table==='electronics'){
            $siteTag = 'J&J Clothing';
            return $siteTag;}
        if($table==='clothing'){
            $siteTag = 'J&J Electronics';
            return $siteTag;
        }
        
        } 
        function switchAdminSite($table){
        if($table==='electronics'){
            $action = 'secureClothing';
            return $action;}
        if($table==='clothing'){
            $action = 'secureElectronics';
            return $action;
        }
        }       
      
?>
