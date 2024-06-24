let brands = document.getElementById('brands')
let shoes = document.getElementById('shoes');
let clothes = document.getElementById('clothes');
let userlist = document.getElementById('userlist');

function showUser(){
    shoes.classList.add('hidden')
    clothes.classList.add('hidden')

    if(userlist.classList.contains('hidden')){
        userlist.classList.remove('hidden')
    }else{
        userlist.classList.add('hidden')
    }
}
function check(){
    alert(123)
}
function showBrands(){
    shoes.classList.add('hidden')
    clothes.classList.add('hidden')

    if(brands.classList.contains('hidden')){
        brands.classList.remove('hidden')
    }else{
        brands.classList.add('hidden')
    }
}
function showShoes(){
    clothes.classList.add('hidden')
    brands.classList.add('hidden')
    if(shoes.classList.contains('hidden')){
        shoes.classList.remove('hidden')
    }else{
        shoes.classList.add('hidden')
    }
}
function showClothes(){
    brands.classList.add('hidden')
    shoes.classList.add('hidden')

    if(clothes.classList.contains('hidden')){
        clothes.classList.remove('hidden')
    }else{
        clothes.classList.add('hidden')
    }
}