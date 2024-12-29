<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Create new job posting</h1>
        </div>
        
<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Job Details</h1>
        </div>
		
		<div class="row">
    <div class="col-8">
	 <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
	</br>
	<form action="<?php echo e(route('jobs.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
       
        <div class="mb-3">
            <label for="name" class="form-label">Titles</label>
            <input type="text" class="form-control" placeholder="Job Posting Title" id="title" name="title" required>
        </div>
		 <div class="mb-3">
            <label for="name" class="form-label">Description</label>
            <input type="text" class="form-control" placeholder="Job Posting Description" id="description" name="description" required>
        </div>
		<div class="row">
		 <div class="mb-3 col-6">
            <label for="name" class="form-label">Experience</label>
            <input type="text" class="form-control" placeholder="Eg 1-3 Yrs" id="experience" name="experience" required>
        </div>
		 <div class="mb-3 col-6">
            <label for="name" class="form-label">Salary</label>
            <input type="text" class="form-control" placeholder="Eg 2.75- 5 Lacs PA" id="salary" name="salary" required>
        </div>
         </div>
		 <div class="row">
		 <div class="mb-3 col-6">
            <label for="name" class="form-label">Location</label>
            <input type="text" class="form-control" placeholder="Eg Remote/ Pune" id="location" name="location" required>
        </div>
		 <div class="mb-3 col-6">
            <label for="name" class="form-label">Extra info</label>
            <input type="text" class="form-control" placeholder="Eg Full Time, Urgent" id="extra" name="extra" required>
        </div>
         </div>
		 
		  <div class="col-md-3">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                        </button>
                    </div>
					
					
   
	</div>
    <div class="col-4">
	
	 <h3>Company Details</h3>
   
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Company Name" id="company_name" name="company_name" required>
        </div>
        
		<div class="mb-3">
            <label for="name" class="form-label">Logo</label>
           <input class="form-control" type="file" id="company_logo" name="company_logo">
        </div>
				
		
		<div class="mb-3">
            <label for="name" class="form-label">Skill</label>
			
          <select class="form-select" name="skills" multiple aria-label="multiple select example" required>
  <option selected>Select Skill</option>
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($skill->name); ?>"><?php echo e($skill->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
</select>
        </div>
		
    </form>
	
	 
	
	</div>
  </div>
		
        
    </div>
</div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel-dev-assessment-master\resources\views/livewire/pages/jobs/create.blade.php ENDPATH**/ ?>