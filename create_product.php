<?php

if (isset($_POST['submit'])){
    create_product();

}


function create_product(){
$store_id = $_POST['store_id'];
$manager_token = $_POST['manager_token'];
$product_name_ar = $_POST['product_name_ar'];
$product_name_en = $_POST['product_name_en'];
$product_discription = $_POST['product_discription'];
$price = $_POST['price'];
$sale_price = $_POST['sale_price'];
$quantity = $_POST['quantity'];
$requires_shipping = isset ($_POST['requires_shipping'])? true : false; 
$is_taxable = isset ($_POST['is_taxable'])? true : false; 
$is_infinite = isset ($_POST['is_infinite'])? true : false; 
$has_options = isset ($_POST['has_options'])? true : false; 
$has_fields = isset ($_POST['has_fields'])? true : false; 
$is_draft = isset ($_POST['is_draft'])? true : false; 


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.zid.sa/v1/products/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'name' => [
        'ar' => $product_name_ar,
        'en' => $product_name_en
    ],
    'description' => $product_discription,
    'product_class' => '',
    'keywords' => [
        ''
    ],
    'requires_shipping' => $requires_shipping,
    'is_taxable' => $is_taxable,
    'price' => $price,
    'sale_price' => $sale_price,
    'is_infinite' => $is_infinite,
    'quantity' => $quantity,
    'has_options' => $has_options,
    'has_fields' => $has_fields,
    'is_draft' => $is_draft
  ]),
  CURLOPT_HTTPHEADER => [
    "Accept: application/json; charset=utf-8",
    "Accept-Language: en",
    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxMTciLCJqdGkiOiJhMTg5ZTg3MmYxMzhkMWVhYjU5MjVkMDkyMGE5NmI0YjliNjg0Y2E2ZTdmM2M2MjljZWYxNmQ4NDJjMmJlYmVhMjI4YTdmMTA0ZWQ4NWE5NCIsImlhdCI6MTY3OTU3Njk5OS41NjY4NzcsIm5iZiI6MTY3OTU3Njk5OS41NjY4OCwiZXhwIjoxNzExMTk5Mzk5LjQ4NjE1Mywic3ViIjoiMTgyNDc1Iiwic2NvcGVzIjpbInRoaXJkLXBhcnRpZXMtYXBpcyJdfQ.i07ef09nVNXGZF-g-QXpNoS2vlFQK_zntAqAMS4Az2XD2EyMLhxLZZRL-QlR11zUPqMmXjMAl_4ooKa3M3zkfZQ6Ga6qStvamk8RnC_39VUx0lfN2A4k65ERZpqwrMy6-t3dE99zay3aicIdNvbgi0zeuMSE5Tn99u-2AtSRa8ffbfAcYPPXacHrhdmlYzdiZS_x_skovFEow1E-nDjdL1WHqO92XdZ7RfNLkiYFTjZlZmM_UruvioaR3q6TXJbqRK_ZrziivezL8ohIQ2SBosUp58I29rlKzvlw_R2j0rKKYZbdxYDaxAHOISmOFKAlO66k7dNevAHI3s4uGIjoGA6ZXHknccWPLLLiaAQ0r64HV8GowW5dg2rhZNurJGDTnLlBQ6F-ql42ptHzSAfzzi576CEoN3gMVpgXcbntUY3reETkFsTBPUjeSuMpANMioXAA0GRp3Ut-84fTnrWxqsCW1WVUIx33HvmfCGPXIdkaCCWoA6G6KXo04MtFbKXQmXkK9esQWI-rqdVnMD3zSR3g3yFHZSL1U-mZeNja03706Rav1ordsRNOtRwtLuoRRbk9KasbUpEwqq4Ao9lqZZwRIjdEw-pQtnUT8V53fhmuuRIefCLFO7eGEtGUnh9o6Uh_pgi6AB6uSlnN9GEMGgI1alqvMmTjxvC-HHt0V-Y",
    "Content-Type: application/json",
    "Role: Manager",
    "Store-Id:".$store_id,
    "X-Manager-Token:".$manager_token
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
$data =json_decode($response);
curl_close($curl);

if ($err ) {
  echo "cURL Error #:" . $err;
} elseif(isset ($data->detail)) {

  echo 'this is error message from zid server  ('. $data->detail.')';
  exit;
}else{



echo '<div style="text-align: center; font-size: 48px; margin-top: 200px; color :green">Success</div>';
exit;
  // return $data;
}
}

?>

<div class="container">

<form  method="POST">
  <label for="product_name_ar">اسم المنتج (بالعربية):</label>
  <input type="text" name="product_name_ar" id="product_name_ar" required><br>

  <label for="product_name_en">Product Name (in English):</label>
  <input type="text" name="product_name_en" id="product_name_en" required><br>

  <label for="product_discription">وصف المنتج:</label>
  <textarea name="product_discription" id="product_discription"></textarea><br>

  <label for="price">السعر:</label>
  <input type="text" name="price" id="price" required><br>

  <label for="sale_price">سعر البيع:</label>
  <input type="text" name="sale_price" id="sale_price"><br>

  <label for="quantity">الكمية:</label>
  <input type="text" name="quantity" id="quantity" required><br>

  <label for="requires_shipping">تتطلب الشحن؟</label>
  <input type="checkbox" name="requires_shipping" id="requires_shipping" value="1"><br>

  <label for="is_taxable">خاضعة للضريبة؟</label>
  <input type="checkbox" name="is_taxable" id="is_taxable" value="1"><br>

  <label for="is_infinite">غير محدودة؟</label>
  <input type="checkbox" name="is_infinite" id="is_infinite" value="1"><br>

  <label for="has_options">لها خيارات؟</label>
  <input type="checkbox" name="has_options" id="has_options" value="1"><br>

  <label for="has_fields">لها حقول؟</label>
  <input type="checkbox" name="has_fields" id="has_fields" value="1"><br>

  <label for="is_draft">هل ستحتفظ بالمنتج في المسودة؟</label>
  <input type="checkbox" name="is_draft" id="is_draft" value="1"><br>

  <label for="store_id">من فضلك ضع رقم المتجر <div class="tooltip">[؟]
  <span class="tooltiptext">قم بتسجيل الدخول إلى حسابك في https://web.zid.sa/ ستجد رقم المتجر أسفل الإسم واللوجو في أعلى القائمة الرئيسية</span>
</div></label>
  <input type="text" name="store_id" id="store_id" required><br>

  <label for="store_id">من فضلك اثبت هويتك  <div class="tooltip">  [؟]
  <span class="tooltiptext">قم بالدخول إلى حسابك على https://web.zid.sa/ بعد ذلك إذهب إلى الإعدادات ومن ثم اذهب إلى مربع الربط مع الخدمات في خانة معلومات الربط قم بإنشاء رمز مصادقة </span>
</div></label> 
  <textarea name="manager_token" id="manager_token" placeholder="ضع رمز المصادقة Manager Token" required></textarea><br>

  <input type="submit" name="submit" value="إنشاء المنتج">
</form>
</div>

<style>
  body {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
  background-color: #f9f9f9;
  text-align: right;
  direction: rtl;
}

.container {
  width: 400px;
  padding: 20px;
  background-color: #f5f5f5;
}

#product-form {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 5px;
  margin-bottom: 10px;
}

input[type="checkbox"] {
  margin-bottom: 10px;
}

input[type="submit"] {
  padding: 10px 20px;
  background-color: #4caf50;
  color: white;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}


.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 250px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

</style>



