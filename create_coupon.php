<?php



// $CURLOPT_POSTFIELDS = "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"name\"\r\n\r\nMy2Coupon\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"code\"\r\n\r\nMy2Coupon2\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"discount_type\"\r\n\r\np\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"discount\"\r\n\r\n10\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"free_shipping\"\r\n\r\n1\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"free_cod\"\r\n\r\n1\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"total\"\r\n\r\n10\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"date_start\"\r\n\r\n2023-04-07\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"date_end\"\r\n\r\n2023-04-15\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"uses_total\"\r\n\r\n5\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"uses_customer\"\r\n\r\n1\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"apply_to\"\r\n\r\nproducts\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"status\"\r\n\r\n1\r\n-----011000010111000001101001--\r\n";


if (isset($_GET['submit'])){
  create_coupon();

}

function create_coupon(){


$curl = curl_init();

$coupon_name = $_GET['coupon_name'];
$coupon_code = $_GET['coupon_code'];
$descount_type = $_GET['$descount_type'];
$discount_value = $_GET['discount_value'];
$free_shipping = isset ($_GET['free_shipping'])? "1" : "0";
$free_cod = isset  ($_GET['free_cod'])? "1" : "0";
$total = $_GET['total'];
$date_start = $_GET['date_start'];
$date_end = $_GET ['date_end'];
$usest_toal = $_GET['usest_toal'];
$uses_customer = $_GET['uses_customer'];
$status = isset($_GET['active'])? "1": "0";


curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.zid.sa/v1/managers/store/coupons/add",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"name\"\r\n\r\n".$coupon_name."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"code\"\r\n\r\n".$coupon_code."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"discount_type\"\r\n\r\n".$descount_type."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"discount\"\r\n\r\n".$discount_value."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"free_shipping\"\r\n\r\n".$free_shipping."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"free_cod\"\r\n\r\n".$free_cod."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"total\"\r\n\r\n".$total."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"date_start\"\r\n\r\n".$date_start."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"date_end\"\r\n\r\n".$date_end."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"usest_toal\"\r\n\r\n".$usest_toal."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"uses_customer\"\r\n\r\n".$uses_customer."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"apply_to\"\r\n\r\nproducts\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"status\"\r\n\r\n".$status."\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"apply_to_array\"\r\n\r\n\r\n-----011000010111000001101001--\r\n",
  CURLOPT_HTTPHEADER => [
    "Accept-Language: ar",
    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxMTciLCJqdGkiOiJhMTg5ZTg3MmYxMzhkMWVhYjU5MjVkMDkyMGE5NmI0YjliNjg0Y2E2ZTdmM2M2MjljZWYxNmQ4NDJjMmJlYmVhMjI4YTdmMTA0ZWQ4NWE5NCIsImlhdCI6MTY3OTU3Njk5OS41NjY4NzcsIm5iZiI6MTY3OTU3Njk5OS41NjY4OCwiZXhwIjoxNzExMTk5Mzk5LjQ4NjE1Mywic3ViIjoiMTgyNDc1Iiwic2NvcGVzIjpbInRoaXJkLXBhcnRpZXMtYXBpcyJdfQ.i07ef09nVNXGZF-g-QXpNoS2vlFQK_zntAqAMS4Az2XD2EyMLhxLZZRL-QlR11zUPqMmXjMAl_4ooKa3M3zkfZQ6Ga6qStvamk8RnC_39VUx0lfN2A4k65ERZpqwrMy6-t3dE99zay3aicIdNvbgi0zeuMSE5Tn99u-2AtSRa8ffbfAcYPPXacHrhdmlYzdiZS_x_skovFEow1E-nDjdL1WHqO92XdZ7RfNLkiYFTjZlZmM_UruvioaR3q6TXJbqRK_ZrziivezL8ohIQ2SBosUp58I29rlKzvlw_R2j0rKKYZbdxYDaxAHOISmOFKAlO66k7dNevAHI3s4uGIjoGA6ZXHknccWPLLLiaAQ0r64HV8GowW5dg2rhZNurJGDTnLlBQ6F-ql42ptHzSAfzzi576CEoN3gMVpgXcbntUY3reETkFsTBPUjeSuMpANMioXAA0GRp3Ut-84fTnrWxqsCW1WVUIx33HvmfCGPXIdkaCCWoA6G6KXo04MtFbKXQmXkK9esQWI-rqdVnMD3zSR3g3yFHZSL1U-mZeNja03706Rav1ordsRNOtRwtLuoRRbk9KasbUpEwqq4Ao9lqZZwRIjdEw-pQtnUT8V53fhmuuRIefCLFO7eGEtGUnh9o6Uh_pgi6AB6uSlnN9GEMGgI1alqvMmTjxvC-HHt0V-Y",
    "Content-Type: multipart/form-data; boundary=---011000010111000001101001",
    "X-Manager-Token: eyJpdiI6IjU2RSt6NXFLWGEyNkJ2d3ZucElPeEE9PSIsInZhbHVlIjoibjg3U29xY1ZZUFhQZDdHbTFOeDRrcmlUdElLZkNZWEN0b3pqcEZsTVdHSFVsQUFxVHAwRVpFV2VIU1Q5bUZKNXdYS1AySjBQQUJjZDZvVkhqcEJHRVZSaWIrNmI5NDAvUWJUcU1uZVRkM0ljaTBQMWFEeFZSb2F0UHR1YTNHblEwU2FIejV0d3dhM0Z2ZGRpQ1NNa1FuTFVWMUljWXJvc3plNXZWVGRDWE1VRWo3RDFCR1FXUHloTHBsZGdzbHRKeXhsL2w3WEl4UVgySGxEVlZML2pzVFcvdkVCRHlrYmxoY0k0N09LMGpOST0iLCJtYWMiOiI5ZTRmMzBmZTczNzc4ZjUwNWI1ZmE0YmEyMTcxZGM2ZDY0ZmU2Mjc1MTNmNDYwNjk1OWFiODVjNjgwYmExMjAyIiwidGFnIjoiIn0=="
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
  $data = json_decode($response);
  return $data;
}


}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Form</title>
  <style>
    /* تنسيق العناصر والتصميم */
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

    .form-group button[type="submit"]:hover {
      background-color: #45a049;
    }

    .error-message {
      color: red;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>قم بإنشاء كوبون جديد </h2>
    <form action="" method="get">
      <div class="form-group">
        <label for="coupon_name">اسم الكوبون:</label>
        <input type="text" name="coupon_name" id="coupon_name" required>
      </div>

      <div class="form-group">
        <label for="coupon_code">كود الكوبون:</label>
        <input type="text" name="coupon_code" id="coupon_code" required>
      </div>

      <div class="form-group">
        <label for="discount_type">نوع الخصم:</label>
        <input type="text" name="discount_type" id="discount_type" required>
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
        <label for="usest_total">الاستخدام الكلي:</label>
        <input type="number" name="usest_total" id="usest_total" required>
      </div>

      <div class="form-group">
        <label for="uses_customer">كم مرة يمكن نفس العميل أن يستخدمه:</label>
        <input type="number" name="uses_customer" id="uses_customer" required>
      </div>

      <div class="form-group">
        <label for="active"> الكوبون مفعل؟:</label>
        <input type="checkbox" name="active" id="active">
      </div>

      <div class="form-group">
        <button type="submit">إرسال</button>
      </div>
    </form>
  </div>
</body>
</html>
