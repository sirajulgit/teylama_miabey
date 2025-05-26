<footer>
    <div class="foot-link">
        <ul class="d-flex align-items-center justify-content-between">
            <li class="text-center {{ Route::is('user_dashboard') ? 'link-active' : '' }}">
                <a href="{{ route('user_dashboard') }}">
                    <i class="bi bi-house-fill"></i> <br>
                    <span> Home </span>
                </a>
            </li>

            <li class="text-center">
                <a href="account-management.html">
                    <i class="bi bi-wallet2"></i> <br>
                    <span> Account </span>
                </a>
            </li>

            <li class="text-center {{ Route::is('user_live_support') ? 'link-active' : '' }}">
                <a href="{{ route('user_live_support') }}">
                    <i class="bi bi-telephone-fill"></i> <br>
                    <span> Support </span>
                </a>
            </li>

            <li class="text-center">
                <a href="edit-profile.html">
                    <i class="bi bi-person-square"></i> <br>
                    <span> Me </span>
                </a>
            </li>
        </ul>
    </div>
</footer>
