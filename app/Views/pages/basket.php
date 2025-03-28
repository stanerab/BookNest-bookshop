<body>

    <div id="basket">
        <h1>Your Basket</h1>
        <ul id="basketItems"></ul>
        <p id="total">Total: £0.00</p>
        <button onclick="checkout()">Checkout</button>
    </div>
    <div id="products">
        <h2>Available Products</h2>
        <ul id="productList">
            <li>
                <button onclick="addToBasket('great uncle by harry micheal palin', 56.90)">
                    Add great uncle by harry micheal palin(£56.90)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('British Imperial What the Empire Wasn', 22.99)">
                    Add British Imperial What the Empire Wasn't(£22.99)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('That Shaped the bristish empire', 46.22)">
                    Add That Shaped the bristish empire (£46.22)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('The Making of the British Empire', 19.70)">
                    Add The Making of the British Empire(£19.70)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('Time, the newsmagazine by sir anthony eden', 66.99)">
                    Add Time, the newsmagazine by sir anthony eden (£66.99)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('Farewell to the Horses by Robert Elverstone', 28.00)">
                    Add Farewell to the Horses by Robert Elverstone (£28.00)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('Ulster, Ireland and the Somme', 33.95)">
                    Add Ulster, Ireland and the Somme (£33.95)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('Lest We Forget by Professor Maggie Andrews', 36.99)">
                    Add Lest We Forget by Professor Maggie Andrews (£36.99)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('Somme 1916 by Gerald Gliddon', 42.60)">
                    Somme 1916 by Gerald Gliddon (£42.60)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('A Few Bad Men by Major Fred Galvin', 45.95)">
                    Add A Few Bad Men by Major Fred Galvin (£45.95)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('Arabia A Journey Through the Heart of the Middle East', 64.90)">
                    Add Arabia A Journey Through the Heart of the Middle East (£64.90)
                </button>
            </li>
            <li>
                <button onclick="addToBasket('De duik, welkom in het paradijs by Sara Ochs', 22.95)">
                    Add De duik, welkom in het paradijs by Sara Ochs (£22.95)
                </button>
            </li>
            <script>
                const basketItems =
                    JSON.parse(sessionStorage.getItem("basketItems")) || [];

                function addToBasket(productName, price) {
                    basketItems.push({ name: productName, price: price });
                    renderBasket();
                }

                function removeFromBasket(index) {
                    basketItems.splice(index, 1);
                    renderBasket();
                }

                function renderBasket() {
                    const basketList = document.getElementById("basketItems");
                    basketList.innerHTML = "";
                    let total = 0;
                    basketItems.forEach((item, index) => {
                        const listItem = document.createElement("li");
                        listItem.textContent = `${item.name} - £${item.price.toFixed(2)}`;
                        const removeButton = document.createElement("button");
                        removeButton.textContent = "Remove";
                        removeButton.onclick = () => removeFromBasket(index);
                        listItem.appendChild(removeButton);
                        basketList.appendChild(listItem);
                        total += item.price;
                    });
                    document.getElementById("total").textContent = `Total: £${total.toFixed(
                        2
                    )}`;
                    sessionStorage.setItem("basketItems", JSON.stringify(basketItems));
                }

                function checkout() {
                    if (basketItems.length === 0) {
                        alert("Your basket is empty!");
                    } else {
                        window.location.href = "payment"; // Redirect to payment.html
                    }
                }

                // Initialize basket items on page load
                renderBasket();
            </script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
</body>