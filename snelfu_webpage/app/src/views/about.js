"use strict";
/*********************************************************************
***
*Original Author: Luke Chulack                         
*Date Created: 04/02/2021                                     
*Version: 1.0                                           
*Date Last Modified: 04/02/2021                               
*Modified by: Luke Chulack        
*Modification log:  
    version 1.0 - 04/02/2021 - the view for the about section. uses basic bootstrap. 
     
***
******************************************************************** */


app.component('about', {
    template: 
    `
    <div >

    <div id="about" ng-controller="about">

        <div class="container">
        <h2>Snelfu who?</h2>
        <i class="v-line"></i>

        <div class="row">
        <div class="col-12">
                  <p>Snelfu is the currency of cyberspace! 
                  But to be more specific, Snelfu is a Cryptocurrency that has been forked from <a href="{{link[0].btcInfo}}" target="_blank">Bitcoin</a>.
                  Snelfu is, in many ways, an ongoing experiment for possible future Bitcoin forks. 
                  Snelfu keeps the main elements of Bitcoin like <a href="{{link[0].powInfo}}" target="_blank">Proof of Work</a> ETC.
                  However, Snelfu has a larger blocksize than Bitcoin as well as a smaller coin max supply. 
                  Snelfu, unlike most coins, is very open about pre-mining. 
                  The maximum supply is 2,400,000 $SNF. 
                  Out of that, 1% will be pre-mined, and 100% will be given away to random members of the public
                  involved with the creation of Snelfu, whether it be <a href="{{link[0].cyInfo}}" target="_blank">CyberMinter</a> or contributors, keep pre-mined $SNF.


                     </p>
    </div>
        <div>



    </div>   
</div>    `
});


