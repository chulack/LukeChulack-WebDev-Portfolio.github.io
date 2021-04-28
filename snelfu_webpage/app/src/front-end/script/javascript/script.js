"use script";
/*********************************************************************
***
*Original Author: Luke Chulack                         
*Date Created: 04/02/2021                                     
*Version: 1.0                                           
*Date Last Modified: 04/02/2021                               
*Modified by: Luke Chulack        
*Modification log:  
    version 1.0 - 04/02/2021 - JavaScript like for the typing effect and menu animation. 
     
***
******************************************************************** */

document.addEventListener("DOMContentLoaded", () => {

    const $ = (e) => document.querySelector(e);


    //menu animation collapsed
     // this set up is here over something like toggle as it tries to fix a bug when collapsed is on but the menu icon is the wrong icon

    $("#menuSetButton").addEventListener("click", () => {
        
        if($("#menuSet").classList.contains("fa-ellipsis-h") == true && $("#menuSetButton").classList.contains("collapsed") == true && $("#menuSetButton").getAttribute("aria-expanded") ==  "false" ) {
            

            $("#menuSet").classList.remove("fa-ellipsis-h");
            $("#menuSet").classList.add("fa-ellipsis-v");


        } else if ($("#menuSetButton").classList.contains("collapsed") == false && $("#menuSet").classList.contains("fa-ellipsis-h") == false && $("#menuSet").classList.contains("fa-ellipsis-v") == true && $("#menuSetButton").getAttribute("aria-expanded") ==  "true")  {
            $("#menuSet").classList.remove("fa-ellipsis-v");

            $("#menuSet").classList.add("fa-ellipsis-h");

        } else {
            
        }


    });

     // sets focus for fullName

    $("#openContact").addEventListener("click", () => {
              $("#fullName").focus();

    });

    
    



    // text type code on home section
    let i = 0, txt = 'The currency of cyberspace.', speed = 70;

    const writeText =  () => {
        if (i < txt.length) {
            $("#textWrite").innerHTML += txt.charAt(i);
            i++;
            setTimeout(writeText, speed);
          }
        
    }




    // this puts the collapsed class on at load as bootstarp seems not to do that 
    $("#menuSetButton").classList.add("collapsed");

    // runs writeText function
    writeText();

});
