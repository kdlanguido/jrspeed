con_txns = 'src/database/controllers/transactions_controller.php';

$(document).ready(function () {
    om_load_orders()
    TBL_SEARCH()
})

function format_number(nStr) {

    nStr = Math.round(nStr * 100) / 100
    nStr = nStr + '';


    if (nStr.includes('.')) {
        nStr = parseFloat(nStr)

        return nStr.toLocaleString('en-US', { maximumFractionDigits: 2 })

    } else {

        nStr = parseFloat(nStr)
        return nStr.toLocaleString('en-US', { maximumFractionDigits: 2 }) + '.00'

    }


}

function om_load_orders() {

    payload = {
        "request_type": "get_all_orders",
        "payload_data": {}
    }

    _GET(con_txns, payload, (cb) => {

        pending_data_collections = {};
        topay_data_collections = {};
        toreceive_data_collections = {};
        completed_data_collections = {};

        pending_output = ``;
        topay_output = ``;
        toreceive_output = ``;
        completed_output = ``;

        $.each(cb, (k, v) => {


            if (v.order_information['status'] == 'PENDING') {

                pending_data_collections[v.order_information['order_no']] = v;

                pending_tbl_output = ``;

                pending_total_price = 0;

                $.each(v.order_items, (o_key, order_item) => {


                    pending_tbl_output += `
                       <tr >
                            <td width="10%" class="ps-3" >x`+ order_item.qty + `</td>
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
                            <div>
                            <button class="btn btn-sm btn-outline-danger om_btn_cancel_order" style="height:35px; width:140px" order_no="`+ v.order_information['order_no'] + `">Decline</button>
                            <button class="btn btn-sm btn-outline-secondary om_btn_accept_order" style="height:35px; width:140px" order_no="`+ v.order_information['order_no'] + `">Accept</button>
                            </div>
                        </div>
              
                        <table class="mt-3">
                            <tbody>`+ pending_tbl_output + `</tbody>
                        </table>
                    </div>
                  `

            }

            if (v.order_information['status'] == 'TO_PAY') {

                topay_data_collections[v.order_information['order_no']] = v;

                topay_tbl_output = ``;

                topay_total_price = 0;

                $.each(v.order_items, (o_key, order_item) => {


                    topay_tbl_output += `
                       <tr >
                            <td width="10%" class="ps-3" >x`+ order_item.qty + `</td>
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

                topay_tbl_output += `
                    <tr>
                      <td colspan="4" class="text-end pe-3"> <span class="me-3" style="font-weight:500">ORDER TOTAL : </span>₱ `+ format_number(topay_total_price) + `</td>
                    </tr>
                `;

                if (v.order_payment_information[0].status == 'PAID') {
                    topay_output += `
                        <div class="card p-2 mt-2" style="border-style:dashed;">
                            <div class="d-flex justify-content-between">
                                <p> <span class="badge bg-primary me-3" style="font-weight:500; font-size:8pt">PAID</span> <br>ORDER # : ` + v.order_information['order_no'] + `</p>
                                <div>
                                    <button class="btn btn-sm btn-outline-secondary om_btn_paid_deliver_order" style="height:35px; width:140px" order_no="`+ v.order_information['order_no'] + `">Deliver Order</button>
                                </div>
                            </div>
                
                            <table class="mt-3">
                                <tbody>`+ topay_tbl_output + `</tbody>
                            </table>
                        </div>
                    `
                }
                else if (v.order_payment_information[0].status == 'PAYMENT_FOR_CONFIRMATION') {
                    topay_output += `
                        <div class="card p-2 mt-2" style="border-style:dashed;">
                            <div class="d-flex justify-content-between">
                                <p> <span class="badge bg-success me-3" style="font-weight:500; font-size:8pt">FOR CONFIRMATION</span> <br>ORDER # : ` + v.order_information['order_no'] + `</p>
                                <div>
                                    <button class="btn btn-sm btn-outline-danger om_btn_cancel_order" style="height:35px; width:140px" order_no="`+ v.order_information['order_no'] + `">Decline</button>
                                    <button class="btn btn-sm btn-outline-secondary om_btn_accept_payment" style="height:35px; width:140px" order_no="`+ v.order_information['order_no'] + `">Accept</button>
                                </div>
                            </div>
                
                            <table class="mt-3">
                                <tbody>`+ topay_tbl_output + `</tbody>
                            </table>
                        </div>
                    `
                }
                else {
                    topay_output += `
                        <div class="card p-2 mt-2" style="border-style:dashed;">
                            <div class="d-flex justify-content-between">
                                <p> <span class="badge bg-secondary me-3" style="font-weight:500; font-size:8pt">UNPAID</span> <br>ORDER # : ` + v.order_information['order_no'] + `</p>
                            </div>
                
                            <table class="mt-3">
                                <tbody>`+ topay_tbl_output + `</tbody>
                            </table>
                        </div>
                    `
                }


            }

            if (v.order_information['status'] == 'TO_RECEIVE') {

                toreceive_data_collections[v.order_information['order_no']] = v;

                toreceive_tbl_output = ``;

                toreceive_total_price = 0;

                $.each(v.order_items, (o_key, order_item) => {


                    toreceive_tbl_output += `
                       <tr >
                            <td width="10%" class="ps-3" >x`+ order_item.qty + `</td>
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

                    toreceive_total_price = toreceive_total_price + (order_item.price * order_item.qty);
                })

                toreceive_tbl_output += `
                    <tr>
                      <td colspan="4" class="text-end pe-3"> <span class="me-3" style="font-weight:500">ORDER TOTAL : </span>₱ `+ format_number(toreceive_total_price) + `</td>
                    </tr>
                `;

                toreceive_output += `
                    <div class="card p-2 mt-2" style="border-style:dashed;">
                        <div class="d-flex justify-content-between">
                            <p> ORDER # : `+ v.order_information['order_no'] + `</p>
                            <div>
                            <button class="btn btn-sm btn-outline-secondary btn_track_order" style="height:35px; width:140px" order_no="`+ v.order_information['order_no'] + `" tracking_no="` + v.order_information['tracking_no'] + `">Track</button>
                            </div>
                        </div>
              
                        <table class="mt-3">
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
                          <td width="10%" class="ps-3" >x`+ order_item.qty + `</td>
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
                        </div>
        
                        <table class="mt-3">
                            <tbody>`+ completed_tbl_output + `</tbody>
                        </table>
        
                        <table  class="mt-3">
                        <tbody>
                            <tr>
                              <td width="90%" class="text-end pe-3"><span class="me-3" >Subtotal : </span></td>                    
                              <td class="text-end pe-3" style="font-weight:500">₱ `+ format_number(completed_total_price) + `</td>
                            </tr>
                            <tr>
                              <td width="90%" class="text-end pe-3"><span class="me-3" >Shipping Fee : </span></td>                    
                              <td class="text-end pe-3" style="font-weight:500">₱ `+ format_number(shipping_fee) + `</td>
                            </tr>
                            <tr>
                              <td width="90%" class="text-end pe-3"><span class="me-3" >Order Total : </span></td>                    
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
                      <div class="d-flex justify-content-between">
                          <p>  <span class="badge bg-success me-3" style="font-weight:500; font-size:8pt">DELIVERED</span> <br>ORDER # : `+ v.order_information['order_no'] + `</p>
                          
                      </div>
        
                      <table class="mt-3">
                          <tbody>`+ completed_tbl_output + `</tbody>
                      </table>

                      <table  class="mt-3">
                      <tbody>
                          <tr>
                            <td width="90%" class="text-end pe-3"><span class="me-3" >Subtotal : </span></td>                    
                            <td class="text-end pe-3" style="font-weight:500">₱ `+ format_number(completed_total_price) + `</td>
                          </tr>
                          <tr>
                            <td width="90%" class="text-end pe-3"><span class="me-3" >Shipping Fee : </span></td>                    
                            <td class="text-end pe-3" style="font-weight:500">₱ `+ format_number(shipping_fee) + `</td>
                          </tr>
                          <tr>
                            <td width="90%" class="text-end pe-3"><span class="me-3" >Order Total : </span></td>                    
                            <td class="text-end pe-3" style="font-weight:500" style="font-size:12pt;">₱ `+ format_number(order_total_price) + `</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                `
                }


            }

        })

        $('#om_pending_tab').empty().append(pending_output);

        $('#om_topay_tab').empty().append(topay_output);

        $('#om_toreceive_tab').empty().append(toreceive_output);

        $('#om_complete_tab').empty().append(completed_output);

        $('.btn_track_order').unbind('click').click(function () {
            window.open('https://www.jtexpress.ph/index/query/gzquery.html?bills=' + $(this).attr('tracking_no'))
        })

        $('.om_btn_accept_order').unbind('click').click(function () {

            console.log(pending_data_collections)
            payment_method = 0;

            $('#md_om_accept_pending_order').modal('show')
            $('#mdom_txt_order_no').val($(this).attr('order_no'))
            $('#mdom_txt_order_date').val(pending_data_collections[$(this).attr('order_no')]['order_information'].date)
            $('#mdom_txt_customer_name').val(pending_data_collections[$(this).attr('order_no')]['order_information'].first_name + ' ' + pending_data_collections[$(this).attr('order_no')]['order_information'].last_name);
            $('#mdom_txt_email').val(pending_data_collections[$(this).attr('order_no')]['order_information'].email);
            $('#mdom_txt_mobileno').val(pending_data_collections[$(this).attr('order_no')]['order_information'].mobile_no);
            $('#mdom_txt_address').val(pending_data_collections[$(this).attr('order_no')]['order_information'].address)

            payment_method = pending_data_collections[$(this).attr('order_no')]['order_payment_information'][0].payment_method;



            $('#mdom_txt_paymentmode').val(payment_method)

            if (payment_method == 'cod') {
                $('#mdom_div_tracking_no').show();
            } else {
                $('#mdom_div_tracking_no').hide();
            }

            temp_tbl_output = ``;

            $.each(pending_data_collections[$(this).attr('order_no')]['order_items'], (k, v) => {
                temp_tbl_output += `
                    <tr>
                        <td style="vertical-align:middle" width="10%" class="ps-3">x`+ v.qty + `</td>
                        <td style="vertical-align:middle" width="10%">
                            <img style="width:130px; height:130px; object-fit:contain;" class="mb-2" src="`+ v.img + `" alt="">
                        </td>
                        <td style="vertical-align:middle" width="60%">
                            <label for="" class="ms-3">`+ v.product_name + `</label>
                        </td>
                        <td style="vertical-align:middle" width="20%" class="text-end pe-3">
                            <label class="ms-3">₱ `+ format_number(v.price) + `</label>
                        </td>
                    </tr>
                    
                `;
            })

            $('#mdom_tbl_order_items').empty().append(temp_tbl_output)

            $('#om_btn_confirm_accept_pending_order')
                .attr('order_no', $(this).attr('order_no'))
                .unbind('click').click(function () {

                    if (payment_method == 'cod') {
                        payload_data = {
                            request_type: "om_confirm_accept_pending_order",
                            order_no: $(this).attr("order_no"),
                            shipping_fee: $('#mdom_txt_shipping_fee').val(),
                            tracking_no: $('#mdom_txt_tracking_no').val()
                        };

                        subject = `Order Delivery Confirmation - Order # [` + $(this).attr("order_no") + `]`;
                        message = `
                    <b> Dear `+ pending_data_collections[$(this).attr('order_no')]['order_information'].first_name + `,</b>
                    <br><br>
                    We are thrilled to inform you that your order has been accepted. <br>
                    Expect a staff to give you a call for further instructions.
                    <br><br>
                    You can now track your order here : <br>
                    https://www.jtexpress.ph/index/query/gzquery.html?bills=`+ $('#mdom_txt_tracking_no').val() + `   <br><br>
                    Thank you for being a valued customer.
                    <br><br>
                    <b>Best regards,</b>
                    <br>
                    JRSPEED`;
                    } else {
                        payload_data = {
                            request_type: "om_confirm_accept_pending_order",
                            order_no: $(this).attr("order_no"),
                            shipping_fee: $('#mdom_txt_shipping_fee').val()
                        };
                        subject = `Order Confirmation and Payment Due`;
                        message = `
                    <b> Dear `+ pending_data_collections[$(this).attr('order_no')]['order_information'].first_name + `,</b>
                    <br><br>
                    Thank you for shopping with JRSPEED! <br>
                    We are thrilled to confirm your order and provide you with the delivery fee calculation. <br>
                    Below is the total amount due including the delivery fee for your order:<br>

                    <b>Order Details:</b><br>
                    <b> Order Number:</b> `+ $(this).attr("order_no") + `<br>
                    <b> Order Date:</b> `+ pending_data_collections[$(this).attr('order_no')]['order_information'].date + `
                    <br><br><br>
                    For payment information kindly login to your account and go to dashboard.

                    <br><br>
                    Thank you for being a valued customer.
                    <br><br>
                    <b>Best regards,</b>
                    <br>
                    JRSPEED`;
                    }

                    _POST(con_txns, payload_data, (cb) => {

                        if (cb == 600) {
                            show_toast('Accept Order Failed', 'You don\'t have enough stocks', 'error')

                        } else {

                            payload = {
                                email_to: pending_data_collections[$(this).attr('order_no')]['order_information'].email,
                                subject: subject,
                                body: message
                            };

                            _POST('src/database/controllers/emailer.php', payload, (cb) => {
                                if (cb == 1) {
                                    show_toast('Accept Order', 'Customer order has been accepted.')
                                    om_load_orders()
                                } else {
                                    show_toast('Contact Administrator', 'Email sending failed', 'error')
                                }
                            })

                        }


                    });
                })
        })

        $('.om_btn_cancel_order').unbind('click').click(function () {

            $('#md_om_cancel_order').modal('show')
            $('#md_om_co_email').val(pending_data_collections[$(this).attr('order_no')]['order_information'].email)
            $('#md_om_cancel_order_btn_confirm').attr('order_no', $(this).attr("order_no")).unbind('click').click(function () {
                payload = {
                    request_type: "cancel_order",
                    order_no: $(this).attr('order_no')
                };

                _POST(con_txns, payload, (cb) => {

                    payload = {
                        email: $('#md_om_co_email').val(),
                        subject: 'Order has been cancelled by JRSpeed Admin',
                        content: 'EDIT THIS FOR CONTENT'
                    };

                    _POST('src/database/controllers/emailer.php', payload, (cb) => {
                        if (cb == 1) {
                            show_toast('Order Declined', 'Order has been declined')

                        } else {
                            show_toast('Contact Administrator', 'Post Failed : No rows affected', 'error')
                        }
                    })
                })
            })
        })

        $('.om_btn_paid_deliver_order').unbind('click').click(function () {

            $('#md_om_deliver_order').modal('show')

            $('#md_om_btn_deliver_order').attr('order_no', $(this).attr('order_no'))
        })

        $('#md_om_btn_deliver_order').unbind('click').click(function () {

            payload_data = {
                "request_type": "deliver_paid_order",
                "order_no": $(this).attr('order_no'),
                "tracking_no": $('#mdom_txt_del_tracking_no').val()
            };

            _POST(con_txns, payload_data, (cb) => {
                payload = {
                    email_to: topay_data_collections[$(this).attr('order_no')]['order_information'].email,
                    subject: 'Order Delivery Confirmation - Order # [' + $(this).attr('order_no') + ']',
                    body: `
                    
                    <b>Dear `+ topay_data_collections[$(this).attr('order_no')]['order_information'].first_name + `,</b>
                    <br><br>
                    We are thrilled to inform you that your order with JRSPEED is now on its way to your delivery address. <br>
                    We appreciate your trust in us and are committed to ensuring a smooth and timely delivery process.<br>
                    <br><br>
                    You can track your order realtime here: <br>
                    https://www.jtexpress.ph/index/query/gzquery.html?bills=`+ $('#mdom_txt_del_tracking_no').val() + `
                    <br>
                  <br>
                    Thank you for being a valued customer.
                    <br><br>
                    <b>Best regards,</b><br>
                    JRSPEED
                    
                    `
                };

                _POST('src/database/controllers/emailer.php', payload, (cb) => {
                    if (cb == 1) {
                        show_toast("Deliver Order", "Order has been delivered successfully.")
                    } else {
                        show_toast('Contact Administrator', 'Email sending failed', 'error')
                    }
                })
            });

        })

        $('.om_btn_accept_payment').unbind('click').click(function () {
            $('#md_om_view_payment').modal('show')
            $('#md_om_btn_accept_payment_confirm').attr('order_no', $(this).attr('order_no'))
            $('#mdom_img_payment_proof').attr('src', topay_data_collections[$(this).attr('order_no')]['order_payment_information'][0].payment_proof)
            $('#mdom_a_payment_proof').attr('href', topay_data_collections[$(this).attr('order_no')]['order_payment_information'][0].payment_proof)
            $('#mdom_txt_reference_no').val(topay_data_collections[$(this).attr('order_no')]['order_payment_information'][0].reference_no)
        })

        $('#btn_om_accept_payment').unbind('click').click(function () {
            $('#md_om_accept_payment').modal('show')
        })

        $('#md_om_btn_accept_payment_confirm').unbind('click').click(function () {
            payload_data = {
                "request_type": "confirm_accept_payment",
                "order_no": $(this).attr('order_no'),
            };

            _POST(con_txns, payload_data, (cb) => {
                payload = {
                    email: $('#md_om_co_email').val(),
                    subject: 'Your payment has been confirmed!',
                    content: 'EDIT THIS FOR CONTENT'
                };

                _POST('src/database/controllers/emailer.php', payload, (cb) => {
                    show_toast("Accept Payment", "Payment has been received")
                })
            });
        })



    })
}