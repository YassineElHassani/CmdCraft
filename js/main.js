let cart_container = document.getElementById('cart_container');
let btn = document.getElementById('cart');
let close_btn = document.getElementById('close');
let cartItems = [];
let cartTotal = 0;

btn.addEventListener("click", function() {
    cart_container.style.visibility = "visible";
});

close_btn.addEventListener("click", function() {
    cart_container.style.visibility = "hidden";
});


const products = document.querySelectorAll("#products-container .bg-blue-500");
products.forEach((button, index) => {
    button.addEventListener("click", () => {
        const productElement = button.parentElement.parentElement;
        const productName = productElement.querySelector("h3").textContent;
        const productPrice = parseFloat(
            productElement.querySelector("span").textContent.replace("$", "")
        );

        addToCart(productName, productPrice);
    });
});

function addToCart(name, price) {
    const existingItem = cartItems.find(item => item.name === name);
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cartItems.push({ name, price, quantity: 1 });
    }

    cartTotal += price;
    updateCartDisplay();
}

function updateCartDisplay() {
    const cartItemsContainer = document.getElementById("cart-items");
    const cartTotalElement = document.getElementById("cart-total");
    const productCounter = document.getElementById("counter_products");

    cartItemsContainer.innerHTML = "";
    cartItems.forEach(item => {
        const li = document.createElement("li");
        li.style.backgroundColor = "gray";
        li.style.paddingLeft = "120px";
        li.style.marginTop = "1px";
        li.textContent = `${item.name} - $${item.price.toFixed(2)} x ${item.quantity}`;
        cartItemsContainer.appendChild(li);
    });

    cartTotalElement.textContent = `Total: $${cartTotal.toFixed(2)}`;
    productCounter.textContent = cartItems.reduce((sum, item) => sum + item.quantity, 0);
}

const clearCartButton = document.getElementById("clear-cart");
clearCartButton.addEventListener("click", () => {
    cartItems = [];
    cartTotal = 0;
    updateCartDisplay();
});

const confirmOrderButton = document.getElementById("confirm-order");
confirmOrderButton.addEventListener("click", async () => {
    if (cartItems.length === 0) {
        alert("Your cart is empty!");
        return;
    }

    try {
        const formData = new FormData();
        formData.append("cartData", JSON.stringify(cartItems));

        const response = await fetch("confirmOrder.php", {
            method: "POST",
            body: formData,
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();

        if (data.success) {
            alert("Order confirmed! Thank you.");
            cartItems = [];
            cartTotal = 0;
            updateCartDisplay();
        } else {
            alert(`Error: ${data.message || "Something went wrong!"}`);
        }
    } catch (error) {
        console.error("Error:", error);
        alert("There was an issue with your order. Please try again later.");
    }


});
