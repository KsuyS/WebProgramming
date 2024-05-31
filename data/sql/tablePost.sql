CREATE TABLE post
(
   `post_id`           INT NOT NULL AUTO_INCREMENT,
   `title`             VARCHAR(255) NOT NULL,
   `subtitle`          VARCHAR(255) NOT NULL,
   `main_image_post`   VARCHAR(255) NOT NULL,
   `image_post`        VARCHAR(255) NOT NULL,
   `content`           TEXT,
   `author`            VARCHAR(255) NOT NULL,
   `publish_date`      DATE NOT NULL,
   `image_author`      VARCHAR(255),
   `featured`          TINYINT(1) DEFAULT 0,
   PRIMARY KEY (`post_id`)
) ENGINE = InnoDB
CHARACTER SET = utf8mb4
COLLATE utf8mb4_unicode_ci
;

