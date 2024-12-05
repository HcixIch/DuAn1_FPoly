<!-- Error message Start -->
<?php if (isset($_SESSION['errors'])): ?>
                <div class="alert alert-danger">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <p><?= $_SESSION['message'] ?></p>
                    <?php unset($_SESSION['message']); ?>
                </div>
            <?php endif; ?>
<!-- Error message End -->
<!-- Login Register section start -->
<div
    class="login-register-section section pt-30 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    <div class="container">
        <div class="row">
            <!-- Login Form Start -->
            <div class="col-md-6 col-sm-6">
                <div class="customer-login-register">
                    <div class="form-login-title">
                        <h2>Đăng nhập</h2>
                    </div>
                    <div class="login-form">
                        <form action="" method="post">
                            <div class="form-fild">
                                <p><label>Email hoặc số điện thoại<span class="required">*</span></label></p>
                                <input name="email" type="email" value="" type="text">
                            </div>
                            <div class="form-fild">
                                <p><label>Mật khẩu <span class="required">*</span></label></p>
                                <input name="password" value="" type="password">
                            </div>
                            <div class="login-submit">
                                <button type="submit" name="Login" class="btn">Đăng nhập</button>
                                <label>
                                    <input class="checkbox" name="rememberme" value="" type="checkbox">
                                    <span>Ghi nhớ đăng nhập</span>
                                </label>
                            </div>
                            <div class="lost-password">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Login Form End -->
            <!-- Register Form Start -->
            <div class="col-md-6 col-sm-6">
                <div class="customer-login-register register-pt-0">
                    <div class="form-register-title">
                        <h2>Đăng ký</h2>
                    </div>
                    <div class="register-form">
                        <form action="?ctrl=user" method="post">
                            <div class="form-fild">
                                <p><label>Email hoặc số điện thoại<span class="required">*</span></label></p>
                                <input type="email" name="email" value="" type="text">
                            </div>
                            <div class="form-fild">
                                <p><label>Mật khẩu<span class="required">*</span></label></p>
                                <input name="password" value="" type="password">
                            </div>
                            <div class="form-fild">
                                <p><label>Nhập lại mật khẩu<span class="required">*</span></label></p>
                                <input name="confirm_password" value="" type="password">
                            </div>
                            <div class="register-submit">
                                <button type="submit" name="register" class="btn">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Register Form End -->
        </div>
    </div>
</div>
<!-- Login Register section end -->