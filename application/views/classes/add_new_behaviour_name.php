<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Създай ново поведение
                        </h1>
                    </div>
                </div>
                <?php
                    echo validation_errors();
                    echo form_open('classes/insert_new_behaviour_name');
                    echo 'Име на поведението';
                    $behaviour=array(
                        'type'=>'text',
                        'name'=>'behaviour'
                        );
                    $submit=array(
                        'type'=>'submit',
                        'name'=>'send',
                        'value'=>'Готово!!!'
                        );
                    echo form_input($behaviour);
                    echo form_input($submit);
                ?>
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
