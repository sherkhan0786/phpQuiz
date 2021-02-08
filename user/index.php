<?php
    include_once 'userHeader.php';
    include_once '../Category.php';
    include_once '../Questions.php';
        
        $fetch = new Category();
        $ar = $fetch->fetchCat();
?>

<div class="row row-cols-1 row-cols-md-2 mx-auto">
  <div class="col mx-auto mt-5">
    <div class="card  bg-light text-center">
      <div class="card-body">
        <h5 class="card-title">TAKE A QUIZ TEST</h5>
        <?php
            foreach($ar as $key=>$val){
              
        ?>
        <form method="post" action="quiz.php?topic=<?= $val['topic'] ?>">
        <?php
            }
        ?>
          <div class="mb-3">
            <select class="form-select mb-3" name="topic">
                <option selected disabled>Choose Topic</option>
                <?php
                      if($count < 10){
                        // echo count($ar);
                    foreach($ar as $key=>$val){
                        // print_r($val);
                ?>
                        <option value="<?php echo $val['topic']; ?>"><?php echo $val['topic']; ?></option>
                <?php
                      }
                    }
                ?>
            </select>
            </div>
          <div class="d-grid gap-2 pb-5">
              <input class="btn btn-primary btn-block" type="submit" name="submit" id="start" value="QUIZ">
          </div>
      </form>
   
      </div>
    </div>
  </div>
</div>
<script>
    
</script>