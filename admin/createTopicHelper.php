<?php
    include_once '../Category.php';
    if(isset($_POST['topic'])){
        $topic = $_POST['topic'];
        
        $create = new Category();
        $create->insert($topic);

        echo "<script>window.location.href = 'createTopic.php';</script>";
    }
?>