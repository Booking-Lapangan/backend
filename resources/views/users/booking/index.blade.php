@include('layout.navbar')
@include('layout.navbar-nav')

<div class="container text-center mt-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="bookingDate" class="form-label">Pilih Tanggal Booking</label>
            <input type="date" class="form-control" id="bookingDate" value="{{ $selectedDate }}" onchange="updateSchedules()">
        </div>
        <div class="col-md-6">
            <label for="lapanganSelect" class="form-label">Pilih Lapangan</label>
            <select class="form-select" id="lapanganSelect" onchange="updateSchedules()">
                @foreach($lapangans as $lapangan)
                    <option value="{{ $lapangan->id }}" {{ $lapangan->id == $selectedLapanganId ? 'selected' : '' }}>{{ $lapangan->title }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        @for ($hour = 9; $hour <= 20; $hour++)
            @php
                $schedule = $schedules->get($hour);
                $status = $schedule ? $schedule->status : 'available';
                $bgClass = $status == 'booked' ? 'bg-booked' : 'bg-available';
                $price = ($hour < 18) ? '120.000,00' : '150.000,00';
            @endphp

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card-jadwal">
                    <div class="card-body-jadwal {{ $bgClass }}" id="schedule-{{ $hour }}">
                        <p class="mb-2">{{ sprintf('%02d:00 - %02d:00', $hour, $hour + 1) }}</p>
                        <p class="fw-bold fs-4">Rp.{{ $price }}</p>
                        <p class="fw-bold fs-5">{{ ucfirst($status) }}</p>
                        <button class="btn {{ $status == 'available' ? 'btn-book' : 'btn-cancel' }}" onclick="{{ $status == 'available' ? "bookSchedule($hour)" : "cancelBooking($hour)" }}">
                            {{ $status == 'available' ? '+' : '-' }}
                        </button>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <button class="btn btn-primary mt-4" id="proceedPayment">Lanjutkan Pembayaran</button>
</div>

<script>
function bookSchedule(hour) {
    const date = document.getElementById("bookingDate").value;
    const lapanganId = document.getElementById("lapanganSelect").value;

    fetch("{{ route('user.add.cart') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: JSON.stringify({
            hour: hour,
            date: date,
            lapangan_id: lapanganId,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                const card = document.getElementById(`schedule-${hour}`);
                card.classList.remove("bg-available");
                card.classList.add("bg-booked");
                card.querySelector("p.fs-5").textContent = "Booked";
                const button = card.querySelector("button");
                button.classList.replace("btn-book", "btn-cancel");
                button.textContent = "-";
                button.setAttribute("onclick", `cancelBooking(${hour})`);
            }
        });
}

function cancelBooking(hour) {
    const date = document.getElementById("bookingDate").value;
    const lapanganId = document.getElementById("lapanganSelect").value;

    fetch("{{ route('user.remove.cart') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: JSON.stringify({
            hour: hour,
            date: date,
            lapangan_id: lapanganId,
        }),
    })
        .then((response) => response.json())
        // .then((data) => {
        .then((data) => {
            if (data.success) {
                const card = document.getElementById(`schedule-${hour}`);
                card.classList.remove('bg-booked');
                card.classList.add('bg-available');
                card.querySelector('p.fs-5').textContent = 'Available';
                const button = card.querySelector('button');
                button.classList.replace('btn-cancel', 'btn-book');
                button.textContent = '+';
                button.setAttribute('onclick', `bookSchedule(${hour})`);
            }
        });
}

function updateSchedules() {
    const date = document.getElementById("bookingDate").value;
    const lapanganId = document.getElementById("lapanganSelect").value;
    window.location.href = `/jadwal?date=${date}&lapangan_id=${lapanganId}`;
}
</script>


@include('layout.footer')
