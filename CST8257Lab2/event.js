/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//form element events

    let noAmount_s = document.querySelector('.noAmount')
    let noRate_s = document.querySelector('.noRate')
    let noYear_s = document.querySelector('.noYear')
    let noName_s = document.querySelector('.noName')
    let noCode_s = document.querySelector('.noCode')
    let noPhone_s = document.querySelector('.noPhoen')
    let noEmail_s = document.querySelector('.noEmail')

document.querySelector('#amount').addEventListener("keydown", function () {
	noAmount_s.innerHTML = "";
}, false);

document.querySelector('#rate').addEventListener("keyup", function () {
	noRate_s.innerHTML = "";
}, false);

document.querySelector('#year').addEventListener("keyup", function () {
	noYear_s.innerHTML = "";
}, false);

document.querySelector('#name').addEventListener("keyup", function () {
	noName_s.innerHTML = "";
}, false);

document.querySelector('#code').addEventListener("change", function () {
	noCode_s.innerHTML = "";
}, false);

document.querySelector('#phone').addEventListener("change", function () {
	noPhone_s.innerHTML = "";
}, false);
document.querySelector('#email').addEventListener("change", function () {
	noEmail_s.innerHTML = "";
}, false);


