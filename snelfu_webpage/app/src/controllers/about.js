"use strict";
/*********************************************************************
***
*Original Author: Luke Chulack                         
*Date Created: 04/02/2021                                     
*Version: 1.0                                           
*Date Last Modified: 04/02/2021                               
*Modified by: Luke Chulack        
*Modification log:  
    version 1.0 - 04/02/2021 - about section controller. Has links in memory. 
     
***
******************************************************************** */


app.controller('about', ["$scope", function($scope) {


   $scope.link = [{

    btcInfo: "https://bitcoin.org/en/",
    powInfo:  "https://en.bitcoin.it/wiki/Proof_of_work",
    cyInfo: "https://www.cyberminter.com/about"
   }]

}]);




