<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Contact Us</h2>

        <?php if (session()->has('success')): ?>
            <div class="alert alert-success"><?= session('success') ?></div>
        <?php elseif (session()->has('error')): ?>
            <div class="alert alert-danger"><?= session('error') ?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="<?= base_url('contact/submit') ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>