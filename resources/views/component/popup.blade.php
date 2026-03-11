<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<div id="popupPricing" class="popup-overlay">
    
    <button onclick="closePopup()" class="close-popup">✕</button>
    <div class="popup-box">


        <div class="opsi-container">

            <!-- LEFT -->
            <div class="opsi-left">

                <h1>
                    Kasir digital simpel buat
                    <span class="highlight">RAPIIN</span>
                    bisnis kamu
                </h1>

                {{-- <div class="package-selector">
                    @foreach($pricings as $index => $pricing)
                        <button class="btn-opsi" onclick="gantiPaket({{ $index }})">
                            {{ $pricing->harga_lengkap }}
                        </button>
                    @endforeach
                </div> --}}
                <div class="package-selector">
                    @foreach($pricings as $index => $pricing)
                        <button 
                            class="btn-opsi {{ $index == 1 ? 'best' : '' }}" 
                            onclick="gantiPaket({{ $index }})"
                        >
                            @if($index == 1)
                                <span class="badge-best">Best</span>
                            @endif

                            {{ $pricing->harga_lengkap }}
                        </button>
                    @endforeach
                </div>

                <div class="benefit-container">
                    <h3>Benefit</h3>
                    <ul id="benefit-list" class="card-features">
                        @foreach(explode(',', $pricings[0]->fitur) as $fitur)
                            <li>{{ trim($fitur) }}</li>
                        @endforeach
                    </ul>
                </div>

                <a href="#" class="btn" onclick="mulaiSekarang()">Mulai Sekarang</a>
                <p class="text-popup">Nikmati seluruh benefit setelah mengaktifkan langganan</p>

            </div>

            <!-- RIGHT -->
            <div class="opsi-right">
                <img src="{{ asset ('rapiin') }}/foto/rectangle 155.png" class="opsi-img">
            </div>
        </div>
    </div>
</div>

<script>
    const pricings = @json($pricings);
    const popup = document.getElementById("popupPricing")
    function openPopup(index = 0){
        popup.classList.add("active")
        document.body.classList.add("no-scroll")
        gantiPaket(index)
    }
    
    function closePopup(){
        popup.classList.remove("active")
        document.body.classList.remove("no-scroll")
    }
    
    function gantiPaket(index){
        const paket = pricings[index]
        paketDipilih = paket.harga_lengkap
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

    function mulaiSekarang(){
    let paketDipilih = ""
    let nomor = "6245678909876" //no telepon 
    let pesan = "Hai saya ingin berlangganan paket " + paketDipilih
    let url = "https://wa.me/" + nomor + "?text=" + encodeURIComponent(pesan)
    window.open(url, "_blank")
    }

    window.onload = function(){
        gantiPaket(0)
    }
</script>