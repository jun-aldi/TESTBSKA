<!-- resources/views/users/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <small>Leave blank to keep current password</small>
        </div>
        <div>
            <button type="submit">Update User</button>
        </div>
    </form>
</body>
</html>
