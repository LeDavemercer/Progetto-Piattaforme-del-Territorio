<?php
if (!empty($_POST['location'])) {
    $maps_url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCRR7uG7thaWs8zp1-gql2E9hvfumMA1lA&address=' . urlencode($_POST['location']);
    $maps_json = file_get_contents($maps_url);
    $maps_array = json_decode($maps_json, true);
    $address = $maps_array['results'][0]['formatted_address'];
}
?>
<html>
<head>
<title>Address finder</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div style="width: 500px; margin: 50px auto;">
        	<?php if(empty($_POST['location'])) : ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <center><h2>Address finder</h2></center>
                 <div class="form-group">
                    <label for="location" class="control-label">Location</label>
                    <input type="location" name="location" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
                </div>
             </form>
             <?php else : ?>           
		         <center><h2>Address finder</h2></center>
                 <center><span><?php echo $_POST['location'] . ": <b>"; echo $address; echo "</b>"; ?> </span></center>
             <?php endif; ?>
        </div>
    </div>
</body>
</html>