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
document.addEventListener('DOMContentLoaded', function() {
    var cards = document.querySelectorAll('.card');
    cards.forEach(function(card) {
      var images = card.dataset.images.split(',');
      var primaryPhoto = card.querySelector('img');
      var index = 0;
  
      if (images.length <= 1) {
        return;
      }
  
      card.addEventListener('mouseover', function() {
        if (index < images.length - 1) {
          index++;
        } else {
          index = 0;
        }
        primaryPhoto.src = images[index];
      });
  
      card.addEventListener('mouseleave', function() {
        primaryPhoto.src = images[0];
      });
    });
  });
