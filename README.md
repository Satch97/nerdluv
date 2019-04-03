Database Setup :

1. Run the following commands in mysql

  CREATE USER 'nerd'@'localhost' IDENTIFIED BY 'Nerdluv';
  GRANT ALL PRIVILEGES ON * . * TO 'nerd'@'localhost';
  FLUSH PRIVILEGES;
