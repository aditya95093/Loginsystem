<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Therapy Form</title>
</head>
<body>
    <div class="container">
        <h2>Add New Therapy</h2>

        <form action="insert_therapy.php" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" name="title" placeholder="Title" required>

            <label for="description">Description:</label>
            <textarea name="description" rows="4" placeholder="Write description" required></textarea>

            <label for="image">Image:</label>
            <input type="file" name="image" accept="image/*" required>

            <label for="questions_count">Questions Count:</label>
            <input type="number" name="questions_count" required>

            <label for="therapy_link">Therapy Link:</label>
            <input type="text" name="therapy_link" required>

            <button type="submit">Add Therapy</button>
        </form>

    </div>
</body>
</html>
