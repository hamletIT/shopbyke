
let token = $('meta[name="csrf-token"]').attr('content')

$('.wish').click(function (e) {
    e.preventDefault();
    let prod = $(this).parent().find('.inp').val();
    $.ajax({
        type: "post",
        url: "/addWishList",
        data: {
            _token: token,
            prod: prod,
        },
        success: function (r) {
            console.log(r);
        }
    });
});
$('.cart').click(function (e) {
    e.preventDefault();
    let prod = $(this).parent().find('.inp1').val();
    $.ajax({
        type: "post",
        url: "/addCartList",
        data: {
            _token: token,
            prod: prod,
        },
        success: function (r) {
            console.log(r);
        }
    });
});
$('.count1').click(function (e) {
    e.preventDefault();
    let prod = $(this).parent().find('.count1').val();
    $.ajax({
        type: "post",
        url: "/prodcountup",
        data: {
            _token: token,
            prod: prod,
        },
        success: function (r) {
            console.log(r);
            r = JSON.parse(r);
            $(".reducedfrom" + prod).html(r.count);
            $(".total_price" + prod).html(r.total);
        }
    });
});
$('.count2').click(function (e) {
    e.preventDefault();
    let prod = $(this).parent().find('.count2').val();
    $.ajax({
        type: "post",
        url: "/prodcountdown",
        data: {
            _token: token,
            prod: prod,
        },
        success: (r) => {
            console.log(r);
            r = JSON.parse(r);
            if (r == 0) {

                $(this).parent().parent().remove();
            }
            $(".reducedfrom" + prod).html(r.count);
            $(".total_price" + prod).html(r.total);

        }
    });
});
$('.sub-icon1').hover(function (e) {
    e.preventDefault();
    //  let prod=$(this).parent().find('.count2').val();   
    $.ajax({
        type: "post",
        url: "/CartList",
        data: {
            _token: token,
            // prod: prod,
        },
        success: function (r) {
            console.log(r);
            r = JSON.parse(r);
            // $(".reducedfrom" + prod).html(r.count);
            // $(".total_price" + prod).html(r.total);

            $('.sum' + prod).html(r.price);

            $(".hover_price").html(r.price);


        }

    });
});

