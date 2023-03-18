let navButton = document.querySelector(".sitenav-items");
navButton.addEventListener("click",(event)=>{
    if(event.target.id ==='mobilenav') {
        document.querySelector(".sitenav-items_ul").classList.toggle('menuhidden');
    }
});
