<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">
        <div class="container mt-5">
            <div class="p-4">
                <form class="event-form" id="eventForm">
                    <div class="form-group">
                        <label for="eventDate">Select Date:</label>
                        <input type="date" class="form-control" id="eventDate" required>
                    </div>
                    <div class="form-group">
                        <label for="eventDescription">Event Description:</label>
                        <input type="text" class="form-control" id="eventDescription" placeholder="Enter event details" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Event</button>
                </form>
            </div>

            <!-- Event Display -->
            <div class="container">
                <h3 class="text-center">Selected Event Details</h3>
                <div id="eventDetails" class="alert alert-info" style="display: none;">
                    <strong>Date:</strong> <span id="displayDate"></span><br>
                    <strong>Description:</strong> <span id="displayDescription"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar -->
    <div class="content">
        <div id="calendar"></div>
    </div>
</div>

<!-- Form Modal -->
<div tabindex="-1" class="modal pmd-modal fade add-dialog" id="createEventModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pmd-modal-border">
                <h2 class="modal-title">Create Event</h2>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            </div>

            <div class="modal-body">
                <form id="createAppointmentForm">
                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="mobil">Event Name</label>
                        <input type="text" class="form-control" name="patientName" id="patientName" style="margin: 0 auto;">
                        <input type="hidden" class="form-control" id="apptStartTime" />
                        <input type="hidden" class="form-control" id="apptEndTime" />
                        <input type="hidden" class="form-control" id="apptAllDay" />
                    </div>
                    <div class="form-group pmd-textfield">
                        <label class="control-label" for="when">When:</label>
                        <div class="controls controls-row" id="when" style="margin-top:5px;"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" id="submitButton" class="btn pmd-ripple-effect btn-primary pmd-btn-raised" type="button">Send</button>
                <button data-dismiss="modal" class="btn pmd-ripple-effect btn-outline-dark" type="button">Reset</button>
            </div>
        </div>
    </div>
</div>

<!-- JS Section -->
<script src="<?= pubUrl("assets/global.js") ?>"></script>
<script src="<?= pubUrl("assets/vendor/slimscroll/jquery.slimscroll.js") ?>"></script>
<script src="<?= pubUrl("assets/libs/js/main-js.js") ?>"></script>
<script src="<?= pubUrl("assets/vendor/charts/chartist-bundle/chartist.min.js") ?>"></script>
<script src="<?= pubUrl("assets/vendor/charts/sparkline/jquery.sparkline.js") ?>"></script>
<script src="<?= pubUrl("assets/vendor/charts/morris-bundle/raphael.min.js") ?>"></script>
<script src="<?= pubUrl("assets/vendor/charts/morris-bundle/morris.js") ?>"></script>
<script src="<?= pubUrl("assets/vendor/charts/c3charts/c3.min.js") ?>"></script>
<script src="<?= pubUrl("assets/vendor/charts/c3charts/d3-5.4.0.min.js") ?>"></script>
<script src="<?= pubUrl("assets/vendor/charts/c3charts/C3chartjs.js") ?>"></script>
<script src="<?= pubUrl("assets/libs/js/dashboard-ecommerce.js") ?>"></script>

<!-- FullCalendar Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

<script>
    // Event Form Submission Logic
    document.getElementById('eventForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const eventDate = document.getElementById('eventDate').value;
        const eventDescription = document.getElementById('eventDescription').value;

        // Display Event Details
        if (eventDate && eventDescription) {
            document.getElementById('displayDate').innerText = eventDate;
            document.getElementById('displayDescription').innerText = eventDescription;
            document.getElementById('eventDetails').style.display = 'block';
        }
    });

    // FullCalendar Initialization
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            editable: true,
            events: [
                {
                    title: 'Sample Event 1',
                    start: '2024-10-01',
                    description: 'Description of Sample Event 1'
                },
                {
                    title: 'Sample Event 2',
                    start: '2024-10-05',
                    description: 'Description of Sample Event 2'
                }
            ],
            eventRender: function(event, element) {
                element.find('.fc-title').append('<br/><span class="fc-description">' + event.description + '</span>');
            }
        });
    });
</script>
