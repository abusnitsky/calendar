<div class="flex flex-col items-center justify-center h-screen bg-gray-100">
    <div>
        <button data-action="back-to-calendar"
            class="border">
            ← Back
        </button>
        <?= $currentDate ?>
    </div>
    <div>
        <?php if (empty($events)): ?>
            <p>No events for this day.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($events as $event): ?>
                    <li><?= htmlspecialchars($event['text']) ?> at <?= htmlspecialchars($event['time']) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>