<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer>
        function validatePayment() {
            let cardNumber = document.getElementById("cardNumber").value;
            let expiry = document.getElementById("expiryDate").value;
            let cvv = document.getElementById("cvv").value;
            if (cardNumber.length !== 16 || isNaN(cardNumber)) {
                alert("Please enter a valid 16-digit card number.");
                return false;
            }
            if (!expiry.match(/^(0[1-9]|1[0-2])\/(\d{2})$/)) {
                alert("Please enter a valid expiry date in MM/YY format.");
                return false;
            }
            if (cvv.length !== 3 || isNaN(cvv)) {
                alert("Please enter a valid 3-digit CVV.");
                return false;
            }
            alert("Payment successful!");
            return true;
        }
    </script>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 shadow-sm">
            <h2 class="mb-4">Payment Details</h2>
            <form onsubmit="return validatePayment()">
                <div class="mb-3">
                    <label class="form-label">Card Number</label>
                    <input type="text" id="cardNumber" class="form-control" placeholder="1234 5678 9012 3456" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Expiry Date (MM/YY)</label>
                    <input type="text" id="expiryDate" class="form-control" placeholder="MM/YY" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">CVV</label>
                    <input type="password" id="cvv" class="form-control" placeholder="123" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Pay Now</button>
            </form>
            <div class="text-center mt-4 bg-orange p-3 rounded">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/30/American_Express_logo_%282018%29.svg"
                    alt="AMEX" width="50" class="me-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_Pay_logo.svg" alt="Apple Pay"
                    width="50" class="me-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/Discover_Card_logo.svg" alt="Discover"
                    width="50" class="me-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Google_Pay_Logo.svg" alt="Google Pay"
                    width="50" class="me-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="MasterCard"
                    width="50" class="me-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" width="50"
                    class="me-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/3d/Shopify_Logo.svg" alt="Shopify" width="50"
                    class="me-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b0/UnionPay_logo.svg" alt="UnionPay"
                    width="50" class="me-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa" width="50">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>