function filterProducts(category){

    const products =
    document.querySelectorAll('.product-card');

    products.forEach(product => {

        if(category === 'all'){

            product.style.display = 'block';

        }

        else if(
            product.classList.contains(category)
        ){

            product.style.display = 'block';

        }

        else{

            product.style.display = 'none';

        }

    });

}
function addToCart(name, price){

    let cart =
    JSON.parse(
    localStorage.getItem('cart')
    ) || [];

    cart.push({
        name:name,
        price:price,
        quantity:1
    });

    localStorage.setItem(
        'cart',
        JSON.stringify(cart)
    );

    alert(name + " added to cart!");
}

function displayCart(){

    let cart =
    JSON.parse(
    localStorage.getItem('cart')
    ) || [];

    const cartContainer =
    document.getElementById('cart-items');

    if(!cartContainer) return;

    cartContainer.innerHTML = '';

    let total = 0;

    cart.forEach((item,index)=>{

        total +=
        item.price *
        item.quantity;

        cartContainer.innerHTML += `
        <div class="cart-item">

            <div class="cart-info">
                <h3>${item.name}</h3>

                <p>Price: $${item.price}</p>

                <p>Quantity: ${item.quantity}</p>

                <p>
                    Subtotal:
                    $${item.price * item.quantity}
                </p>
            </div>

            <div class="cart-actions">

                <button onclick="increaseQuantity(${index})">
                    +
                </button>

                <button onclick="decreaseQuantity(${index})">
                    -
                </button>

                <button onclick="removeItem(${index})">
                    Remove
                </button>

            </div>

        </div>
        `;
    });

    document.getElementById(
    'cart-total'
    ).innerText =
    "Total: $" + total;
}
function increaseQuantity(index){

    let cart =
    JSON.parse(
    localStorage.getItem('cart')
    );

    cart[index].quantity++;

    localStorage.setItem(
        'cart',
        JSON.stringify(cart)
    );

    displayCart();
}
function decreaseQuantity(index){

    let cart =
    JSON.parse(
    localStorage.getItem('cart')
    );

    if(
        cart[index].quantity > 1
    ){
        cart[index].quantity--;
    }

    localStorage.setItem(
        'cart',
        JSON.stringify(cart)
    );

    displayCart();
}
function removeItem(index){

    let cart =
    JSON.parse(
    localStorage.getItem('cart')
    );

    cart.splice(index,1);

    localStorage.setItem(
        'cart',
        JSON.stringify(cart)
    );

    displayCart();
}

function displayOrderSummary(){

    let cart =
    JSON.parse(
    localStorage.getItem('cart')
    ) || [];

    const summary =
    document.getElementById(
        'order-summary'
    );

    if(!summary) return;

    let total = 0;

    summary.innerHTML =
    "<h3>Order Summary</h3>";

    cart.forEach(item => {

        total +=
        item.price *
        item.quantity;

        summary.innerHTML +=
        `
        <p>
        ${item.name}
        x ${item.quantity}
        =
        $${item.price * item.quantity}
        </p>
        `;
    });

    summary.innerHTML +=
    `<h4>Total: $${total}</h4>`;
}

const checkoutForm =
document.getElementById(
'checkout-form'
);

if(checkoutForm){

    checkoutForm.addEventListener(
    'submit',

    function(event){

        event.preventDefault();

        localStorage.removeItem(
        'cart'
        );

        window.location.href =
        "order-confirmation.html";

    });

}


displayCart();
displayOrderSummary();