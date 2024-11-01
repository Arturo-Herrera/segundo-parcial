<?php
    include "header.php";
    require "connect.php";
    $db = connectdb();

    if($_SERVER['REQUEST_METHOD']=='POST'){
    $name= $_POST["name"];
    $email= $_POST["email"];
    $phone= $_POST["phone"];

    $query = "INSERT INTO seller (name, email, phone) VALUES "." ('$name', '$email', '$phone');";

    $response = mysqli_query($db, $query);

    try {
        $response = mysqli_query($db, $query);

        if ($response === false) {
            throw new Exception('Error en la consulta a la base de datos: ' . mysqli_error($db));
        }

        echo "Seller added successfully";
        
    } catch (Exception $e) {
        echo "Excepción capturada: " . $e->getMessage();
    }
    }
?>

<section>
    <h2>Sellers</h2>
    <div>
        <form action="crearSellers.php" method="post">
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
include "footer.php";
?>
