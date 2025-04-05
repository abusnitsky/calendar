<div name="calendar-container"
    class="flex flex-col items-center justify-center h-screen bg-gray-100">
    <div name="calendar-header">
        <form method="GET" id="monthForm" action="">
            <button class="border" type="submit" name="Prev" value="1">Prev</button>
            <input type="month" name="Date" id="monthpicker" value="<?= $currentDateYm ?>" />
            <button class="border" type="submit" name="Next" value="1">Next</button>
        </form>
        <script>
            document.getElementById('monthpicker').addEventListener('change', function() {
                document.getElementById('monthForm').submit();
            });
        </script>
    </div>
    <div name="calendar-body">
        <div name="day-names"
            class="grid grid-cols-7 gap-4 text-center text-gray-700 font-bold">
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
            <div>Sun</div>
        </div>
        <div name="calendar-grid"
            class="grid grid-cols-7 gap-4 text-center text-gray-700">
            <?php

            // Fill in the empty days before the first day of the month
            for ($i = 0; $i < $firstDayOfWeek; $i++) {
                echo '<div class="h-16"></div>';
            }
            ?>
            
            <?php foreach ($daysInMonth as $day): ?>
                <div
                    data-date="<?= $day['date'] ?>"
                    data-action="calendar-day"
                    class="h-16 border border-gray-300 flex items-center justify-center">
                    <?= $day['day'] ?>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>