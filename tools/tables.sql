CREATE TABLE authors(
  author_id INT AUTO_INCREMENT NOT NULL,
  author_username VARCHAR (50) NOT NULL,
  author_password VARCHAR (250) NOT NULL,
  PRIMARY KEY (author_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE articles(
  article_id INT AUTO_INCREMENT NOT NULL,
  article_title VARCHAR (150) NOT NULL,
  article_image VARCHAR (250) NOT NULL,
  article_text TEXT NOT NULL,
  DATETIME DATETIME NOT NULL,
  article_archived BOOLEAN NOT NULL,
  author_id INT NOT NULL,
  PRIMARY KEY (article_id),
  FOREIGN KEY (author_id) REFERENCES authors(author_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE subscription (
  mail_id INT AUTO_INCREMENT NOT NULL,
  mail_registered VARCHAR(200) NOT NULL,
  PRIMARY KEY (mail_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
