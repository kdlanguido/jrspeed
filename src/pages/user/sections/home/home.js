con_products = "src/database/controllers/products_controller.php";
con_txns = "src/database/controllers/transactions_controller.php";
con_faq = 'src/database/controllers/faq_controller.php';
con_accounts = 'src/database/controllers/accounts_controller.php';

$(document).ready(function () {

  h_load_cart(getCookie('USER_IP'))
  h_load_faq()
  h_load_featured()

  $(".header_link").click(function () {
    // alert($(this).attr('goto'))
  });

  $('.db_btn_load_pending').unbind('click').click(function () {
    h_load_orders(getCookie('user_id'))
  })

  $('.db_btn_load_to_pay').click(function () {
    h_load_orders(getCookie('user_id'))

  })

  $('.db_btn_load_to_receive').click(function () {
    h_load_orders(getCookie('user_id'))

  })

  $('.db_btn_load_to_completed').click(function () {
    h_load_orders(getCookie('user_id'))
  })

  $('#txt_r_username').keyup(function () {

    payload = {
      request_type: "check_if_username_exists",
      payload_data: {
        username: $(this).val(),
      },
    };

    _GET(con_accounts, payload, (cb) => {
      if (cb == 1) {
        show_toast('Username Exists', 'This username is taken', 'error')
        $('#txt_r_username').addClass('border-danger')
        $('#txt_r_username').addClass('border')
        $('#btn_r_register_now').addClass('disabled')
      } else {
        $('#txt_r_username').removeClass('border-danger')
        $('#txt_r_username').removeClass('border')
        $('#btn_r_register_now').removeClass('disabled')
      }
    })

  })

});

$('.btn_my_account').click(function () {
  $('#h_account_setting').modal('show')

  if (getCookie('username') == 'null') {
    $('#txt_md_u_as_username').val('')
  } else {
    $('#txt_md_u_as_username').val(getCookie('username'))
  }

  $('#txt_md_u_as_firstname').val(getCookie('user_fname'))
  $('#txt_md_u_as_lastname').val(getCookie('user_lname'))
  $('#txt_md_u_as_email').val(getCookie('user_email'))
  $('#txt_md_u_as_mobile').val(getCookie('user_mobile'))
  $('#txt_md_u_as_address').val(getCookie('user_address'))
})

$('#txt_r_email').unbind('keyup').keyup(function () {

  payload = {
    request_type: "check_if_email_exists",
    payload_data: {
      email: $(this).val(),
    },
  };

  _GET(con_accounts, payload, (cb) => {
    if (cb == 1) {
      show_toast('Email Exists', 'Email already used!', 'error')
      $('#txt_r_email').val('')
    }
  })

})

$('#txt_md_u_as_email').unbind('keyup').keyup(function () {

  if ($('#txt_md_u_as_email').val() != getCookie('user_email')) {
    payload = {
      request_type: "check_if_email_exists",
      payload_data: {
        email: $(this).val()
      }
    };

    _GET(con_accounts, payload, (cb) => {
      if (cb == 1) {
        show_toast('Email Exists', 'Email already used!', 'error')
        $('#txt_md_u_as_email').val('')
      }
    })
  }

})

$("#btn_checkout").click(function () {

  $(".page").hide();
  $("#page_checkout").fadeToggle();

  if (getCookie('user_fname')) {
    $('#lbl_fname').val(getCookie('user_fname'))
  }

  if (getCookie('user_lname')) {
    $('#lbl_lname').val(getCookie('user_lname'))
  }

  if (getCookie('user_email')) {
    $('#lbl_email').val(getCookie('user_email'))
  }

  if (getCookie('user_mobile')) {
    $('#lbl_mno').val(getCookie('user_mobile'))
  }

  if (getCookie('user_address')) {
    $('#lbl_del_address').val(getCookie('user_address'))
  }


});

$('#btn_h_proceed_checkout').click(function () {
  $('#h_md_proceed_checkout_confirm').modal('show')
})



$('#btn_r_register_now').click(function () {

  validator = true;

  $('.div__register')
    .find('._required')
    .removeClass('border')
    .removeClass('border-danger')
    .each(function () {
      if ($(this).hasClass('_required_string')) {
        if (!validate_string($(this).val())) {
          $(this).addClass('border')
          $(this).addClass('border-danger')
          validator = false;
        }
      }
      if ($(this).hasClass('_required_mobile_no')) {
        if (!validate_mobile_no($(this).val())) {
          $(this).addClass('border')
          $(this).addClass('border-danger')
          validator = false;
        }
      }
      if ($(this).hasClass('_required_email')) {
        if (!validate_email($(this).val())) {
          $(this).addClass('border')
          $(this).addClass('border-danger')
          validator = false;
        }
      }
    })

  if (validator) {
    payload_data = {
      request_type: "register_account",
      username: $('#txt_r_username').val(),
      password: $('#txt_r_password').val(),
      user_type: 1,
      mobile_no: $('#txt_r_mobile').val(),
      email: $('#txt_r_email').val(),
      first_name: $('#txt_r_fname').val(),
      last_name: $('#txt_r_lname').val(),
      address: $('#txt_r_address').val()
    };

    _POST(con_accounts, payload_data, () => {
      show_toast("Register Account", "Account registered successfully.")
      $('.page').hide()
      $('#page_login').show()


    });
  } else {
    show_toast('Validation Failed', 'Please fill up required fields', 'error')
  }
})

$('.h_btn_increment_cart').unbind('click').click(function () {

  val = parseInt($('#txt_add_to_card_qty').val());

  if (val < parseInt($('#vc_item_availability').attr('stock_count'))) {

    val = val + 1;

    $('#txt_add_to_card_qty').val(val);
  }

})

$('.h_btn_decrement_cart').unbind('click').click(function () {
  val = $('#txt_add_to_card_qty').val();

  if (parseInt(val) > 0) {

    val = parseInt(val) - 1;

    $('#txt_add_to_card_qty').val(val);
  }


})

$('#btn_as_save_changes').unbind('click').click(function () {

  username = $('#txt_md_u_as_username').val();

  payload_data = {
    request_type: "update_account_information",
    id: getCookie('user_id'),
    username: $('#txt_md_u_as_username').val(),
    email: $('#txt_md_u_as_email').val(),
    mobile: $('#txt_md_u_as_mobile').val(),
    first_name: $('#txt_md_u_as_firstname').val(),
    last_name: $('#txt_md_u_as_lastname').val(),
    address: $('#txt_md_u_as_address').val(),
  };

  _POST(con_accounts, payload_data, (cb) => {
    $.each(JSON.parse(cb), (k, v) => {
      setCookie('username', v.username)
      setCookie('user_mobile', v.mobile_no)
      setCookie('user_email', v.email)
      setCookie('user_fname', v.first_name)
      setCookie('user_lname', v.last_name)
      setCookie('user_address', v.address)
    })
    show_toast('Update Account', 'Account information has been updated successfully.')
  });

})

$('#btn_as_changepassword').unbind('click').click(function () {
  location.href = 'changepass.php?y=' + getCookie('user_id')
})

$('#btn_fb_submit').unbind('click').click(function () {

  validator = true;

  $('.div__feedback')
    .find('._required')
    .removeClass('border')
    .removeClass('border-danger')
    .each(function () {
      if ($(this).hasClass('_required_string')) {
        if (!validate_string($(this).val())) {
          $(this).addClass('border')
          $(this).addClass('border-danger')
          validator = false;
        }
      }
      if ($(this).hasClass('_required_email')) {
        if (!validate_email($(this).val())) {
          $(this).addClass('border')
          $(this).addClass('border-danger')
          validator = false;
        }
      }
    })

  if (validator) {
    payload_data = {
      request_type: "add_feedback",
      name: $('#txt_fb_name').val(),
      email: $('#txt_fb_email').val(),
      subject: $('#txt_fb_subject').val(),
      message: $('#txt_fb_message').val()
    };

    _POST(con_faq, payload_data, () => {
      show_toast("Send Feedback", "Thank you for your feedback!")
    });
  } else {
    show_toast('Validation Failed', 'Please fill up required fields', 'error')
  }


})


function h_load_product_by_category(category) {

  payload = {
    request_type: "get_product_by_category",
    payload_data: {
      category: category,
    },
  };

  _GET(con_products, payload, (cb) => {

    output = ``;

    $(".page").hide();
    $("#page_view_category").fadeToggle();
    $("#vc_selected_category").text(category);

    $.each(cb, (k, v) => {
      if (v.dir == null) {
        output +=
          `
                    <div class="card_item_c col d-flex flex-column " product_id="` +
          v.id +
          `">
                    <div class="border p-5 align-items-center text-center" style="border-radius:50%;">
                    <i class="fa-regular fa-image" style="font-size:30pt"></i>
                    </div>
                        <label class="py-1">` +
          v.product_name +
          `</label>
                        <h6 class="mt-1" >₱ ` +
          format_number(v.price) +
          `</h6>
                    </div>
                `;
      } else {
        output +=
          `
                    <div class="card_item_c col d-flex flex-column" product_id="` +
          v.id +
          `">
                        <img style="width:100%; height:65%; object-fit:contain " class="mb-2 mx-auto" src="` +
          v.dir +
          `" alt="">
                        <label class="py-1">` +
          v.product_name +
          `</label>
                        <h6 class="mt-1" >₱ ` +
          format_number(v.price) +
          `</h6>
                    </div>
                `;
      }
    });

    $("#div_home_view_by_category").empty().append(output);

    $(".card_item_c")
      .unbind("click")
      .click(function () {
        view_card($(this).attr("product_id"));
      });
  });
}

function h_load_product_by_subcategory(subcategory) {
  payload = {
    request_type: "get_product_by_subcategory",
    payload_data: {
      sub_category: subcategory,
    },
  };

  _GET(con_products, payload, (cb) => {
    output = ``;

    $(".page").hide();
    $("#page_view_category").fadeToggle();

    $("#vc_selected_category").text(subcategory);

    $.each(cb, (k, v) => {
      if (v.dir == null) {
        output +=
          `
                    <div class="card_item col d-flex flex-column " product_id="` +
          v.id +
          `">
                    <div class="border p-5 align-items-center text-center" style="border-radius:50%;">
                    <i class="fa-regular fa-image" style="font-size:30pt"></i>
                    </div>
                        <label class="py-1">` +
          v.product_name +
          `</label>
                        <h6 class="mt-1" >₱ ` +
          format_number(v.price) +
          `</h6>
                    </div>
                `;
      } else {
        output +=
          `
                    <div class="card_item col d-flex flex-column" product_id="` +
          v.id +
          `">
                        <img style="width:100%; height:65%; object-fit:contain " class="mb-2 mx-auto" src="` +
          v.dir +
          `" alt="">
                        <label class="py-1">` +
          v.product_name +
          `</label>
                        <h6 class="mt-1" >₱ ` +
          v.price +
          `</h6>
                    </div>
                `;
      }
    });

    $("#div_home_view_by_category").empty().append(output);
    $(".card_item")
      .unbind("click")
      .click(function () {
        view_card($(this).attr("product_id"));
      });
  });
}

function view_card(prod_id) {
  $(".page").hide();
  $("#page_view_card").fadeToggle();
  $('#txt_add_to_card_qty').val('1')

  $("#img_vc_b1").attr("src", "src/img/No_image_available.png");
  $("#img_vc_b2").attr("src", null);
  $("#img_vc_b3").attr("src", null);
  $("#img_vc_b4").attr("src", null);

  $("#btn_add_to_cart").attr("product_id", prod_id);

  $("#btn_add_to_cart").unbind('click').click(function () {
    if (!$('#offcanvasScrolling').hasClass('show')) {
      $('#btn_open_cart').trigger('click')
    }
    if ($("#txt_add_to_card_qty").val() > 0) {
      if ($('#vc_item_availability').attr('stock_count') == 0) {
        show_toast("Out of Stock", "Sorry the item has gone out of stock", "error")
      } else {
        payload_data = {
          request_type: "add_to_cart",
          user_info: getCookie("USER_IP"),
          product_id: $(this).attr("product_id"),
          qty: $("#txt_add_to_card_qty").val(),
        };

        _POST(con_txns, payload_data, (cb, status) => {
          if (cb == 1) {
            h_load_cart(getCookie("USER_IP"))
            show_toast("Add to cart", "Item added to cart")
          } else {
            show_toast("Insufficient Stock", "Item stock is lower than your qty input.", 'warning')
          }

        });
      }
    }
  });

  payload = {
    request_type: "get_product_by_id",
    payload_data: {
      product_id: prod_id,
    },
  };

  _GET(con_products, payload, (cb) => {
    output = ``;

    $.each(cb.product_information, (k, v) => {
      $("#vc_item_name").text(v.product_name);
      $("#vc_item_price").text("₱ " + format_number(v.price));
      $("#vc_description").text(v.description);
      $("#vc_item_category").text(v.category);

    });

    if (cb.product_stocks.length > 0) {
      $.each(cb.product_stocks, (k, v) => {
        $('#vc_item_availability').empty().append('Availability : <span class="text-muted">' + v.stock_count + ' In Stock</span>').attr('stock_count', v.stock_count);
      });
    } else {
      $('#vc_item_availability').empty().append('Availability : <span class="text-danger">Out of Stock</span>').attr('stock_count', '0');
    }



    count = 0;

    $.each(cb.product_imgs, (k, v) => {
      if (count == 0) {
        $("#img_vc_b1").attr("src", v.dir);
      }
      if (count == 1) {
        $("#img_vc_b2").attr("src", v.dir);
      }
      if (count == 2) {
        $("#img_vc_b3").attr("src", v.dir);
      }
      if (count == 3) {
        $("#img_vc_b4").attr("src", v.dir);
      }
      count = count + 1;
    });

    if (cb.product_imgs.length == 1) {
      $(".card-img").hide();
      $("#img_vca_b1").show();
    }
    if (cb.product_imgs.length == 2) {
      $(".card-img").hide();
      $("#img_vca_b2").show();
      $("#img_vca_b1").show();
    }
    if (cb.product_imgs.length == 3) {
      $(".card-img").hide();
      $("#img_vca_b3").show();
      $("#img_vca_b2").show();
      $("#img_vca_b1").show();
    }
    if (cb.product_imgs.length == 4) {
      $(".card-img").show();
    }
  });
}

function h_load_cart(user_info) {
  payload = {
    request_type: "load_cart",
    payload_data: {
      "user_info": user_info,
    },
  };

  _GET(con_txns, payload, (cb) => {

    output = ``;
    output2 = ``;

    total_price = 0;

    $.each(cb, (k, v) => {


      output += `
          <tr class="my-2 " style="font-size:9pt;">
            <td class="p-3" style="font-size:9pt; vertical-align:middle">`+ v.product_name + `</td>
            <td class="text-center p-3" style="vertical-align:middle">
                <div class="d-flex justify-content-center">
                    <div class="btn-group me-1" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-sm border btn_cart_qty_dec" product_id="`+ v.product_id + `" order_no="` + v.order_no + `">-</button>
                        <input type="text" class="form-control form-control-sm text-center txt_add_to_cart_qty p-0"   value="`+ v.qty + `" product_id="` + v.product_id + `" order_no="` + v.order_no + `" style="border-radius:0; width:35px; font-size:9pt;">
                        <button type="button" class="btn btn-sm border btn_cart_qty_inc" product_id="`+ v.product_id + `" order_no="` + v.order_no + `">+</button>
                    </div>
                </div>
            </td>
            <td class="text-end" style="vertical-align:middle">₱ `+ format_number(v.price) + `</td>
            <td class="text-end" style="vertical-align:middle">₱ `+ format_number((v.price * v.qty)) + `</td>
          </tr>
      `;

      output2 += `
          <tr>
              <td style="font-size:9pt;">`+ v.product_name + `</td>
              <td class="text-center">`+ v.qty + `</td>
              <td class="text-end">₱ `+ format_number(v.price) + `</td>
              <td class="text-end">₱ `+ format_number((v.price * v.qty)) + `</td>
          </tr>
      `;

      total_price = total_price + (v.price * v.qty)

      $('#btn_confirm_checkout').attr('order_no', v.order_no)
    })

    $('#tbl_shop_cart tbody').empty().append(output)
    $('#cart_subtotal_price').empty().append('₱ ' + format_number(total_price))

    $('#co_txt_subtotal').text('₱ ' + format_number(total_price))
    $('#co_txt_total').text('₱ ' + format_number(total_price))

    $('#tbl_checkout_order tbody').empty().append(output2)

    $('.btn_cart_qty_dec').unbind('click').click(function () {
      payload_data = {
        request_type: "dec_qty_cart",
        order_no: $(this).attr("order_no"),
        product_id: $(this).attr("product_id")
      };

      _POST(con_txns, payload_data, () => {
        h_load_cart(getCookie("USER_IP"))
      });
    })

    $('.btn_cart_qty_inc').unbind('click').click(function () {
      payload_data = {
        request_type: "inc_qty_cart",
        order_no: $(this).attr("order_no"),
        product_id: $(this).attr("product_id")
      };

      _POST(con_txns, payload_data, (cb) => {
        if (cb == 1) {
          h_load_cart(getCookie("USER_IP"))
        }
        else {
          show_toast("Insufficient Stock", "Item stock is lower than your qty input.", "error")
        }
      });
    })

    $('.txt_add_to_cart_qty').unbind('keyup').keyup(function (e) {

      qty = $(this).val()
      if (e.keyCode == 13) {
        payload_data = {
          request_type: "enter_qty_cart",
          order_no: $(this).attr("order_no"),
          product_id: $(this).attr("product_id"),
          qty: qty
        };

        _POST(con_txns, payload_data, (cb) => {
          if (cb == 1) {
            h_load_cart(getCookie("USER_IP"))
            show_toast("Update Cart", "Cart has been updated successfully")
          }
          else {
            show_toast("Insufficient Stock", "Item stock is lower than your qty input.", "error")
          }
        });
      }
    })

    function validate_input_checkout() {
      if (!$('#lbl_fname').val()) {
        return false
      }

      if (!$('#lbl_lname').val()) {
        return false
      }

      if (!$('#lbl_mno').val()) {
        return false
      }

      if (!$('#lbl_email').val()) {
        return false
      }

      return true;
    }

    $('#btn_confirm_checkout').unbind('click').click(function (e) {
      tr_count = 0;
      $('#tbl_checkout_order tbody tr').each(function () {
        tr_count = tr_count + 1;
      })

      if (tr_count > 0) {
        if (validate_input_checkout()) {

          order_no = $(this).attr("order_no");
          payload_data = {
            request_type: "confirm_checkout",
            order_no: $(this).attr("order_no"),
            first_name: $('#lbl_fname').val(),
            last_name: $('#lbl_lname').val(),
            mobile_no: $('#lbl_mno').val(),
            email: $('#lbl_email').val(),
            address: $('#lbl_del_address').val(),
            payment_mode: $('input[name="payment_method"]:checked').val()
          };

          _POST(con_txns, payload_data, () => {

            payload = {
              email_to: $('#lbl_email').val(),
              subject: 'Order Confirmation - Order # [' + order_no + ']',
              body: `
              
              <b> Dear `+ $('#lbl_fname').val() + `,</b>
              <br><br>
              We are thrilled to inform you that your order has been received. <br>
              Expect a staff to give you a call for further instructions.
              <br><br>
              Thank you for being a valued customer.
              <br><br>
              <b>Best regards,</b>
              <br>
              JRSPEED
              
              `
            };

            _POST('src/database/controllers/emailer.php', payload, (cb) => {
              show_toast('Check out', 'Check out success thank you. An order notification has been sent to your email.')
              $('#tbl_shop_cart tbody').empty();
              $('#cart_subtotal_price').text('₱ 0.00')
              $('#btn_page_dashboard').trigger('click')
              $('.db_btn_load_pending').trigger('click')
            })

          });
        } else {
          show_toast('Check out failed', 'Fill in required fields', 'error')
        }
      } else {
        show_toast('Check out Failed', 'Your cart is empty!', 'error')
      }
    })
  })

}

h_data_collection = {}

function h_load_orders(uid) {
  payload = {
    request_type: "get_orders",
    payload_data: {
      user_id: uid
    }
  };

  _GET(con_txns, payload, (cb) => {

    output = ``;

    pending_output = ``;
    topay_output = ``;
    toreceive_output = ``;
    completed_output = ``;

    $.each(cb, (k, v) => {

      if (v.order_information['status'] == 'PENDING') {

        pending_tbl_output = ``;

        pending_total_price = 0;

        $.each(v.order_items, (o_key, order_item) => {


          pending_tbl_output += `
               <tr >
                    <td width="15%" class="px-4" >x`+ order_item.qty + `</td>
                    <td width="10%">
                        <img style="width:130px; height:130px; object-fit:contain;" class="mb-2" src="`+ order_item.img + `" alt="">
                    </td>
                    <td width="60%">
                        <label for="" class="ms-3">`+ order_item.product_name + `</label>
                    </td>
                    <td width="20%" class="text-end pe-3">
                        <label class="ms-3">₱ `+ format_number(order_item.price) + `</label>
                    </td>
                </tr>
              `;

          pending_total_price = pending_total_price + (order_item.price * order_item.qty);
        })

        pending_tbl_output += `
            <tr>
              <td colspan="4" class="text-end pe-3"> <span class="me-3" style="font-weight:500">ORDER TOTAL : </span>₱ `+ format_number(pending_total_price) + `</td>
            </tr>
          `;

        pending_output += `
            <div class="card p-2 mt-2" style="border-style:dashed;">
                <div class="d-flex justify-content-between">
                    <p> ORDER # : `+ v.order_information['order_no'] + `</p>
                    <button class="btn btn-sm btn-outline-danger h_btn_cancel_order" style="height:35px; width:120px" order_no="`+ v.order_information['order_no'] + `">Cancel</button>
                </div>
      
                <table class="mt-3" style=" display: block;
                overflow-x: auto;
                white-space: nowrap;">
                    <tbody>`+ pending_tbl_output + `</tbody>
                </table>
            </div>
          `
      }

      if (v.order_information['status'] == 'TO_PAY') {

        topay_tbl_output = ``;

        shipping_fee = 0

        order_total_price = 0

        topay_total_price = 0;


        $.each(v.order_items, (o_key, order_item) => {

          topay_tbl_output += `
             <tr>
                  <td width="15%" class="px-4">x`+ order_item.qty + `</td>
                  <td width="10%">
                      <img style="width:130px; height:130px; object-fit:contain;" class="mb-2" src="`+ order_item.img + `" alt="">
                  </td>
                  <td width="60%">
                      <label for="" class="ms-3">`+ order_item.product_name + `</label>
                  </td>
                  <td width="20%" class="text-end pe-3">
                      <label class="ms-3">₱ `+ format_number(order_item.price) + `</label>
                  </td>
              </tr>
            `;

          topay_total_price = topay_total_price + (order_item.price * order_item.qty);

        })

        if (v.order_payment_information.length > 0) {
          shipping_fee = v.order_payment_information[0]['shipping_fee']
          order_total_price = shipping_fee + topay_total_price;
        } else {
          order_total_price = topay_total_price;
        }

        h_data_collection[v.order_information['order_no']] = v;

        added_btns = ``;

        if (v.order_payment_information[0]['reference_no']) {
          added_btns = `
          <div class="text-end">
            <button class="btn btn-sm btn-outline-secondary h_btn_pay_view_details" style="height:35px; width:100px" order_no="`+ v.order_information['order_no'] + `">View Details</button>
          </div>

          `
        } else {
          added_btns = `
            <div class="text-end">
              <button class="btn btn-sm mt-1  btn-outline-secondary h_btn_pay_order" style="height:35px; width:100px" order_no="`+ v.order_information['order_no'] + `">Pay</button>
              <button class="btn btn-sm mt-1 btn-outline-danger h_btn_cancel_order" style="height:35px; width:100px" order_no="`+ v.order_information['order_no'] + `">Cancel</button>
            </div>
          `;
        }

        topay_output += `
          <div class="card p-2 mt-2" style="border-style:dashed;">
              <div class="d-flex justify-content-between">
                  <p> ORDER # : `+ v.order_information['order_no'] + `</p>
                  `+ added_btns + `
              </div>

              <table class="mt-3" style=" display: block;
              overflow-x: auto;
              white-space: nowrap;">
                  <tbody>`+ topay_tbl_output + `</tbody>
              </table>

              <table  class="mt-3 tbl" style="">
                <tbody>
                  <tr>
                    <td class="text-end pe-3 tbl_mini_custom"><span class="me-3" >Subtotal : </span></td>                    
                    <td class="text-end pe-3" style="font-weight:500">₱ `+ format_number(topay_total_price) + `</td>
                  </tr>
                  <tr>
                    <td class="text-end pe-3 tbl_mini_custom"><span class="me-3" >Shipping Fee : </span></td>                    
                    <td class="text-end pe-3" style="font-weight:500">₱ `+ format_number(shipping_fee) + `</td>
                  </tr>
                  <tr>
                    <td class="text-end pe-3 tbl_mini_custom"><span class="me-3" >Order Total : </span></td>                    
                    <td class="text-end pe-3" style="font-weight:500" style="font-size:12pt;">₱ `+ format_number(order_total_price) + `</td>
                  </tr>
                </tbody>
              </table>
          </div>
        `
      }

      if (v.order_information['status'] == 'TO_RECEIVE') {

        toreceive_tbl_output = ``;

        toreceive_total_price = 0;

        $.each(v.order_items, (o_key, order_item) => {

          toreceive_tbl_output += `
             <tr>
                  <td width="15%" class="px-4" >x`+ order_item.qty + `</td>
                  <td width="10%">
                      <img style="width:130px; height:130px; object-fit:contain;" class="mb-2" src="`+ order_item.img + `" alt="">
                  </td>
                  <td width="60%">
                      <label for="" class="ms-3">`+ order_item.product_name + `</label>
                  </td>
                  <td width="20%" class="text-end pe-3">
                      <label class="ms-3 d-none">₱ `+ format_number(order_item.price) + `</label>
                  </td>
              </tr>
            `;

          toreceive_total_price = toreceive_total_price + (order_item.price * order_item.qty);
        })

        toreceive_output += `
          <div class="card p-2 mt-2" style="border-style:dashed;">
              <div class="d-flex justify-content-between">
                  <p> ORDER # : `+ v.order_information['order_no'] + `</p>

                  <div class="text-end">
                    <button class="btn btn-sm btn-outline-secondary h_btn_order_received mb-1" style="height:35px; width:120px" order_no="`+ v.order_information['order_no'] + `">Order Received</button>
                    <button class="btn btn-sm btn-outline-secondary btn_track_order mb-1" style="height:35px; width:120px" order_no="`+ v.order_information['order_no'] + `" tracking_no="` + v.order_information['tracking_no'] + `">Track Order</button>
                  </div>
                  
              </div>

              <table class="mt-3" style=" display: block;
              overflow-x: auto;
              white-space: nowrap;">
                  <tbody>`+ toreceive_tbl_output + `</tbody>
              </table>
          </div>
        `
      }

      if (v.order_information['status'] == 'COMPLETED' || v.order_information['status'] == 'CANCELLED') {

        completed_tbl_output = ``;

        shipping_fee = 0;

        completed_total_price = 0;

        $.each(v.order_items, (o_key, order_item) => {

          completed_tbl_output += `
             <tr>
                  <td width="15%" class="px-4" >x`+ order_item.qty + `</td>
                  <td width="10%">
                      <img style="width:130px; height:130px; object-fit:contain;" class="mb-2" src="`+ order_item.img + `" alt="">
                  </td>
                  <td width="60%">
                      <label for="" class="ms-3">`+ order_item.product_name + `</label>
                  </td>
                  <td width="20%" class="text-end pe-3">
                      <label class="ms-3">₱ `+ format_number(order_item.price) + `</label>
                  </td>
              </tr>
            `;

          completed_total_price = completed_total_price + (order_item.price * order_item.qty);
        })

        if (v.order_payment_information.length > 0) {
          shipping_fee = v.order_payment_information[0]['shipping_fee']
          order_total_price = shipping_fee + completed_total_price;
        } else {
          order_total_price = completed_total_price;
        }

        if (v.order_information['status'] == 'CANCELLED') {

          completed_output += `
            <div class="card p-2 mt-2" style="border-style:dashed;">
                <div class="d-flex justify-content-between">
                    <p>  <span class="badge bg-danger me-3" style="font-weight:500; font-size:8pt">CANCELLED</span> <br>ORDER # : `+ v.order_information['order_no'] + `</p>
                    <div>
                      <button class="btn btn-sm btn-outline-secondary" style="height:35px; width:120px" order_no="`+ v.order_information['order_no'] + `">View Order</button>
                    </div>
                </div>

                <table class="mt-3" style=" display: block;
                overflow-x: auto;
                white-space: nowrap;">
                    <tbody>`+ completed_tbl_output + `</tbody>
                </table>

                <table  class="mt-3 ">
                  <tbody>
                      <tr>
                        <td class="text-end pe-3 tbl_mini_custom"><span class="me-3" >Subtotal : </span></td>                    
                        <td class="text-end pe-3" style="font-weight:500">₱ `+ format_number(completed_total_price) + `</td>
                      </tr>
                      <tr>
                        <td class="text-end pe-3 tbl_mini_custom"><span class="me-3" >Shipping Fee : </span></td>                    
                        <td class="text-end pe-3" style="font-weight:500">₱ `+ format_number(shipping_fee) + `</td>
                      </tr>
                      <tr>
                        <td class="text-end pe-3 tbl_mini_custom"><span class="me-3" >Order Total : </span></td>                    
                        <td class="text-end pe-3" style="font-weight:500" style="font-size:12pt;">₱ `+ format_number(order_total_price) + `</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
          `
        }
        else {
          completed_output += `
          <div class="card p-2 mt-2" style="border-style:dashed;">
              <div class="d-flex justify-content-between align-items-center">
                  <label> ORDER # : `+ v.order_information['order_no'] + `</label>
                  <span class="badge bg-success " style="font-weight:500; font-size:8pt">DELIVERED</span> 
              </div>

              <table class="mt-3" style=" display: block;
              overflow-x: auto;
              white-space: nowrap;">
                  <tbody>`+ completed_tbl_output + `</tbody>
              </table>

              <table  class="mt-3 ">
                <tbody>
                    <tr>
                      <td class="text-end pe-3 tbl_mini_custom"><span class="me-3" >Subtotal : </span></td>                    
                      <td class="text-end pe-3" style="font-weight:500">₱ `+ format_number(completed_total_price) + `</td>
                    </tr>
                    <tr>
                      <td class="text-end pe-3 tbl_mini_custom"><span class="me-3" >Shipping Fee : </span></td>                    
                      <td class="text-end pe-3" style="font-weight:500">₱ `+ format_number(shipping_fee) + `</td>
                    </tr>
                    <tr>
                      <td class="text-end pe-3 tbl_mini_custom"><span class="me-3" >Order Total : </span></td>                    
                      <td class="text-end pe-3" style="font-weight:500" style="font-size:12pt;">₱ `+ format_number(order_total_price) + `</td>
                    </tr>
                  </tbody>
                </table>
          </div>
        `
        }


      }
    })

    $('#pending_tab').empty().append(pending_output)
    $('#pay_tab').empty().append(topay_output)
    $('#receive_tab').empty().append(toreceive_output)
    $('#complete_tab').empty().append(completed_output)

    $('.btn_track_order').unbind('click').click(function () {
      window.open('https://www.jtexpress.ph/index/query/gzquery.html?bills=' + $(this).attr('tracking_no'))
    })

    $('.h_btn_cancel_order').unbind('click')
      .click(function () {
        order_no = $(this).attr('order_no')

        $('#btn_confirm_cancel_order').attr('order_no', order_no)
        $('#h_md_cancel_order_confirm').modal('show')

        $('#btn_confirm_cancel_order')
          .unbind('click')
          .click(function () {
            payload_data = {
              request_type: "cancel_order",
              order_no: $(this).attr('order_no')
            };

            _POST(con_txns, payload_data, () => {
              h_load_orders(getCookie("user_id"))
              show_toast("Cancel Order", "Order has been cancelled.")
            });
          })

      })

    $('.h_btn_pay_order').unbind('click')
      .click(function () {
        $('#h_md_pay_order').modal('show')
        $('#btn_confirm_payment').attr('order_no', $(this).attr('order_no'))
        $('#h_md_order_no').val($(this).attr('order_no'))

        $('#h_md_order_no').unbind('click').click(function () {
          ctb($(this).val())
          show_toast("Copy Order Number", "Order number has been copied successfully")
        })

        $('#btn_confirm_payment').unbind('click')
          .click(function () {

            input = document.getElementById('txt_md_payment_proof')

            payload_data = {
              "request_type": "send_payment",
              "order_no": $(this).attr('order_no'),
              "reference_no": $('#txt_md_reference_no').val(),
              "proof": input.files[0]
            };

            _POST(con_txns, payload_data, () => {
              h_load_orders(getCookie('user_id'))
              show_toast("Pay Order", "Payment has been received! Thank you")
            });
          })
      })

    $('.h_btn_track_order').unbind('click')
      .click(function () {
        window.open('https://www.jtexpress.ph/index/query/gzquery.html?bills=' + $(this).attr('order_no'))
      })

    $('.h_btn_order_received').unbind('click')
      .click(function () {
        order_no = $(this).attr('order_no')

        $('#btn_confirm_received_order').attr('order_no', order_no)
        $('#h_md_received_order_confirm').modal('show')

        $('#btn_confirm_received_order')
          .unbind('click')
          .click(function () {
            payload_data = {
              request_type: "received_order",
              order_no: $(this).attr('order_no')
            };

            _POST(con_txns, payload_data, () => {
              h_load_orders(getCookie("user_id"))
              show_toast("Receive Order", "Thank you for shopping with JRSPEED!")
            });
          })

      })

    $('.h_btn_pay_view_details').unbind('click')
      .click(function () {

        order_no = $(this).attr('order_no')

        $('#btn_confirm_received_order').attr('order_no', order_no)
        $('#h_view_payment').modal('show')

        $('#h_txt_reference_no').val(h_data_collection[order_no]['order_payment_information'][0].reference_no);
        $('#h_img_payment_proof').attr('src', h_data_collection[order_no]['order_payment_information'][0].payment_proof);
        $('#h_a_payment_proof').attr('href', h_data_collection[order_no]['order_payment_information'][0].payment_proof)

        $('#h_btn_vp_update').attr('order_no', order_no)
        $('#h_btn_vp_update').unbind('click').click(function () {

          order_no = $(this).attr('order_no')

          $('#h_md_update_payment_order').modal('show')
          $('#txt_md_u_reference_no').val(h_data_collection[order_no]['order_payment_information'][0].reference_no)

          $('#btn_update_payment').unbind('click').click(function () {
            input = document.getElementById('txt_md_u_payment_proof')

            payload_data = {
              "request_type": "send_payment",
              "order_no": order_no,
              "reference_no": $('#txt_md_u_reference_no').val(),
              "proof": input.files[0]
            };

            _POST(con_txns, payload_data, () => {
              h_load_orders(getCookie('user_id'))
              show_toast("Pay Order", "Payment has been received! Thank you")
            });
          })

        })
      })

  })

}

function h_load_featured() {
  payload = {
    request_type: "get_featured",
    payload_data: {},
  };

  _GET(con_products, payload, (cb, status) => {
    output = ``;

    if (status == 204) {
      output += `
        <div class="text-secondary">
            No featured items yet.
        </div>
      `;

      $('#home_featured_items').empty().append(output)

    } else {
      $.each(cb, (k, v) => {
        if (v.dir) {
          output += `
          <div class="card_item col-6 col-lg-2 d-flex flex-column" product_id="`+ v.product_id + `">
              <img style="width:130px; height:130px; object-fit:cover;" class="mb-2" src="`+ v.dir + `" alt="">
              <label for="">`+ v.product_name + `</label>
              <h6 class="mt-1" style="font-family:rubik-b">₱ `+ format_number(v.price) + `</h6>
          </div>
        `;
        }

      })

      $('#home_featured_items').empty().append(output)

      $(".card_item")
        .unbind("click")
        .click(function () {
          view_card($(this).attr("product_id"));
        });
    }

  })

}

function h_load_faq() {

  payload = {
    "request_type": "get_faq",
    "payload_data": {}
  }

  _GET(con_faq, payload, (cb) => {
    output = ``;

    count = 1;
    $.each(cb, (k, v) => {

      if (count == 1) {
        output += `

          <div class="accordion-item">
              <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#v`+ v.id + `">
                      `+ v.question + `
                  </button>
              </h2>
              <div id="v`+ v.id + `" class="accordion-collapse collapse show" data-bs-parent="#u_accordion_faq">
                  <div class="accordion-body">
                  `+ v.answer + `
                  </div>
              </div>
          </div>

      `
      } else {
        output += `

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#v`+ v.id + `">
                        `+ v.question + `
                    </button>
                </h2>
                <div id="v`+ v.id + `" class="accordion-collapse collapse" data-bs-parent="#u_accordion_faq">
                    <div class="accordion-body">
                    `+ v.answer + `
                    </div>
                </div>
            </div>

        `
      }

      count = count + 1

    })


    $('#u_accordion_faq').empty().append(output)
  })
}