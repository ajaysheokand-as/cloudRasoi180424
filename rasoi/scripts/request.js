// fetch category
const constant = {
  // url: "https://spicyrasoi.com/api/",
  url: "https://cloudrasoi.com/api/",
  // url: "http://localhost/projects/cloudRaosi/cloud-rasoi-backend",
};

function ajaxRequest(url, data, success, optional) {
  if (optional != null || optional != undefined)
    Object.keys(optional).map((key) => {
      console.log(key);
      // switch (key) {
      //   case "error":
      //     if (key != null) $(document).ajaxError(key);
      //     break;
      //   case "send":
      //     if (key != null) $(document).ajaxSend(key);
      //     break;
      //   case "complete":
      //     if (key != null) $(document).ajaxComplete(key);
      //     break;

      //   default:
      //     break;
      // }
    });

  $.ajax({
    url: constant.url + url,
    method: "POST",
    data: JSON.stringify(data),
    contentType: "application/json",
    dataType: "json",
    success: success,
  });
}
$(document).ready(function () {
  //add new category
  $("#btnAddCategory").click(function (e) {
    e.preventDefault();
    const category = $("#addCategoryInput").val();
    console.log("cate: " + category);
    if (category == null && category === "") {
      console.log($("#addCategoryInput").val());
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnAddCategory").prop("disabled", true);
      $("#btnAddCategory").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/category/add.php",
      method: "POST",
      data: JSON.stringify({
        admin_id: admin_id,
        restaurant: restaurant,
        category: category,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);

        const json = result;
        if (json.success) swal("Good Job", "New Category Created", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddCategory").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnAddCategory").attr("disabled", false);
      $("#btnAddCategory").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddCategory").attr("disabled", false);
      $("#btnAddCategory").html("Submit");
    });
  });

  //add new table category
  $("#btnAddTableCategory").click(function (e) {
    e.preventDefault();
    const title = $("#addTableCategoryTitle").val();
    const number = $("#addTableCategoryNumber").val();
    const charge =
      $("#addTableCategoryChargeAmount").val() != null
        ? $("#addTableCategoryChargeAmount").val()
        : 0;
    // console.log("cate: " + category);
    if (title == null && number === "") {
      console.log($("#addCategoryInput").val());
      return;
    }
    var btntext = $("#btnAddTableCategory").html();
    $(document).ajaxSend(() => {
      $("#btnAddTableCategory").prop("disabled", true);
      $("#btnAddTableCategory").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/dashboard/addcategory.php",
      method: "POST",
      data: JSON.stringify({
        admin_id: admin_id,
        restaurant: restaurant,
        number: number,
        charge: charge,
        title: title,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);

        const json = result;
        if (json.success) swal("Good Job", "New Category Created", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddTableCategory").html(btntext);
      },
    });
    // $(document).ajaxError((res) => {
    //   console.error(res);

    //   $("#btnAddTableCategory").attr("disabled", false);
    //   $("#btnAddTableCategory").html(btntext);
    // });
    $(document).ajaxComplete((res) => {
      $("#btnAddTableCategory").attr("disabled", false);
      $("#btnAddTableCategory").html(btntext);
    });
  });
  //add new Subcategory
  $("#btnAddSubCategory").on("click", function (e) {
    e.preventDefault();
    const title = $("#addSubCategoryInput").val();
    const category = $("#cat_id").val();
    // console.log("cate: " + category);
    if (category == null && category === "") {
      console.log($("#addSubCategoryInput").val());
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnAddSubCategory").prop("disabled", true);
      $("#btnAddSubCategory").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/category/subadd.php",
      method: "POST",
      data: JSON.stringify({
        admin_id: admin_id,
        title: title,
        restaurant: restaurant,
        category: category,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);

        const json = result;
        if (json.success)
          swal("Good Job", "New Sub-Category Created", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddSubCategory").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnAddSubCategory").attr("disabled", false);
      $("#btnAddSubCategory").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddSubCategory").attr("disabled", false);
      $("#btnAddSubCategory").html("Submit");
    });
  });
  //load Subcategory on change category
  $("#dropdownCategory").on("change", function (e) {
    e.preventDefault();
    const category = $("#dropdownCategory").val();
    // const category = $("#cat_id").val();

    loadSubCategory();
  });
  // add product
  $("#addProductSubmit").click(function (e) {
    e.preventDefault();
    // alert();
    const product = $("#productName").val();
    const category = $("#dropdownCategory").val();
    const subcategory = $("#dropdownSubCategory").val();
    const storePrice = $("#productStorePrice").val(); //("#addCategoryInput").val();
    const localPrice = $("#localPrice").val(); //("#addCategoryInput").val();
    const gst_type = $("#gst_type").val();
    const food_type = $("#food_type").val();
    const swiggyPrice = $("#productSwiggyPrice").val(); //("#addCategoryInput").val();
    const zomatoPrice = $("#productZomatoPrice").val(); //("#addCategoryInput").val();
    const gstProduct = $("#gstProduct").val();
    const product_gst_price = $("#product_gst_price").val();
    const hsnCode = $("#hsnCode").val();
    const discount = $("#productDiscount").val();
    const unitName = $("#productUnitName").val();

    if (category == null && category === "") return;

    $(document).ajaxSend(() => {
      $("#addProductSubmit").attr("disabled", true);
      $("#addProductSubmit").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/product/add.php",
      method: "POST",
      data: JSON.stringify({
        product: product,
        admin_id: admin_id,
        restaurant: restaurant,
        category: category,
        subcategory: subcategory,
        discount: discount,
        gst: gstProduct,
        gst_type: gst_type,
        food_type: food_type,
        "unit-name": unitName,
        "hsn-code": hsnCode,
        "store-price": storePrice,
        "zomato-price": zomatoPrice,
        "swiggy-price": swiggyPrice,
        "local-price": localPrice,
        gst_price: product_gst_price,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);

        const json = result;
        if (json.success) swal("Good Job", "New Product added", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#addProductSubmit").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#addProductSubmit").attr("disabled", false);
      $("#addProductSubmit").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#addProductSubmit").attr("disabled", false);
      $("#addProductSubmit").html("Submit");
    });
  });
  // Edit product
  $("#editProductSubmit").click(function (e) {
    e.preventDefault();
    // alert();
    const product = $("#productName").val();
    const productid = $("#productid").val();
    const category = $("#dropdownCategory").val();
    const subcategory = $("#dropdownSubCategory").val();
    const storePrice = $("#productStorePrice").val(); //("#addCategoryInput").val();
    const localPrice = $("#localPrice").val(); //("#addCategoryInput").val();
    // const gst_type = $("#gst_type").val();
    const food_type = $("#food_type").val();
    const swiggyPrice = $("#productSwiggyPrice").val(); //("#addCategoryInput").val();
    const zomatoPrice = $("#productZomatoPrice").val(); //("#addCategoryInput").val();
    const gstProduct = $("#gstProduct").val();
    // const product_gst_price = $("#product_gst_price").val();
    const hsnCode = $("#hsnCode").val();
    const discount = $("#productDiscount").val();
    const unitName = $("#productUnitName").val();

    $(document).ajaxSend(() => {
      $("#addProductSubmit").attr("disabled", true);
      $("#addProductSubmit").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/product/update.php",
      method: "POST",
      data: JSON.stringify({
        product: product,
        productid: productid,
        admin_id: admin_id,
        restaurant: restaurant,
        category: category,
        subcategory: subcategory,
        discount: discount,
        // gst: gstProduct,
        gst_type: gst_type,
        food_type: food_type,
        "unit-name": unitName,
        "hsn-code": hsnCode,
        "store-price": storePrice,
        "zomato-price": zomatoPrice,
        "swiggy-price": swiggyPrice,
        "local-price": localPrice,
        // gst_price: product_gst_price,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);

        const json = result;
        if (json.success) swal("Good Job", " Product Updated", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#addProductSubmit").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#addProductSubmit").attr("disabled", false);
      $("#addProductSubmit").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#addProductSubmit").attr("disabled", false);
      $("#addProductSubmit").html("Submit");
    });
  });
  // add restaurant
  $("#btnAddRestaurant").click(function (e) {
    e.preventDefault();
    // alert();
    const restaurant = {
      admin_id: admin_id,
      name: $("#rname").val() != null ? $("#rname").val() : "",
      mobile: $("#rmobile").val(),
      phone: $("#rphone").val(),
      email: $("#remail").val(), //("#addCategoryInput").val();
      gst: $("#rgst_no").val(),
      country: $("#rcountry").val(),
      state: $("#rstate").val(), //("#addCategoryInput").val();
      district: $("#rdistrict").val(), //("#addCategoryInput").val();
      city: $("#rcity").val(),
    };
    if (restaurant == null && restaurant.length == 0) return;

    $(document).ajaxSend(() => {
      $("#btnAddRestaurant").attr("disabled", true);
      $("#btnAddRestaurant").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/restaurant/add.php",
      method: "POST",
      data: JSON.stringify(restaurant),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        // console.log(result.success);

        const json = result;
        if (json.success)
          swal("Good Job", "New Restaurant Created!!", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddRestaurant").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnAddRestaurant").attr("disabled", false);
      $("#btnAddRestaurant").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddRestaurant").attr("disabled", false);
      $("#btnAddRestaurant").html("Submit");
    });
  });

  //login userAgent
  $("#btnLogin").click(function (e) {
    e.preventDefault();

    const mobile = $("#mobile").val();
    const password = $("#password").val();
    console.log("cate: " + mobile);
    if (mobile == "" || password == "") {
      alert("Please fill all field");
    }

    $(document).ajaxSend(() => {
      $("#btnLogin").prop("disabled", true);
      $("#btnLogin").html("Logining...");
    });
    $.ajax({
      url: constant.url + "/user/fetch.php",
      method: "POST",
      data: JSON.stringify({
        mobile: mobile,
        password: password,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);

        const json = result;
        if (json.success) {
          localStorage.setItem("token", json.token);
          $(location).prop("href", "./rasoi/index.php?user=" + result["token"]);
        } else
          swal({ title: "Error Occured", text: json.error, icon: "error" });

        // $("#btnAddCategory").attr("disabled");
        $("#btnLogin").prop("disabled", false);

        $("#btnLogin").html("Login");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnLogin").attr("disabled", false);
      $("#btnLogin").html("Login");
    });
    $(document).ajaxComplete((res) => {
      $("#btnLogin").attr("disabled", false);
      $("#btnLogin").html("Login");
    });
  });

  //register userAgent
  $("#btnRegister").click(function (e) {
    e.preventDefault();
    if ($("#restaurant").val() < 1) {
      swal("Make Sure", "you select correct restaurant", "info");
      return;
    }
    const user = {
      username: $("#username").val(),
      mobile: $("#mobile").val(),
      email: $("#email").val(),
      password: $("#password").val(),
      restaurant: $("#restaurant").val(),
    };
    // console.log("cate: " + user);
    if (
      user.mobile == "" ||
      user.password == "" ||
      user.email == "" ||
      user.username == ""
    ) {
      swal("Warning", "Please fill all field", "warning");
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnRegister").prop("disabled", true);
      $("#btnRegister").html("Logining...");
    });
    $.ajax({
      url: constant.url + "/user/add.php",
      method: "POST",
      data: JSON.stringify(user),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log("User created successfully",result);

        const json = result;
        if (json.success)
          swal("Good Job", "You have successfully created account", "success", {
            button: true,
          }).then(() => {
              console.log("User created successfully")
              window.location.href = "https://www.cloudrasoi.com";
            // $(location).prop("href", "www.cloudrasoi.com");
          });
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnRegister").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnRegister").attr("disabled", false);
      $("#btnRegister").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnRegister").attr("disabled", false);
      $("#btnRegister").html("Submit");
    });
  });

  //Update Profile
  $("#btnUpdateProfile").click(function (e) {
    e.preventDefault();
    const urestaurant = {
      admin_id: admin_id,
      restaurant: restaurant,
      name: $("#name").val() != null ? $("#name").val() : "",
      mobile: $("#mobile").val(),
      phone: $("#phone").val(),
      email: $("#email").val(),
      gst: $("#gst_no").val(),
      country: $("#country").val(),
      state: $("#state").val(),
      district: $("#district").val(),
      city: $("#city").val(),
    };
    // console.log(urestaurant);
    // console.log("cate: " + user);
    if (urestaurant == "") {
      swal("Warning", "Please fill all field", "warning");
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnUpdateProfile").prop("disabled", true);
      $("#btnUpdateProfile").html("Logining...");
    });
    $.ajax({
      url: constant.url + "/restaurant/update.php",
      method: "POST",
      data: JSON.stringify(urestaurant),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);

        const json = result;
        if (json.success)
          swal(
            "Good Job",
            "You have successfully updated your profile",
            "success",
            {
              button: true,
            }
          ).then(() => {
            location.reload();
            // $(location).prop("href", "./login.php");
          });
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnUpdateProfile").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnUpdateProfile").attr("disabled", false);
      $("#btnUpdateProfile").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnUpdateProfile").attr("disabled", false);
      $("#btnUpdateProfile").html("Submit");
    });
  });
  //add customer
  $("#btnAddCustomer").click(function (e) {
    e.preventDefault();
    const urestaurant = {
      admin_id: admin_id,
      restaurant: restaurant,
      name: $("#name").val() != null ? $("#name").val() : "",
      sex: $("#sex").val(),
      mobile: $("#mobile").val(),
      phone: $("#phone").val(),
      email: $("#email").val(), //("#addCategoryInput").val();
      gst: $("#gst_no").val(),
      country: $("#country").val(),
      state: $("#state").val(), //("#addCategoryInput").val();
      district: $("#district").val(), //("#addCategoryInput").val();
      city: $("#city").val(),
      pincode: $("#pincode").val(), //("#addCategoryInput").val();
      id_proof: $("#id_proof").val(), //("#addCategoryInput").val();
      whereto: $("#whereto").val(),
      wherefrom: $("#wherefrom").val(),
      checkin: $("#checkin").val(),
      checkout: $("#checkout").val(),
    };
    // console.log("cate: " + user);
    if (restaurant == "") {
      swal("Warning", "Please fill all field", "warning");
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnAddCustomer").prop("disabled", true);
      $("#btnAddCustomer").html("Logining...");
    });
    $.ajax({
      url: constant.url + "/customer/add.php",
      method: "POST",
      data: JSON.stringify(urestaurant),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);

        const json = result;
        if (json.success)
          swal(
            "Good Job",
            "You have successfully added new Customer",
            "success",
            {
              buttons: ["Reload", "OK"],
            }
          ).then(() => {
            location.reload();
            // $(location).prop("href", "./login.php");
          });
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddCustomer").html("Submit");
      },
    });
    $(document).ajaxError((res) => {
      console.error(res);

      $("#btnAddCustomer").attr("disabled", false);
      $("#btnAddCustomer").html("Submit");
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddCustomer").attr("disabled", false);
      $("#btnAddCustomer").html("Submit");
    });
  });
  //add short customer
  $("#btnAddShortCustomer").click(function (e) {
    e.preventDefault();
    const urestaurant = {
      admin_id: admin_id,
      restaurant: restaurant,
      name: $("#customer_name").val() != null ? $("#customer_name").val() : "",
      mobile: $("#customer_mob_no").val(),
    };
    // console.log("cate: " + user);
    if (restaurant == "") {
      swal("Warning", "Please fill all field", "warning");
      return;
    }

    $(document).ajaxSend(() => {
      $("#btnAddShortCustomer").prop("disabled", true);
      $("#btnAddShortCustomer").html("Processing...");
    });
    $.ajax({
      url: constant.url + "/customer/shortadd.php",
      method: "POST",
      data: JSON.stringify(urestaurant),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);

        const json = result;
        if (json.success) {
          products.customerName = json.data.user_name;
          products.customerID = json.data.user_id;

          $("#customer_name").val(json.data.user_name);
          $("#selectCustomerBillName").html(json.data.user_name);
          addCustomerToCart();
          swal(
            "Good Job",
            "You have successfully added new Customer",
            "success"
          ).then((a) => {
            $("#modal-default").modal("toggle");
          });
          // $(location).prop("href", "./login.php");
        } else
          swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        // $("#btnAddCategory").attr("disabled");
        $("#btnAddShortCustomer").html("Add");
      },
      error: (res) => {
        console.log(res);
      },
    });

    $(document).ajaxComplete((res) => {
      $("#btnAddShortCustomer").attr("disabled", false);
      $("#btnAddShortCustomer").html("Add");
    });
  });

  // save cart customer to order
  function addCustomerToCart(name, mobile) {
    console.log("addCustomerToCart", products);
    if (!products.orderid) return;
    $.ajax({
      url: constant.url + "/order/orders.php",
      method: "POST",
      data: JSON.stringify(products, { addCustomerName: true }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);
      },
      error: (res) => {
        console.log(res);
      },
    });
  }

  // add into product object
  $("#btnCustomerSelect").on("click", (e) => {
    e.preventDefault();
    // console.log(products);
    $("#modal-default").modal("toggle");
  });

  //add Stock
  $("#btnAddStock").on("click", (e) => {
    e.preventDefault();
    // alert();
    const product_id = $("#product_id").val();
    const in_out = $("#in_out").val();
    const qty = $("#qty").val();
    // console.log(+product_name);
    // console.log(+in_out);
    // console.log(+qty);
    //if(product_name = null && product_name === "") return;

    $(document).ajaxSend(() => {
      $("#btnAddStock").attr("disabled", true);
      $("#btnAddStock").html("Processing");
    });
    $.ajax({
      url: constant.url + "stock/add.php",
      method: "POST",
      data: JSON.stringify({
        product_id: product_id,
        admin_id: admin_id,
        restaurant: restaurant,
        in_out: in_out,
        qty: qty,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        const json = result;
        if (json.success == true)
          swal("Good Job", "Stock Added Sccessfully", "success");
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        console.info(json.success);
        $("#btnAddStock").html("Submit");
      },
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddStock").attr("disabled", false);
      $("#btnAddStock").html("Add Stock");
    });
    //  $(document).ajaxError((res)=>{
    //    console.error(res);
    //    $("#btnAddStock").attr("disabled", false);
    //    $("#btnAddStock").html("Submit");
    //  });
  });

  // Add Customer Amount
  $("#btnAddAmt").on("click", (e) => {
    e.preventDefault();
    const type = $("#type").val();
    const amt = $("#amt").val();
    const remark = $("#remark").val();
    console.log(type);
    console.log(amt);
    console.log(remark);
    $(document).ajaxSend(() => {
      $("#btnAddAmt").attr("disabled", true);
      $("#btnAddAmt").html("Processing");
    });

    $.ajax({
      url: constant.url + "customer/add_amt.php",
      method: "POST",
      data: JSON.stringify({
        admin_id,
        restaurant,
        cust_id,
        type,
        amt,
        remark,
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        const json = result;
        if (json.success)
          swal("Amount Credit", "Successfully amount credit", "success").then(
            function () {
              window.reload();
            }
          );
        else swal({ title: "Error Occured", text: json.error, icon: "error" });
        $("#btnAddAmt").html("Submit");
      },
    });
    $(document).ajaxComplete((res) => {
      $("#btnAddStock").attr("disabled", false);
      $("#btnAddStock").html("Add Stock");
    });
  });

  // add customer on genbill mobile no change
  $("#customer_mob_no").on("change", (e) => {
    console.log("changed");
    $.ajax({
      url: constant.url + "/customer/fetchwithmobile.php",
      method: "POST",
      data: JSON.stringify({
        restaurant: restaurant,
        mobile: $("#customer_mob_no").val(),
      }),
      contentType: "application/json",
      dataType: "json",
      success: function (result) {
        console.log(result);
        // console.info(json.success);
        const json = result;
        if (json.success) {
          if (json.data.length > 0) {
            $("#customer_name").val(json.data[0].user_name);
            $("#selectCustomerBillName").html(json.data[0].user_name);
            products.customerID = json.data[0].user_id;
            products.customerName = json.data[0].user_name;

            $("#btnCustomerSelect").prop("disabled", false);
            $("#btnAddShortCustomer").prop("disabled", true);
          } else {
            $("#btnCustomerSelect").prop("disabled", true);
            $("#btnAddShortCustomer").prop("disabled", false);
          }
        } else $("#btnAddShortCustomer").prop("disabled", false);
        // $("#btnAddCategory").attr("disabled");
      },
    });
  });
});
