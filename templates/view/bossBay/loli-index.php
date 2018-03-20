<?php
/**
 * Created by PhpStorm.
 * User: zwerm
 * Date: 20.03.2018
 * Time: 08:37
 */


use services\QueryBuilder;

$query = new QueryBuilder();

$myQuery = $query
    ->select("*")
    ->from("loli")
    ->execute();

?>

<div class="outer-wrapper">
    <div class="inner-wrapper">
        <div class="contents">
            <header style="height: auto; padding-bottom: 10px; padding-top: 5px;">
                <h1>Onii-chan I need you!</h1>
                <img src="../../../assets/pictures/onii-chan.gif" style="position: relative; left: -200px;">
                <p style="font-style: normal; font-size: small; width: 350px; position:absolute; right: 40px; top: 120px;">
                    This little maiden needs your help to overcome her overly exaggerated anxiety.
                    This is your quest and she is your damsel in distress! </p>
            </header>
            <div class="loliindex">
            <?php
            while ($row = $myQuery->fetch(PDO::FETCH_ASSOC))
            {
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
            ?>
                <figure class="snip1477">
                    <img src="<?php echo '/assets/lolis/'.$row["image"]; ?>" alt="sample38" />
                    <div class="title">
                        <div>
                            <h2><?php echo $row["firstname"] . " " . $row["lastname"]; ?></h2>
                            <h4><?php echo $cat[0]; ?></h4>
                        </div>
                    </div>
                    <figcaption>
                        <p>Click on the image to get more information about this product</p>
                    </figcaption>

                    <a href="/bossBay/loli?id=<?php echo $row["id"]?>"></a>
                </figure>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>
