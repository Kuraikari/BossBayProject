<?php
use services\QueryBuilder;

$query = new QueryBuilder();

$myQuery = $query
    ->select("*")
    ->from("loli")
    ->where("id", $_GET["id"])
    ->execute();

$row = $myQuery->fetch(PDO::FETCH_ASSOC);
?>

<div class="outer-wrapper">
    <div class="inner-wrapper">
        <div class="contents">
            <header><h1>UPLOAD NEW LOLI-MEDIA</h1></header>
            <div class="loli-upload">
                <form id="submitFormLoli" action="/loli/addVideoLoli" method="POST" enctype="multipart/form-data">
                    <input type="text" name="firstname" placeholder="Firstname" value="<?php echo $row['firstname']?>" readonly>
                    <input type="text" name="lastname" placeholder="Lastname"  value="<?php echo $row['lastname']?>" readonly>
                    <input type="number" name="id" placeholder="ID"  value="<?php echo $row['id']?>" readonly>
                    <input type="file" name="Video" id="Video" accept="video/*,audio/*"><br>
                    <label style="font-size: small; margin-top: 10px; margin-bottom: 15px;">Künstler(in):
                        <select name="mediatype" size="3" style="position: absolute; left: 150px;">
                            <option>video</option>
                            <option>audio</option>
                            <option>various</option>
                        </select>
                    </label><br>
                    <input type="submit" name="submit" id="submitLoliBtn" value="Upload Video">
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    //Set a Button to Submitbutton
    document.getElementById("submitLoliBtn").onclick = function()
    {
        document.getElementById("submitFormLoli").submit();
    }
</script>
