/*** Declancher button from menu to submenu */
catBtn = document.querySelectorAll('.majorClass');


for (let index = 0; index < catBtn.length; index++) {
    //const element = array[index];
    thiscatBtn = catBtn[index];
    catUnder = document.querySelectorAll('.undernav');
    

    thiscatBtn.addEventListener("click", function () {

        subcat = document.getElementsByClassName('undernav')[index];
        catUnder.forEach(element => {
           if(element == subcat){}else{
            element.classList.add('underHidden');
           }
        });

        if (subcat.classList.contains('underHidden')) {
            subcat.classList.remove('underHidden');
         } 
        else {
            subcat.classList.add('underHidden');

        }
    })

}

