function filterProducts(category){

    const products = document.querySelectorAll('.product-card');

    products.forEach(product => {

        const match = product.classList.contains(category);

        if(category === 'all' || match){
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }

    });

}

/* CART  */

function addToCart(name, price, image){

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    let existing = cart.find(item => item.name === name);

    if(existing){
        existing.quantity += 1;
    } else {
        cart.push({
            name: name,
            price: price,
            image: image,
            quantity: 1
        });
    }

    localStorage.setItem("cart", JSON.stringify(cart));

    alert("Added to cart!");
}

/* DISPLAY CART */

function displayCart(){

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    const cartContainer = document.getElementById("cart-items");
    const totalBox = document.getElementById("cart-total");
    const emptyCartBox = document.getElementById("empty-cart");

    if(!cartContainer) return;

    cartContainer.innerHTML = "";

    let total = 0;

    // EMPTY CART HANDLING
    if(cart.length === 0){

        if(emptyCartBox) emptyCartBox.style.display = "block";
        cartContainer.style.display = "none";

        if(totalBox) totalBox.innerText = "Total: $0";

        return;
    }

    // SHOW CART
    if(emptyCartBox) emptyCartBox.style.display = "none";
    cartContainer.style.display = "block";

    cart.forEach((item, index) => {

        total += item.price * item.quantity;

        cartContainer.innerHTML += `
        <div class="cart-item">

            <!-- IMAGE (fallback if missing) -->
            <img class="cart-img" src="images/${item.image ? item.image : 'placeholder.avif'}">

            <!-- INFO -->
            <div class="cart-info">
                <h3>${item.name}</h3>
                <p>Price: $${item.price}</p>
                <p>Quantity: ${item.quantity}</p>
                <p><strong>Subtotal: $${item.price * item.quantity}</strong></p>
            </div>

            <!-- ACTIONS -->
            <div class="cart-actions">

                <button onclick="increaseQuantity(${index})">+</button>
                <button onclick="decreaseQuantity(${index})">-</button>
                <button onclick="removeItem(${index})">✕</button>

            </div>

        </div>
        `;
    });

    // TOTAL UPDATE
    if(totalBox){
        totalBox.innerText = "Total: $" + total.toFixed(2);
    }
}

/*  CART ACTIONS  */

function increaseQuantity(index){

    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    cart[index].quantity++;

    localStorage.setItem('cart', JSON.stringify(cart));

    displayCart();
}

function decreaseQuantity(index){

    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    if(cart[index].quantity > 1){
        cart[index].quantity--;
    }

    localStorage.setItem('cart', JSON.stringify(cart));

    displayCart();
}

function removeItem(index){

    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    cart.splice(index,1);

    localStorage.setItem('cart', JSON.stringify(cart));

    displayCart();
}

/*  ORDER SUMMARY  */

function displayOrderSummary(){

    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    const summary = document.getElementById('order-summary');

    if(!summary) return;

    let total = 0;

    summary.innerHTML = "<h3>Order Summary</h3>";

    cart.forEach(item => {

        total += item.price * item.quantity;

        summary.innerHTML += `
        <p>${item.name} x ${item.quantity} = $${item.price * item.quantity}</p>`;
    });

    summary.innerHTML += `<h4>Total: $${total}</h4>`;
}

/*  CHECKOUT  */

document.addEventListener("DOMContentLoaded", function(){

    const form = document.getElementById("checkout-form");

    if(form){

        form.addEventListener("submit", function(){

            // send cart to backend
            let cart = localStorage.getItem("cart");

            const input = document.getElementById("cart_data");
            if(input){
                input.value = cart;
            }

            // IMPORTANT: clear cart immediately after sending
            localStorage.removeItem("cart");

        });

    }

});

    displayCart();
    displayOrderSummary();