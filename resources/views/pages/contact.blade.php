@extends('layouts.index')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">
                    <h3>Liên hệ</h3>
                    <form action="contact" method="post" class="form">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Họ <span>*</span></label>
                                <input type="text" class="form-control" id="first_name" name="FirstName" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Tên<span>*</span></label>
                                <input type="text" class="form-control" id="last_name"  name="LastName">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Địa chỉ email<span>*</span></label>
                                <input type="email" class="form-control" name="Email" id="email_address">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="street_address">Góp ý <span>*</span></label>
                                <textarea  id="Message" class="form-control" name="Message" value="" maxlength="6000"></textarea>
                            </div>
                            <button class=" btn karl-checkout-btn">Gửi góp ý</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection