<div class="container my-5">
    <h1 style="font-weight: bold; font-size: 20px;"></h1>
    <div class="row justify-content-center text-decoration-none">
        <div class="col-md-6 col-xl-6 col-lg-6 col-sm-6">
            <img src="/bookshop-app-backup/public/images/<?= esc($news['images']) ?>" style="height:600px; width:100%;"
                alt="<?= esc($news['title']) ?> image">
            <h3 class="p-2 fw-bold"><?= esc($news['title']) ?></h3>
            <span style="font-size:15px; font-weight:600; padding:0px 0px 0px 11px;">
                <i class="bi bi-user"></i> Micheal Palin</span>
            &nbsp;&nbsp; | &nbsp;&nbsp;
            <span style="font-size:15px; font-weight:600;"><i class="bi bi-calendar"></i> 28th September,2023</span>

            <h5 class="fs-5 p-3 fw-bold">£<?= esc($news['price']) ?></h5>
            <hr>

            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="<?= base_url('public/payment') ?>" type="button" class="btn btn-sm btn-info">
                        <i class="bi bi-bag"></i> Buy now
                    </a>
                    <a href="basket" type="button"
                        onclick="addToBasket('<?= esc($news['title']) ?>', <?= esc($news['price']) ?>)"
                        class="btn btn-sm btn-primary">
                        <i class="bi bi-cart"></i> Chart
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-6 col-lg-6 col-sm-6">
            <h4><strong>About this book</strong></h4>
            <?= esc($news['body']) ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script>

        function addToBasket(productName, price) {
            let basketItems = JSON.parse(sessionStorage.getItem('basketItems')) || [];

            basketItems.push({ name: productName, price: price });

            sessionStorage.setItem('basketItems', JSON.stringify(basketItems));

            alert(`Added ${productName} to basket.`);
        }
    </script>