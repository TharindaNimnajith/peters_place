--------------------
      ITP_MLB_G9_13
--------------------

== Installation == 

1. Download & Install XAMPP. (Not needed if you already have PHP installed)
https://www.apachefriends.org/index.html

2. Download & Install Composer
https://getcomposer.org/download/

3. Import the Database to MySQL. (Inside the /database/Dump20190927 folder)

4. Open 'peters place' folder and edit the .env file to match your database settings (Username, Password etc.)

5. Open CMD and go to the 'peters place' folder.

6. Run this command.
	php artisan serve

7. Server will start on your localhost.

	Email:- admin@gmail.com
	Password:- admin

== Error Fixing == 

If you get an error saying autoload.php is not found, run these commands in the ''peters place' folder.
	composer install

If you get an error saying server encryption method is different, run these commands.
	php artisan key:generate
	php artisan config:cache

== Help ==

If any other errors, please open a new issue on Github. 
https://github.com/TharindaNimnajith/peters_place



== Team - MLB_G9_13 == 
===============================================================================================================
 |     IT Number         |                                                       Name                                                 |                            Function                                                    |
===============================================================================================================
|      IT18143614         |                      Kavindi Gunasinghe U.L.D                                       |         Front office Management                                   |
---------------------------------------------------------------------------------------------------------------
|      IT18135862        |                       Wattegedara S.L                                                           |         Event Management                                               |
---------------------------------------------------------------------------------------------------------------
 |     IT18140262        |                      Visna Oshani Jayasinghe                                         |        Finance Management                                            |
---------------------------------------------------------------------------------------------------------------
|      IT18149654        |                     Rajapaksha T.N                                                               |   Room reservation and Room Management   |
---------------------------------------------------------------------------------------------------------------
|      IT18124590        |                     Parana Liyanage T.L                                                     |       Supplier Management                                           |
---------------------------------------------------------------------------------------------------------------
|      IT18153682        |                    Gajasinghe A.N                                                                |        HR Management                                                      |
--------------------------------------------------------------------------------------------------------------- 
|      IT18093124       |                     D.H.L.Amarasinghe                                                       |        Housekeeping Management                             |
---------------------------------------------------------------------------------------------------------------
|      IT18151770        |                     C.A.J.P.Chandranath                                                     |         Inventory Management                                        |
===============================================================================================================
 
 

Thank you. 