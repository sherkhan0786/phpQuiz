<?php
    include_once 'adminHeader.php';
?>

<div class="col-md-6 mx-auto my-5 text-light bg-dark bg-gradient p-3">
    <div class="card my-5 text-center bg-info">
        <div class="card-body">
            CREATE CATEGORY(TOPIC)
        </div>
    </div>
    <form method="post" action="createTopicHelper.php">
        <div class="mb-3">
            <label for="email" class="form-label">Create a New Topic </label>
            <input type="text" name="topic" class="form-control" id="topic" >
        </div>
        <div class="d-grid gap-2 pb-5">
            <input class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="CREATE">
        </div>
   </form>
</div>