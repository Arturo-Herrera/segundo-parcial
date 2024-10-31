<?php
include "header.php";
require "connect.php";

$db = connectdb();

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $title = $_POST['title'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        $rooms = $_POST['rooms'];
        $wc = $_POST['wc'];
        $timestamp = $_POST['timestamp'];
        $id_seller = $_POST['seller_id'];

        $query = "INSERT INTO propierties (title, price, image, description, rooms, wc, timestamp, id_seller) VALUES "
                        ."('$title', $price, '$image', '$description', $rooms, $wc, '".date("Y-m-d")."', $id_seller)";

        try {
            $response = mysqli_query($db, $query);
            echo "<p>Property Created!<p>";

        } catch (Exception  $e) {
            echo "<p>Error: Property not created: {$e->getMessage()}<p>";
        }

        try {
            $query = "SELECT id, name FROM seller;";
            
            $sellers = mysqli_query($db, $query);
            
            if (!$sellers) {
                throw new Exception("Error: " . mysqli_error($db));
            }
        
        } catch (Exception $e) {
            echo "<p>Error: {$e->getMessage()}</p>";
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
                    <label for="seller_id">Select the seller</label>
                        <select name="seller_id" id="seller_id">
                            <?php while ($seller = mysqli_fetch_assoc($sellers)) { ?>
                                <option value="<?php echo $seller['id']; ?>"><?php echo $seller['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit">Create a new propierty</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>

<?php
include "footer.php";
?>