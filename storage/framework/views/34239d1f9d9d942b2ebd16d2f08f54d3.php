<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        nav[role="navigation"] {
            display: flex;
            justify-content: center !important;
            margin-top: 20px;
        }

        .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
            justify-content: center !important;
            gap: 20px;
            flex-wrap: wrap;
        }

        .text-sm.text-gray-700.leading-5 {
            display: none;
        }
    </style>

</head>

<body class="bg-gray-100 text-gray-800 min-h-screen font-sans">
    <header>
        <div class="flex justify-between items-center bg-gray-800 text-white px-4 py-3">
            <h1 class="text-xl font-bold">My Blog</h1>

            <?php if(auth()->guard()->check()): ?>
                    <div class="flex gap-4 justify-end mb-4">
                        <a href="<?php echo e(route('dashboard')); ?>" class="bg-green-600 text-white px-4 py-2 rounded">Dashboard</a>
                        <a href="<?php echo e(route('create-post')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded">Create Post</a>
                        <a href="<?php echo e(route('your-posts')); ?>" class="bg-green-600 text-white px-4 py-2 rounded">Your Posts</a>
                    </div>

                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="bg-red-500 px-3 py-1 rounded">Logout</button>
                    </form>
                </div>
            <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="bg-green-500 px-3 py-1 rounded">Login / Register</a>
        <?php endif; ?>
        </div>

    </header>

    <main class="max-w-3xl mx-auto p-4">
        <h2 class="text-2xl font-bold my-6 text-center">Explore Public Posts</h2>

        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white shadow-md rounded-lg p-5 mb-6">
                <h3 class="text-xl font-semibold mb-2"><?php echo e($post->title); ?></h3>
                <p class="text-gray-700 mb-3"><?php echo e($post->body); ?></p>
                <p class="text-sm text-gray-500">Posted by User ID: <?php echo e($post->user_id); ?></p>


                
                <form action="<?php echo e(route('like.store', $post->id)); ?>" method="POST" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="text-blue-500 hover:text-blue-700">
                        👍 <?php echo e($post->likes->count()); ?>

                        <?php echo e($post->likes->contains('user_id', auth()->id()) ? '(Liked)' : ''); ?>

                    </button>
                </form>


                <div x-data="{ open: false }" class="mt-4">
                    
                    <button @click="open = !open" class="text-blue-500 hover:underline text-sm">💬 Comment</button>

                    <?php if(auth()->guard()->check()): ?>
                    <form action="<?php echo e(route('comment.store', $post->id)); ?>" method="POST" x-show="open" class="mt-2">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="body" placeholder="Write a comment..."
                            class="w-full border px-3 py-1 rounded text-sm">
                        <button type="submit"
                            class="mt-1 bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">Post</button>
                    </form>
                    <?php endif; ?>
                  
                    <div class="max-h-24 overflow-y-auto">
                        <?php if($post->comments->count()): ?>
                            <div class="mt-4">
                                <h3 class="font-semibold text-gray-800">Comments:</h3>
                                <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="mt-2 text-sm text-gray-600 border-b pb-2">
                                        <strong><?php echo e($comment->user->name); ?>:</strong> <?php echo e($comment->body); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>



                
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="mt-8 flex justify-center">
            <?php echo e($posts->links()); ?>

        </div>
    </main>
    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html><?php /**PATH C:\Users\user\Desktop\laravel projects\crud_app\resources\views/public-posts.blade.php ENDPATH**/ ?>