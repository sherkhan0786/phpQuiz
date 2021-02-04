<?php
    include_once 'adminHeader.php';
    include_once '../Category.php';
?>
    <div class="col-md-6 mx-auto my-5 text-light bg-dark bg-gradient p-3">
    <div class="card my-5 text-center bg-info">
        <div class="card-body">
            Create Question
        </div>
    </div>

    <?php 
        
        $fetch = new Category();
        $ar = $fetch->fetchCat();
     ?>

    <form method="post" action="createQn.php">
    <label for="topic">Select Topic</label>
    <select class="form-select mb-3" name="topic">
    <option selected disabled>Choose Topic</option>
    <?php
        foreach($ar as $key=>$val){
    ?>
            <option value="<?php echo $val['topic']; ?>"><?php echo $val['topic']; ?></option>
    <?php
        }
    ?>
        </select>
        <div class="mb-3">
            <label for="Qn" class="form-label">Enter Question</label>
            <input type="text" name="question" class="form-control" id="qn">
        </div>
        <div class="mb-3">
            <label for="opt1" class="form-label">Option One</label>
            <input type="text" name="optOne" class="form-control">
        </div>
        <div class="mb-3">
            <label for="opt1" class="form-label">Option Two</label>
            <input type="text" name="optTwo" class="form-control">
        </div>
        <div class="mb-3">
            <label for="opt1" class="form-label">Option Three</label>
            <input type="text" name="optThree" class="form-control">
        </div>
        <div class="mb-3">
            <label for="opt1" class="form-label">Option Four</label>
            <input type="text" name="optFour" class="form-control">
        </div>
        <label for="topic">Select Correct Option</label>
        <select class="form-select mb-3" name="answer">
            <option selected>Choose Correct Option</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            <option value="4">Four</option>
        </select>
        <div class="d-grid gap-2 pb-5">
            <input class="btn btn-primary btn-block" type="submit" name="submit" id="submit" value="CREATE">
        </div>
   </form>
    </div>

<?php    
    include_once '../footer.php';
?>