<?php


use services\QueryBuilder;

$query = new QueryBuilder();

$myQuery = $query
    ->select("*")
    ->from("loli")
    ->where("id",$_GET['id'])
    ->execute();

$row = $myQuery->fetch(PDO::FETCH_ASSOC);

$catK = $query
    ->select("user_fk")
    ->from("loli_user")
    ->where("loli_fk","".$row["id"]."")
    ->execute()->fetch();

$cat = $query
    ->select("name")
    ->from("user")
    ->where("id",$catK[0])
    ->execute()->fetch();

$userK = $query
    ->select("userFk")
    ->from("product")
    ->where("id","".$row["id"]."")
    ->execute()->fetch();

$user = $query
    ->select("username")
    ->from("user")
    ->where("id",$userK[0])
    ->execute()->fetch();

$media = $query
    ->select("*")
    ->from("media")
    ->where("loli", $_GET["id"])
    ->execute()->fetch();

$filesV;

error_reporting(E_ERROR | E_PARSE);
if (dir("./assets/lolis/" . strtolower($row["lastname"]) . "/videos") != null)
    $filesV = scandir("./assets/lolis/" . strtolower($row["lastname"]) . "/videos");

if (dir("./assets/lolis/" . strtolower($row["lastname"]) . "/audio") != null)
    $filesA = scandir("./assets/lolis/" . strtolower($row["lastname"]) . "/audio");

// print_r($files);

if ($filesV != null || $filesA != null)
    $filesA = array_splice($filesA, 2);
    $filesV = array_splice($filesV, 2);

?>

<div class="articlePage lolipage">

    <div class="articleImage">
        <img class="articleImg" style="height: 250; width: 250;" src="<?php echo '/assets/lolis/'.$row["image"]; ?>" alt="">
    </div>

    <div class="articleContent">
        <div class="articleValue">
            <h1><?php echo $row["firstname"] . " " . $row["lastname"]; ?></h1>
        </div>
    </div>

    <div class="articleContent">
        <div class="articleValue">
            <h3><?php echo $row["age"]. " years old"; ?></h3>
        </div>
    </div>

    <div class="articleContent">
        <div class="articleValue">
            <p>Dere-Type: <?php echo $row["deretype"]; ?></p>
        </div>
    </div>

    <div>
        <a  href="/loli/uploadVideo?id=<?php echo $row["id"]?>" id="addCartBtn" class="btn btn-sm animated-button thar-three" style="position: absolute; left: 500px; top: 550px;">ADD MEDIA</a>
    </div>

    <p>Media: <?php if ($filesV != null)echo "<br>Video:" . count($filesV); if($filesA != null)echo " <br>Audio: " . count($filesA); else echo 0;?></p>



    <div class="videoSection" style="position: absolute; top: 750px; left: 280px; margin: 5px; padding: 10px;">
        <div id="videos">

            <?php if ($filesV != null){
                foreach ($filesV as $file) {?>
            <div class="video" style="margin: 14px; padding: 10px; float: left;
                                      width: 250px; background: rgba(70%, 70%, 70%, 0.4);
                                      text-align: center; border: solid 2px rgba(0, 0, 0, 0.6); box-shadow: 0 0 5px 2px grey;
                                      border-radius: 8px;">
                <video width="200" height="200" controls poster="<?php echo "/assets/lolis/". $row["image"]; ?>">
                    <source src="<?php echo "/assets/lolis/" . $row["lastname"] . "/videos/" . $file ?>" type="video/mp4">
                </video>
                <form id="submitFormLoli" action="/loli/deleteVideo" method="POST" enctype="multipart/form-data">
                    <input type="submit" value="Delete Video" class="delete-video" name="submit-delete" style="">
                    <input type="hidden" value="<?php echo $file?>" name="filename">
                    <input type="hidden" value="<?php echo $row["lastname"]?>" name="lastname">
                    <input type="hidden" value="<?php echo $row["id"]?>" name="id">
                </form>
            </div>
            <?php }} ?>
            <div class="clearfix"></div>
            <?php if ($filesA != null) {
                foreach ($filesA as $file) {?>
            <div class="audio" style="position: relative; top: 10px;
                                      margin: 14px; padding: 10px; float: left;
                                      width: 350px; background: rgba(40%, 70%, 30%, 0.2);
                                      text-align: center; border: solid 2px rgba(0, 0, 0, 0.6); box-shadow: 0 0 5px 2px grey;
                                      border-radius: 8px;">
                <audio width="200" height="200" controls poster="<?php echo "/assets/lolis/". $row["image"]; ?>">
                    <source src="<?php echo "/assets/lolis/" . $row["lastname"] . "/audio/" . $file ?>" type="audio/mp3">
                </audio>
                <form id="submitFormLoli" action="/loli/deleteVideo" method="POST" enctype="multipart/form-data">
                    <input type="submit" value="Delete Audio" class="delete-audio" name="submit-delete" style="">
                    <input type="hidden" value="<?php echo $file?>" name="filename">
                    <input type="hidden" value="<?php echo $row["lastname"]?>" name="lastname">
                    <input type="hidden" value="<?php echo $row["id"]?>" name="id">
                </form>
            </div>
            <?php }}?>
        </div>
    </div>
</div>
