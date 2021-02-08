<!-- <div class="cont"> -->
<style>
.hide{display: none;}
</style>
<?php include_once 'userHeader.php' ?>

<div class="col-md-6 mx-auto my-5 bg-light bg-gradient p-5">
    <div class="card my-5 text-center bg-info">
        <div class="card-body .display">
        Your Time Left: 
        <div class="text-danger h2" id="count"> Start</div>
        </div>
    </div>

    

    <?php
        // session_start();
        include_once '../Questions.php';
            // if(isset($_POST['topic'])){
                $topic = $_POST['topic'];
            
        
        $qn = new Questions();
        $ar = ($qn->fetchQn($topic));
        // $count = count($ar);
        // echo $count;
        shuffle($ar);
        $i = 1;
        $rows = count($ar);
        
        if($rows<10){
            echo "<script>alert('Under Maintainance, PLEASE choose another option')</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        }else{
        foreach($ar as $data){
            if ($i==1) {
                ?>
                <form action="result.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $topic; ?>">
                <div id='question<?php echo $i; ?>' class='cont'>
                    <h2 class='ques' id="qname<?php echo $i; ?>"><?php echo $i.'. '; ?><?php echo $data['question'];?></h2><br>
                    <ul>
                    <p><input type="text" value="<?php echo $data['id']; ?>" name='<?php echo 'ques'.$i; ?>' style="display:none;"/></p>
                    <p>
                    <input type="radio" value="1" name='<?php echo $i; ?>'/> <?php echo $data['optOne']; ?>
                    </p>
                    <p>
                    <input type="radio" value="2" name='<?php echo $i; ?>'/> <?php echo $data['optTwo']; ?>
                    </p>
                    <p>
                    <input type="radio" value="3" name='<?php echo $i; ?>'/> <?php echo $data['optThree']; ?>
                    </p>
                    <p>
                    <input type="radio" value="4" name='<?php echo $i; ?>'/> <?php echo $data['optFour']; ?>
                    </p>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $data['id']; ?>' name='<?php echo $i; ?>'/><br/> 
                    </ul>
                    <button id='<?php echo $i; ?>' class='btnn next btn btn-success' type='button' style="float:right" onclick="CountDown">Next..</button>
                </div>
                <?php $i++;
            } elseif (($i > 1) && ($i < $rows)) {
                ?>
                <div id='question<?php echo $i; ?>' class='cont'>
                    <h2 class='ques' id="qname<?php echo $i; ?>"><?php echo $i.'. '; ?><?php echo $data['question'];?></h2><br>
                    <ul>
                    <p><input type="text" value="<?php echo $data['id']; ?>" name='<?php echo 'ques'.$i; ?>' style="display:none;"/></p>
                    <p>
                    <input type="radio" value="1" name='<?php echo $i; ?>'/> <?php echo $data['optOne']; ?>
                    </p>
                    <p>
                    <input type="radio" value="2" name='<?php echo $i; ?>'/> <?php echo $data['optTwo']; ?>
                    </p>
                    <p>
                    <input type="radio" value="3" name='<?php echo $i; ?>'/> <?php echo $data['optThree']; ?>
                    </p>
                    <p>
                    <input type="radio" value="4" name='<?php echo $i; ?>'/> <?php echo $data['optFour']; ?>
                    </p>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $data['id']; ?>' name='<?php echo $i; ?>'/><br/> 
                    </ul>
                    <button id='<?php echo $i; ?>' class='previous btn btn-success' type='button'>..Previous</button>
                    <button id='<?php echo $i; ?>' name="next" class='btnn next btn btn-success' type='button' style="float:right">Next..</button>
                </div>
                <?php $i++;
            } elseif ($i == $rows) {
                ?>
                <div id='question<?php echo $i; ?>' class='cont'>
                    <h2 class='ques' id="qname<?php echo $i; ?>"><?php echo $i.'. '; ?><?php echo $data['question'];?></h2><br>
                    <ul>
                    <input type="text" value="<?php echo $data['id']; ?>" name='<?php echo 'ques'.$i; ?>' style="display:none;"/>
                    <p><input type="radio" value="1" name='<?php echo $i; ?>'/> <?php echo $data['optOne']; ?></p>
                    <p><input type="radio" value="3" name='<?php echo $i; ?>'/> <?php echo $data['optThree']; ?></p>
                    <p><input type="radio" value="2" name='<?php echo $i; ?>'/> <?php echo $data['optTwo']; ?></p>
                    <p><input type="radio" value="4" name='<?php echo $i; ?>'/> <?php echo $data['optFour']; ?></p>
                    <p><input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $data['id']; ?>' name='<?php echo $i; ?>'/></p> <br/> 
                    </ul>
                    <button id='<?php echo $i; ?>' class='btn btn-success previous' type='button'>..Previous</button>
                    <input class="btnn btn btn-danger" id="finish" type="submit" name="finish" value="Finish?" style="float:right">
                </div>
                <?php $i++;
            }
        }
        }
        ?>
        </form>
    
</div>
<script>
    $(document).ready(function() {    
    $('.cont').addClass('hide');
     $('#question'+1).removeClass('hide');
     
     $(document).on('click','.next',function(){
         last=parseInt($(this).attr('id')); 
         nex=last+1;
         $('#question'+last).addClass('hide');
         
         $('#question'+nex).removeClass('hide');
     });
     
     $(document).on('click','.previous',function(){
         last=parseInt($(this).attr('id'));     
         pre=last-1;
         $('#question'+last).addClass('hide');
         
         $('#question'+pre).removeClass('hide');
     });
    });


// Time Counter Count Down
    var count = 60;
    var interval = setInterval(function(){
    document.getElementById('count').innerHTML=count;
    count--;
    if (count === 0){
        clearInterval(interval);
        document.getElementById('count').innerHTML='Done';
        alert("You're out of time!");
        document.getElementById("finish").click();
    }
    }, 1000);
</script>