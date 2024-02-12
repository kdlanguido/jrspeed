con_txns = 'src/database/controllers/transactions_controller.php';
con_products = 'src/database/controllers/products_controller.php';

$(document).ready(function () {
    load_completed_orders()
})

collections_order_no = {};
collections_product_prices = {};
collections_monthly_sales = {};

$('#sel__sales_monitoring').change(function(){

    collections_order_no = {};
collections_product_prices = {};
collections_monthly_sales = {};

load_completed_orders()


})
function load_completed_orders() {
    payload = {
        "request_type": "get_completed_orders",
        "payload_data": {
            "year": $('#sel__sales_monitoring').val()
        }
    }

    _GET(con_txns, payload, (cb) => {
        collections_order_no = cb;

        payload = {
            "request_type": "product_get_prices"
        }

        _GET(con_products, payload, (cb) => {

            $.each(cb, (k, v) => {
                collections_product_prices[v.product_id] = v.price
            })

            $.each(collections_order_no, (k, order_info) => {

                payload = {
                    "request_type": "get_order_items",
                    "payload_data": {
                        "order_no": order_info.order_no
                    }
                }

                _GET(con_txns, payload, (order_items) => {
                    temp = 0;
                    $.each(order_items, (k_order_items, v_order_items) => {
                        temp = temp + (parseInt(collections_product_prices[v_order_items.product_id]) * v_order_items.qty)
                        if (!(order_info.month in collections_monthly_sales)) {
                            collections_monthly_sales[order_info.month] = temp
                        }
                        else {
                            collections_monthly_sales[order_info.month] = collections_monthly_sales[order_info.month] + temp
                        }
                    })

                    write_sales_chart(collections_monthly_sales)
                })

            })
        })
    })
}

function reset_chart(chart) {
    chart.destroy()
}
function write_sales_chart(output_items) {

    temp_arr = [];

    $.each(output_items, (k, v) => {
        temp_key = parseInt(k) - 1;
        temp_arr[temp_key] = v
    })

    const ctx = document.getElementById('myChart');
    const data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: null,
            data: temp_arr,
            borderWidth: 1
        }],

    };

    const config = {
        type: 'line',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        },

    };
    try {
        chart = new Chart(ctx, config);


    } catch (error) {
        reset_chart(chart)
        chart = new Chart(ctx, config);

    }

}
