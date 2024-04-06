const cart = [];

console.log("elec.js is acccessed")

const formbox = document.querySelector('.form-box');
const curtain = document.querySelector('.curtain');

let name = "Salman";
let email = "bollywood@gmail.com";
let password;

//start

const profInfo = document.querySelector('.profInfo');
const cartMenu = document.querySelector('.cartMenu');
const profileMenu = document.querySelector('.profileMenu');



/*function openPage() {
    console.log('Shit is real');
    const computedStyles = window.getComputedStyle(formbox);
    const currentTop = parseInt(computedStyles.getPropertyValue('top'));

    getLoginFormInfo();

    if (currentTop === 150) {
        formbox.style.top = "-600px";
    } else {
        formbox.style.top = "150px";
    }

    curtain.style.top = "800px";
}

function getLoginFormInfo() {
    const fullName = document.querySelector('.form-box input[placeholder="Full Name"]').value;
    const email = document.querySelector('.form-box input[placeholder="Email"]').value;
    password = document.querySelector('.form-box input[placeholder="Password"]').value;

    console.log('Full Name:', fullName);
    console.log('Email:', email);
    console.log('Password:', password);

    const nameButton = document.querySelector('.topbutton');
    nameButton.innerHTML = "Hello " + fullName;
}

function addToCart(productName, price) {
    const item = {
        name: productName,
        price: price
    };
    cart.push(item);
    updateCartDisplay();
}

function updateCartDisplay() {
    const cartContainer = document.getElementById('cart');
    cartContainer.innerHTML = '';

    for (const item of cart) {
        const cartItem = document.createElement('div');
        cartItem.textContent = `${item.name} - $${item.price}`;
        cartContainer.appendChild(cartItem);
    }
}
*/
// Event listeners for "Add to Cart" buttons
const addToCartButtons = document.querySelectorAll('.add-to-cart-button');
addToCartButtons.forEach(button => {
    button.addEventListener('click', function () {

        console.log("Hell World")
        //const card = this.closest('.newcard');
        const productName = card.querySelector('.deviceName');
        console.log(productName)
   
        //const productPrice = parseFloat(card.querySelector('.product-price').textContent.slice(1));
        addToCart(productName, productPrice);
    });
});

function dropCart() {
    cartMenu.style.top = (cartMenu.style.top === '0px') ? '-600px' : '0px';
}

function dropProfile() {
    profileMenu.style.top = (profileMenu.style.top === '0px') ? '-600px' : '0px';
    setProfile();
}

function setProfile() {
    profInfo.innerHTML = `<p>Name: ${name}</p><p>Email: ${email}</p><p>Password: ${password}</p>`;
}

function submitForm() {
    name = document.getElementById('name').value;
    email = document.getElementById('email').value;
    password = document.getElementById('password').value;
    console.log(`Name: ${name}\nEmail: ${email}\nPassword: ${password}`);
}

/*
function LetsFilter() {
    const selectedOptions = {};

    // Get selected performance option
    const selectedPerformance = document.querySelector('input[name="radio"]:checked');
    if (selectedPerformance) {
        selectedOptions.performance = selectedPerformance.nextElementSibling.innerText;
    }

    // Get selected price option
    const selectedPrice = document.querySelector('input[name="radio2"]:checked');
    if (selectedPrice) {
        selectedOptions.price = selectedPrice.nextElementSibling.innerText;
    }

    // Get selected storage option
    const selectedStorage = document.querySelector('input[name="radio3"]:checked');
    if (selectedStorage) {
        selectedOptions.storage = selectedStorage.nextElementSibling.innerText;
    }

    // Get selected purpose option
    const selectedPurpose = document.querySelector('input[name="radio4"]:checked');
    if (selectedPurpose) {
        selectedOptions.purpose = selectedPurpose.nextElementSibling.innerText;
    }

    // Get the keywords
    const keywords = document.querySelector('.inputFilter').value.trim();
    if (keywords) {
        selectedOptions.keywords = keywords;
    }

    // Log the selected options
    console.log(selectedOptions);
}

let bill = document.querySelector('.bill')



function seeBill(params) {
// Get data from localStorage
var cartArray = JSON.parse(localStorage.getItem('cart'));
console.log(cartArray)

bill.innerHTML = cartArray;




}

function goToFilter() {
    console.log("lets go to filter")
    window.location.href = "filters.php";
}

function goToHome() {
    console.log("lets go to filter")
    window.location.href = "homepage.php";
}


function goToCheckout() {
    console.log("Lets go to checkout");
    
    // Save data to localStorage using the correct array name 'cart'
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Redirect to the checkout page
    window.location.href = "checkout.html";
}*/
