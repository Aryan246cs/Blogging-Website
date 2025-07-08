<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="border-2 border-black p-6 m-4 bg-white rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">All Your Posts</h2>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-gray-200 p-4 rounded mb-4">
                    <h3 class="text-lg font-semibold"><?php echo e($post['title']); ?> <small> by <?php echo e($post->user->name); ?></small></h3>
                    <p><?php echo e($post['body']); ?></p>
                    <div class="mt-2">
                        <a href="/edit-post/<?php echo e($post->id); ?>" class="text-blue-500 hover:underline">Edit</a>
                    </div>
                    <form action="/delete-post/<?php echo e($post->id); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('Delete'); ?>
                        <button class="mt-2 bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                    </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
</body>
</html><?php /**PATH C:\Users\user\Desktop\laravel projects\crud_app\resources\views/your-posts.blade.php ENDPATH**/ ?>