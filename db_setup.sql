CREATE DATABASE IF NOT EXISTS gunma_db;

CREATE USER IF NOT EXISTS gunma_kenmin
    IDENTIFIED BY '1234';

GRANT ALL ON gunma_db.* TO gunma_kenmin;