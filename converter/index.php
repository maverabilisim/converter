<?php
include "../_func.php"
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>MT SERIALIZE</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>

<body>

<?php
?>

<!-- Begin page content -->
<main role="main" class="container">
    <h1 class="mt-5">SERIALIZE TOOLS BY @MAVERA</h1>
    <form class="form-horizontal" method="post" id="mvrForm">
        <input type="hidden" name="mode" value="submit"/>
        <fieldset>

            <!-- Form Name -->
            <legend>Form Name</legend>
            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textarea1">Text: </label>
                <div class="col-md-8">
                    <textarea class="form-control postDataInput" id="textarea1" name="text"><?php echo $_POST['text'] ?></textarea>
                    <span class="help-block"></span>
                </div>
            </div>
            <!-- Multiple Checkboxes -->
            
<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios"></label>
  <div class="col-md-8">
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="serializeType" id="radios-1" value="1" checked="checked" class="serializeType postDataInput">
      Serialize
    </label> 
    <label class="radio-inline" for="radios-2"  class="serializeType ">
      <input type="radio" name="serializeType" id="radios-2" value="2" class="serializeType postDataInput">
      Unserialize
    </label>
      <label class="radio-inline" for="radios-4"  class="serializeType ">
          <input type="radio" name="serializeType" id="radios-4" value="4" class="serializeType postDataInput">
          base64_decode
      </label>
      <label class="radio-inline" for="radios-3"  class="serializeType ">
          <input type="radio" name="serializeType" id="radios-3" value="3" class="serializeType postDataInput">
          Edit
      </label>
      <label class="radio-inline" for="radios-5"  class="serializeType ">
          <input type="radio" name="serializeType" id="radios-5" value="5" class="serializeType postDataInput">
          json_encode
      </label>
      <label class="radio-inline" for="radios-6"  class="serializeType ">
          <input type="radio" name="serializeType" id="radios-6" value="6" class="serializeType postDataInput">
          json > xml
      </label>
  </div>
</div>

        </fieldset>
    </form>

    <fieldset>

        <!-- Form Name -->
        <legend>Sonuç</legend>
        <!-- Textarea -->
        <div class="form-group" >
            <div class="col-md-12" id="response">
                Lütfen formu gönderin
            </div>

        </div>
        <!-- Multiple Checkboxes -->



    </fieldset>


</main>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="../_shared/js/js.js"></script>
		<script>
		function submitForm(){
                ajaxSubmit("_ajax.php",$("#mvrForm").serialize(),"#response");
			return false;
		}
		$(".postDataInput").change(function(){
            submitForm();
        });
            $(document).on("change",".respInput",function(){
            var exec = '$("#responseTextarea2").val(data);';
            ajaxSubmit("_ajax.php",$("#responseForm").serialize(),"",exec);
        });
		</script>
</body>
</html>
