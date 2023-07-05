
<?php

function Products_list(){
$store_id = isset ($_GET['store_id'])? $_GET['store_id']: '';
$page_size = isset ( $_GET['page_size'])?  $_GET['page_size'] : 10;
$page_num = isset ($_GET['page_num'])? $_GET['page_num'] : 1 ;
$att_values = isset($_GET['att_values'])? $_GET['att_values'] : '+';

   $curl = curl_init();
  $url ="https://api.zid.sa/v1/products/?page_size=".$page_size."&page=".$page_num."&attribute_values=".$att_values ;
   curl_setopt_array($curl, [
     CURLOPT_URL => "https://api.zid.sa/v1/products/?page_size=".$page_size."&page=".$page_num."&attribute_values=".$att_values,
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "GET",
     CURLOPT_HTTPHEADER => [
       "Accept: application/json",
       "Accept-Language: en",
       "Access-Token: ",
       "Authorization: ",
       "Store-Id:".$store_id
     ],
   ]);
   
   $response = curl_exec($curl);
   $err = curl_error($curl);
   
   curl_close($curl);
   
   if ($err) {
     echo "cURL Error #:" . $err;
   } else {
       $data = json_decode($response);
      return $data;
   }
   }

   
   if (isset($_GET['submit'])) {
    $p_list = Products_list()->results;

    echo "<h1>Products List</h1>";
    echo "<ul>";
    foreach ($p_list as $p_name => $p_value) {
        echo "<li>" . $p_value->name . "</li>";
    }
    echo "</ul>";
    exit;

}
 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="text"] {
            padding: 5px;
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
    </style>
</head>
<body>

<h1> احصل على قائمة بالمنتجات التي أضافها التاجر</h1>

    <form method="GET" action="">
        <label for="store_id">رقم المتجر:</label>
        <input type="text" name="store_id" id="store_id" required>

        <label for="page_size">كم منتج في الصفحة الواحدة:</label>
        <input type="text" name="page_size" id="page_size" required>

        <label for="page_num">رقم الصفحة:</label>
        <input type="text" name="page_num" id="page_num" required>

        <label for="att_values">فلتر المنتجات مثال (حذاء):</label>
        <input type="text" name="att_values" id="att_values" >

        <input type="submit" name="submit" value="Get Products">
    </form>
</body>
</html>