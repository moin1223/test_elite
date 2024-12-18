<div class="col-lg-3 sticky-xl-top">
    <div class="white_card card_height_20 mb_30">
        <div class="white_card_header">
            <div class="box_header">
                <div class="main-title">
                    <ul class="list-group">
                        <li class="{{ request()->is('profiles') ? 'list-group-item-active' : '' }} list-group-item border-0 default-item"
                            onclick="window.location='{{ route('profile.edit') }}';">
                            Profile
                        </li>
                        <li class="{{ request()->is('change-password') ? 'list-group-item-active' : '' }} list-group-item border-0 mt-3"
                            onclick="window.location='{{ route('change_password') }}';">
                            Change Password
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
