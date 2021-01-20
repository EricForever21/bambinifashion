# bambinifashion
PHP - LARAVEL 

1) Install the latest Laravel version
2) create a Brand model with a respective database migration: table (id, name)
3) create a Product model with a respective database migration: table (id, brand_id, name, price)
4) make a View where all products are listed with brand name and price in a table (bootstrap will work just fine, but completely up to you)
5) create Seeder that will fill the database with sample products
6) add Product-Purchase functionality:
 1) add a "BUY" button to each product in the list (see point 5)
 2) button should lead to a URL with a basic checkout functionality (/checkout)
 3) create an Order model with a respective database migration: table (id, total_product_value, total_shipping_value, client_name, client_address)
 4) create a Checkout form (name, address, shipping option [free standard, express 10 EUR), where user lands after clicking "BUY NOW" button
 5) collect and validate payment information of the customer (simulate credit card processor)
 6) successful requests should be Stored to the database and a notification Email should be sent to the admin, presenting information about the order
7) push everything to the created GIT repository


INSTRUCTIONS: 

-  SQL file needs to be loaded into the Database 
    example:  mysql -u root -p forge < bambinifashion.sql
-  .env  file needs to have information of database location, user , database name please change it
    according to your database
-   First view page needs to enter a user and password 
    
