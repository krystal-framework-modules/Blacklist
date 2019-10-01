
CREATE TABLE `users_blacklist` (
    `master_id` INT NOT NULL COMMENT 'Profile wwner',
    `slave_id` INT NOT NULL COMMENT 'Blocked user',

    FOREIGN KEY (master_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (slave_id) REFERENCES users(id) ON DELETE CASCADE
);