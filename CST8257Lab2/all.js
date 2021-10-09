/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//validate module

var validate = (function () {
    //id
    let inputAmount = document.querySelector('#amount')
    let inputRate = document.querySelector('#rate')
    let inputYear = document.querySelector('#year')
    let inputName = document.querySelector('#Name')
    let inputCode = document.querySelector('#code')
    let inputPhone = document.querySelector('#phone')
    let inputEmail = document.querySelector('#email')
    //span
    let noAmount_s = document.querySelector('.noAmount')
    let noRate_s = document.querySelector('.noRate')
    let noYear_s = document.querySelector('.noYear')
    let noName_s = document.querySelector('.noName')
    let noCode_s = document.querySelector('.noCode')
    let noPhone_s = document.querySelector('.noPhoen')
    let noEmail_s = document.querySelector('.noEmail')

    var fin_che = true;
    function validateProfile() {
       
        if (amount.value == "")  {
            noAmount_s.classList.add('clear'); 
            noAmount_s.innerHTML = "required";
            fin_che=false;    
        }

        if (inputRate.value == "") {
            noRate_s.classList.add('clear');
            noRate_s.innerHTML = "required"; 
            fin_che=false;    
        }

        if (inputYear.value == "") {
            noYear_s.classList.add('clear');
            noYear_s.innerHTML = "required"; 
            fin_che=false;
        }

        if (inputName.value == "") {
            noName_sclassList.add('clear');
            noName_s.innerHTML = "required"; 
            fin_che=false;
        }

        if (inputCode.value == "") {
            noCode_s.classList.add('clear');
            noCode_s.innerHTML = "required"; 
            fin_che=false;
        }

        if (inputPhone_s.value == "") {
            noPhone_s.classList.add('clear');
            noPhone_s.innerHTML = "required"; 
            fin_che=false;
        }
        
        if (inputEmail_s.value == "") {
            noEmail_s.classList.add('clear');
            noEmail_s.innerHTML = "required"; 
            fin_che=false;
        }
        if (fin_che) {
             alert('Tank you');
		}
		return fin_che;
        };

    const sub = document.querySelector('.submit')  
    if(fin_che){
        sub.addEventListener("click", function () {
        validateProfile();
        }, false);
    }

}()); 




