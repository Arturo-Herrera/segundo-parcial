<?php
include "../includes/header.php";
require "../includes/config/connect.php";

$db = connectdb();
$errors = [];

$query = "select name from sellers";

$response = mysqli_query($db, $query);

while ($seller = mysqli_fetch_assoc($response)) {
    echo $seller['name'];
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = trim($_POST["title"]);
    if (empty($title)) $errors[] = "Title is required.";

    $price = $_POST["price"];
    if (empty($price) || !is_numeric($price) || $price <= 0) $errors[] = "Price must be a positive number.";

    $img = $_FILES["img"];
    if (empty($img['name'])) $errors[] = "Image is required.";

    $description = trim($_POST["description"]);
    if (empty($description)) $errors[] = "Description is required.";

    $rooms = $_POST["rooms"];
    if (empty($rooms) || !is_numeric($rooms) || $rooms < 0) $errors[] = "Rooms must be a non-negative number.";

    $wc = $_POST["wc"];
    if (empty($wc) || !is_numeric($wc) || $wc < 0) $errors[] = "WC must be a non-negative number.";

    $garage = $_POST["garage"];
    if (empty($garage) || !is_numeric($garage) || $garage < 0) $errors[] = "Garage must be a non-negative number.";

    $timestamp = $_POST["timestamp"];
    if (empty($timestamp) || !preg_match('/\d{4}-\d{2}-\d{2}/', $timestamp)) $errors[] = "Invalid date format for timestamp.";

    $seller = $_POST["seller"];
    if (empty($seller) || !is_numeric($seller)) $errors[] = "Seller ID must be a valid number.";
    

    if (empty($errors)) {
        $imgPath = "uploads/" . basename($img["name"]);
        move_uploaded_file($img["tmp_name"], $imgPath);

        $query = "INSERT INTO propierties (title, price, image, description, rooms, wc, garage, timestap, id_seller) VALUES ('$title', '$price', '$imgPath', '$description', '$rooms', '$wc', '$garage', '$timestamp', '$seller');";
        
        $response = mysqli_query($db, $query);

        if ($response) {
            echo "Property added successfully";
        } else {
            echo "Error adding property: " . mysqli_error($db);
        }
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>

    <section>
        <h2>propierties form</h2>
        <div>
            <form action="crearPropiedades.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Fill all form fields to create a new propierty</legend>
                    <div>
                        <label for="title">Name:</label>
                        <input type="text" name="title" id="title" placeholder="title of propierty">
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" placeholder="$9999.99">
                    </div>
                    <div>
                        <label for="img">Imagen:</label>
                        <input type="file" name="img" id="img">
                    </div>
                    <div>
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" placeholder="Propierty description"></textarea>
                    </div>
                    <div>
                        <label for="rooms">Number of room</label>
                        <input type="number" name="rooms" id="rooms">
                    </div>
                    <div>
                        <label for="wc">Number of wc</label>
                        <input type="number" name="wc" id="wc">
                    </div>
                    <div>
                        <label for="garage">Number of garage</label>
                        <input type="number" name="garage" id="garage">
                    </div>
                    <div>
                        <label for="timestamp">TimeStamp</label>
                        <input type="date" name="timestamp" id="timestamp">
                    </div>
                    <div>
                        <label for="seller">Seller</label>
                        <input type="number" name="seller" id="seller">
                    </div>
                    <div>
                        <button type="submit">Create a new propierty</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>

<?php
include "../includes/footer.php";
?>