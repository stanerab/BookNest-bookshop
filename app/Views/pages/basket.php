<?php
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if (isset($_POST['add_to_cart'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = ['name' => $name, 'price' => $price, 'quantity' => 1];
    } else {
        $_SESSION['cart'][$id]['quantity']++;
    }
}

// Handle remove from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
}

// Handle update quantity
if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $id => $quantity) {
        $_SESSION['cart'][$id]['quantity'] = $quantity;
    }
}

// Display cart items
$total = 0;
?>

<h2>Shopping Basket</h2>
<form method="post">
    <table border="1">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $id => $item): ?>
            <tr>
                <td><?= $item['name'] ?></td>
                <td>£<?= number_format($item['price'], 2) ?></td>
                <td><input type="number" name="quantity[<?= $id ?>]" value="<?= $item['quantity'] ?>" min="1"></td>
                <td>£<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                <td><a href="?remove=<?= $id ?>">Remove</a></td>
            </tr>
            <?php $total += $item['price'] * $item['quantity']; ?>
        <?php endforeach; ?>
    </table>
    <p><strong>Total: £<?= number_format($total, 2) ?></strong></p>
    <button type="submit" name="update_cart">Update Cart</button>
</form>
<a href="checkout.php">Checkout</a>