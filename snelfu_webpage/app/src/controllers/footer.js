"use strict";
/*********************************************************************
***
*Original Author: Luke Chulack                         
*Date Created: 04/02/2021                                     
*Version: 1.0                                           
*Date Last Modified: 04/02/2021                               
*Modified by: Luke Chulack        
*Modification log:  
    version 1.0 - 04/02/2021 - the controller for the footer.  imports social media icons: twiter 48x48, reddit 48x48, and discord 48x48.
     
***
******************************************************************** */


app.controller('theFooter', ["$scope", function($scope) {
    $scope.image =  [{
        src1: "./app/src/front-end/assets/media/images/footer/icons/48px/twitter-48px-F8F9FA.png",
        src2: "./app/src/front-end/assets/media/images/footer/icons/48px/reddit-48px-F8F9FA.png",
        src3: "./app/src/front-end/assets/media/images/footer/icons/48px/discord-48px-F8F9FA.png"

    
    }]
   

}]);




