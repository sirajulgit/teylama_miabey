@extends('user.layout.auth_layout')


@section('content')
    <header>
        <div class="top-cover d-flex align-items-center justify-content-between">

            <button class="btn-back-frw"> <i class="bi bi-chevron-left"></i> </button>

            <strong class="center-heading">Account Management</strong>
            <strong> </strong>
    </header>


    <main class="home-content">

        <div class="container-fluid">

            <div class="account-tab">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-bank-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank"
                            aria-selected="true">Bank Card</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-upi-tab" data-bs-toggle="pill" data-bs-target="#pills-upi"
                            type="button" role="tab" aria-controls="pills-upi" aria-selected="false"> UPI </button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-bank" role="tabpanel" aria-labelledby="pills-upi-tab">
                        <div class="card-bound mb-3">
                            <p> Up to 99 cards can be bound </p>
                        </div>

                        <!-- <div class="bank-list p-3 rounded-3 mb-3">
                            <div class="d-flex align-items-center mb-3">
                            <img src="images/pnb.png" alt="">
                            <p>Punjab National Bank </p>
                            </div>
                            <strong class="ac-number">0326 **** **** 2784 </strong>
                        </div>

                        <div class="bank-list p-3 rounded-3 mb-3">
                            <div class="d-flex align-items-center mb-3">
                            <img src="images/pnb.png" alt="">
                            <p>Punjab National Bank </p>
                            </div>
                            <strong class="ac-number">0326 **** **** 2784 </strong>
                        </div> -->

                        <div class="bank-list p-3 rounded-3 mb-3">
                            <div class="text-center" data-toggle="modal" data-target="#exampleModal">
                                <span class="borderd-plus">+</span>
                                <p class="mt-3">Add Bank Card </p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="pills-upi" role="tabpanel" aria-labelledby="pills-upi-tab">...</div>

                </div>

            </div>


        </div>


    </main>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
