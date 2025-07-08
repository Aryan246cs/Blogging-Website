<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-xl">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-600">Edit Profile</h1>

        <form action="<?php echo e(route('dashboard.update')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label class="block font-semibold">Name:</label>
                <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label class="block font-semibold">Email:</label>
                <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label class="block font-semibold">Gender:</label>
                <div class="mt-1 space-x-4">
                    <label><input type="radio" name="gender" value="male" <?php echo e($user->gender == 'male' ? 'checked' : ''); ?>>
                        Male</label>
                    <label><input type="radio" name="gender" value="female"
                            <?php echo e($user->gender == 'female' ? 'checked' : ''); ?>> Female</label>
                    <label><input type="radio" name="gender" value="other"
                            <?php echo e($user->gender == 'other' ? 'checked' : ''); ?>> Other</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">Date of Birth:</label>
                <input type="date" name="dob" value="<?php echo e(old('dob', $user->dob)); ?>"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label class="block font-semibold">State:</label>
                <input type="text" name="state" value="<?php echo e(old('state', $user->state)); ?>"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label class="block font-semibold">District:</label>
                <input type="text" name="district" value="<?php echo e(old('district', $user->district)); ?>"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label class="block font-semibold">Profile Image:</label>
                <input type="file" name="profile_image" class="w-full border border-gray-300 rounded mt-1 p-1">
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</body>

</html>
<?php /**PATH C:\Users\user\Desktop\laravel projects\crud_app\resources\views/edit-dashboard.blade.php ENDPATH**/ ?>