<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Поведение
                        </h1>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                     <tr>
                                        <th>#</th>
                                        <th>Поведение</th>
                                        <th>Оценка</th>
                                        <th>Бележка</th>
                                        <th>Редактирай</th>
                                       
                                    </tr>
                              </thead>
                            <?php
                            $br=1;
                            $this->output->enable_profiler(TRUE);
                            $this->benchmark->mark('code_start');
                            echo validation_errors();
                               foreach ($behaviour_student as $key => $value) {
                                    echo '<tr>
                                            <td>'.$br.'</td>
                                            <td>'.$value['behaviour'].'</td>
                                             <td>'.$value['grade'].'</td>
                                              <td>'.$value['note'].'</td>
                                              <td><a href="'.base_url().'classes/behaviour_info/'.$value['grade_behaviour_id'].'"><button class="btn btn-danger">Редактирай</button></a></td>
                                            </tr>';
                                  $br++;
                                }
                                 $this->benchmark->mark('code_end');
                            echo $this->benchmark->elapsed_time('code_start','code_end');
                            ?>
                            </table>
                        
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
