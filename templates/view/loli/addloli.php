<?php
use services\QueryBuilder;

$query = new QueryBuilder();

$myQuery = $query
    ->select("*")
    ->from("categorie")
    ->execute();


?>

<script type="text/javascript">
    //Set a Button to Submitbutton
    document.getElementById("submitArticleBtn").onclick = function()
    {
        document.getElementById("submitFormArticle").submit();
    }
</script>
