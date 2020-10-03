<?php
    $yt = $_GET["yt"];

function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}

$profile = http_request("http://scrap.terhambar.com/yt?link=$yt");

// ubah string JSON menjadi array
$profile = json_decode($profile, TRUE);
?>
	
	<?php
	include("head.php");
	?>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Youtube Downloader</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                <div class="col-md-8">
				<video width="256" height="144" controls>
				<source src="<?php echo $profile["linkVideo"] ?>" type="video/mp4">
				Your browser does not support the video tag.
				</video>
				<h5>Judul : <?php echo $profile["title"] ?></h5>
				<h5>Durasi : <?php echo $profile["duration"]["inText"] ?></h5>
				 <a href="<?php echo $profile["linkVideo"] ?>" class="btn btn-primary">Download Video</a>
                <a href="<?php echo $profile["linkAudioOnly"] ?>" class="btn btn-success">Download Audio Saja</a>
                </div>
            </div>
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
