<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  create_coupon();
}


function create_coupon(){
 

      $manager_token = isset ($_POST['manager_token'])? $_POST['manager_token'] :'' ;
      $coupon_name = isset ($_POST['coupon_name'])? $_POST['coupon_name']: '' ;
      $coupon_code = isset($_POST['coupon_code']) ? $_POST['coupon_code']:'';
      $discount_type = isset($_POST['$discount_type'])? "f" : "p";
      $discount_value = isset($_POST['discount_value'])? $_POST['discount_value'] :'';
      $free_shipping = isset ($_POST['free_shipping'])? "1" : "0";
      $free_cod = isset  ($_POST['free_cod'])? "1" : "0";
      $total = isset  ($_POST['total'])? $_POST['total']:'';
      $date_start = $_POST['date_start'];
      $date_end = $_POST ['date_end'];
      $uses_total = $_POST['uses_total'];
      $uses_customer = $_POST['uses_customer'];
      $status = isset($_POST['active'])? "1": "0";

      // if (isset($_POST['submit'])){
        $curl = curl_init();
        curl_setopt_array($curl, [
          CURLOPT_URL => "https://api.zid.sa/v1/managers/store/coupons/add",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          //this is posted body values
          CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"name\"\r\n\r\n".$coupon_name."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"code\"\r\n\r\n".$coupon_code."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"discount_type\"\r\n\r\n".$discount_type."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"discount\"\r\n\r\n".$discount_value."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"free_shipping\"\r\n\r\n".$free_shipping."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"free_cod\"\r\n\r\n".$free_cod."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"total\"\r\n\r\n".$total."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"date_start\"\r\n\r\n".$date_start."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"date_end\"\r\n\r\n".$date_end."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"uses_total\"\r\n\r\n".$uses_total."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"uses_customer\"\r\n\r\n".$uses_customer."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"apply_to\"\r\n\r\nproducts\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"status\"\r\n\r\n".$status."\r\n-----011000010111000001101001\r\n",
          CURLOPT_HTTPHEADER => [
            "Accept-Language: ar",
            "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxMTciLCJqdGkiOiJhMTg5ZTg3MmYxMzhkMWVhYjU5MjVkMDkyMGE5NmI0YjliNjg0Y2E2ZTdmM2M2MjljZWYxNmQ4NDJjMmJlYmVhMjI4YTdmMTA0ZWQ4NWE5NCIsImlhdCI6MTY3OTU3Njk5OS41NjY4NzcsIm5iZiI6MTY3OTU3Njk5OS41NjY4OCwiZXhwIjoxNzExMTk5Mzk5LjQ4NjE1Mywic3ViIjoiMTgyNDc1Iiwic2NvcGVzIjpbInRoaXJkLXBhcnRpZXMtYXBpcyJdfQ.i07ef09nVNXGZF-g-QXpNoS2vlFQK_zntAqAMS4Az2XD2EyMLhxLZZRL-QlR11zUPqMmXjMAl_4ooKa3M3zkfZQ6Ga6qStvamk8RnC_39VUx0lfN2A4k65ERZpqwrMy6-t3dE99zay3aicIdNvbgi0zeuMSE5Tn99u-2AtSRa8ffbfAcYPPXacHrhdmlYzdiZS_x_skovFEow1E-nDjdL1WHqO92XdZ7RfNLkiYFTjZlZmM_UruvioaR3q6TXJbqRK_ZrziivezL8ohIQ2SBosUp58I29rlKzvlw_R2j0rKKYZbdxYDaxAHOISmOFKAlO66k7dNevAHI3s4uGIjoGA6ZXHknccWPLLLiaAQ0r64HV8GowW5dg2rhZNurJGDTnLlBQ6F-ql42ptHzSAfzzi576CEoN3gMVpgXcbntUY3reETkFsTBPUjeSuMpANMioXAA0GRp3Ut-84fTnrWxqsCW1WVUIx33HvmfCGPXIdkaCCWoA6G6KXo04MtFbKXQmXkK9esQWI-rqdVnMD3zSR3g3yFHZSL1U-mZeNja03706Rav1ordsRNOtRwtLuoRRbk9KasbUpEwqq4Ao9lqZZwRIjdEw-pQtnUT8V53fhmuuRIefCLFO7eGEtGUnh9o6Uh_pgi6AB6uSlnN9GEMGgI1alqvMmTjxvC-HHt0V-Y",
            "Content-Type: multipart/form-data; boundary=---011000010111000001101001",
            "X-Manager-Token:".$manager_token
          ],
        ]);
  
        $response = curl_exec($curl);
        $err = curl_error($curl);
      // }
      
      $data = json_decode($response);

      curl_close($curl);

      if ($err ) {
        echo "cURL Error #:" . $err;
      } elseif($data->status !== "object"){
        echo 'this is error message from zid server  ('.$data->message->name.')';
        exit;
      }
      elseif( $data->status == "object"){
        echo '<div style="text-align: center; font-size: 48px; margin-top: 200px; color :green">Success</div>';
        exit;
        // return $data;
      }

}


// elseif(isset ($coupon->status) && $coupon->status == "error"){
//   echo 'this is error message from zid server  ('.$data->message['3'].')';
//         exit;
// }

// $coupon = create_coupon();
// echo $coupon->message;
// if(isset ($coupon->status) && $coupon->status == "object"){
//   echo '<div style="text-align: center; font-size: 48px; margin-top: 200px; color :green">Success</div>';
//         exit;
// }elseif(!isset($_POST['submit'])){
//   


?>



<!DOCTYPE html>
<html>
<head>
  <title>Create a Coupon</title>
  <style>
        body {
          font-family: Arial, sans-serif;
        }

        .form-container {
          max-width: 400px;
          margin: 0 auto;
          padding: 20px;
          background-color: #f2f2f2;
          border: 1px solid #ccc;
          border-radius: 5px;
        }

        .form-container h2 {
          text-align: center;
          margin-bottom: 20px;
        }

        .form-group {
          margin-bottom: 15px;
        }

        .form-group label {
          display: block;
          margin-bottom: 5px;
          font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
          width: 100%;
          padding: 5px;
          border: 1px solid #ccc;
          border-radius: 3px;
        }

        .form-group input[type="checkbox"] {
          margin-left: 5px;
        }

        .form-group button[type="submit"] {
          background-color: #4CAF50;
          color: #fff;
          border: none;
          padding: 10px 20px;
          border-radius: 3px;
          cursor: pointer;
        }

        select{
          width: 100%;
          padding: 5px;
          border: 1px solid #ccc;
          border-radius: 3px;
        }
        

        .form-group button[type="submit"]:hover {
          background-color: #45a049;
        }

        .error-message {
          color: red;
          margin-top: 5px;
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
</head>
<body>
  <div class="form-container">
    <h2>قم بإنشاء كوبون جديد </h2>
    <form action="" method="POST">
      <div class="form-group">
        <label for="coupon_name">اسم الكوبون:</label>
        <input type="text" name="coupon_name" id="coupon_name" required>
      </div>

      <div class="form-group">
        <label for="coupon_code">كود الكوبون:</label>
        <input type="text" name="coupon_code" id="coupon_code" required>
      </div>

      <div class="form-group">
        <label for="discount_type">هل تريد الخصم نسبة % :</label>
        <!-- <input type="text" name="discount_type" id="discount_type" required> -->
        <input type="checkbox" value = "p" name="discount_type" id="discount_type" required>


      </div>

      <div class="form-group">
        <label for="discount_value">قيمة الخصم:</label>
        <input type="number" name="discount_value" id="discount_value" required>
      </div>

      <div class="form-group">
        <label for="free_shipping">الشحن المجاني:</label>
        <input type="checkbox" name="free_shipping" id="free_shipping">
      </div>

      <div class="form-group">
        <label for="free_cod">الدفع عند الاستلام:</label>
        <input type="checkbox" name="free_cod" id="free_cod">
      </div>

      <div class="form-group">
        <label for="total">الحد الأدنى الإجمالي لقبول الكوبون.:</label>
        <input type="number" name="total" id="total" required>
      </div>

      <div class="form-group">
        <label for="date_start">تاريخ البدء:</label>
        <input type="date" name="date_start" id="date_start" required>
      </div>

      <div class="form-group">
        <label for="date_end">تاريخ الانتهاء:</label>
        <input type="date" name="date_end" id="date_end" required>
      </div>

      <div class="form-group">
        <label for="uses_total">الاستخدام الكلي:</label>
        <input type="number" name="uses_total" id="uses_total" required>
      </div>

      <div class="form-group">
        <label for="uses_customer">كم مرة يمكن نفس العميل أن يستخدمه:</label>
        <input type="number" name="uses_customer" id="uses_customer" required>
      </div>

      <div class="form-group">
        <label for="active"> الكوبون مفعل؟:</label>
        <input type="checkbox" name="active" id="active">
      </div>


      <label for="store_id">من فضلك اثبت هويتك  <div class="tooltip">  [؟]
      <span class="tooltiptext">قم بالدخول إلى حسابك على https://web.zid.sa/ بعد ذلك إذهب إلى الإعدادات ومن ثم اذهب إلى مربع الربط مع الخدمات في خانة معلومات الربط قم بإنشاء رمز مصادقة </span>
      </div></label> 
      <textarea name="manager_token" id="manager_token" placeholder="ضع رمز المصادقة Manager Token" required></textarea><br>

      <div class="form-group">
        <button type="submit" name="submit">إرسال</button>
      </div>
    </form>
  </div>
</body>
</html>
