 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<div x-data="{
        isDropdownOpen: true,
        isJobDropdownOpen: true,
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        },
        toggleJobDropdown() {
            this.isJobDropdownOpen = !this.isJobDropdownOpen;
        }
    }" class="bg-white border-b border-gray-200">
    <nav class="container py-3 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center">
                <?php if (isset($component)) { $__componentOriginal987d96ec78ed1cf75b349e2e5981978f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal987d96ec78ed1cf75b349e2e5981978f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.logo','data' => ['class' => 'h-8 w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-8 w-auto']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal987d96ec78ed1cf75b349e2e5981978f)): ?>
<?php $attributes = $__attributesOriginal987d96ec78ed1cf75b349e2e5981978f; ?>
<?php unset($__attributesOriginal987d96ec78ed1cf75b349e2e5981978f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal987d96ec78ed1cf75b349e2e5981978f)): ?>
<?php $component = $__componentOriginal987d96ec78ed1cf75b349e2e5981978f; ?>
<?php unset($__componentOriginal987d96ec78ed1cf75b349e2e5981978f); ?>
<?php endif; ?>
            </a>
        </div>

        
        <div class="flex items-center gap-4">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                "transition-colors px-4",
                'text-gray-900 hover:text-gray-800' => request()->routeIs('admin.dashboard'),
                'text-gray-700 hover:text-gray-600' => !request()->routeIs('admin.dashboard'),
            ]); ?>">
                Dashboard
            </a>
            <a href="<?php echo e(route('admin.skills.index')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                "transition-colors px-4",
                'text-gray-900 hover:text-grays-800' => request()->routeIs('admin.skills.index'),
                'text-gray-700 hover:text-grays-600' => !request()->routeIs('admin.skills.index'),
            ]); ?>">
                Skills
            </a>
			
			<div class="dropdown">
    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
      Jobs
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?php echo e(route('admin.jobs.index')); ?>">View All Jobs</a></li>
      <li><a class="dropdown-item" href="<?php echo e(route('admin.jobs.create')); ?>"> Create New Job</a></li>
      
    </ul>
  </div>
  
  <div class="dropdown">
    <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown">
      <?php echo e(Auth::user()->name); ?>

    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
      <li> 
	  <form method="POST" action="<?php echo e(route('logout')); ?>">
									 <?php echo csrf_field(); ?>
									<button type="submit" class="w-full text-left block px-4 py-2 text-red-600 hover:bg-gray-100"><?php echo e(__('Log Out')); ?></button>
                             </form>
	 </li>
      
    </ul>
  </div>
  
            <div class="relative" style="display:none;">
			
			 
			
                <button @click="toggleJobDropdown()"
                    class="flex items-center text-gray-700 hover:text-gray-600 focus:outline-none">
                    <span class="mr-2">Jobs</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="isJobDropdownOpen" @click.away="isJobDropdownOpen = true"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-20">
                    <a href="<?php echo e(route('admin.jobs.index')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        View All Jobs
                    </a>
                    <a href="<?php echo e(route('admin.jobs.create')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Create New Job
                    </a>
                </div>
            </div>
               
            <!-- User Dropdown -->
            <div class="relative" style="display:none;">
                <button @click="toggleDropdown()"
                    class="flex items-center text-gray-700 hover:text-gray-600 focus:outline-none">
                    <span class="mr-2"><?php echo e(Auth::user()->name); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="isDropdownOpen" @click.away="isDropdownOpen = true"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-20">
                    <a href="<?php echo e(route('dashboard')); ?>" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Profile
                    </a>
                    <button wire:click="logout" class="w-full text-left block px-4 py-2 text-red-600 hover:bg-gray-100">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>
 <?php /**PATH C:\xampp\htdocs\laravel-dev-assessment-master\resources\views/livewire/header.blade.php ENDPATH**/ ?>