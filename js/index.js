
//add click function to the mobile navigation
let navButton = document.querySelector(".sitenav-items");
navButton.addEventListener("click",(event)=>{
    if(event.target.id ==='mobilenav' || event.target.id === 'navbutton-icon' || event.target.id ==='navbutton-description') {
        document.querySelector(".sitenav-items_ul").classList.toggle('menuhidden');
    } 
});

//using jquery to auto close the menu if clicked on areas outside the mobile nav.
$(document).on('click', function(event) {
    if (!$(event.target).closest('.sitenav-items').length) {
      $('.sitenav-items_ul').removeClass('menuhidden');
    }
});