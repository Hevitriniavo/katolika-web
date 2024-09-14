CREATE DATABASE jfds;

\c jfds;

CREATE TABLE accounts (
    id SERIAL PRIMARY KEY,
    last_name VARCHAR(100) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    role VARCHAR(50) NOT NULL CHECK (role IN ('Administrator', 'Regional President', 'Holy Association President', 'Work Committee President', 'Member')),
    account_type VARCHAR(50) NOT NULL CHECK (account_type IN ('Administrator', 'Region', 'Holy Association', 'Work Committee', 'Member')),
    qr_code TEXT UNIQUE,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE regions (
    id SERIAL PRIMARY KEY,
    code VARCHAR(10) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE holy_associations (
    id SERIAL PRIMARY KEY,
    code VARCHAR(10) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE work_committees (
    id SERIAL PRIMARY KEY,
    code VARCHAR(10) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE roles (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE sacraments (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE events (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    organizer_id INT REFERENCES accounts(id),
    date DATE NOT NULL,
    duration INTERVAL,
    location VARCHAR(100),
    description TEXT
);

CREATE TABLE members (
    id SERIAL PRIMARY KEY,
    photo BYTEA,
    card_number VARCHAR(20) UNIQUE NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    birth_date DATE NOT NULL,
    region_id INT REFERENCES regions(id),
    association_id INT REFERENCES holy_associations(id),
    committee_id INT REFERENCES work_committees(id),
    sacrament_id INT REFERENCES sacraments(id),
    apv BOOLEAN,
    role_id INT REFERENCES roles(id),
    qr_code TEXT UNIQUE,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE attendances (
    id SERIAL PRIMARY KEY,
    event_id INT REFERENCES events(id),
    member_id INT REFERENCES members(id),
    is_present BOOLEAN,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE budgets (
    id SERIAL PRIMARY KEY,
    month INT NOT NULL,
    year INT NOT NULL,
    income NUMERIC,
    expense NUMERIC,
    balance NUMERIC GENERATED ALWAYS AS (income - expense) STORED
);

CREATE TABLE transactions (
    id SERIAL PRIMARY KEY,
    date DATE NOT NULL,
    description VARCHAR(255) NOT NULL,
    movement VARCHAR(50) NOT NULL CHECK (movement IN ('Income', 'Expense')),
    amount NUMERIC NOT NULL,
    budget_id INT REFERENCES budgets(id)
);

CREATE TABLE tickets (
    id SERIAL PRIMARY KEY,
    transaction_id INT REFERENCES transactions(id),
    member_id INT REFERENCES members(id),
    ticket_number VARCHAR(20) UNIQUE NOT NULL,
    is_paid BOOLEAN DEFAULT FALSE
);

CREATE TABLE payment_markings (
    id SERIAL PRIMARY KEY,
    ticket_id INT REFERENCES tickets(id),
    is_paid BOOLEAN NOT NULL
);

CREATE TABLE distributions (
    id SERIAL PRIMARY KEY,
    ticket_id INT REFERENCES tickets(id),
    transaction_id INT REFERENCES transactions(id),
    distribution_date DATE
);

CREATE TABLE activities (
    id SERIAL PRIMARY KEY,
    organizer_id INT REFERENCES accounts(id),
    name VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    duration INTERVAL,
    location VARCHAR(100),
    description TEXT,
    condition TEXT,
    purpose TEXT
);

CREATE TABLE role_history (
    id SERIAL PRIMARY KEY,
    member_id INT REFERENCES members(id),
    role_id INT REFERENCES roles(id),
    start_date DATE NOT NULL,
    end_date DATE
);
