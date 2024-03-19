const nav = document.getElementById('nav')


window.addEventListener("scroll",()=>{
    if(window.scrollY > 20){
        nav.classList.add('scrollable');
    }else{
        nav.classList.remove('scrollable');
    }
})