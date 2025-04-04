<div name="calendar-container"
    class="flex flex-col items-center justify-center h-screen bg-gray-100">
    <div name="calendar-header">
        <button>Prev</button>
        <input type="month" value="<?php echo getCurrentYearMonth(); ?>" />
        <button>Next</button>
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
            for ($i = 0; $i < getFirstDayOfWeek(getCurrentMonth(), getCurrentYear()); $i++) {
                echo '<div class="h-16"></div>';
            }

            // Fill in the days of the month
            for ($day = 1; $day <= getDaysInMonth(getCurrentMonth(), getCurrentYear()); $day++) {
                echo "<div class='h-16 border border-gray-300 flex items-center justify-center'>$day</div>";
            }
            ?>

        </div>
    </div>
</div>