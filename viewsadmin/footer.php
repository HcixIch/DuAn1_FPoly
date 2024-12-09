<footer class="footer">
    <div class="container-fluid">

        <p class="copyright pull-right">
            &copy; <script>
            document.write(new Date().getFullYear())
            </script> <a href="http://www.creative-tim.com"></a>
        </p>
    </div>
</footer>


</div>
</div>


</body>

<!--   Core JS Files   -->
<script src="./public/javascripts/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./public/javascripts/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="./public/javascripts/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="./public/javascripts/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="./public/javascripts/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="./public/javascripts/demo.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>


</html>
<script>
$(document).ready(function() {
    $(".update-status").on("click", function() {
        let id = $(this).data("id"); // Lấy id_checkout từ data-id
        let button = $(this); // Lưu lại nút hiện tại
        $.ajax({
            url: "?ctrl=admin&view=order",
            type: "POST",
            data: {
                id_checkout: id
            },
            success: function(response) {
                let result = JSON.parse(response); // Parse kết quả trả về
                if (result.success) {
                    // Cập nhật giao diện
                    if (result.new_status == 1) {
                        button.prev("span").removeClass("badge-danger").addClass(
                            "badge-warning").text("Đang xử lý");
                        button.text("Hoàn tất");
                    } else if (result.new_status == 2) {
                        button.prev("span").removeClass("badge-warning").addClass(
                            "badge-success").text("Đã giao hàng");
                        button.remove(); // Xóa nút khi hoàn tất
                    }
                } else {
                    alert("Cập nhật trạng thái thất bại!");
                }
            },
            error: function() {
                alert("Có lỗi xảy ra khi gửi yêu cầu!");
            }
        });
    });
});
</script>