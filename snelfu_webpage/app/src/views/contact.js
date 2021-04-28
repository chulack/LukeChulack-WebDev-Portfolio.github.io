"use strict";
/*********************************************************************
***
*Original Author: Luke Chulack                         
*Date Created: 04/02/2021                                     
*Version: 1.0                                           
*Date Last Modified: 04/02/2021                               
*Modified by: Luke Chulack        
*Modification log:  
    version 1.0 - 04/02/2021 - the view for the contact/report bug modal. basic modal setup.
     
***
******************************************************************** */


app.component('contact', {
    template: 
    `
    <div >

    <div ng-controller="contact">


<div class="modal fade" id="reportBug" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">What is bugging you?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><img style="width:20px;height:20px;" ng-src="{{image[0].src}}"/></span>
        </button>
      </div>
      <div class="modal-body">
        <form name="contactSetup" novalidate"> 
        <div>
            <input type="text"  name="fullName"  id="fullName" placeholder="Name:" ng-model="contact.name" ng-required="true" title="Please input your name." >

        </div>
        <div>
        <input type="email"  name="fullEmail"  id="fullEmial" placeholder="Email:" ng-model="contact.email" ng-required="true" title="Please input your email.">

    </div>

    <div>
    <textarea   name="fullMsg"  id="fullMsg" placeholder="Tell us about it:"  ng-model="contact.msg" ng-required="true" title="Please input information on the bug."></textarea>

</div>
<div>
<input type="submit"  name="btnReport"  id="btnReport" value="Report"  >

</div>
</form>


      </div>
    
    </div>
  </div>
</div>

    </div>   
</div>    `
});


