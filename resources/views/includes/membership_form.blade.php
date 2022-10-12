
@if ($errors->any())
    <div class="ltn__callout bg-overlay-theme-05  mt-30">
        @foreach ($errors->all() as $error)
            <div class="text-danger">{{$error}}</div>
        @endforeach
    </div>
@endif

<div class="ltn__form-box contact-form-box box-shadow white-bg">
    <h4 class="title-2">Membership Form</h4>
    <form id="contact-form" action="/membership/payment" method="get">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="input-item">
                    <select class="nice-select" style="display: none;" name="membership_type"
                            required>
                        <option>Select Membership Type</option>
                        @foreach( getMembershipType() as $item)
                            <option value="{{$item['id']}}">{{$item['membership_type']}}</option>
                        @endforeach

                    </select>
                </div>
            </div>


            <div class="col-md-6">
                <div class="input-item input-item-name ltn__custom-icon">
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-item">
                    <input type="text" name="department" placeholder="Department" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item ">
                    <input type="file" name="image">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item">
                                            <textarea name="present_address"
                                                      placeholder="Enter Present Address"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item">
                                            <textarea name="permanent_address"
                                                      placeholder="Enter Permanent Address"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item">
                    <input type="text" name="nid" placeholder="NID" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item">
                    <input type="date" name="dob" placeholder="Date of Birth">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item">
                    <input type="text" name="phone_number" placeholder="Phone Number" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item">
                    <input type="text" name="blood_group" placeholder="Blood Group">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item">
                    <input type="text" name="user_name" placeholder="User Name" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item">
                    <input type="text" name="email_address" placeholder="Email Address" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-item">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-item">
                    <input type="text" name="facebook" placeholder="Facebook">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-item">
                    <input type="text" name="linked" placeholder="Linkedin">
                </div>
            </div>


        </div>

        <div class="btn-wrapper mt-0">
            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Proceed to
                Payment
            </button>
        </div>
        <p class="form-messege mb-0 mt-20"></p>
    </form>
</div>
