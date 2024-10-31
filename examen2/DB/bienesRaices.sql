CREATE DATABASE bienesraices;

DROP DATABASE bienesraices;

USE bienesraices;

CREATE TABLE seller(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    phone VARCHAR(10)
);

CREATE TABLE propierties (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(256),
    description TEXT,
    rooms INT,
    wc INT,
    garage INT,
    timestap DATE,
    id_seller INT(11),
    CONSTRAINT fk_seller FOREIGN KEY (id_seller) REFERENCES seller(id)
);

/*INSERT'S*/

INSERT INTO seller VALUES
(1001, "Foo Bar", "foo@bar.com", 1234567890),
(2002, "Bar Foo", "bar@foo.com", 0987654321);

INSERT INTO propierties (title, price, image, description, rooms, wc, garage, timestap, id_seller)
VALUES
('Casa en el centro', 250000.00, 'https://example.com/image1.jpg', 'Casa en el centro de la ciudad', 3, 2, 1, '2022-01-01', 1001),
('Departamento en la playa', 180000.00, 'https://example.com/image2.jpg', 'Departamento en la playa con vista al mar', 2, 1, 0, '2022-02-01', 2002),
('Casa en el campo', 350000.00, 'https://example.com/image3.jpg', 'Casa en el campo con gran jardín', 4, 3, 2, '2022-03-01', 1001),
('Apartamento en la ciudad', 120000.00, 'https://example.com/image4.jpg', 'Apartamento en la ciudad cerca del centro', 1, 1, 0, '2022-04-01', 1001),
('Chalet en la montaña', 500000.00, 'https://example.com/image5.jpg', 'Chalet en la montaña con vistas impresionantes', 5, 4, 3, '2022-05-01', 2002);

SELECT * FROM seller;