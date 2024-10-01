<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">
            <div class="container mt-5">
                <div class="p-4">
                    <form class="event-form">
                        <div class="form-group">
                            <label for="eventDate">Select Date:</label>
                            <input type="Date" class="form-control" id="eventDate" required>
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
    
  <div class="content">
    <div id='calendar'></div>
  </div>
</div>


<script src="<?= pubUrl("assets/global.js") ?>"></script>

<script src="<?= pubUrl("assets/vendor/slimscroll/jquery.slimscroll.js") ?>"></script>
  <script src="<?= pubUrl("assets/libs/js/main-js.js") ?>"></script>
  <script src="<?= pubUrl("assets/vendor/charts/chartist-bundle/chartist.min.js")?>"></script>
  <script src="<?= pubUrl("assets/vendor/charts/sparkline/jquery.sparkline.js") ?>"></script>
  <script src="<?= pubUrl("assets/vendor/charts/morris-bundle/raphael.min.js") ?>" ></script>
 <script src="<?= pubUrl("assets/vendor/charts/morris-bundle/morris.js") ?>"></script>
  <script src="<?= pubUrl("assets/vendor/charts/c3charts/c3.min.js") ?>"></script>
  <script src="<?= pubUrl("assets/vendor/charts/c3charts/d3-5.4.0.min.js") ?>"></script>
 <script src="<?= pubUrl("assets/vendor/charts/c3charts/C3chartjs.js") ?>"></script>
  <script src="<?= pubUrl("assets/libs/js/dashboard-ecommerce.js") ?>"></script>