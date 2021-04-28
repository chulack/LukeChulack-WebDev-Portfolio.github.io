"use strict";
/*********************************************************************
***
*Original Author: Luke Chulack                         
*Date Created: 04/02/2021                                     
*Version: 1.0                                           
*Date Last Modified: 04/02/2021                               
*Modified by: Luke Chulack        
*Modification log:  
    version 1.0 - 04/02/2021 - the view for the home section. 
     
***
******************************************************************** */

app.component("home", {

    template: `
    <div>

        <div  ng-controller="home">
          
            <div 
             id="home">
                <div id="textSet">
                    <h1>Snelfu</h1>
                    <p id="textWrite"></p>
                </div>
              
            </div>
            <div   id="arrowSet"> 

            <a  href="#wallet"><i class="arrowDown"></i></a>
       </div>

        </div>

    </div>
`

});