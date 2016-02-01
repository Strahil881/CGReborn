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
                <div class="col-lg-12">
  </div>
  	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
  		<thead>
			 <tr>
     			<th>#</th>
     			<th>Име</th>
     			<th>Фамилия</th>
      			<th>Номер в клас</th>
       			<th>Редактирай</th>
       			<th></th>
        	</tr>
      </thead>
  <?php
  $br=1;
  foreach ($students_info as $key => $value) {
  	echo '<tr>
      	<td>'.$br.'</td>
      	<td>'.$value['first_name'].'</td>
     	<td>'.$value['last_name'].'</td>
      	<td>'.$value['number'].'</td>
      	<td><a href="'.base_url().'index.php/classes/single_student_info/'.$value['student_id'].'"><button class="btn btn-warning">Редактирай</button></a></td>
 	<td><a href="'.base_url().'classes/delete_student/'.$value['student_id'].'"><button class="btn btn-danger">DELETE</button></a></td>
        <td><a href="'.base_url().'classes/student_behaviours/'.$value['student_id'].'"><button class="btn btn-info">Поведение</button></a></td>
        <td><a href="'.base_url().'classes/add_behaviour/'.$value['student_id'].'"><button class="btn btn-danger">Добави поведение </button></a></td>
 		</tr>';
      	 $br++;
  }
  ?>
</table>
</div>
        <!-- /. PAGE WRAPPER  -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>
