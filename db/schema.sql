
CREATE TABLE cats(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT NOW(),
    primary key(id)
);
 

CREATE TABLE courses(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `desc` TEXT NOT NULL,
    img VARCHAR(50) NOT NULL,
    cat_id INT UNSIGNED NOT NULL,
    created_at DATETIME NOT NULL DEFAULT NOW(),

    primary key(id),
    FOREIGN KEY(cat_id) REFERENCES cats(id)
);



CREATE TABLE reservations(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    spec VARCHAR(255),
    course_id INT UNSIGNED NOT NULL,
    created_at DATETIME NOT NULL DEFAULT NOW(),

    primary key(id),
    FOREIGN KEY(course_id) REFERENCES courses(id)
);



CREATE TABLE admins(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT NOW(),

    primary key(id)
);