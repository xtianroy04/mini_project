{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Members" icon="la la-question" :link="backpack_url('member')" />
<x-backpack::menu-item title="Checkins" icon="la la-question" :link="backpack_url('checkin')" />
<x-backpack::menu-item title="Memberships" icon="la la-question" :link="backpack_url('membership')" />
<x-backpack::menu-item title="Payments" icon="la la-question" :link="backpack_url('payment')" />