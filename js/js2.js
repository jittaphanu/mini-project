let list = document.querySelectorAll('.list .item');
let cartList = document.querySelector('.listCart');
let counter = 1;

function Remove($counter){
    let listCart = document.querySelectorAll('.cart .item');
    listCart.forEach(item => {
        if(item.getAttribute('data-key') == $counter){
            item.remove();
        }
    })
}


list.forEach(item => {
    item.setAttribute('data-key', counter); // กำหนดค่า data-key
    item.addEventListener('click', function(event){
        if(event.target.classList.contains('add')){
            var itemNew = item.cloneNode(true);
            let checkIsset  = false;

            let listCart = document.querySelectorAll('.cart .item');
            listCart.forEach(cart =>{
                if(cart.getAttribute('data-key') == itemNew.getAttribute('data-key')){
                    checkIsset = true;
                    cart.classList.add('danger');
                    setTimeout(function(){
                        cart.classList.remove('danger');
                    },1000)
                }
            })
            if(checkIsset == false){
                let itemNewClone = itemNew.cloneNode(true);
                itemNewClone.querySelector('.add').remove();
                cartList.appendChild(itemNewClone);
            }

        } else if(event.target.classList.contains('remove')) {
            let currentItem = event.target.closest('.item');
            currentItem.remove();
        }
    });
    counter++;
});

let menu = document.querySelector('#menu-icon');
let cart = document.querySelector('.cart');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    cart.classList.toggle('open');
};


