$(document).ready(function () {
  // alert ("helo");
  $(document).on("click", ".inc", function () {
    let productId = $(this).closest(".qtyBox").find(".productId").val();
    console.log(productId);
    let productQty = $(this).closest(".qtyBox").find(".num-product");
    let currentQty = parseInt(productQty.val());
    // console.log(currentQty);
    if (!isNaN(currentQty)) {
      let updateQty = currentQty;
      updatedIncDec(productId, updateQty);
      updatePrice($(this), updateQty);
    }
  });

  $(document).on("click", ".dec", function () {
    let productId = $(this).closest(".qtyBox").find(".productId").val();
    console.log(productId);
    let productQty = $(this).closest(".qtyBox").find(".num-product");
    let currentQty = parseInt(productQty.val());
    console.log(currentQty);
    if (!isNaN(currentQty) && currentQty >= 1) {
      let updateQty = currentQty;
      updatedIncDec(productId, updateQty);
      updatePrice($(this), updateQty);
    }
  });
  //

  // update total
  function updatePrice(element, qty) {
    let row = $(element).closest(".table_row");
    let price = row.find(".column-3").text();
    let total = price * qty;
    row.find(".column-5").text(total);
    updateSubtotal(); 
  }

  // subtotal
  function updateSubtotal() {
    let subtotal = 0;
    $(".table_row").each(function () {
      let price = parseFloat($(this).find(".column-3").text().replace("$", ""));
      let qty = parseInt($(this).find(".num-product").val());
      let total = price * qty;
      subtotal += total;
    });
    $("#subtotal").text("$ " + subtotal); // update the subtotal text
  }


  // validate 
//   function validateForm() {
//     var country = document.getElementsByName('country')[0].value;
//     var state = document.getElementsByName('state')[0].value;
//     var postcode = document.getElementsByName('postcode')[0].value;

//     if (country == "" || state == "" || postcode == "") {
//         alert("Please fill in all shipping details");
//         return false;
//     } else {
//         window.location.href = "?checkout";
//     }
// }

  //function

  function updatedIncDec(proId, proQty) {
    $.ajax({
      url: "shoping-cart.php",
      type: "POST",
      data: {
        qtyIncDec: true,
        productId: proId,
        productQty: proQty,
      },
      success: function (response) {},
    });
  }
});
