<!DOCTYPE html>
<html>
<head>
  <title> الصفحة الرئيسية</title>
  <style>
    /* تنسيق العناصر والتصميم */
    body {
        direction: rtl;
        text-align: center;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    .button-container {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .button-container button {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
      margin: 0 10px;
    }

    .button-container button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>الصفحة الرئيسية</h2>

    <div class="button-container">
      <button onclick="window.location.href = 'create_product.php';">انشأ منتجاً</button>
      <button onclick="window.location.href = 'get_new_products.php';">احصل على قائمة بالمنتجات</button>
      <button onclick="window.location.href = 'create_coupon.php';">انشأ كوبون خصم</button>
    </div>
  </div>
</body>
</html>
