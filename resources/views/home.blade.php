@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="card  text-white mb-4">
                <div class="card-header bg-primary">Tanggal Sekarangg</div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <p id="hari" class="fs-2 m-0 text-black">dateNow </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card  text-white mb-4">
                <div class="card-header bg-primary">Jam Sekarang</div>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <p id="jam" class="fs-2 fw-bold m-0 text-black"> timeNow </p>
                </div>
            </div>

        </div>
    </div>

    {{-- <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Primary Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Warning Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div> --}}

    <div>
        @foreach ($schedules as $schedule)
            <p>{{ $schedule->file }} </p>
        @endforeach
    </div>
    <button id="play">play</button>

    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4">
                <div class="card-header">
                    Jumlah Jadwal
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card mb-4">
                <div class="card-header">
                    Grup yang Aktif
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card mb-4">
                <div class="card-header">
                    Grup yang Aktif
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    <script>
        // fungsi waktu
        const time = () => {
            let jam = new Date().toLocaleTimeString("id-ID", {
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit"
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

        // bunyi sound
        let audio;

        function enableAudio() {
            audio = new Audio('/bell.mp3');
            audio.load(); // Preload audio untuk memastikan bisa diputar nanti
            alert('Audio diaktifkan. Bel akan berbunyi otomatis sesuai jadwal.');
        }
        // Minta pengguna mengaktifkan audio
        document.addEventListener('click', enableAudio, {
            once: true
        });

        function playBell() {
            if (audio) {
                audio.play()
                    .then(() => console.log('Audio dimainkan'))
                    .catch(error => console.error('Gagal memainkan audio:', error));
            }
        }

        function checkBell() {
            const schedules = @json($schedules);
            const currentTime = new Date().toLocaleTimeString('en-GB', {
                hour12: false
            });
            console.log(schedules);
            schedules.forEach(schedule => {
                // console.log(schedule.time);
                // console.log(currentTime);
                if (schedule.time === currentTime) {
                    console.log(`Bel berbunyi: ${schedule.name}`);
                    playBell();
                }
            });
        }


        setInterval(checkBell, 1000);

        // Cek bel setiap menit (5s)
        // document.getElementById("play").addEventListener("click", checkBell);
    </script>
@endpush
