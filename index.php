<?php
    ob_start();

    spl_autoload_register(function ($class) {
        require "./DB/" .$class. ".php";
    });

    $queries = new Queries(new ConfigurationDB());

    if (isset($_GET["question"]))
        $data  = match ($_GET["question"]){
            "4", "5", "6", "7", "8", "9", "10"
            => $queries->executeQuery(query: $queries->getQuery(questionNumber: $_GET["question"]), arg: $queries->getArg(questionNumber: $_GET["question"])),

            default => $queries->executeQuery(query: $queries->getQuery(questionNumber: 4), arg: $queries->getArg(questionNumber: 4))
        };

    else
        $data = $queries->executeQuery(query: $queries->getQuery(questionNumber: 4), arg: $queries->getArg(questionNumber: 4));



?>




<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="https://mera.ddns.net/page3/images/logo.red.pieno.png"">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Table</title>

  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />


  <!--  Social tags    -->
  <meta name="keywords" content="Ahmed Mera, html table, html css table, web table, freebie, free bootstrap table, bootstrap, css3 table, bootstrap table, fresh bootstrap table, frontend, modern table, responsive bootstrap table, responsive bootstrap table">

  <meta name="description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need.">

  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Ahmed Mera">
  <meta itemprop="description" content="Probably the most beautiful and complex bootstrap table you've ever seen on the internet, this bootstrap table is one of the essential plugins you will need.">

  <!-- Twitter Card data -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet" />
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <!-- Compiled and minified CSS -->

    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>

  <!--  Just for demo purpose, do not include in your project   -->
  <script src="assets/js/demo/gsdk-switch.js"></script>
  <script src="assets/js/demo/jquery.sharrre.js"></script>
  <script src="assets/js/demo/demo.js"></script>

</head>
<body>

<div class="wrapper">

  <div class="container">
      <div class="questions">
          <h2 class="text-center">Solutions:</h2>
          <ol>
              <li>
                  <span>04)</span>
                  <p>
                      <a href="?question=4" class=" <?= ( ! isset($_GET['question']) || isset($_GET['question']) && $_GET['question'] == "4") ? "active" : ""; ?>">Question N.4</a>
                  </p>
              </li>

              <li>
                  <span>05)</span>
                  <p>
                      <a href="?question=5" class="<?= (isset($_GET['question']) && $_GET['question'] == "5") ? "active" : ""; ?>">Question N.5</a>
                  </p>
              </li>

              <li>
                  <span>06)</span>
                  <p>
                      <a href="?question=6" class="<?= (isset($_GET['question']) && $_GET['question'] == "6") ? "active" : ""; ?>">Question N.6</a>
                  </p>
              </li>

              <li>
                  <span>07)</span>
                  <p>
                      <a href="?question=7" class="<?= (isset($_GET['question']) && $_GET['question'] == "7") ? "active" : ""; ?>">Question N.7</a>
                  </p>
              </li>

              <li>
                  <span>08)</span>
                  <p>
                      <a href="?question=8" class="<?= (isset($_GET['question']) && $_GET['question'] == "8") ? "active" : ""; ?>">Question N.8</a>
                  </p>
              </li>

              <li>
                  <span>09)</span>
                  <p>
                      <a href="?question=9" class="<?= (isset($_GET['question']) && $_GET['question'] == "9") ? "active" : ""; ?>">Question N.9</a>
                  </p>
              </li>

              <li>
                  <span>10)</span>
                  <p>
                      <a href="?question=10" class="<?= (isset($_GET['question']) && $_GET['question'] == "10") ? "active" : ""; ?>">Question N.10</a>
                  </p>
              </li>
          </ol>
      </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="description">
          <h2>Result</h2>
        </div>
        <?php if(!empty($data)): ?>
        <div class="fresh-table full-color-orange">
        <!--
          Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
          Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
        -->
          <div class="toolbar">
            <button id="alertBtn" class="btn btn-default">Alert</button>
          </div>

          <table id="fresh-table" class="table">
            <thead>

                <?php foreach ($data[0] as $key => $value): ?>
                    <th data-field="<?= $key ?>" data-sortable="true"><?= $key ?></th>
                <?php  endforeach; ?>

              <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>
            </thead>
            <tbody>

                <?php foreach ($data as $index => $v): ?>
                    <tr>
                      <?php foreach ($data[$index] as $key => $value): ?>
                          <td><?= $value ?></td>
                      <?php endforeach; ?>
                        <td></td>
                    </tr>
                <?php endforeach;  ?>

            </tbody>
          </table>
        </div>
        </div>
        <?php
        else:
            echo "<p class='text-center mt-5 no-matching'>No matching records found</p>";

        endif; ?>
    </div>
  </div>
</div>


<div class="fixed-plugin" style="top: 300px">
  <div class="dropdown open">
    <a href="#" data-toggle="dropdown">
    <i class="fa fa-cog fa-2x"> </i>
    </a>
    <ul class="dropdown-menu">
      <li class="header-title">Adjustments</li>
      <li class="adjustments-line">
        <a href="javascript:void(0)" class="switch-trigger">
          <p>Full Background</p>
          <div class="switch"
            data-on-label="ON"
            data-off-label="OFF">
            <input type="checkbox" checked data-target="section-header" data-type="parallax"/>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li class="adjustments-line">
        <a href="javascript:void(0)" class="switch-trigger">
          <p>Colors</p>
          <div class="pull-right">
            <span class="badge filter badge-blue" data-color="blue"></span>
            <span class="badge filter badge-azure" data-color="azure"></span>
            <span class="badge filter badge-green" data-color="green"></span>
            <span class="badge filter badge-orange active" data-color="orange"></span>
            <span class="badge filter badge-red" data-color="red"></span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
    
    </ul>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script type="text/javascript">
      const $table = $('#fresh-table');
      const $alertBtn = $('#alertBtn');

    window.operateEvents = {
      'click .like': function (e, value, row, index) {
         ($(e.currentTarget).toggleClass("full-heart"))
      },
      'click .edit': function (e, value, row, index) {
        alert('You click edit icon, row: ' + JSON.stringify(row))
      },
      'click .remove': function (e, value, row, index) {
        $table.bootstrapTable('remove', {
            field: '$index',
            values: [index]
        })
      }
    }

    function operateFormatter(value, row, index) {
      return [
        '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
          '<i class="fa fa-heart"></i>',
        '</a>',
        '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
          '<i class="fa fa-edit"></i>',
        '</a>',
        '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
          '<i class="fa fa-remove">&#xf00d;</i>',
        '</a>'
      ].join('')
    }

    $(function () {
      $table.bootstrapTable({
        classes: 'table table-hover table-striped',
        toolbar: '.toolbar',

        search: true,
        showRefresh: true,
        showToggle: true,
        showColumns: true,
        pagination: true,
        striped: true,
        sortable: true,
        pageSize: 8,
        pageList: [8, 10, 25, 50, 100],

        formatShowingRows: function (pageFrom, pageTo, totalRows) {
          return ''
        },
        formatRecordsPerPage: function (pageNumber) {
          return pageNumber + ' rows visible'
        }
      })

      $alertBtn.click(function () {
          const ipAPI = '//api.ipify.org?format=json'
          Swal.queue([{
              title: 'Your public IP',
              confirmButtonText: 'Show my public IP',
              text:  `Your public IP will be received
               via AJAX request`,
              showLoaderOnConfirm: true,
              preConfirm: () => {
                  return fetch(ipAPI)
                      .then(response => response.json())
                      .then(data => Swal.insertQueueStep(`your ip: ${data.ip}`))
                      .catch(() => {
                          Swal.insertQueueStep({
                              icon: 'error',
                              title: 'Unable to get your public IP'
                          })
                      })
              }
          }])
      })
    })

 


  </script>

</html>
<?php
    ob_end_flush();

?>