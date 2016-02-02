<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Поведение
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="col-lg-12">
                    <?php
                    echo validation_errors();
                    foreach ($show_behaviour as $key => $value) {
                       echo form_open('classes/update_behaviour');
                       $grade=array(
                        'type'=>'text',
                        'name'=>'grade',
                        'placeholder' => 'Оценка',
                        'value'=>"$value[grade]");
                        
                         $note=array(
                        'type'=>'text',
                        'name'=>'note',
                        'placeholder' => 'Бележка',
                        'value'=>"$value[note]");
                        }
                        $submit=array(
                            'type'=>'submit',
                            'name'=>'send',
                            'value'=>'Редактирай'
                            );
                        echo 'Оценка'; echo form_input($grade);
                        echo 'Бележка'; echo form_input($note);
                        echo form_hidden('behaviour_id', "$value[grade_behaviour_id]");
                        echo form_input($submit);

                    ?>

                     </div>
        <!-- /. PAGE WRAPPER  -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>
