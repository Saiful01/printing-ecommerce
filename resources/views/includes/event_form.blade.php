@if ($errors->any())
    <div class="ltn__callout bg-overlay-theme-05  mt-30">
        @foreach ($errors->all() as $error)
            <div class="text-danger">{{$error}}</div>
        @endforeach
    </div>
@endif

@if( isset($message) )

    <div class="ltn__callout bg-overlay-theme-05  mt-30">
        <div class="text-danger">{{$message}}</div>
    </div>
@endif

<div class="ltn__form-box contact-form-box box-shadow white-bg">
    <h4 class="title-2">Event Registration Form</h4>
    <form id="contact-form" action="/event-registration/payment" method="get">
        @csrf
        <div class="row">


            <div class="col-md-6">
                <div class="input-item input-item-name ltn__custom-icon">
                    <input type="text" name="name" placeholder="Enter your name" required>
                    <input type="hidden" value="{{$event->id}}" name="event_id">
                    <input type="hidden" value="{{$event->amount}}" name="amount">
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
                    <input type="text" name="nid" placeholder="NID" required>
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


        </div>

        <div class="btn-wrapper mt-0">
            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Proceed to
                Payment
            </button>
        </div>
        <p class="form-messege mb-0 mt-20"></p>
    </form>
</div>
