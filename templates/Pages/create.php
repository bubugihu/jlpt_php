 <!--Start Main Contact Form Area-->
 <section id="contact" class="mt-4 main-contact-form-area">
        <div class="container">
            <div class="sec-title text-center">
                <div class="sub-title">
                    <p>Form đăng ký</p>
                </div>
                <h2>Điền đầy đủ thông tin</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-style1_form">
                        <div class="contact-form">
                            <form id="contact-form" name="contact_form" class="default-form2" action="" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <label>Nhập Họ và tên đệm (viet in hoa, không dấu)<span style="color: red">*</span></label>
                                            <input type="text" name="last_name" id="last_name" value="" placeholder="NGUYEN VAN" required="">
                                            <label id="last_name-error" class="error error-form" for="last_name">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <label>Nhập Tên (viet in hoa, không dấu) <span style="color: red">*</span> </label>
                                            <input type="text" name="first_name" id="first_name" value="" placeholder="A" required="">
                                            <label id="first_name-error" class="error error-form" for="first_name">This field is required.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <label>Nhập cấp độ thi<span style="color: red">*</span></label>
                                            <input type="text" name="level" id="level" value="" placeholder="N5" required="">
                                            <label id="level-error" class="error error-form" for="level">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <label>Nhập năm, tháng, ngày sinh<span style="color: red">*</span></label>
                                            <input type="date" name="birthday_display" id="birthday_display" value="" placeholder="2000/01/31" required="">
                                            <label id="birthday_display-error" class="error error-form" for="birthday_display">This field is required.</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <label>Nhập quê quán<span style="color: red">*</span></label>
                                            <input type="text" name="where_from" id="where_from" value="" placeholder="TPHCM" required="">
                                            <label id="where_from-error" class="error error-form" for="where_from">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <labe>Nhập số đt<span style="color: red">*</span></labe>
                                            <input type="text" name="phone" id="phone" value="" placeholder="0909113114" required="">
                                            <label id="phone-error" class="error error-form" for="phone">This field is required.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <label>Gửi ảnh chụp rõ mặt (ví dụ như ảnh dưới)<span style="color: red">*</span></label>
                                            <input type="file" name="avatar" id="avatar" value="" placeholder="" required="">
                                            <label id="avatar-error" class="error error-form" for="avatar">This field is required.</label>
                                            <img src="<?= $base_url ?>assets/images/slides/chandung.jfif" class="img-fluid mt-4"  width="100" height="200"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <label>Gửi ảnh mặt trước CCCD hoặc Hộ chiếu<span style="color: red">*</span></label>
                                            <input type="file" name="pic" value="" id="pic" placeholder="" required="">
                                            <label id="pic-error" class="error error-form" for="pic">This field is required.</label>
                                            <img src="<?= $base_url ?>assets/images/slides/cccd.png" class="img-fluid mt-4"  width="100" height="200"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="input-box">
                                            <label>Nhập số CCCD<span style="color: red">*</span></label>
                                            <input type="text" name="cccd" id="cccd" value="" placeholder="012345678910" required="">
                                            <label id="cccd-error" class="error error-form" for="cccd">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 text-center">
                                        <div class="input-box two">
                                            <label>Nhập địa chỉ nhận phiếu báo thi</label>
                                            <textarea name="addr" id="addr" placeholder="123 Điện biên phủ, quận 3, TPHCM"></textarea>
                                        </div>
                                        <div class="button-box">
                                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                            <button class="btn-one" id="submit_register" type="button" data-loading-text="Please wait...">
                                                <span class="txt span_submit_register">Gửi thông tin đăng kí</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>
    <!--End Main Contact Form Area-->
    <!-- search-popup -->
    <div id="search-popup" class="search-popup">
        <div class="close-search"><i class="icon-close"></i></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <!--            <form method="post" action="index.html">-->
                <!--                <div class="form-group">-->
                <!--                    <fieldset>-->
                <!--                        <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >-->
                <!--                        <input type="submit" value="Search Now!" class="theme-btn style-four">-->
                <!--                    </fieldset>-->
                <!--                </div>-->
                <!--            </form>-->
                <h3>Search Results</h3>
                <div id="search-results">
                    <p>No data</p>
                </div>
            </div>
        </div>
    </div>
    <!-- search-popup end -->
<!-- Modal -->
<div class="modal fade" id="alertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center">Thông báo</h1>
            </div>
            <div class="modal-body">
                <p id="messageAlertModal" class="text-center"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal" onclick="modalHide()">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function modalAlert(message) {
        $("#messageAlertModal").empty().append(message)
        $("#alertModal").modal("show")
    }

    function modalHide()
    {
        $("#alertModal").modal("hide")
    }
</script>

<script>
    $(document).ready(function(){
        const URL = "<?= $base_url_form ?>"
        let array_form = ['first_name','last_name','level','birthday_display','where_from','phone','pic','avatar', 'cccd'];
        function formValid()
        {
            let flag = true;

            array_form.forEach(function(item, index){
                if($('#'+item).val().trim().length < 1)
                {
                    flag = false;
                    $('#'+item+'-error').css('display','block')
                    $('#'+item).addClass("error")
                }else{
                    $('#'+item+'-error').css('display','none')
                    $('#'+item).removeClass("error")
                }
            })

            return flag;
        }

        function formReset()
        {
            $('.error-form').css('display','none')
            $('#first_name').val("")
            $('#last_name').val("")
            $('#level').val("")
            $('#birthday_display').val("")
            $('#where_from').val("")
            $('#phone').val("")
            $('#pic').val("")
            $('#avatar').val("")
            $('#addr').text("")
            $('#cccd').val("")
        }

        $('#submit_register').click(function(){
            $("#contact-form").validate();
            if(!formValid())
            {
                $('html, body').animate({ scrollTop: $('#contact').offset().top }, 'fast');
                return;
            }
            let formData = new FormData();
            formData.append('avatar', $('#avatar')[0].files[0]);
            formData.append('pic', $('#pic')[0].files[0]);
            formData.append('first_name', $('#first_name').val());
            formData.append('last_name', $('#last_name').val());
            formData.append('level', $('#level').val());
            formData.append('birthday_display', $('#birthday_display').val());
            formData.append('where_from', $('#where_from').val());
            formData.append('phone', $('#phone').val());
            formData.append('addr', $('#addr').val());
            formData.append('cccd', $('#cccd').val());
            formData.append('exam', "25A");

            $('.span_submit_register').text("Đang gửi thông tin, vui lòng đợi...")
            $('#submit_register').prop('disabled', true)

            $.ajax({
                type: "POST",
                data : formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                // dataType: "json",
                headers: {
                    'Access-Control-Allow-Origin': '*',
                },
                url: "create/",
                async: false,
                beforeSend: function(){
                    $('.span_submit_register').text("Đang gửi thông tin, vui lòng đợi...")
                    $('#submit_register').prop('disabled', true)
                },
                success: function() {
                    setTimeout(function() {
                        $('.span_submit_register').text("Gửi thông tin đăng kí")
                        $('#submit_register').prop('disabled', false)
                        modalAlert("Đăng kí thành công. Bạn chuyển tiền nhớ chụp lại ảnh giao dịch thành công rồi gửi admin nhé. Cảm ơn bạn.")
                        formReset()
                    }, 3000);

                },
                error: function(response) {
                    setTimeout(function() {
                        $('.span_submit_register').text("Gửi thông tin đăng kí")
                        $('#submit_register').prop('disabled', false)
                        modalAlert("Đăng kí thất bại. Vui lòng liên hệ admin để được hướng dẫn thêm.")
                    }, 3000);
                }
            }); //end ajax
        });
    })
</script>