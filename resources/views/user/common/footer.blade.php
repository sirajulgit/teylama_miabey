<footer>
    <div class="foot-link">
        <ul class="d-flex align-items-center justify-content-between">
            <li class="text-center {{ Route::is('user_dashboard') ? 'link-active' : '' }}">
                <a href="{{ route('user_dashboard') }}">
                    <i class="bi bi-house-fill"></i> <br>
                    <span> Home </span>
                </a>
            </li>

            <li class="text-center {{ Route::is('user_account.*') ? 'link-active' : '' }}">
                <a href="{{ route('user_account.index') }}">
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

            <li class="text-center {{ Route::is('user_profile.*') ? 'link-active' : '' }}">
                <a href="{{ route('user_profile.index') }}">
                    <i class="bi bi-person-square"></i> <br>
                    <span> Me </span>
                </a>
            </li>
        </ul>
    </div>
</footer>
