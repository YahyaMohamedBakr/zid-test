## Zid Test 1

As a Technical Product Specialist, it is essential to determine the best approach for integrating with the Zid system to facilitate the development process for application developers (partners). In this task, we will analyze the required features and provide the necessary endpoints, request bodies, and header variables for each feature.

#### 1- Adding a New Product to Zid:
 
in this part, I used this flowing endpoint

    https://api.zid.sa/v1/products/

and use 12 variables in the body and two variables in the headers.
the body variables are: 

* $product_name_ar 
* $product_name_en 
* $product_discription 
* $price 
* $sale_price 
* $quantity 
* $requires_shipping
* $is_taxable
* $is_infinite 
* $has_options 
* $has_fields
* $is_draft

Of course not all variables are required but names in Arabic and English and price sure required for example.

after that I use authentication with two variables are :

* $store_id.
* $manager_token

if authentication is right and the required variables are right the product will create.


#### 2- Getting a List of Newly Added Products from Merchants in Zid:

in this part i use the flowing endpoint 

    https://api.zid.sa/v1/products/?page_size=".$page_size."&page=".$page_num."&attribute_values=".$att_values

as you see this URL contains 3 query parameters if I send request with those parameters and add it to the store id header I can see the response with products.

the parameters are used:

* $page_size
* $page_num
* $att_values

the header variable only :

* $store_id

the only varible reuqire is $store_id, other varible is optinal

    notes:
    It might be a good idea to add  authentication 
    so that no one but the store 
    the owner can tamper with the requests


#### 3: Adding a New Coupon with a 10% Discount for a Custom Product

I use this flowing endpoint in this part 

    https://api.zid.sa/v1/managers/store/coupons/add

and use 12 variables in posted body :

* $coupon_name 
* $coupon_code 
* $discount_type 
* $discount_value 
* $free_shipping 
* $free_cod
* $total 
* $date_start
* $date_end 
* $uses_total 
* $uses_customer 
* $status 

the following variable is missing 

* apply_to_array
but I tested it and it does not work so I use (apply_to) without variable and make it fixed  like this:

        apply_to = products

this makes coupon applied to custom products you assign to it.

I use also in headers one variable is:

* $manager_token

to authentication.

if I send this request with these variables in the body and token in the headers I will see response as wrong or true according to the data.

###### To help you understand the implementation, I have provided a sample PHP code in the index.php and three php other files, which is included in the project. Follow the steps below to use the files:

* Create a project folder on your Apache or PHP server and name it, for example, "zid-test".
* paste index.php and other php files into the project folder.
* Open your web browser and enter the URL for your host and project, e.g., "yourHost/projectName".
* Start using the application and enjoy!

Please note that the code is only a sample, and you may need to modify it to fit your specific requirements and environment.