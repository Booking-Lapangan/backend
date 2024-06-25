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

// aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa

function cancelBooking(hour) {
    // const date = document.getElementById("bookingDate").value;
    const date = document.getElementById("bookingDate").value;
    // const lapanganId = document.getElementById("lapanganSelect").value;
    const lapanganId = document.getElementById("lapanganSelect").value;

    // fetch("/cancelBooking", {
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
        .then((data) => {
            if (data.success) {
                const card = document.getElementById(`schedule-${hour}`);
                card.classList.remove("bg-booked");
                card.classList.add("bg-available");
                card.querySelector("p.fs-5").textContent = "Available";
                const button = card.querySelector("button");
                button.classList.replace("btn-cancel", "btn-book");
                button.textContent = "+";
                button.setAttribute("onclick", `bookSchedule(${hour})`);
            }
        });
}

function updateSchedules() {
    const date = document.getElementById("bookingDate").value;
    const lapanganId = document.getElementById("lapanganSelect").value;
    window.location.href = `/jadwal?date=${date}&lapangan_id=${lapanganId}`;
}
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
    // const date = document.getElementById("bookingDate").value;
    const date = document.getElementById("bookingDate").value;
    // const lapanganId = document.getElementById("lapanganSelect").value;
    const lapanganId = document.getElementById("lapanganSelect").value;

    // fetch("/cancelBooking", {
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
        .then((data) => {
            if (data.success) {
                const card = document.getElementById(`schedule-${hour}`);
                card.classList.remove("bg-booked");
                card.classList.add("bg-available");
                card.querySelector("p.fs-5").textContent = "Available";
                const button = card.querySelector("button");
                button.classList.replace("btn-cancel", "btn-book");
                button.textContent = "+";
                button.setAttribute("onclick", `bookSchedule(${hour})`);
            }
        });
}

function updateSchedules() {
    const date = document.getElementById("bookingDate").value;
    const lapanganId = document.getElementById("lapanganSelect").value;
    window.location.href = `/jadwal?date=${date}&lapangan_id=${lapanganId}`;
}

function cancelBooking(hour) {
    const date = document.getElementById("bookingDate").value;
    const lapanganId = document.getElementById("lapanganSelect").value;

    fetch("/cancelBooking", {
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
                card.classList.remove("bg-booked");
                card.classList.add("bg-available");
                card.querySelector("p.fs-5").textContent = "Available";
                const button = card.querySelector("button");
                button.classList.replace("btn-cancel", "btn-book");
                button.textContent = "+";
                button.setAttribute("onclick", `bookSchedule(${hour})`);
            }
        });
}
