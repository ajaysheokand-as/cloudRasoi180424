// fetch category
$(document).ready(function () {
  loadCategory();
  //on gst select
  $("#gstProduct").on("change", () => {
    const gst = $("#gstProduct").val();
    const price = $("#productStorePrice").val();
    $("#gstlabel").attr("hidden", false);

    $("#priceAfterGST").html(parseInt(price) + (price * gst) / 100);
  });
  //on discount select
  $("#productDiscount").on("input", () => {
    const discount = $("#productDiscount").val();
    var price = $("#productStorePrice").val();
    const gst = (price * $("#gstProduct").val()) / 100;
    $("#discountlabel").attr("hidden", false);

    $("#priceAfterDiscount").html(
      gst + parseInt(price) - (price * discount) / 100
    );
  });
});
