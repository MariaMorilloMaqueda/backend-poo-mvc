CREATE TABLE libros (
    id INT PRIMARY KEY,
    isbn VARCHAR(20) NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    anio_publicacion INT,
    paginas INT,
    calificacion INT,
    fecha_prestamo DATETIME,
    fecha_devolucion DATETIME
);

INSERT INTO libros (id, isbn, titulo, autor, anio_publicacion, paginas, calificacion, fecha_prestamo, fecha_devolucion) VALUES
(1, '9780140449136', 'El Quijote', 'Miguel de Cervantes', 1605, 863, 5, '2022-05-15 10:30:00', '2023-06-20 14:45:00'),
(2, '9780061120084', 'To Kill a Mockingbird', 'Harper Lee', 1960, 281, 3, '2022-07-22 09:15:00', '2023-08-25 16:30:00'),
(3, '9780747532743', 'Harry Potter and the Philosopher''s Stone', 'J.K. Rowling', 1997, 223, 7, '2023-01-10 11:00:00', '2023-12-12 12:00:00'),
(4, '9780451524935', '1984', 'George Orwell', 1949, 328, 4, '2022-03-05 08:20:00', '2023-04-10 10:40:00'),
(5, '9780307269997', 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 2011, 443, 6, '2022-11-18 14:50:00', '2023-12-19 15:55:00'),
(6, '9780435127471', 'The Catcher in the Rye', 'J.D. Salinger', 1951, 277, 2, '2023-02-25 13:35:00', '2023-11-30 17:45:00'),
(7, '9780268781918', 'The Hobbit', 'J.R.R. Tolkien', 1937, 310, 8, '2022-06-30 07:25:00', '2023-07-15 09:00:00'),
(8, '9780525555377', 'Becoming', 'Michelle Obama', 2018, 448, 5, '2022-09-12 10:10:00', '2023-10-22 18:20:00'),
(9, '9780553380163', 'A Song of Ice and Fire: A Game of Thrones', 'George R.R. Martin', 1996, 694, 3, '2023-03-08 15:45:00', '2023-09-20 20:30:00');
