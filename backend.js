const cart = [];

console.log("backend.js connected")

function displayCart() {
    const retrievedArray = JSON.parse(localStorage.getItem('cart'));
    console.log(retrievedArray);
}

const addToCartButtons = document.querySelectorAll('.add-to-cart-button');
addToCartButtons.forEach(button => {
    button.addEventListener('click', function () {
        const card = this.closest('.newcard');
        const productName = card.querySelector('.product-name').textContent;
        const productPrice = parseFloat(card.querySelector('.product-price').textContent);

        const indexInCart = cart.findIndex(item => item.name === productName && item.price === productPrice);

        if (indexInCart === -1) {
            cart.push({ name: productName, price: productPrice });
        } else {
            cart.splice(indexInCart, 1);
        }

        // Log cart before saving to local storage
        console.log("Cart:", cart);
        //saveCart();
    });
});

/*function saveCart(){


    if (cart!=null) {
        localStorage.setItem('finalCart', JSON.stringify(cart));
        window.location.href='billing.php';
    }

    else{
        alert("Your cart is empty. Please add items to proceed.");
    }
    
}
*/