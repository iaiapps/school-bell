@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="card  text-white mb-4">
                <div class="card-header bg-primary">Tanggal Sekarangg</div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <p id="hari" class="fs-2 m-0 text-black">tanggal </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card  text-white mb-4">
                <div class="card-header bg-primary">Jam Sekarang</div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <p id="jam" class="fs-2 m-0 text-black"> waktu </p>
                </div>
            </div>

        </div>
    </div>

    <div>
        <p class="bg-primary py-2 px-3 rounded text-white">Jadwal Aktif Kategori : <span
                class="fw-bold">{{ $kelompok->name }}</span> </p>
        <ul class="list-group">
            @foreach ($schedules as $schedule)
                <li class="list-group-item"> {{ $schedule->name }} - {{ $schedule->time }}</li>
            @endforeach
        </ul>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/howler/howler.min.js.js') }}"></script>

    <script>
        // fungsi waktu
        const time = () => {
            let jam = new Date().toLocaleTimeString("en-US", {
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit",
                hour12: false,
            });

            let hari = new Date().toLocaleDateString("id-ID", {
                weekday: "long",
                day: "numeric",
                month: "long",
                year: "numeric",
            });
            document.getElementById("jam").innerHTML = jam;
            document.getElementById("hari").innerHTML = hari;

        }
        setInterval(() => {
            time();
        }, 1000);

        //  -------------------------------------------  //
        // bunyi sound

        let currentAudio = null; // Variabel untuk menyimpan audio yang sedang dimainkan
        function checkBell() {
            const schedules = @json($schedules); // variabel schedule
            const currentTime = new Date().toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });

            const schedule = schedules.find(schedule => schedule.time === currentTime);
            if (!schedule) return;

            const audio = new Howl({
                src: [`/sound-file/${schedule.file.file}`],
                onend: () => {
                    currentAudio = null; // Reset currentAudio setelah audio selesai
                }
            });

            if (currentAudio) {
                currentAudio.stop(); // Hentikan audio sebelumnya jika ada
            }

            currentAudio = audio; // Set audio saat ini
            currentAudio.play(); // Mainkan audio baru
        }

        setInterval(checkBell, 1000); // Check for schedule every 1 second
    </script>
@endpush
