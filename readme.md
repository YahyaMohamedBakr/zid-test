## Zid Test 1 
##### (Add Products and coupons)
As a Technical Product Specialist, it is essential to determine the best approach for integrating with the Zid system to facilitate the development process for application developers (partners). In this task, we will analyze the required features and provide the necessary endpoints, request bodies, and header variables for each feature.

#### 1- Adding a New Product to Zid:
 
For this part, I utilized the following endpoint:

    https://api.zid.sa/v1/products/

In the request body, I utilized 12 variables and 2 variables in the headers. The body variables are as follows:


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

While not all variables are required, the product name in Arabic and English, as well as the price, are essential.

Authentication is implemented using two variables:

* $store_id.
* $manager_token

If the authentication is successful and the required variables are correct, the product will be created.

#### 2- Getting a List of Newly Added Products from Merchants in Zid:

For this part, I utilize the following endpoint:

    https://api.zid.sa/v1/products/?page_size=".$page_size."&page=".$page_num."&attribute_values=".$att_values

As you can see, this URL contains three query parameters. By sending a request with these parameters and including the store ID in the header, I can retrieve the response with the products.

The utilized parameters are:

* $page_size
* $page_num
* $att_values

The header variable used is:

* $store_id

Only the $store_id variable is required, while the others are optional.

    Notes:
    It is recommended to implement authentication to
    ensure that only the store owner can modify the requests.


#### 3: Adding a New Coupon with a 10% Discount for a Custom Product

For this part, I utilize the following endpoint:

    https://api.zid.sa/v1/managers/store/coupons/add

In the request body, I use 12 variables:

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

One variable is missing, which is "apply_to_array". However, since it does not work properly, I use "apply_to" without a variable and set it as fixed, like this:

    apply_to = products

This makes the coupon applicable to custom products assigned to it.

In the headers, I also include one variable:

* $manager_token

for authentication purposes.

By sending a request with these variables in the body and the token in the headers, I will receive a response indicating the success or failure of the operation.

###### To assist you in understanding the implementation, I have provided a sample PHP code in the index.php file and three additional PHP files included in the project. Follow the steps below to use the files:

* Create a project folder on your Apache or PHP server and name it, for example, "zid-test".
* Paste the index.php file and the other PHP files into the project folder.
* Open your web browser and enter the URL for your host and project, e.g., "yourHost/projectName".
* Start using the application and enjoy!

Please note that the provided code is only a sample, and you may need to modify it to meet your specific requirements and environment.