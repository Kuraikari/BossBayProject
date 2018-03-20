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

?>

<div class="articlePage lolipage">

    <div class="articleImage">
        <img class="articleImg" src="<?php echo '/assets/lolis/'.$row["image"]; ?>" alt="">
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

    <div class="articleContent">
        <div class="articleValue">
            <p>Categories: <?php echo $cat[0]; ?></p>
        </div>
    </div>

    <div class="articleContent">
        <div class="articleValue">
            <p>From: <?php echo $user[0]; ?></p>
        </div>
    </div>

    <div>
        <a  href="/loli/addloli" id="addCartBtn" class="btn btn-sm animated-button thar-three" style="position: absolute; left: 550px;">ADD VIDEO</a>
    </div>



    <div class="commentsSection">
        <div class="comments">
            <p>Comments: 10</p>
        </div>

        <div>
            <h5 class="commentTitle">Comments:</h5>
        </div>

        <div class="commentsSectionCommentary">
            <div>
                <h6 class="commentSectionTitle">Bossjer,
                    <span>26.01.2018</span></h6>
            </div>
            <div class="commentsSectionText">
                <p>Nice Product</p>
            </div>
        </div>
    </div>

    <div class="writeSection">
        <div class="writeComment">
            <h5 class="commentTitle">Write Comment:</h5>
        </div>

        <div>
            <form id="submitFormCommentary<?php echo $row["id"]; ?>" action="/user/addComment" method="POST">
                <input type="hidden" name="hidden_ID" value="<?php echo $row["id"]; ?>"/>
                <textarea class="inputCommentary" name="userComment">Write your commentary here...</textarea>
                <div class="group">
                    <a href="#" id="submitButtonCommentary<?php echo $row["id"]; ?>" class="submitButtonCommentary">Submit</a>
                </div>
            </form>
        </div>
    </div>
</div>
