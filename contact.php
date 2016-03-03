<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 9:44 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title></title>
    <?php require_once ('head-meta.php'); ?>
    <link href="css/portal.css" rel="stylesheet" type="text/css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu.php'); ?>
<div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">CONTACT</h2>
    <div class="row">
        <div class="col-sm-12">
            <p>Contact us and we'll get back to you ASAP.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Île des Sœurs, Montreal</p>
            <p><img alt="微信号" src="img/wechat.png">&nbsp;Panda2ici&nbsp;&nbsp;<span class="label label-success">推荐</span></p>
            <p><span class="glyphicon glyphicon-phone"></span> 514-550-5767</p>
            <p><span class="glyphicon glyphicon-send"></span> 请电话联系索取更详细地址~</p>
            <p><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:panda2ici@gmail.com">panda2ici@gmail.com</a></p>
        </div>
        <!--<div class="col-sm-7">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit">Send</button>
                </div>
            </div>
        </div>-->
    </div>
</div>
<div id="googleMap" style="height:400px;width:100%;"></div>

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    var myCenter = new google.maps.LatLng(45.4612692,-73.5443368);

    function initialize() {
        var mapProp = {
            center:myCenter,
            zoom:12,
            scrollwheel:false,
            draggable:false,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker = new google.maps.Marker({
            position:myCenter,
        });

        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php require_once ('footer.php'); ?>
</body>
</html>
