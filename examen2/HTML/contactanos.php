<?php
include"../HTML/includes/header.php";
?>
    <section>
        <h2>Contacto</h2>
        <!--IMG-->
    </section>
    <section>
        <h2>llena el formulario de contacto</h2>
        <div>
            <form action="">
                <fieldset>
                    <legend>Informacion personal</legend>
                    <div>
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" placeholder="Your Name">
                    </div>
                    <div>
                        <label for="email">Correo:</label>
                        <input type="email" name="email" id="email" placeholder="your@email">
                    </div>
                    <div>
                        <label for="phone">Telefono:</label>
                        <input type="tel" name="phone" id="phone" placeholder="555 555 5555">
                    </div>
                    <div>
                        <label for="msg">Mensaje:</label>
                        <textarea name="msg" id="msg" placeholder="Your message"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>informacion de la propiedad</legend>
                    <div>
                        <label for="vencom">Vender o comprar</label>
                        <input type="select" name="vencom" id="vencom">
                    </div>
                    <div>
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contact</legend>
                    <div>
                        <label for="contactForm">Contact  Form</label>
                        <label for="tel">Phone</label>
                        <input type="radio" name="tel" id="tel">
                        <label for="e-mail">Email</label>
                        <input type="radio" name="e-mail" id="e-mail">
                    </div>
                    <div>
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date">
                    </div>
                    <div>
                        <label for="time">Time</label>
                        <input type="time" name="time" id="time">
                    </div>
                </fieldset>
                <div>
                    <button>contactame</button>
                </div>
            </form>
        </div>
    </section>
<?php
include"../HTML/includes/footer.php";
?>