document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('monthpicker').addEventListener('change', function () {
        document.getElementById('monthForm').submit();
    });

    document.querySelectorAll('[data-action="calendar-day"]').forEach(day => {
        day.addEventListener('click', function () {
            const date = this.dataset.date;

            fetch('?route=day&date=' + date)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('calendar-view').classList.add('hidden');
                    const dayView = document.getElementById('day-view');
                    dayView.innerHTML = html;
                    dayView.classList.remove('hidden');
                });
        });
    });

    document.addEventListener('click', function (e) {
        if (e.target.matches('[data-action="back-to-calendar"]')) {
            document.getElementById('day-view').classList.add('hidden');
            document.getElementById('calendar-view').classList.remove('hidden');
        }
    });

    document.addEventListener('click', function (e) {
        if (e.target.matches('[data-action="add-event"]')) {
            const important = e.target.dataset.important;

            document.getElementById('add-event-panel').classList.add('hidden');
            document.getElementById('create-event-form').classList.remove('hidden');
        }
    });
});

