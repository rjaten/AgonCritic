/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function randPic()
{
    var picArray = new Array(3);
    picArray[0] = "<img width='100%' src='../uploads/Dying_Light.jpg' alt='Dying Light'/>";
    picArray[1] = "<img width='100%' src='../uploads/Evolve.jpg' alt='Evolved'/>";
    picArray[2] = "<img width='100%' src='../uploads/DragonAgeInquisition.jpeg' alt='Dragon Age:Inquisition'/>";
    
    var rand = Math.floor((Math.random() * 3));
    
    document.getElementById("randPic").innerHTML = picArray[rand];
};



