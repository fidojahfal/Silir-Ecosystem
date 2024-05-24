<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Silir</title>
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">Transaction Ticket</h2>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <section class="sample-text-area">
        <div class="container">
            <form class="row" action="{{ route('tiket.checkout') }}" method="post" id="tiketForm"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ session('email') ?? '' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumTicket">Number Ticket :</label>
                        <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" min="1"
                            value="1" required>
                    </div>
                    <div class="form-group">
                        <label for="eventName">Event Name :</label>
                        <input type="text" class="form-control" id="eventName" name="eventName"
                            value="{{ $event_data['data']['nama_event'] }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="price">Price :</label>
                        <input type="text" class="form-control" id="biaya_masuk" name="biaya_masuk"
                            value="{{ $event_data['data']['biaya_masuk'] }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="payment">Payment :</label>
                    <div class="form-group text-center">
                        <select class="form-control custom-select" id="payment" name="payment" required>
                            <option value="" selected disabled>-- Pilih Payment --</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="PayPal">PayPal</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="total">Total :</label>
                        <input type="text" class="form-control" id="total" name="total"
                            value="{{ $event_data['data']['biaya_masuk'] }}" readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="attachment">Upload Bukti Pembayaran :</label>
                        <input type="file" class="form-control-file" id="attachment" name="bukti_pembayaran">
                    </div>
                </div>
                <input type="hidden" class="form-control" name="id_event"
                    value="{{ $event_data['data']['id_event'] }}">
                <div class="col-md-12 text-right"><br>
                    <button type="button" class="btn btn-secondary button_hover2" onclick="goBack()">Back</button>
                    <button type="submit" id="submitBtn" class="btn theme_btn button_hover">Buy</button>
                </div>
            </form>
        </div>
    </section>
    @include('footer')
    @include('script')
    <script>
        // Ambil elemen input pertama (jumlah_tiket) dan input kedua (total)
        const inputJumlahTiket = document.getElementById('jumlah_tiket');
        const inputTotal = document.getElementById('total');

        // Ambil nilai biaya_masuk dari variabel event_data di controller (contoh: 10000)
        const biayaMasuk = {{ $event_data['data']['biaya_masuk'] }};

        // Tambahkan event listener untuk memantau perubahan pada input pertama
        inputJumlahTiket.addEventListener('input', function() {
            // Ambil nilai dari input pertama (jumlah_tiket)
            const jumlahTiket = parseInt(inputJumlahTiket.value);

            // Hitung nilai untuk input kedua (total) berdasarkan nilai biaya_masuk dan perubahan pada input pertama
            const total = jumlahTiket * biayaMasuk;

            // Set nilai pada input kedua (total)
            inputTotal.value = total;
        });
    </script>
    <script>
        const jumlahTiketInput = document.getElementById('jumlah_tiket');
        const submitBtn = document.getElementById('submitBtn');
        const tiketForm = document.getElementById('tiketForm');

        // Tambahkan event listener untuk memantau perubahan pada input jumlah_tiket
        jumlahTiketInput.addEventListener('input', function() {
            const jumlahTiketValue = parseInt(jumlahTiketInput.value);

            // Jika nilai jumlah_tiket adalah 0, nonaktifkan tombol submit
            if (jumlahTiketValue === 0) {
                submitBtn.disabled = true;
            } else {
                submitBtn.disabled = false;
            }
        });

        // Tambahkan event listener pada form untuk mencegah pengiriman jika nilai jumlah_tiket adalah 0 saat form di-submit
        tiketForm.addEventListener('submit', function(event) {
            const jumlahTiketValue = parseInt(jumlahTiketInput.value);

            if (jumlahTiketValue === 0) {
                event.preventDefault(); // Mencegah pengiriman form
                alert('Jumlah tiket harus lebih dari 0.');
            }
        });
    </script>
</body>

</html>
