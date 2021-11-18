<!DOCTYPE html>
<html>
<head>

<link href="dist/css/bootstrap-datepicker.css" rel="stylesheet" />
  <script src="dist/js/bootstrap-datepicker-custom.js"></script>
  <script src="dist/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

</head>
<body>

<div class="col-md-6">
<span class="badge badge-success">วันที่เริ่มต้น</span>
<input  id="inputdatepicker" name="inputdatepicker" data-date-format="mm/dd/yyyy" class="datepicker" required>

<script src="js/bootstrap-datepicker.js"></script>
<script src="locales/bootstrap-datepicker.th.min.js"></script>
<script>
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    todayBtn: true,
    language: 'th',
    thaiyear: true ,
    autoclose: true
  }).datepicker("setDate", "0");
</script>
</body>
</html>
