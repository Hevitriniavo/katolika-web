CREATE TABLE activity
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL
);

CREATE TABLE responsibility
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL
);

CREATE TABLE region
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(250) NOT NULL,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE holy
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(250) NOT NULL,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE committee
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(250) NOT NULL,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE sacrament
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250) NOT NULL
);


CREATE TABLE account
(
    id            INT AUTO_INCREMENT PRIMARY KEY,
    pseudo        VARCHAR(250) NOT NULL,
    password      VARCHAR(255) NOT NULL,
    category      VARCHAR(200) NOT NULL,
    account_type  VARCHAR(255),
    region_id     INT,
    code          VARCHAR(200) NOT NULL,
    hash          TEXT         NOT NULL,
    sacrament_id  INT,
    holy_id       INT,
    committee_id  INT,
    photo         VARCHAR(200),
    creation_date DATE         NOT NULL,
    gender        VARCHAR(150),
    last_name     VARCHAR(255),
    first_name    VARCHAR(255),
    birth_date    DATE,
    account_apv   VARCHAR(150),
    address       VARCHAR(255),
    FOREIGN KEY (region_id) REFERENCES region (id) ON DELETE SET NULL,
    FOREIGN KEY (sacrament_id) REFERENCES sacrament (id) ON DELETE SET NULL,
    FOREIGN KEY (holy_id) REFERENCES holy (id) ON DELETE SET NULL,
    FOREIGN KEY (committee_id) REFERENCES committee (id) ON DELETE SET NULL
);

CREATE TABLE user
(
    id                 INT AUTO_INCREMENT PRIMARY KEY,
    first_name         VARCHAR(255) NOT NULL,
    last_name          VARCHAR(200) NOT NULL,
    code              VARCHAR(250) NOT NULL,
    -- sacrament_location VARCHAR(250),
    -- date               DATE,
    qr_code            VARCHAR(200),
    photo              VARCHAR(250) NOT NULL,
    -- user_apv           VARCHAR(250) NOT NULL,
    -- sacrament_date     DATE,
    committee_id       INT,
    holy_id            INT,
    responsibility_id  INT,
    sacrament_id       INT,
    region_id          INT          NOT NULL,
    address            VARCHAR(255) NOT NULL,
    username              VARCHAR(250),
    birth_date         DATE,
    gender             VARCHAR(110) NOT NULL,
    password       VARCHAR(200) ,
    FOREIGN KEY (region_id) REFERENCES region (id) ON DELETE CASCADE,
    FOREIGN KEY (holy_id) REFERENCES holy (id) ON DELETE SET NULL,
    FOREIGN KEY (committee_id) REFERENCES committee (id) ON DELETE SET NULL,
    FOREIGN KEY (responsibility_id) REFERENCES responsibility (id) ON DELETE SET NULL,
    FOREIGN KEY (sacrament_id) REFERENCES sacrament (id) ON DELETE SET NULL
);

CREATE TABLE sacrament_stock
(
    id             INT AUTO_INCREMENT PRIMARY KEY,
    account_id     INT          NOT NULL,
    user_id        INT          NOT NULL,
    sacrament_id   INT          NOT NULL,
    stock_date     DATE         NOT NULL,
    stock_location VARCHAR(250) NOT NULL,
    FOREIGN KEY (account_id) REFERENCES account (id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE,
    FOREIGN KEY (sacrament_id) REFERENCES sacrament (id) ON DELETE CASCADE
);

CREATE TABLE operation
(
    id             INT AUTO_INCREMENT PRIMARY KEY,
    name           VARCHAR(255) NOT NULL,
    ticket_count   INT          NOT NULL,
    operation_date DATE         NOT NULL,
    description    VARCHAR(255) NOT NULL,
    ticket_price   INT
);

CREATE TABLE ticket
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    `from`       INT NOT NULL,
    `to`         INT NOT NULL,
    operation_id INT NOT NULL,
    account_id   INT NOT NULL,
    paid         VARCHAR(255),
    distribution VARCHAR(255),
    FOREIGN KEY (operation_id) REFERENCES operation (id) ON DELETE CASCADE,
    FOREIGN KEY (account_id) REFERENCES account (id) ON DELETE CASCADE
);

CREATE TABLE proactivity
(
    id                   INT AUTO_INCREMENT PRIMARY KEY,
    activity_name        VARCHAR(200) NOT NULL,
    activity_start_date  DATE         NOT NULL,
    activity_end_date    DATE         NOT NULL,
    activity_description TEXT         NOT NULL,
    activity_status      INT,
    activity_location    VARCHAR(200) NOT NULL,
    account_id           INT          NOT NULL,
    presence_date        DATE,
    role                 VARCHAR(255),
    active               TEXT,
    proactivity_id       INT,
    proactivity_name     VARCHAR(255),
    FOREIGN KEY (account_id) REFERENCES account (id) ON DELETE CASCADE
);

CREATE TABLE cash_register
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    reason  VARCHAR(250) NOT NULL,
    type    VARCHAR(255) NOT NULL,
    amount  INT          NOT NULL,
    date    DATE,
    balance INT          NOT NULL
);

CREATE TABLE event
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(255) NOT NULL,
    start_date DATE         NOT NULL,
    end_date   DATE         NOT NULL,
    location   VARCHAR(255) NOT NULL,
    account_id INT          NOT NULL,
    FOREIGN KEY (account_id) REFERENCES account (id) ON DELETE CASCADE
);
