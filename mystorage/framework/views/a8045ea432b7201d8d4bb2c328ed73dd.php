<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center py-8">
            <h1 class="text-2xl font-bold">Jobs</h1>
        </div>
        <div class="w-full">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Title</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">Company Logo</th>
                                <th scope="col" class="px-4 py-3">Company Name</th>
                                <th scope="col" class="px-4 py-3">Experience</th>
                                <th scope="col" class="px-4 py-3">Salary</th>
                                <th scope="col" class="px-4 py-3">Location</th>
                                <th scope="col" class="px-4 py-3">Skills</th>
                                <th scope="col" class="px-4 py-3">Extra</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
						<?php //print_r($jobs); die; ?>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white"><?php echo e($job['title']); ?></th>
                                    <td class="px-4 py-3 whitespace-nowrap"><?php echo e(str($job['description'])->words(7)); ?></td>
                                    <td class="px-4 py-3 text-center">
									<!--[if BLOCK]><![endif]--><?php if($job['company_logo']!=""): ?>
                                        <img src="<?php echo e($job['company_logo']); ?>" class="h-12 w-auto block mx-auto" alt="<?php echo e($job['company_name']); ?>">
									<?php else: ?>
										<img src="<?php echo e(asset('logo.svg')); ?>" class="h-10 w-auto" alt=""> 
									<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </td>
                                    <td><span class="font-medium text-gray-900"><?php echo e($job['company_name']); ?></span></td>  
                                    <td class="px-4 py-3"><?php echo e($job['experience']); ?></td>
                                    <td class="px-4 py-3"><?php echo e($job['salary']); ?></td>
                                    <td class="px-4 py-3"><?php echo e($job['location']); ?></td>
                                     <td class="px-4 py-3"><?php echo e($job['skills']); ?></td>
									   <td class="px-4 py-3"><?php echo e($job['extra']); ?></td>
                                    <td class="px-4 py-3 flex items-center justify-end">
									<form action="<?php echo e(route('jobs.destroy', $job['id'])); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-red-500">Delete</button>
                        </form>
                                       
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel-dev-assessment-master\resources\views/livewire/pages/jobs/index.blade.php ENDPATH**/ ?>