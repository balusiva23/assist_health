CREATE TABLE `medical_documents` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `member_id` INT(11),
    `file` TEXT, -- Assuming you wanted this field here as "file-text"
    `created_on` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `is_active` TINYINT(4) DEFAULT 1
);
