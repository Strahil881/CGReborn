<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Класове
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                  <div class="row">
                   
            <div class="col-lg-12 ">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                    <div class="table-responsive">
                                   
        
                    <?php
                    $n=1;
                    $br=1;
                    echo " <table class='table table-striped table-bordered table-hover custab'>
    <thead>
    ";
                    echo "<tr>
                        <td>#</td>
                        <td>Клас</td>
                        <td>Предмет</td>
                        <td></td>
                        </tr>";
                    foreach ($show_classes as $key => $value) {
                       echo '<tr>
                        <td>'.$n.'</td>
                        <td>'.$value['class']. $value['class_class'] . '</td>
                        <td>'.$value['subject_type'] . '</td>
                        <td><a href='.base_url("index.php/grades/show_class_grades/$value[class_teacher_id]/$value[class]/$value[subject_id]/$value[class_id]") . '><button class="btn btn-warning">Оценявай</button></a></td>
                        </tr>';
                       $n++;
                    }
                    echo "</table>";


                    ?>
                      </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
                      </div>
        <!-- /. PAGE WRAPPER  -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>
