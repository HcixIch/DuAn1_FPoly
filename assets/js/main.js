(function ($) {
    "use strict";
/*--
Commons Variables
-----------------------------------*/
var windows = $(window);
    
/*--
    Menu Sticky
-----------------------------------*/
var sticky = $('.header-sticky');

windows.on('scroll', function() {
    var scroll = windows.scrollTop();
    if (scroll < 300) {
        sticky.removeClass('is-sticky');
    }else{
        sticky.addClass('is-sticky');
    }
});
    
/*--
    Header Search 
-----------------------------------*/
var $headerSearchToggle = $('.header-search-toggle');
var $headerSearchForm = $('.header-search-form');
    
$headerSearchToggle.on('click', function() {
    var $this = $(this);
    if(!$this.hasClass('open')) {
        $this.addClass('open').find('i').removeClass('fa fa-search').addClass('fa fa-times');
        $headerSearchForm.slideDown();
    } else {
        $this.removeClass('open').find('i').removeClass('fa fa-times').addClass('fa fa-search');
        $headerSearchForm.slideUp();
    }
});
    
/*--
    - Background Image
------------------------------------------*/
var $backgroundImage = $('.bg-image');
$backgroundImage.each(function() {
    var $this = $(this),
        $bgImage = $this.data('bg');
    $this.css('background-image', 'url('+$bgImage+')');
});

/*--
    Mobile Menu
-----------------------------------*/
var mainMenuNav = $('.main-menu');
mainMenuNav.meanmenu({
    meanScreenWidth: '991',
    meanMenuContainer: '.mobile-menu',
    meanMenuClose: '<span class="menu-close"></span>',
    meanMenuOpen: '<span class="menu-bar"></span>',
    meanRevealPosition: 'right',
    meanMenuCloseSize: '0',
});

/*--
    Sliders
-----------------------------------*/
var $elementCarousel = $('.tf-element-carousel');
var $html = $('html');
var $body = $('body');
    
var slickInstances = [];

/*For RTL*/
if ($html.attr("dir") == "rtl" || $body.attr("dir") == "rtl") {
    $elementCarousel.attr("dir", "rtl");
}

$elementCarousel.each(function (index, element) {
    var $this = $(this);

    // Carousel Options


    var $options = typeof $this.data('slick-options') !== 'undefined' ? $this.data('slick-options') : '';

    var $spaceBetween = $options.spaceBetween ? parseInt($options.spaceBetween, 10) : 0,
        $spaceBetween_xl = $options.spaceBetween_xl ? parseInt($options.spaceBetween_xl, 10) : 0,
        $rowSpace = $options.rowSpace ? parseInt($options.rowSpace, 10) : 0,
        $isCustomArrow = $options.isCustomArrow ? $options.isCustomArrow : false,
        $customPrev = $isCustomArrow === true ? ($options.customPrev ? $options.customPrev : '') : '',
        $customNext = $isCustomArrow === true ? ($options.customNext ? $options.customNext : '') : '',
        $vertical = $options.vertical ? $options.vertical : false,
        $focusOnSelect = $options.focusOnSelect ? $options.focusOnSelect : false,
        $asNavFor = $options.asNavFor ? $options.asNavFor : '',
        $fade = $options.fade ? $options.fade : false,
        $autoplay = $options.autoplay ? $options.autoplay : false,
        $autoplaySpeed = $options.autoplaySpeed ? $options.autoplaySpeed : 5000,
        $swipe = $options.swipe ? $options.swipe : true,
        $swipeToSlide = $options.swipeToSlide ? $options.swipeToSlide : true,
        $verticalSwiping = $options.verticalSwiping ? $options.verticalSwiping : false,
        $arrows = $options.arrows ? $options.arrows : false,
        $dots = $options.dots ? $options.dots : false,
        $infinite = $options.infinite ? $options.infinite : false,
        $centerMode = $options.centerMode ? $options.centerMode : false,
        $centerPadding = $options.centerPadding ? $options.centerPadding : '',
        $speed = $options.speed ? parseInt($options.speed, 10) : 1000,
        $appendArrows = $options.appendArrows ? $options.appendArrows : $this,
        $prevArrow = $arrows === true ? ($options.prevArrow ? '<span class="' + $options.prevArrow.buttonClass + '"><i class="' + $options.prevArrow.iconClass + '"></i></span>' : '<button class="slick-prev">prev</span>') : '',
        $nextArrow = $arrows === true ? ($options.nextArrow ? '<span class="' + $options.nextArrow.buttonClass + '"><i class="' + $options.nextArrow.iconClass + '"></i></span>' : '<button class="slick-next">next</span>') : '',
        $rows = $options.rows ? parseInt($options.rows, 10) : 1,
        $rtl = $options.rtl || $html.attr('dir="rtl"') || $body.attr('dir="rtl"') ? true : false,
        $slidesToShow = $options.slidesToShow ? parseInt($options.slidesToShow, 10) : 1,
        $slidesToScroll = $options.slidesToScroll ? parseInt($options.slidesToScroll, 10) : 1;

    /*Responsive Variable, Array & Loops*/
    var $responsiveSetting = typeof $this.data('slick-responsive') !== 'undefined' ? $this.data('slick-responsive') : '',
        $responsiveSettingLength = $responsiveSetting.length,
        $responsiveArray = [];
    for (var i = 0; i < $responsiveSettingLength; i++) {
        $responsiveArray[i] = $responsiveSetting[i];

    }

    // Adding Class to instances
    $this.addClass('slick-carousel-' + index);
    $this.parent().find('.slick-dots').addClass('dots-' + index);
    $this.parent().find('.slick-btn').addClass('btn-' + index);

    if ($spaceBetween != 0) {
        $this.addClass('slick-gutter-' + $spaceBetween);
    }
    if ($spaceBetween_xl != 0) {
        $this.addClass('slick-gutter-xl-' + $spaceBetween_xl);
    }
    var $slideCount = null;
    $this.on('init', function (event, slick) {
        $slideCount = slick.slideCount;
        if ($slideCount <= $slidesToShow) {
            $this.children('.slick-dots').hide();
        }
    });
    $this.slick({
        slidesToShow: $slidesToShow,
        slidesToScroll: $slidesToScroll,
        asNavFor: $asNavFor,
        autoplay: $autoplay,
        autoplaySpeed: $autoplaySpeed,
        speed: $speed,
        infinite: $infinite,
        rows: $rows,
        arrows: $arrows,
        dots: $dots,
        vertical: $vertical,
        focusOnSelect: $focusOnSelect,
        centerMode: $centerMode,
        centerPadding: $centerPadding,
        swipe: $swipe,
        swipeToSlide: $swipeToSlide,
        fade: $fade,
        appendArrows: $appendArrows,
        prevArrow: $prevArrow,
        nextArrow: $nextArrow,
        rtl: $rtl,
        responsive: $responsiveArray,
    });

    // Updating the sliders in tab
    $('body').on('shown.bs.tab', 'a[data-toggle="tab"], a[data-toggle="pill"]', function (e) {
        $this.slick('setPosition');
    });
    $('body').on('shown.bs.modal', function (e) {
        $this.slick('setPosition');
    });
});
    
/*----------------------------------- 
    Count Down Active 
----------------------------------*/ 
/*----------------------------------- 
    Count Down Active 
----------------------------------*/ 
$('[data-countdown]').each(function() {
	var $this = $(this), finalDate = $(this).data('countdown');
	$this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<div class="countdown-wrap"><div class="day"><span class="number">%D</span><span class="text">days</span></div><div class="hour"><span class="number">%H</span><span class="text">hours</span></div><div class="minute"><span class="number">%M</span><span class="text">min</span></div><div class="second"><span class="number">%S</span><span class="text">sec</span></div></div>'));
	});
});

$('[data-countdown2]').each(function() {
	var $this = $(this), finalDate = $(this).data('countdown2');
	$this.countdown(finalDate, function(event) {
		$this.html(event.strftime('<div class="single-count"><span>%D</span>D</div><div class="single-count"><span>%H</span>h</div><div class="single-count"><span>%M</span>m</div><div class="single-count"><span>%S</span>s</div>'));
	});
});

/*----------------------------------- 
    Newsletter Popup Active 
----------------------------------*/ 
$("#close-newsletter-popup").on("click", function(){
    $("#newsletter-popup-area").addClass("d-none");
});
/*------------------------------ 
    Nice Select Active
---------------------------------*/
$('select').niceSelect();

/* -------------------------
    Venobox Active
* --------------------------*/  
$('.venobox').venobox({
    border: '10px',
    titleattr: 'data-title',
    numeratio: true,
    infinigall: true
}); 
/*------------------------
	Sticky Sidebar Active
-------------------------*/
$('#sticky-sidebar').theiaStickySidebar({
    // Settings
    additionalMarginTop: 120
  })


// Sự kiện click cho nút tăng/giảm
// Sự kiện click cho nút tăng/giảm
$(document).ready(function() {
    // Gắn sự kiện click vào nút tăng và giảm số lượng
    $(document).on('click', '.qtybtn', function() {
        var $input = $(this).siblings('.qty-input'); // Lấy ô input
        var quantity = parseInt($input.val()); // Lấy giá trị hiện tại

        // Nếu là nút tăng
        if ($(this).hasClass('inc')) {
            quantity++; // Tăng số lượng
        } 
        // Nếu là nút giảm và số lượng lớn hơn 1
        else if ($(this).hasClass('dec') && quantity > 1) {
            quantity--; // Giảm số lượng
        }

        $input.val(quantity); // Cập nhật lại ô input

        // Gửi yêu cầu AJAX để cập nhật giỏ hàng trên server
        var productId = $input.closest('tr').data('product-id'); // Lấy ID sản phẩm từ data-product-id của <tr>

        $.ajax({
            url: 'index.php?ctrl=cart', // Đường dẫn cập nhật giỏ hàng
            method: 'POST',
            data: {
                id_product: productId,
                quantity: quantity // Gửi số lượng mới
            },
            success: function(response) {
                // Cập nhật lại subtotal cho sản phẩm
                updateRowSubtotal($input.closest('tr'), quantity);
                // Cập nhật tổng giỏ hàng
                updateTotal();
            },
            error: function(xhr, status, error) {
                console.error('Lỗi khi cập nhật giỏ hàng:', error);
            }
        });
    });

    // Cập nhật subtotal khi thay đổi số lượng
    $(document).on('change', '.qty-input', function() {
        var $row = $(this).closest('tr');
        var quantity = parseInt($(this).val()); // Lấy số lượng mới
        var productId = $row.data('product-id'); // Lấy product ID từ data-product-id

        $.ajax({
            url: 'index.php?ctrl=cart', 
            method: 'POST',
            data: {
                id_product: productId,
                quantity: quantity // Gửi số lượng mới lên server
            },
            success: function(response) {
                updateRowSubtotal($row, quantity); // Cập nhật subtotal
                updateTotal(); // Cập nhật tổng giỏ hàng
            },
            error: function(xhr, status, error) {
                console.error('Có lỗi xảy ra khi cập nhật giỏ hàng: ', error);
            }
        });
    });

    // Cập nhật subtotal cho một sản phẩm
    function updateRowSubtotal($row, quantity) {
        var price = parseInt($row.find('.pro-price span').text().replace(/[^\d]/g, ''));
        var subtotal = price * quantity; // Tính subtotal
        $row.find('.pro-subtotal span').text(formatCurrency(subtotal)); // Cập nhật subtotal
    }

    // Cập nhật tổng giỏ hàng
    function updateTotal() {
        var total = 0;
        $('.pro-subtotal span').each(function() {
            var subtotal = parseInt($(this).text().replace(/[^\d]/g, '')) || 0; // Lấy giá trị subtotal
            total += subtotal; // Tính tổng
        });
        $('#total-amount').text(formatCurrency(total)); // Cập nhật tổng giỏ hàng
    }

    // Hàm định dạng tiền tệ VNĐ
    function formatCurrency(amount) {
        return amount.toLocaleString('vi-VN') + '₫';
    }
});

// $('.pro-qty').prepend('<button class="dec qtybtn">-</button>');
// $('.pro-qty').append('<button class="inc qtybtn">+</button>');
// $('.qtybtn').on('click', function() {
// 	var $button = $(this);
// 	var oldValue = $button.parent().find('input').val();
// 	if ($button.hasClass('inc')) {
// 	  var newVal = parseFloat(oldValue) + 1;
// 	} else {
// 	   // Don't allow decrementing below zero
// 	  if (oldValue > 0) {
// 		var newVal = parseFloat(oldValue) - 1;
// 		} else {
// 		newVal = 0;
// 	  }
// 	  }
// 	$button.parent().find('input').val(newVal);
//     // updateRowSubtotal(.closest('tr'), newVal)
// }); 

/*----- 
	Shipping Form Toggle
--------------------------------*/ 
$('[data-shipping]').on('click', function(){
    if( $('[data-shipping]:checked').length > 0 ) {
        $('#shipping-form').slideDown();
    } else {
        $('#shipping-form').slideUp();
    }
})
/* ----------------------
    FAQ Accordion 
* -----------------------*/ 
$('.card-header a').on('click', function() {
    $('.card').removeClass('actives');
    $(this).parents('.card').addClass('actives');
  }); 
/*----- 
	Payment Method Select
--------------------------------*/
$('[name="payment-method"]').on('click', function(){
    
    var $value = $(this).attr('value');

    $('.single-method p').slideUp();
    $('[data-method="'+$value+'"]').slideDown();
    
})
/*----------------------------------
    ScrollUp Active
-----------------------------------*/
$.scrollUp({
    scrollText: '<i class="fa fa-angle-up"></i>',
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade'
});
    
/*--
	MailChimp
-----------------------------------*/
$('#mc-form').ajaxChimp({
	language: 'en',
	callback: mailChimpResponse,
	// ADD YOUR MAILCHIMP URL BELOW HERE!
	url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'

});
function mailChimpResponse(resp) {
	
	if (resp.result === 'success') {
		$('.mailchimp-success').html('' + resp.msg).fadeIn(900);
		$('.mailchimp-error').fadeOut(400);
		
	} else if(resp.result === 'error') {
		$('.mailchimp-error').html('' + resp.msg).fadeIn(900);
	}  
}
    
/*--
    Conatact Map
-----------------------------------*/
if($('.contact-map').length){
    function initialize() {
        var mapOptions = {
            zoom: 14,
            scrollwheel: false,
            center: new google.maps.LatLng(40.730610, -73.935242)
        };
        var map = new google.maps.Map(document.getElementById('contact-map'), mapOptions);
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            animation: google.maps.Animation.BOUNCE
        });

    }
    google.maps.event.addDomListener(window, 'load', initialize);
}
    
})(jQuery);	
    
document.addEventListener('DOMContentLoaded', function () {
    const checkoutForm = document.getElementById('checkout-form');
    const voucherForm = document.getElementById('voucher-form');

    // Ngăn chặn sự kiện từ form con
    if (voucherForm) {
        voucherForm.addEventListener('submit', function (event) {
            event.stopPropagation(); // Ngăn sự kiện form con ảnh hưởng form cha
            console.log('Voucher form submitted');
        });
    }

    // Xử lý kiểm tra form cha
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function (event) {
            const fullname = checkoutForm.querySelector('[name="fullname"]').value.trim();
            const phone = checkoutForm.querySelector('[name="phone"]').value.trim();
            const address = checkoutForm.querySelector('[name="address"]').value.trim();
            const paymentMethod = checkoutForm.querySelector('[name="payment_method"]:checked');

            if (!fullname) {
                alert('Vui lòng nhập họ và tên.');
                event.preventDefault();
            } else if (!phone || !/^\d{10,11}$/.test(phone)) {
                alert('Số điện thoại không hợp lệ.');
                event.preventDefault();
            } else if (!address) {
                alert('Vui lòng nhập địa chỉ.');
                event.preventDefault();
            } else if (!paymentMethod) {
                alert('Vui lòng chọn phương thức thanh toán.');
                event.preventDefault();
            }
        });
    }
});


document.getElementById('apply-voucher').addEventListener('click', function () {
    const voucher = document.getElementById('voucher').value;

    if (voucher.trim() === '') {
        alert('Vui lòng nhập mã giảm giá.');
        return;
    }

    // Tìm form cha để gửi dữ liệu
    const form = document.getElementById('checkout-form'); // ID của form chứa input

    // Tạo input hidden để gửi voucher
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'addvoucher';
    input.value = 'true';
    form.appendChild(input);

    // Gửi form
    form.submit();
});



$('#apply-voucher').on('click', function() {
    var voucherCode = $('#voucher').val();
    $.ajax({
        type: 'POST',
        url: '?ctrl=cart&view=checkout', // Replace with the actual PHP script handling the voucher
        data: { voucher: voucherCode },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.code === 1) {
                // Voucher applied successfully
                alert(data.message); // Show success message
                $('#total-price').text(data.total_price); // Update the total price on the page
            } else {
                // Show error message if voucher is invalid
                alert(data.message); // Show error message
            }
        }
    });
});

document.querySelectorAll('.btn-comment').forEach(button => {
    button.addEventListener('click', function () {
        const idProduct = this.getAttribute('data-id');
        document.getElementById('product-id').value = idProduct;
    });
});


// Tài khoản của tôi 
$(document).ready(function () {
    // Chuyển đổi tab
    $('.myaccount-tab-menu a').on('click', function (e) {
        e.preventDefault();
        $('.myaccount-tab-menu a').removeClass('active');
        $(this).addClass('active');
        $('.tab-pane').removeClass('show active');
        $($(this).attr('href')).addClass('show active');
    });

    // Xác thực form thông tin tài khoản
    $('form[action="?ctrl=user&view=account"]').on('submit', function (e) {
        let isValid = true;
        let errorMessage = "";

        // Kiểm tra Họ và Tên
        const fullName = $('input[name="fullname"]').val().trim();
        if (fullName === "") {
            errorMessage += "Họ và tên không được để trống.\n";
            isValid = false;
        }

        // Kiểm tra Email
        const email = $('input[name="email"]').val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            errorMessage += "Địa chỉ email không hợp lệ.\n";
            isValid = false;
        }

        // Kiểm tra Số điện thoại
        const phone = $('input[name="phone"]').val().trim();
        if (phone === "" || isNaN(phone)) {
            errorMessage += "Số điện thoại phải là số và không được để trống.\n";
            isValid = false;
        }

        // Kiểm tra Địa chỉ
        const address = $('input[name="address"]').val().trim();
        if (address === "") {
            errorMessage += "Địa chỉ không được để trống.\n";
            isValid = false;
        }

        // Nếu có lỗi, ngăn submit và hiển thị thông báo
        if (!isValid) {
            alert(errorMessage);
            e.preventDefault();
        }
    });

    // Xác thực form thay đổi mật khẩu
    $('form[action="?ctrl=user&view=account"]').on('submit', function (e) {
        if ($('button[name="changepass"]').length) {
            let isValid = true;
            let errorMessage = "";

            const currentPwd = $('#current-pwd').val().trim();
            const newPwd = $('#new-pwd').val().trim();
            const confirmPwd = $('#confirm-pwd').val().trim();

            // Kiểm tra mật khẩu hiện tại
            if (currentPwd === "") {
                errorMessage += "Vui lòng nhập mật khẩu hiện tại.\n";
                isValid = false;
            }

            // Kiểm tra mật khẩu mới
            if (newPwd.length < 6) {
                errorMessage += "Mật khẩu mới phải có ít nhất 6 ký tự.\n";
                isValid = false;
            }

            // Kiểm tra xác nhận mật khẩu
            if (newPwd !== confirmPwd) {
                errorMessage += "Mật khẩu mới và xác nhận mật khẩu không khớp.\n";
                isValid = false;
            }

            // Nếu có lỗi, ngăn submit và hiển thị thông báo
            if (!isValid) {
                alert(errorMessage);
                e.preventDefault();
            }
        }
    });

    // Hiển thị thông báo từ server (nếu có)
    const message = $('.alert-info').text().trim();
    if (message !== "") {
        alert(message);
    }
});
$(document).ready(function () {
    // Xác thực form đăng nhập
    $('form[action=""][method="post"]').on('submit', function (e) {
        let isValid = true;
        let errorMessage = "";

        const email = $('input[name="email"]').val().trim();
        const password = $('input[name="password"]').val().trim();

        if (email === "") {
            errorMessage += "Email hoặc số điện thoại không được để trống.\n";
            isValid = false;
        }

        if (password === "") {
            errorMessage += "Mật khẩu không được để trống.\n";
            isValid = false;
        }

        if (!isValid) {
            alert(errorMessage);
            e.preventDefault();
        }
    });

    // Xác thực form đăng ký
    $('form[action="?ctrl=user"][method="post"]').on('submit', function (e) {
        let isValid = true;
        let errorMessage = "";

        const email = $('input[name="email"]').val().trim();
        const password = $('input[name="password"]').val().trim();
        const confirmPassword = $('input[name="confirm_password"]').val().trim();

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Kiểm tra Email
        if (email === "" || !emailRegex.test(email)) {
            errorMessage += "Email không hợp lệ hoặc để trống.\n";
            isValid = false;
        }

        // Kiểm tra Mật khẩu
        if (password.length < 6) {
            errorMessage += "Mật khẩu phải có ít nhất 6 ký tự.\n";
            isValid = false;
        }

        // Kiểm tra Xác nhận Mật khẩu
        if (password !== confirmPassword) {
            errorMessage += "Mật khẩu và xác nhận mật khẩu không khớp.\n";
            isValid = false;
        }

        if (!isValid) {
            alert(errorMessage);
            e.preventDefault();
        }
    });
});
    // Lắng nghe sự kiện click trên nút yêu thích

