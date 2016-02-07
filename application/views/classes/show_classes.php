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
                   
            <div class="col-lg-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                                    <div class="table-responsive">

                
                    <?php
                    $n=1;
                    $br=1;
                    echo "<thead>
                    <table class='table table-striped table-bordered table-hover custab'>";
                    echo "<tr>
                        <td>#</td>
                        <td>Клас</td>
                        <td>Паралелка</td>
                        <td>Учебан година</td>
                        <td>Ученици</td>
                        </tr>
                        </thead>";
                    foreach ($show_classes as $key => $value) {
                       echo '<tr>
                        <td>'.$n.'</td>
                        <td>'.$value['n_class'].'</td>
                        <td>'.$value['class_class'].'</td>
                        <td>'.$value['year'].'</td>
                       <td><a href="'.base_url().'index.php/classes/show_students_info/'.$value['class_id'].'"><button class="btn btn-info">Покажи</button></a></td>
                        </tr>';
                       $n++;
                    }
                    echo "</table>";


                    ?>
                    
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
