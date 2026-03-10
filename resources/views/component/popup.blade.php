<div id="popupPricing" class="popup-overlay">

    <div class="popup-box">

        <button onclick="closePopup()" class="close-popup">✕</button>

        <div class="opsi-container">

            <!-- LEFT -->
            <div class="opsi-left">

                <h1>
                    Kasir digital simpel buat
                    <span class="highlight">RAPIIN</span>
                    bisnis kamu
                </h1>

                <div class="package-selector">
                    @foreach($pricings as $index => $pricing)
                        <button class="btn-opsi" onclick="gantiPaket({{ $index }})">
                            {{ $pricing->harga_lengkap }}
                        </button>
                    @endforeach
                </div>

                <div class="benefit-container">
                    <h3>Benefit</h3>
                    <ul id="benefit-list">
                        @foreach(explode(',', $pricings[0]->fitur) as $fitur)
                            <li>{{ trim($fitur) }}</li>
                        @endforeach
                    </ul>
                </div>

                <a href="#" class="btn">Mulai Sekarang</a>

                <h5>Nikmati seluruh benefit setelah mengaktifkan langganan.</h5>

            </div>

            <!-- RIGHT -->
            <div class="opsi-right">
                <img src="{{ asset ('rapiin') }}/foto/image 25.png" class="opsi-img">
            </div>
        </div>
    </div>
</div>

<script>
const pricings = @json($pricings);
const popup = document.getElementById("popupPricing")
function openPopup(){
    popup.style.display = "flex"
}
function closePopup(){
    popup.style.display = "none"
}
function gantiPaket(index){
    const paket = pricings[index]
    const benefitList = document.getElementById("benefit-list")
    benefitList.innerHTML = ""
    const fitur = paket.fitur.split(",")
    fitur.forEach(function(item){
        benefitList.innerHTML += "<li>" + item.trim() + "</li>"
    })
    // ambil semua tombol paket
    const buttons = document.querySelectorAll(".btn-opsi")
    // hapus active semua
    buttons.forEach(btn => btn.classList.remove("active"))
    // kasih active ke tombol yang dipilih
    buttons[index].classList.add("active")

}
window.onload = function(){
    gantiPaket(0)
}
</script>