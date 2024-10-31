<?php
    include "../includes/header.php";

    require "../includes/config/connect.php";
    $db = connectdb();

    $id= $_POST["id"];
    $name= $_POST["name"];
    $email= $_POST["email"];
    $phone= $_POST["phone"];

    $query = "INSERT INTO sellers (name, email, phone) VALUES  ('$name', '$email', '$phone');";

    $response = mysqli_query($db, $query);

    if (mysqli_num_rows($response) > 0) {
        echo "Seller added successfully";
        } else {
            echo "Error adding seller";
            }
    
?>

<section>
    <h2>Sellers</h2>
    <div>
        <form action="crearSeller.php" method="post">
            <fieldset>
                <legend>Fill all fields to create a new seller</legend>
                <div>
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" placeholder="Your name">
                </div>
                <div>
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" placeholder="Your@email.com">
                </div>
                <div>
                    <label for="phone">phone</label>
                    <input type="tel" name="phone" id="phone" placeholder="Your phone number">
                </div>
                <div>
                    <button type="submit">Create a new seller</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
include "../includes/footer.php";
?>
