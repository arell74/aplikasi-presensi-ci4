<?= $this->extend('pegawai/layout') ?>

<?= $this->section('content') ?>

<input type="hidden" id="jam_keluar" name="jam_keluar" value="<?= $jam_keluar; ?>">
<input type="hidden" id="tanggal_keluar" name="tanggal_keluar" value="<?= $tanggal_keluar; ?>">

<div class="d-flex flex-column align-items-center mt-4">

    <div class="position-relative d-flex justify-content-center"
        style="width: 320px; height: 240px; margin-top:20px;">

        <div class="position-relative shadow"
            style="width: 100%; height: 100%; overflow: hidden; 
                border: 5px solid #FB4141; border-radius: 15px;     ">
            <div id="my_camera"></div>
        </div>

        <img src="<?= base_url('profile/zani.png'); ?>"
            alt="Sticker"
            style="
            position: absolute;
            top: -70px;
            right: -20px;  
            width: 100px;
            height: auto;
            z-index: 10;
            transform: rotate(10deg); 
        ">
    </div>

    <button type="button" class="btn btn-danger mt-3 px-4 py-2 fw-bold shadow"
        id="ambil-foto-keluar" style="transition:0.3s; border-radius:50px;">
        📸 Keluar
    </button>

    <div class="mt-3" id="my_result"
        style="width: 320px; height: 240px; border: 2px dashed #aaa;
                /* display: flex; align-items: center; justify-content: center; */
                display: none;
                background: #f8f9fa; border-radius: 10px; overflow:hidden;">
        <span style="color:#888;">Hasil foto muncul di sini</span>
    </div>

</div>

<!-- webcam js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    Webcam.set({
        width: 320,
        height: 240,
        dest_width: 320,
        dest_height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90,
        force_flash: false,
    });

    Webcam.attach('#my_camera');

    document.getElementById('ambil-foto-keluar').addEventListener('click', function() {
        let tanggal_keluar = document.getElementById('tanggal_keluar').value;
        let jam_keluar = document.getElementById('jam_keluar').value;

        Webcam.snap(function(data_uri) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    window.location.href = '<?= base_url('pegawai/home'); ?>';
                }
            };
            xhttp.open("POST", "<?= base_url('pegawai/presensi_keluar_aksi/' . $id_presensi); ?>", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(
                'foto_keluar=' + encodeURIComponent(data_uri) +
                '&tanggal_keluar=' + tanggal_keluar +
                '&jam_keluar=' + jam_keluar
            );

        })

    });

    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from {opacity:0; transform:scale(0.95);}
            to {opacity:1; transform:scale(1);}
        }
        #ambil-foto-keluar:hover { transform:scale(1.05); }
    `;
    document.head.appendChild(style);
</script>

<?= $this->endSection() ?>