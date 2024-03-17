<!-- billing.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    <div id="cartItems"></div>
    <button onclick="displayCart()">See Bill</button>
    <script src="backend.js"></script>
    <script>
        function displayCart() {
            const retrievedArray = JSON.parse(localStorage.getItem('cart'));
            const cartItemsDiv = document.getElementById('cartItems');
            cartItemsDiv.innerHTML = ''; // Clear previous content
            
            if (retrievedArray && retrievedArray.length > 0) {
                retrievedArray.forEach(item => {
                    const itemDiv = document.createElement('div');
                    itemDiv.innerHTML = `
                        <p>Product Name: ${item.name}</p>
                        <p>Price: $${item.price.toFixed(2)}</p>
                        <button onclick="removeFromCart('${item.name}', ${item.price})">Remove</button>
                        <hr>
                    `;
                    cartItemsDiv.appendChild(itemDiv);
                });
            } else {
                cartItemsDiv.innerHTML = '<p>Your cart is empty.</p>';
            }
        }

        function removeFromCart(name, price) {
            const retrievedArray = JSON.parse(localStorage.getItem('cart'));
            const updatedArray = retrievedArray.filter(item => !(item.name === name && item.price === price));
            localStorage.setItem('cart', JSON.stringify(updatedArray));
            displayCart(); // Refresh cart display
        }

        // Initial display
        displayCart();
    </script>
</body>
</html>

