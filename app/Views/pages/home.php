<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        <!--boot camp carousel slidder-->

    </div>
    <div class="carousel-inner" style="height: 100%;">
        <div class="carousel-item active">
            <img src="./images/book-banner.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./images/banner3.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
        </div>
        <div class="carousel-item">
            <img src="./images/book-banner2.avif" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> <!--boot camp carousel slidder-->


<div class="container my-5">
    <h1 style="font-weight: bold; font-size: 20px;">Best Sellers</h1>
    <div class="row text-decoration-none">

        <h2><?= esc($title) ?></h2>

        <?php if ($news_list !== []): ?>

            <?php foreach ($news_list as $news_item): ?>

                <div class="col-md-6 col-xl-3 col-lg-4 col-sm-3 mt-3">

                    <div style="box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;" class="card shadow-sm">
                        <img src="./images/<?= esc($news_item['images']) ?>" style="height:400px; width:100%;" alt="">
                        <div class="card-body">
                            <h5 class="card-text"><?= esc($news_item['title']) ?></h5>
                            <p class="fs-5 p-1 fw-bold">£<?= esc($news_item['price']) ?></p>
                            <hr>
                            <div class="justify-content-between">
                                <div class="btn-group">
                                    <a href="./pages/<?= esc($news_item['slug'], 'url') ?>">
                                        <button title="View book description" type="button" class="btn btn-sm btn-info"><i
                                                class="bi bi-eye"></i>
                                            View
                                        </button>
                                    </a>
                                    <button title="Add to cart"
                                        onclick="addToBasket('<?= esc($news_item['title']) ?>', <?= esc($news_item['price']) ?>)"
                                        class="btn btn-sm btn-primary"><i class="bi bi-cart"></i>
                                        Cart
                                    </button>

                                    </a>
                                </div>
                                <span style="float:right;" class="text-body-secondary">
                                    <strong>
                                        <i class="bi bi-calendar"></i>
                                        <?= date('F j', strtotime(esc($news_item['created_at']))) ?>
                                    </strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>

        <?php else: ?>

            <h3>No News</h3>

            <p>Unable to find any news for you.</p>

        <?php endif ?>

    </div>



    <div class="mt-4 p-3 rounded w-100 h-auto text-decoration-none">
        <h3>Bookshop near me</h3>
        <div id="map-container">
            <p>Loading map...</p>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showMap, showError);
        } else {
            document.getElementById("map-container").innerHTML = "<p>Geolocation is not supported by your browser.</p>";
        }

        function showMap(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            const query = `bookshops`;
            const mapURL = `https://www.google.com/maps?q=${query}&ll=${lat},${lng}&z=14&output=embed`;

            const iframe = `<iframe
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        src="${mapURL}">
      </iframe>`;

            document.getElementById("map-container").innerHTML = iframe;
        }

        function showError(error) {
            let message = "Unable to retrieve your location.";
            if (error.code === error.PERMISSION_DENIED) {
                message = "Location access was denied. Showing default map.";
            }

            const fallbackIframe = `<iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2423.9801138425496!2d-2.130058023429131!3d52.588052772079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487083cb0f37dc97%3A0x9cb8e3cc0509a0d0!2sUniversity%20of%20Wolverhampton!5e0!3m2!1sen!2suk!4v1743168182781!5m2!1sen!2suk" 
      width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade"></iframe>`;

            document.getElementById("map-container").innerHTML = `<p>${message}</p>${fallbackIframe}`;
        }

        function addToBasket(productName, price) {
            let basketItems = JSON.parse(sessionStorage.getItem('basketItems')) || [];

            basketItems.push({ name: productName, price: price });

            sessionStorage.setItem('basketItems', JSON.stringify(basketItems));

            alert(`Added ${productName} to basket.`);
        }
    </script>

</div>