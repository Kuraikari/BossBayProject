<?php
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
            <header><h1>UPLOAD NEW LOLI</h1></header>
            <div class="loli-upload">
                <form id="submitFormLoli" action="/loli/addLoli" method="POST" enctype="multipart/form-data">
                    <input type="text" name="firstname" placeholder="Firstname" required>
                    <input type="text" name="lastname" placeholder="Lastname" required>
                    <input type="number" name="age" placeholder="Age" required>
                    <input type="text" name="deretype" placeholder="Dere-Type" required>
                    <input type="file" name="Image" id="Image" accept="image/*">
                    <input type="submit" name="submit" id="submitLoliBtn" value="Upload Loli">
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    //Set a Button to Submitbutton
    document.getElementById("submitArticleBtn").onclick = function()
    {
        document.getElementById("submitFormLoli").submit();
    }
</script>
