<?php

        
        
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'electronics';
}

switch ($action) {
    case 'electronics':
        require'utils/direct.php';
        require'models/homeModel.php';
        require_once 'views/homeView.php';
        exit;
    case 'clothing':
        require'utils/direct.php';
        require 'models/homeModel.php';
        require_once 'views/homeView.php';
        exit;
    case 'detail':
        require 'models/detailModel.php';
        require 'views/detailView.php';
        exit;
    case 'administrators':
        require'utils/direct.php';
       // require'models/homeModel.php';
        require 'views/loginView.php';
        exit;
    case 'secureElectronics':
        require'utils/direct.php';
        require'models/homeModel.php';
        require 'views/adminHomeView.php';
        exit;
    case 'secureClothing':
        require'utils/direct.php';
        require'models/homeModel.php';
        require 'views/adminHomeView.php';
        exit;
        case 'secureDetail':
        require 'models/adminDetailModel.php';
        require 'views/adminDetailView.php';
        exit;
        case 'secureAdd':
        //require'utils/direct.php';
        require 'views/addView.php';
        exit;
        case 'secureActuallyAdd':
        require 'models/actuallyAddModel.php';
        exit;
        case 'secureUpdate':
        require 'models/updateModel.php';
        require 'views/updateView.php';
        exit;
        case 'secureUpdateCategory':
        require 'models/updateModel.php';
        require 'views/updateView.php';
        exit;
        case 'secureActuallyUpdate':
        require 'models/actuallyUpdateModel.php';
        exit;
        case 'secureActuallyUpdateCategory':
        require 'models/actuallyUpdateModel.php';
        exit;
        case 'secureDelete':
        require 'models/deleteModel.php';
        exit;
        case 'secureDeleteCategory':
        require 'models/deleteModel.php';
        exit;
}
?>