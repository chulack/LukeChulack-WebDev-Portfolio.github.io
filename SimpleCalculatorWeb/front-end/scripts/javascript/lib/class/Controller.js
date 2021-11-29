"use strict";


let model = new Model;

class Controller {

    static clearResults() {

        model.operation = null;
        model.secondToLastEntered = null;
        model.lastEntered = null;
        document.querySelector("#results").value = null;
    }


    // internal methods

   static setLastNums() {

        if(model.lastEntered != null) {
            model.secondToLastEntered = model.lastEntered;
        }
        model.lastEntered = document.querySelector("#results").value;

    }

    static addNum() {
        document.querySelector("#results").value = parseFloat(model.lastEntered) + parseFloat(model.secondToLastEntered);

    }

    static subNum() {

        document.querySelector("#results").value = parseFloat(model.secondToLastEntered) - parseFloat(model.lastEntered);

    }
 
   static multiNum() {

    document.querySelector("#results").value = parseFloat(model.lastEntered) * parseFloat(model.secondToLastEntered);


   }


   static divNum() {

    document.querySelector("#results").value = parseFloat(model.secondToLastEntered) / parseFloat(model.lastEntered);

    }

    // action methods
    static clickAddNum() {
        if(model.giveResultNext == false && document.querySelector("#results").value != "") {
            model.operation = "add"; 
            model.giveResultNext = true;
            this.setLastNums();
            document.querySelector("#results").value = null;


        } else {
            if (model.operation == "add" && document.querySelector("#results").value != "") {

                model.operation = null; 

                model.giveResultNext = false;
                this.setLastNums();
                this.addNum();
            }
        }
    }

    static checkSubNum() {
        if(model.giveResultNext == false && document.querySelector("#results").value != "") {
            model.operation = "sub"; 
            model.giveResultNext = true;
            this.setLastNums();
            document.querySelector("#results").value = null;


        } else {
            if (model.operation == "sub" && document.querySelector("#results").value != "") {

                model.operation = null; 

                model.giveResultNext = false;
                this.setLastNums();
                this.subNum();
            }
        }

    }

    static checkMultiNum() {
        if(model.giveResultNext == false && document.querySelector("#results").value != "") {
            model.operation = "multi"; 
            model.giveResultNext = true;
            this.setLastNums();
            document.querySelector("#results").value = null;


        } else {
            if (model.operation == "multi" && document.querySelector("#results").value != "") {

                model.operation = null; 

                model.giveResultNext = false;
                this.setLastNums();
                this.multiNum();
            }
        }

    }

    static checkDivNum() {
        if(model.giveResultNext == false && document.querySelector("#results").value != "") {
            model.operation = "div"; 
            model.giveResultNext = true;
            this.setLastNums();
            document.querySelector("#results").value = null;


        } else {
            if (model.operation == "div" && document.querySelector("#results").value != "") {

                model.operation = null; 

                model.giveResultNext = false;
                this.setLastNums();
                this.divNum();
            }
        }

    }

    static checkDecimal() {


    
        let i = 0;
   
        if (document.querySelector("#results").value.length != 0) {
     
        document.querySelector("#results").value.split("").forEach(element => {
            if (element == ".") {
                i++;
            }
        });

        if(i == 0) {

            document.querySelector("#results").value += ".";

        }
        if(i < 0 ) {

            document.querySelector("#results").value += ".";

        }
        } else {
            document.querySelector("#results").value += "0.";
        }
    }

    static calcResults() {
       switch(model.operation) {
            case "add":

            if (document.querySelector("#results").value != "") {
                model.operation = null;
                if(model.giveResultNext != false) {
            
                    model.giveResultNext = false;
                    this.setLastNums();
                    this.addNum();
        
                } 
            }
            break;
            case "sub": 
            if (document.querySelector("#results").value != "") {
                model.operation = null;
                if(model.giveResultNext != false) {
            
                    model.giveResultNext = false;
                    this.setLastNums();
                    this.subNum();
        
                } 
            }
            break;
            case "multi": 
                if(model.giveResultNext != false) {
                
                    model.giveResultNext = false;
                    this.setLastNums();
                    this.multiNum();
        
                } 
            break;
            case "div": 
                if(model.giveResultNext != false) {
                    
                    model.giveResultNext = false;
                    this.setLastNums();
                    this.divNum();
        
                } 
            break;
            default:
                break;

       }

    }
 

    static inputNum(e) {

        //alert("number click" + e.target.value);
        let langTH = 0;
        if (document.querySelector("#results").value != null) {
            langTH = document.querySelector("#results").value.length;  
        } 
        
        if(langTH <= 17) {
            if (e.target.value != 0) {
            document.querySelector("#results").value += e.target.value;
            } else {
                if(document.querySelector("#results").value != "") {
                    document.querySelector("#results").value += e.target.value;

                }
            }
        }

    }

    constructor () {

      
         

    }


}

// live click calls to actions

document.querySelectorAll('.numBTN').forEach(item => {
    item.addEventListener('click', e => {

        Controller.inputNum(e);

    })
  });
  
  document.querySelector("#clearBTN").addEventListener("click", () => {

    Controller.clearResults();

  });


  document.querySelector("#additionBTN").addEventListener("click", () => {

    Controller.clickAddNum();

  });

  
  
  document.querySelector("#equalsBTN").addEventListener("click", () => {

    Controller.calcResults();

  });
  
  document.querySelector("#subtractionBTN").addEventListener("click", () => {

    Controller.checkSubNum();

  });

  document.querySelector("#multiplicationBTN").addEventListener("click", () => {

    Controller.checkMultiNum();

  });

  document.querySelector("#divionBTN").addEventListener("click", () => {

    Controller.checkDivNum();

  });

  document.querySelector("#decimalBTN").addEventListener("click", () => {

    Controller.checkDecimal();

  });