<!-- resources/views/categories/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <!-- Add your CSS here -->
</head>
<body>
    <h1>Create a New Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Category Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <button type="submit">Create Category</button>
    </form>
</body>
</html>
