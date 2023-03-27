/*** Declancher button from menu to submenu */
catBtn = document.querySelectorAll('.majorClass');


for (let index = 0; index < catBtn.length; index++) {
    //const element = array[index];
thiscatBtn = catBtn[index];

thiscatBtn.addEventListener("click", function(){

    subcat = document.getElementsByClassName('undernav')[index];
    if (subcat.classList.contains('underHidden')){
        subcat.classList.remove('underHidden');
     

    }else{
        subcat.classList.add('underHidden');
        
    }

})

}
