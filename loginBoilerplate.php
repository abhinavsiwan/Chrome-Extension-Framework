<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Boiler Plate</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script>
            //Validates if the URL is a valid URL or not
            function isUrlValid(url) {
                return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
            }
            
            //Validates the Form elements
            function validateForm() {
                var website = document.getElementById("webID");
                var websiteOut = document.getElementById("webIDOut");
                var extName = document.getElementById("extName");
                var extTitle = document.getElementById("extTitle");
                var extDesc = document.getElementById("extDesc");
                var noURLalert = "Please enter all the fields and click submit!!!";
                var invlaidURLalert = "Invalid URL"
                
                if(website.value.trim() == "" || websiteOut.value.trim() == "" || extName.value.trim() == "" || extTitle.value.trim() == "" || extDesc.value.trim() == "")
                {
                    alert(noURLalert);
                    website.focus();
                    website.select();
                    return;
                } else {
                    if(!isUrlValid(website.value.trim()) || !isUrlValid(websiteOut.value.trim())) {
                        alert(invlaidURLalert);
                        website.focus();
                        website.select();
                        return;
                    }
                }
            }
            
            //Resets the form
            function resetForm() {
                window.location = "./loginBoilerplate.php";
            }
        </script>
        
        <style>
           .vertical-center {
                min-height: 100vh;
                margin: 0;
                display: flex;
                align-items: center;
            }
            
            h2 {
                margin: 24px 0px;
            }
        </style>
    </head>
    <body>
        <div class="vertical-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 well">
                        <h2 class="text-center">Chrome Login Extension BoilerPlate</h2>
                        <form name="form" id="formid" method="get" action="./loginBoilerplate.php">
                             <div id="form-group">
                                 <label>Website Login Address:<sup>*</sup></label>
                                 <div class="input-group">
                                    <span class="input-group-addon">http://www.example.com
                                    </span>
                                    <input type="text" class="form-control" name="website" id="webID" placeholder="Enter the Website's Login Address" value="<?php echo isset($_GET["website"])?$_GET["website"]:""; ?>"/>
                                </div>
                             </div>
                                <br/>
                             <div class="form-group">
                                 <label>Website Logout Address:<sup>*</sup></label>
                                 <div class="input-group">
                                    <span class="input-group-addon">http://www.example.com
                                    </span>
                                    <input type="text" class="form-control" name="websiteOut" id="webIDOut" placeholder="Enter the Website's Logout Address" value="<?php echo isset($_GET["websiteOut"])?$_GET["websiteOut"]:""; ?>"/>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label>Extension Name:<sup>*</sup></label>
                                 <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-comment"></i>
                                    </span>
                                    <input type="text" class="form-control" name="extName" id="extName" placeholder="Enter the extension name" value="<?php echo isset($_GET["extName"])?$_GET["extName"]:""; ?>"/>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label>Extension Title:<sup>*</sup></label>
                                 <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-comment"></i>
                                    </span>
                                    <input type="text" class="form-control" name="extTitle" id="extTitle" placeholder="Enter the extension title" value="<?php echo isset($_GET["extTitle"])?$_GET["extTitle"]:""; ?>"/>
                                 </div>
                             </div>

                             <div class="form-group">
                                <label>Extension Description:<sup>*</sup></label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-comment"></i>
                                    </span>
                                    <input type="text" class="form-control" name="extDesc" id="extDesc" placeholder="Enter the extension's description" value="<?php echo isset($_GET["extDesc"])?$_GET["extDesc"]:""; ?>"/>
                                 </div>
                             </div>

                             <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" name="submit" id="submitID" value="Download Extension" onclick="validateForm();"/>
                                <input type="reset" class="btn btn-primary btn-block" name="reset" id="resetID" value="Reset" onclick="resetForm();"/>
                             </div>

                             <div class="form-group">
                                <p><sup>*</sup><i>-Mandatory fields.</i></p>
                             </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
        
        <?php
            $website = "";
            $websiteOut = "";
            $extName = "";
            $extTitle = "";
            $extDesc = "";

            //read the content of a file and replace with the website address
            function replaceContentsOfFile($entry, $website, $websiteOut, $extName, $extTitle, $extDesc) {
                $file = $entry;
                $file_contents = file_get_contents($file);

                $fh = fopen($file, "w");
                $file_contents = str_replace('websiteURL', $website, $file_contents);
                $file_contents = str_replace('logOutURLExtension', $websiteOut, $file_contents);
                $file_contents = str_replace('extensionName', $extName, $file_contents);
                $file_contents = str_replace('extensionTitle', $extTitle, $file_contents);
                $file_contents = str_replace('extensionDescription', $extDesc, $file_contents);

                //echo ($file_contents);
                fwrite($fh, utf8_encode($file_contents));
                fclose($fh);
            }

            //makes a copy of the Orinal directory to a new Directory
            function recurse_copy($src,$dst) { 
                $dir = opendir($src);
                @mkdir($dst); 
                while(false !== ( $file = readdir($dir)) ) {
                    if (( $file != '.' ) && ( $file != '..') && !strstr($file,'.DS_Store')) {
                        if ( is_dir($src . '/' . $file) ) { 
                            recurse_copy($src . '/' . $file,$dst . '/' . $file); 
                        } 
                        else { 
                            if(!copy($src . '/' . $file,$dst . '/' . $file)) {
                                echo ("Failed to copy");
                            } 
                        } 
                    } 
                } 
                closedir($dir); 
            }

            //This code will run only when submit button is clicked and set
            if(isset($_GET["submit"])) {
                if(trim($_GET["website"] != null)  && filter_var($_GET["website"], FILTER_VALIDATE_URL) && trim($_GET["websiteOut"] != null)  && filter_var($_GET["websiteOut"], FILTER_VALIDATE_URL) && trim($_GET["extName"] != null) && trim($_GET["extTitle"] != null) && trim($_GET["extDesc"] != null)) {
                    $website = $_GET["website"];
                    $websiteOut = $_GET["websiteOut"];
                    $extName = $_GET["extName"];
                    $extTitle = $_GET["extTitle"];
                    $extDesc = $_GET["extDesc"];
                    //Define src and dest to make a copy of the original directory and make changes on the dest directory
                        $src = "Login_FrameWork";
                        $dest = "Login_FrameWork1";

                    recurse_copy($src, $dest);

                    //$baseDir = "/Library/WebServer/Documents/Framework/Login_FrameWork/";
                    $baseDir = $dest;
                    if ($handle = opendir($baseDir)) {
                        echo ("<div class=\"conatiner\">");
                            echo ("<div class=\"row\">");
                                echo ("<div class=\"col-md-6 col-md-offset-3 well\">");
                                    echo ("<h2 class=\"text-center\">Files to be Downloaded:</h2>");
                                    echo ("<ul class=\"list-group\">");
                                    while (false !== ($entry = readdir($handle))) {
                                        if ($entry != "." && $entry != ".." && !strstr($entry,'.php') && !strstr($entry,'.DS_Store')) {
                                            //echo ($baseDir.$entry);
                                            //read the content of a file and replace with the website address
                                            $file = $entry;
                                            replaceContentsOfFile($baseDir.'/'.$file, $website, $websiteOut, $extName, $extTitle, $extDesc);
                                            echo ("<li class=\"list-group-item\">");
                                            echo "<a href='download.php?file=".$entry."'>".$entry."</a><br/>";
                                            echo ("</li>");
                                        }
                                    }
                                    echo ("</ul>");
                                echo ("</div>");
                            echo ("</div>");
                        echo ("</div>");
                        closedir($handle);
                    }
                }
            }
        ?>
    </body>
</html>