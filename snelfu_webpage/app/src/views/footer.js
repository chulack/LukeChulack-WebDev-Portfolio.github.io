"use strict";
/*********************************************************************
***
*Original Author: Luke Chulack                         
*Date Created: 04/02/2021                                     
*Version: 1.0                                           
*Date Last Modified: 04/02/2021                               
*Modified by: Luke Chulack        
*Modification log:  
    version 1.0 - 04/02/2021 - the view for the footer. basic footer setup.
     
***
******************************************************************** */


app.component('theFooter', {
    template: 
    `
    <div >

    <div ng-controller="theFooter">

    <div class="footer-copyright text-center py-3">

    <a id="footerIcon1" class="footerIcon" href="https://twitter.com/" target="_blank" ><img ng-src="{{image[0].src1}}" alt="twitter icon"></a>
    <a id="footerIcon2" class="footerIcon" href="https://www.reddit.com/" target="_blank" ><img ng-src="{{image[0].src2}}" alt="reddit icon"></a>
    <a id="footerIcon3" class="footerIcon" href="https://discord.com/" target="_blank" ><img ng-src="{{image[0].src3}}" alt="discord icon"></a>


  </div>


    </div>   
</div>    `
});