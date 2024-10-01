<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">
        <div class="col-xl-12 mt-5 col-lg-12 col-md-12 col-sm-12 col-12 m-8">
            <div class="pt-4">
                <h1 class="page-title">Marquage</h1>
                
                <!-- Dropdown Inputs -->
                <div class="dropdown-container">
                    <div class="pt-4">
                        <select class="form-control styled-select pb-2">
                            <option value="">Opération</option>
                            <option value="">Opération 1</option>
                            <!-- Add your dropdown options here -->
                        </select>
                    </div>
                    <div class="pt-4">
                        <select class="form-control styled-select pb-2">
                            <option value="">Membres</option>
                            <option value="">Membres 1</option>
                            <!-- Add your dropdown options here -->
                        </select>
                    </div>
                </div>

                <!-- Checkbox Section with Numbers -->
                <div class="checkbox-container pt-4">
                    <!-- Loop for checkboxes with numbers above them -->
                    <div class="checkbox-item">
                        <span>1</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>2</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>3</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>4</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>5</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>6</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>7</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>8</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>9</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>10</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>11</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>12</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>13</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>13</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>13</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>13</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>13</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                    <div class="checkbox-item">
                        <span>13</span>
                        <input type="checkbox" class="styled-checkbox">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS Styling -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
    }
    .dashboard-wrapper {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .page-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }
    .dropdown-container {
        display: flex;
        gap: 20px;
    }
    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 16px;
        background-color: #f9f9f9;
        transition: border 0.3s ease;
    }
    .form-control:focus {
        border: 1px solid #007bff;
        outline: none;
    }
    .styled-select {
        appearance: none;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        transition: all 0.3s ease;
    }
    .styled-select:hover {
        border-color: #007bff;
    }
    .checkbox-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
    }
    .checkbox-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #fafafa;
        transition: background-color 0.3s ease;
    }
    .checkbox-item:hover {
        background-color: #f0f8ff;
        border-color: #007bff;
    }
    .checkbox-item span {
        font-size: 18px;
        color: #555;
        margin-bottom: 10px;
    }
    .styled-checkbox {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    .styled-checkbox:checked {
        background-color: #007bff;
    }
</style>

<script src="<?= pubUrl("assets/global.js") ?>"></script>
