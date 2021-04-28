"use strict";
/*********************************************************************
***
*Original Author: Luke Chulack                         
*Date Created: 04/02/2021                                     
*Version: 1.0                                           
*Date Last Modified: 04/02/2021                               
*Modified by: Luke Chulack        
*Modification log:  
    version 1.0 - 04/02/2021 - the controller for get wallet. has images for suported os types and the links to info on them. 
     
***
******************************************************************** */


app.controller('getWallet', ["$scope", function($scope) {

    $scope.image = [{
        src1: "./app/src/front-end/assets/media/images/getWallet/icons/24px/apple-24px-48AA2D.png",
        src2: "./app/src/front-end/assets/media/images/getWallet/icons/24px/linux-24px-48AA2D.png",
        src3: "./app/src/front-end/assets/media/images/getWallet/icons/24px/windows-24px-48AA2D.png"
  
     }],
     $scope.link = [{
        macOSInfo: "https://www.apple.com/macos/",
        linuxInfo: "https://www.linuxfoundation.org/",
        windowsInfo: "https://www.microsoft.com/en-us/windows"

     }]

}]);
