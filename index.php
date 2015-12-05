<?php
// Author: Nisgeo //
require 'gapi.class.php';

$config['email'] = 'info@example.ge'; // --- ჩაწერეთ თქვენი Google Analytics–ის ელ–ფოსტა
$config['password'] = 'tqveniparoli'; // --- ჩაწერეთ თქვენი Google Analytics–ის პაროლი
$config['account_id'] = 'ViewID';   // --- ჩაწერეთ თქვენი Google Analytics–ის პროფილის იდი (შედით Admin->View Settings->View ID)

// Google Analytics–ის ინფორმაციის გამოტანა
$ga = new gapi($config['email'],$config['password']);
$ga->requestReportData($config['account_id'], array('date'), array('pageviews', 'visits', 'exitRate', 'avgTimeOnPage', 'entranceBounceRate'), 'date');
$results = $ga->getResults();
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="css/main.css" type="text/css" />
</head>
<body>
<?php foreach($results as $result) { ?>
<div id="gapi">
  <div class="gapi">
      <div class="gapi-yesterday">
            <h4> მიმდინარე:</h4>
            <span class="name">ჰიტები:</span><span class="value"><?php echo number_format($result->getPageviews()); ?></span>
            <span class="name">უნიკალური:</span><span class="value"><?php echo number_format($result->getVisits()); ?></span>
        </div>
    </div>
    <div class="gapi-button">
        <a> &nbsp;</a>
    </div>
</div>
<?php } ?>

</body>
</html>