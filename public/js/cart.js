app.controller('printingCartController', function ($scope, $http, $location) {

    //localStorage.clear();
    $scope.cart_products = [];
    $scope.discount = 0;
    $scope.coupon_code = "";
    $scope.poster_size = "";
    $scope.total_item = 0;
    $scope.coupon_value = 0;
    $scope.quantity = 1;
    $scope.totalPriceWithDiscount = 0;
    $scope.totalPriceWithDiscountWithDeliverycharge = 0;
    $scope.totalTaxPrice = 0;
    $scope.customer_address_type = "Home";
    $scope.delivery_charge = "0";
    $scope.coupon_value = 0;
    $scope.CouponAmount = 0;

    $scope.tax_charge_float = "0";


    $scope.taxCharge = function () {

        $http.get("/web-api/tax-charge")
            .then(function (response) {
                $scope.tax_fee_integer = response.data;
                $scope.tax_charge_float = (($scope.tax_fee_integer) / 100);
                console.log($scope.tax_charge_float)
                localStorage.setItem('tax_charge', $scope.tax_charge_float);
                console.log("charge ok")
                console.log(localStorage.getItem('tax_charge'))

            });

    }
    $scope.addToCart = function (item) {
        console.log($scope.tax_charge_float)
        console.log("ok tax value")
        if ($scope.poster_size == "") {
            return messageError("Please select poster size");
        }
        let flag = false;
        let tempProduct = {
            "id": item.id,
            "title": item.title,
            "price": item.price,
            "featured_image": item.featured_image,
            "quantity": $scope.quantity,
            "size": $scope.poster_size,
        };
        let cartProductList = localStorage.getItem('cart_product');
        if (cartProductList !== null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);

            if (cartProductList.length <= 0) {
                //Nothing
            } else {
                for (var cartProduct of cartProductList) {
                    if (cartProduct.id === item.id) {
                        cartProduct.quantity += 1;
                        flag = true;
                        break;
                    }
                }
            }
        } else {
            cartProductList = [];
        }

        if (!flag) {
            cartProductList.push(tempProduct);
            messageSuccess("Product added to cart")
        } else {
            messageSuccess("Product added to cart")
        }
        localStorage.setItem('cart_product', JSON.stringify(cartProductList))
        $scope.getTotalPrice();
        $scope.getList();


    }

    $scope.getTotalPrice = function () {


        let cartProductList = localStorage.getItem('cart_product');
        let totalPrice = 0;
        if (cartProductList !== null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);
            for (var cartProduct of cartProductList) {
                totalPrice = totalPrice + parseFloat(cartProduct.price).toFixed(2) * parseFloat(cartProduct.quantity);

            }
        }
        $scope.totalPriceCountAll = parseFloat(totalPrice).toFixed(2);
        $scope.totalTaxPrice = parseFloat($scope.totalPriceCountAll * localStorage.getItem('tax_charge')).toFixed(2);
        $scope.CouponAmount = localStorage.getItem('coupon_value');

        if (totalPrice > 200) {
            $scope.discount = parseFloat($scope.totalPriceCountAll * .10).toFixed(2);
            $scope.totalPriceWithDiscount = parseFloat(totalPrice - $scope.discount).toFixed(2);
            $scope.totalPriceWithDiscountWithDeliverycharge = (parseFloat($scope.totalPriceWithDiscount) + parseFloat($scope.delivery_charge) + parseFloat($scope.totalTaxPrice)).toFixed(2) - localStorage.getItem('coupon_value');
            console.log("coupon_value added")
            console.log(localStorage.getItem('coupon_value'))
        } else {
            $scope.totalPriceWithDiscount = parseFloat(totalPrice).toFixed(2);
            $scope.totalPriceWithDiscountWithDeliverycharge = (parseFloat($scope.totalPriceWithDiscount) + parseFloat($scope.delivery_charge) + parseFloat($scope.totalTaxPrice)).toFixed(2) - localStorage.getItem('coupon_value');
            console.log("coupon_value added")
            console.log(localStorage.getItem('coupon_value'))
        }


    };


    function InitialSize(size) {
        $scope.poster_size = size;
        console.log($scope.poster_size)
    }

    $scope.getList = function () {
        let cartProductList = localStorage.getItem('cart_product');
        if (cartProductList !== null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);
            $scope.cart_products = cartProductList;
            $scope.cartActive = true;
            $scope.total_item = $scope.cart_products.length;
            console.log($scope.cart_products)

        }
    };

    $scope.deleteItem = function (item) {
        let cartProductList = localStorage.getItem('cart_product');
        if (cartProductList != null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);
            for (let i = 0; i < cartProductList.length; i++) {
                if (cartProductList[i].id === item.id) {
                    cartProductList.splice(i, 1);
                    break;
                }
            }
            localStorage.setItem('cart_product', JSON.stringify(cartProductList));
        }
        $scope.getTotalPrice();
        $scope.getList();
    };


    $scope.incQty = function (item) {

        console.log(item);
        let cartProductList = localStorage.getItem('cart_product');
        if (cartProductList != null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);
            for (let i = 0; i < cartProductList.length; i++) {
                if (cartProductList[i].id === item.id) {
                    cartProductList[i].quantity += 1;
                    break;
                }
            }
            localStorage.setItem('cart_product', JSON.stringify(cartProductList));
        }
        $scope.getTotalPrice();
        $scope.getList();
    };

    $scope.decQty = function (item) {

        let cartProductList = localStorage.getItem('cart_product');
        if (cartProductList != null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);
            for (let i = 0; i < cartProductList.length; i++) {
                if (cartProductList[i].id === item.id) {
                    if (cartProductList[i].quantity <= 1) {
                        messageError("Cant remove items", 'error');
                        break;
                    } else {
                        cartProductList[i].quantity -= 1;
                    }
                    break;
                }
            }
            localStorage.setItem('cart_product', JSON.stringify(cartProductList));
        }

        $scope.cartRemove = function () {
            localStorage.clear();
            $scope.getTotalPrice();
            $scope.getList();
        }
        $scope.getTotalPrice();
        $scope.getList();

    };

    $scope.couponApply = function () {

        if ($scope.coupon_code != null) {
            $http.post('/web-api/promo-code', {coupon_code: $scope.coupon_code}).then(function (response) {
                console.log(response.data);
                if (response.data.status_code == 200) {
                    $scope.coupon_value = response.data.results.discount_rate;
                    messageSuccess("Coupon is Applied");
                } else {
                    messageError("Coupon is expired or Invalid");
                }
            }, function (response) {

                console.log(response);
            });
        } else {
            messageError("Please input a coupon code");
        }
    };

    $scope.saveOrder = function () {

        let empty_status = false;

        if ($scope.customer_phone == null) {
            empty_status = true;
            messageError("Please fill all the fields")
            return;
        }
        if ($scope.customer_email == null) {
            empty_status = true;
            messageError("Please fill all the fields")
            return;
        }

        if ($scope.customer_name == null) {
            empty_status = true;
            messageError("Please fill all the fields")
            return;
        }
        if ($scope.customer_address == null) {
            empty_status = true;
            messageError("Please fill all the fields")
            return;
        }
        /*if (empty_status == true) {
           // messageError("Please fill all the fields")
           return;
            return;
        }*/

        let cartProductList = localStorage.getItem('cart_product');
        cartProductList = JSON.parse(cartProductList);
        console.log(cartProductList.length);
        if (cartProductList.length <= 0) {
            messageError("Add an Item")
            return;
        } else {
            $scope.cart_products = cartProductList;
        }

        /*        if($scope.payment_type=="Online"){
                    console.log("Online");
                    //window.location.href = '/customer/order-save';
                    let customer_data = {
                        customer_name: $scope.customer_name,
                        customer_phone: $scope.customer_phone,
                        customer_email: $scope.customer_email,
                        customer_password: $scope.customer_password,
                        customer_address: $scope.customer_address,
                        discount: $scope.discount,
                        coupon_value: $scope.coupon_value,
                        coupon_code: $scope.coupon_code,
                        products: $scope.cart_products,
                        payment_type: $scope.payment_type,
                    }
                    localStorage.setItem('customer_data',JSON.stringify(customer_data));

                    let data=JSON.parse(localStorage.getItem('customer_data'));
                    console.log( data.customer_name);
                    window.location.href = '/customer/order-save';

                }
               // return;*/

        $http.post('/customer/order-save', {
            customer_name: $scope.customer_name,
            customer_phone: $scope.customer_phone,
            customer_email: $scope.customer_email,
            customer_password: $scope.customer_password,
            customer_address: $scope.customer_address,
            discount: $scope.discount,
            coupon_value: $scope.coupon_value,
            coupon_code: $scope.coupon_code,
            products: $scope.cart_products,
            payment_type: $scope.payment_type,

        }).then(function (response) {

            if (response.data.status_code == 200) {
                messageSuccess("Successfully Order Saved");
                localStorage.clear();
                window.location.href = '/success/' + response.data.order_invoice;

            } else {
                messageSuccess(response.data.message)
            }
        }, function (response) {
            messageSuccess("Unknown Error")
        });

    };

    function messageError(message) {
        toastr.warning(message, 'Failed')
    }

    function messageSuccess(message) {
        toastr.success(message, 'Success')
    }


    $scope.getTotalPrice();
    $scope.getList();


    $scope.changeDeliveryCharge = function (charge) {

        console.log("ffffff");
        $scope.delivery_charge = charge;

        $scope.getTotalPrice();
    }
    $scope.CouponSave = function () {


        if (!$scope.coupon) {
            messageError('Please Enter Coupon Code')
            return;
        }
        let url = "/web-api/coupon-save";
        let params = {
            'coupon': $scope.coupon,
        };
        $http.post(url, params).then(function success(response) {

            if (response.data.status_code == 200) {
                $scope.coupon_value = response.data.discount;
                localStorage.setItem('coupon_value', $scope.coupon_value);
                console.log("coupon_value ok")
                console.log(localStorage.getItem('coupon_value'))
                $scope.getTotalPrice();
                messageSuccess(response.data.message);

            } else {

                messageError(response.data.message);
            }

        });

    }
});


