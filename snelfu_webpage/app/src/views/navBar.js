"use strict";
/*********************************************************************
***
*Original Author: Luke Chulack                         
*Date Created: 04/02/2021                                     
*Version: 1.0                                           
*Date Last Modified: 04/02/2021                               
*Modified by: Luke Chulack        
*Modification log:  
    version 1.0 - 04/02/2021 - navbar view. 
     
***
******************************************************************** */


app.component('navBar', {
    template: 
    `
    <div >

    <div ng-controller="navBar">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#home"><img style="width:33px;height:33px; margin-right:1rem;" ng-src="{{image[0].src}}" alt="snelfu"></a>
        <button id="menuSetButton" style="border:none;color:#48AA2D;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i id="menuSet" class="fas fa-ellipsis-h fa-2x"></i>


        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">Learn Snelfu</a>
        
</li>        <li class="nav-item">
<a class="nav-link" href="#wallet">Get the Wallet</a>

</li>       <li class="nav-item">
            <a  id="openContact" class="nav-link" href="#report" data-toggle="modal" data-target="#reportBug">Report a bug</a>
    
          </ul>
    
        </div>
      </nav>   
      </div>   
</div>    `
});


