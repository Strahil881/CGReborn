<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Добавете поведение
                        </h1>
                        <?php 
                        echo form_open('classes/insert_new_behaviour');
                        echo "<select name='behaviour' class='form-control'>";
                        echo "<option value=''></option>";
                        $i = 0;
                        while($i <= count($get_behaviour)){
                           // $val= $get_behaviour[$i]['value'];
                            $des = $get_behaviour[$i]['behaviour'];
                            echo "<option value=".$get_behaviour[$i]['behaviour_id'].">$des</option>";
                            $i++;
                        }
                        echo "</select>";
                        $grade=array(
                        'type'=>'text',
                        'name'=>'grade');
                        echo "Оценка";
                        echo form_input($grade);
                        $note=array(
                        'type'=>'text',
                        'name'=>'note');
                        echo "Бележка";
                        echo form_input($note);
                        $submit=array(
                        'type'=>'submit',
                        'name'=>'send',
                        'value'=>'Готово!!!'
                        );
                        echo form_input(array('name' => 'student_id', 'type'=>'hidden','value'=>"$student_id"));
                        echo form_input($submit);


                        ?>
                       
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="col-lg-12">

                      </div>
        <!-- /. PAGE WRAPPER  -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>
