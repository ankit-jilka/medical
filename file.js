
// for top button... start..
var topbtn = document.getElementById("topButton");
window.onscroll = function(){
    scrollfun()
};

function scrollfun() {
    if(document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000)
    {
        topbtn.style.display = "block";
    }
    else{
        topbtn.style.display = "none";
    }
}
function goToTop(){
       
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
}

// end...


// cart count....  start.... 
let carts = document.querySelectorAll('.addcart');

for(let i=0; i<carts.length; i++){
    carts[i].addEventListener('click', () =>{
        cartNumbers();
    })
}

function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');
    if(productNumbers){
        document.querySelector('.Nevigationbar span').textContent = productNumbers;
    }
}

function cartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    
    productNumbers = parseInt(productNumbers);
    
    if(productNumbers){
        localStorage.setItem('cartNumbers',productNumbers + 1);
        document.querySelector('.Nevigationbar span').textContent = productNumbers + 1;
    }
    else{
    localStorage.setItem('cartNumbers',1);
    document.querySelector('.Nevigationbar span').textContent = 1;
    }
    
}

// handle show hide of cartModal
function handleCartVisiblityModal() {
    let isCartVisible = localStorage.getItem('cartModalState');
    if (isCartVisible) {
        localStorage.setItem('cartModalState', false)
    
        return
    }
    localStorage.setItem('cartModalState', true)


}

onLoadCartNumbers();
//.......... end....

