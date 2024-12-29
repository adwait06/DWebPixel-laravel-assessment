<?php $askill= @$_GET['name']; 
          $asid= @$_GET['sid']; ?>
<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>
		
		<div class="row" >
			
    <div class="col-8" >
	 <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
	</br>
	
	<div id="refresh">
	 <table class="table table-bordered" id="postsTable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                   
                </tr>
                </thead>
                <tbody>
				  <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 <tr> 
				 <td style="width:70%"><?php echo e($skill->name); ?></td>
				 <td> <a href=""><a href="<?php echo e(route('admin.skills.index')); ?>?name=<?php echo e($skill->name); ?>&sid=<?php echo e($skill->id); ?>" class="btn btn-warning btn-sm">Edit</a>  </a> </td>
				 <td> 
 <form action="<?php echo e(route('skills.destroy', $skill->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

				 </td>
				  
				  </tr>
				   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
				</tbody>
            </table>
			</div>
	</div>
    <div class="col-4">
	
	  <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold"><!--[if BLOCK]><![endif]--><?php if($askill==""): ?> Add new skill <?php elseif($askill!=""): ?>  Update new skill <?php endif; ?><!--[if ENDBLOCK]><![endif]--> </h1>
			<br/>
        </div>
		<!--[if BLOCK]><![endif]--><?php if($askill!=""): ?>
		<form action="<?php echo e(route('skills.update', $asid)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Skill Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($askill); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
	<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
	<!--[if BLOCK]><![endif]--><?php if($askill==""): ?>
	
	 <form id="postForm" name="postForm" class="form-horizontal">
                   
                    <div class="col-md-12 row g-12">
                        <label for="title" class="col-sm-3 control-label">Name <br/>  </label>
						<br/>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="title" name="name" placeholder="Skill Name" value="" maxlength="50" required="">
                       
        <div id="responseMessage" style="color:#FF0000"></div>
		<br/>
						</div>
						 <div class="col-md-3">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                        </button>
                    </div>
						
                    </div>
                   
                   
                </form>
					<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
	</div>
  </div>
		
        
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

      

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
			var name = $("#title").val();
      $.ajax({
               data: { 
    	"name": name,    	
    	_token: '<?php echo csrf_token(); ?>'
    },
                url: "<?php echo e(route('skills.store')); ?>",
                type: "POST",
                dataType: 'json',
                success: function (data) {
					//console.log(data);
                    $('#postForm').trigger("reset");                  
                   $('#saveBtn').html('Save');
					$('#refresh').load(document.URL + ' #refresh');
                     $('#responseMessage').text('Skill added successfully.');
                },
				 error: function(data) {
            if(data.status === 422) {
                var errors = data.responseJSON.errors;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + '<br>';
                });
                $('#responseMessage').html(errorMessage);
            } else {
				
                $('#responseMessage').text('An error occurred. Please try again.');
            }
        }
                
            });


        });

           
		
		
		
				
    });
	
	
	
</script>
<?php /**PATH C:\xampp\htdocs\laravel-dev-assessment-master\resources\views/livewire/pages/skills/index.blade.php ENDPATH**/ ?>