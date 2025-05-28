@extends('user.layout.auth_layout')


@section('content')

<header>


<div class="top-cover d-flex align-items-center justify-content-between">

<a href="{{ url()->previous() }}">
<button class="btn-back-frw"> <i class="bi bi-chevron-left"></i> </button>
</a>

 <strong class="center-heading">Change Password </strong>
 <strong> </strong>

</header>


<main class="home-content">

  <div class="container-fluid pt-3">

    <div class="password-change-from">
      <div class="mb-2">
        <label class="mb-2 label-design">Original Password</label>
        <div class="pw-area position-relative">
        <input class="form-control" type="password" placeholder="Please Fill in the original password">
        <i class="bi bi-eye"></i>
          </div>
      </div>

      <div class="mb-2">
        <label class="mb-2 label-design"> Set Password </label>
        <div class="pw-area position-relative">
        <input class="form-control" type="password" placeholder="Please Fill in the 6-digit payment password">
        <i class="bi bi-eye"></i>
        </div>
      </div>

      <div class="mb-2">
        <label class="mb-2 label-design"> Confirm Password </label>
        <div class="pw-area position-relative">
        <input class="form-control" type="password" placeholder="Please Fill in the 6-digit payment password">
        <i class="bi bi-eye"></i>
        </div>
      </div>

        <div class="mt-4">
          <input type="submit" class="submit-btn" value="Submit">
        </div>

        <div class="text-center live-support mt-5">
          <p>If you have any questions. <a href="">Live Support</a></p>
        </div>

    </div>

  </div>


</main>

@endsection
