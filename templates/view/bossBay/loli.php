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

$files;

error_reporting(E_ERROR | E_PARSE);
if (dir("./assets/lolis/" . strtolower($row["lastname"]) . "/videos") != null)
    $files = scandir("./assets/lolis/" . strtolower($row["lastname"]) . "/videos");

if ($files != null)
    $files = array_splice($files, 2 );
// print_r($files);
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
        <a  href="/loli/uploadVideo?id=<?php echo $row["id"]?>" id="addCartBtn" class="btn btn-sm animated-button thar-three" style="position: absolute; left: 500px;">ADD VIDEO</a>
    </div>

    <p>Videos: <?php if ($files != null)echo count($files);  else echo 0;?></p>



    <div class="videoSection" style="position: absolute; top: 750px; left: 280px; margin: 5px; padding: 10px;">
        <div id="videos">

            <?php if ($files != null){
                foreach ($files as $file) {?>
            <div class="video" style="margin: 14px; padding: 10px; float: left;
                                      width: 250px; background: rgba(70%, 70%, 70%, 0.4);
                                      text-align: center; border: solid 2px rgba(0, 0, 0, 0.6); box-shadow: 0 0 5px 2px grey;
                                      border-radius: 8px;">
                <video width="200" height="200" controls poster="<?php echo "/assets/lolis/". $row["image"]; ?>">
                    <source src="<?php echo "/assets/lolis/" . $row["lastname"] . "/videos/" . $file ?>" type="video/mp4">
                </video>
                <form id="submitFormLoli" action="/loli/deleteVideo" method="POST" enctype="multipart/form-data">
                    <input type="submit" value="Delete Video" name="submit-delete" style="background: none; border: solid 3px #045e78; padding: 3px; color: #045e78;">
                    <input type="hidden" value="<?php echo $file?>" name="filename">
                    <input type="hidden" value="<?php echo $row["lastname"]?>" name="lastname">
                    <input type="hidden" value="<?php echo $row["id"]?>" name="id">
                </form>
            </div>
            <?php }}?>
        </div>
    </div>
</div>
