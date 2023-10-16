let list = document.querySelectorAll('.list .item');
let cartList = document.querySelector('.listCart');
// let counter = 0; // เพิ่มตัวแปรนับจำนวน

list.forEach(item => {
    item.setAttribute('data-key'); // กำหนดค่า data-key
    counter++; // เพิ่มค่านับจำนวน
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
                cartList.appendChild(itemNew);
            }
        
        }

    }
    )
    counter ++;
})

function Remove(counter){
    let listCart = document.querySelectorAll('.cart .item');
    listCart.forEach(item => {
        if(item.getAttribute('data-key') == counter){
            item.remove();
        }
    })
}

