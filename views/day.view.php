<div class="flex flex-col items-center justify-center h-screen bg-gray-100">
    <div>
        <button data-action="back-to-calendar"
            class="border">
            ← Back
        </button>
        <?= $currentDate ?>
    </div>
    <div id="add-event-panel">
        <span>Add:</span>
        <button data-action="add-event" data-important = "true"
            class="border text-red-600">Important</button>
        <button data-action="add-event" data-important = "false"
            class="border text-amber-600">Event</button>
    </div>
    <div id="create-event-form"
        class="hidden">
        <input type="time" />
        <input type="text" placeholder="Event text" />
        <button data-action="save-event"
            class="border">Save</button>
        <button data-action="cancel-event"
            class="border">Cancel</button>
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