<?php
include 'officer-sessions.php';
include 'officer-search-end.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer Main</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="header">
        <img src="image/logo.png" alt="Logo" class="header-logo">
        <p class="header-text"><b>DENR CENRO WESTERN PANGASINAN</b></p>
        <a href="logout.php" class="btn-success"
            style="color: white; padding: 5px; background-color: red; margin-left: 750px;">
            Logout</a>
        <a href="#"><img src="image/gear.png" class="header-logo" style="width: 50px; margin-left: 5px;"></a>

    </div>

    <div class="search-div">
        <form action="" method="POST">
            <input type="text" placeholder="Search..." name="userInput" class="search-bar">
            <input type="submit" class="btn-success" name="goSearch" value="Search">
        </form>
    </div>

    <div class="menu">
        <ul>
            <li><a href="officer-main.php" class="btn-success" style="margin-top:15px;">Main List</a></li>\
            <li><a href="officer-archived.php" class="btn-success" style="margin-top:15px;">Archive List</a></li>
            <li><a href="officer-import.php" class="btn-success" style="margin-top:15px;">Import List</a></li>
            <li><a href="officer-export.php" class="bg-white"
                    style="background-color: white; color: black;margin-top:15px;">Export List</a></li>
            <!-- <li><a href="officer-main.php" class="bg-white" style="background-color: white; color: black;margin-top:15px;">Main List</a></li> -->
        </ul>
    </div>


    <div class="table-container">
        <form action="officer-main-end.php" method="POST" enctype="multipart/form-data">
            <table>
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll" name="selectedItems"></th>
                        <th>Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>No. of Years</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {
                            ?>
                            <tr>
                                <td><input type="checkbox" class="checkbox" name="selectedRecords[]"
                                        value="<?= $data['id']; ?>"></td>
                                <td>
                                    <?= $data['type']; ?>
                                </td>
                                <td>
                                    <?= $data['from']; ?>
                                </td>
                                <td>
                                    <?= $data['to']; ?>
                                </td>
                                <td>
                                    <?= $data['subject']; ?>
                                </td>
                                <td>
                                    <?= $data['date']; ?>
                                </td>
                                <td>
                                    <?= $data['no_of_year']; ?>
                                </td>
                                <td>
                                    <?= $data['remarks']; ?>
                                </td>
                                <td>
                                    <a href="officer-result.php?id=<?= $data['id']; ?>">
                                        <button type="button" class="btn-info">
                                            VIEW
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='10'>No records found</td></tr>";
                    }
                    ?>
                    <div class="form-group"><br>
                        <!-- <label for="importFile" style="width: 20%;margin-left: 79%;">Import Excel File:</label>
                        <input type="file" class="form-control" id="importFile" name="importFile" accept=".xlsx,.xls"
                            style="width: 20%;margin-left: 79%;"> -->
                    </div>
                </tbody>
            </table>
            <div class="button-container">
                <button type="submit" class="export-btn" name="export">Export to Excel</button>
                <!-- <button type="submit" class="import-btn" name="import">Import from Excel</button> -->
            </div>
    </div>
    </form>
    </div>
</body>
<!-- <script src="js/inspect.js"></script> -->
<script src="js/select.js"></script>

</html>