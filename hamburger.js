let button = document.querySelectorAll('.hamburger')

button.forEach((item)=>item.addEventListener("click", ()=>{
    item.classList.toggle('is-active');
}))