"use strict";
/*********************************************************************
***
*Original Author: Luke Chulack                         
*Date Created: 04/02/2021                                     
*Version: 1.0                                           
*Date Last Modified: 04/02/2021                               
*Modified by: Luke Chulack        
*Modification log:  
    version 1.0 - 04/02/2021 - the view for the get wallet section. 
     
***
******************************************************************** */


app.component('getWallet', {
    template: 
    `
    <div >

    <div id="wallet" ng-controller="getWallet">
    <div class="container">
    <i class="v-line"></i>

    <h2>Getting Started.</h2>
    <i class="v-line"></i>

    <div class="row">
    <div class="col-12">
       
                 <p>Like all Cryptocurrencies, Snelfu, requires a wallet. 
                 Snelfu core, which is built on Bitcoin core like other forks, it is overall is just a great wallet.
                  It is our Primary supported wallet. Although we have created other wallets, they are now not supported or not our primary product.</p>
                  <div id="imagesDownloadArea">  
                  <a href="#download"><input type="button" value="Download Snelfu Core"></a>
                    <div id="imagesDownload">
                        <a href="{{link[0].macOSInfo}}" target="_blank"><img id="appleLogo" ng-src="{{ image[0].src1 }}" alt="apple logo"></a>
                        <a href="{{link[0].linuxInfo}}" target="_blank"><img id="linuxLogo" ng-src="{{ image[0].src2 }}" alt="linux logo"></a>
                        <a href="{{link[0].windowsInfo}}" target="_blank"><img id="windowsLogo" ng-src="{{ image[0].src3 }}" alt="windows logo"></a>

                    </div>
                    </div>
                 </div>
    <div>



</div>   
    </div>   
</div>    `
});