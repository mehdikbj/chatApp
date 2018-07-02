# chatApp
PHP - MySQL - HTML5

## Requirements:
- Windows 10.
- WampServer 3.1.3
- PHP 5.6

## Steps of instalation:

  1-Clone the project in the directory C:\wamp64\www
  2-Execute de script C:\wamp64\www\chatApp\database\database_chatApp in phpMyadmin
  3-Edit the C:\wamp64\www\chatApp\config\Config.php with your own database name and password
  4-Copy those line in httpd-vhosts.conf

          <VirtualHost *:80>
              ServerName local.chatapp
              DocumentRoot "c:/wamp64/www/chatApp/web"
              <Directory  "c:/wamp64/www/chatApp/web/">
                  Options +Indexes +Includes +FollowSymLinks +MultiViews
                  AllowOverride All
                  Require local
              </Directory>
          </VirtualHost>

   5- go to http://localhost/message/index.
