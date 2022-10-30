app.controller('printingCartController', function ($scope, $http, $location) {

    $scope.cart_products = [];
    $scope.discount = 0;
    $scope.coupon_code = "";
    $scope.coupon_value = 0;
    $scope.quantity = 1;
    $scope.customer_address_type = "Home";
    $scope.addToCart = function (item) {
        console.log(item);
        let flag = false;
        let tempProduct = {
            "id": item.id,
            "title": item.title,
            "price": item.price,
            "featured_image": item.featured_image,
            "quantity": $scope.quantity,
            "size": "",
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
        localStorage.setItem('cart_product', JSON.stringify(cartProductList));
        $scope.getTotalPrice();
        $scope.getList();
    }


    $scope.getTotalPrice = function () {

        let cartProductList = localStorage.getItem('cart_product');
        let totalPrice = 0;
        if (cartProductList !== null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);
            for (var cartProduct of cartProductList) {
                totalPrice = totalPrice + parseInt(cartProduct.price) * parseInt(cartProduct.quantity);
            }
        }
        $scope.totalPriceCountAll = totalPrice;
        if (totalPrice > 200) {
            $scope.discount = $scope.totalPriceCountAll * .10;
        }


    };

    $scope.getList = function () {
        let cartProductList = localStorage.getItem('cart_product');
        if (cartProductList !== null && cartProductList !== undefined) {
            cartProductList = JSON.parse(cartProductList);
            $scope.cart_products = cartProductList;
            $scope.cartActive = true;
            $scope.total_item = cartProductList.length;
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

    $scope.getCustomer = function () {
        $http.post('/web-api/customer-info', {}).then(function (response) {
            if (response.data.status_code == 200) {
                $scope.customer_name = response.data.customer_name;
                $scope.customer_phone = response.data.customer_phone;
                $scope.customer_email = response.data.customer_email;
            }
        }, function (response) {

        });
    }
});


