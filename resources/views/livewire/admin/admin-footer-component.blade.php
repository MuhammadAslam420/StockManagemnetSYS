@php
$setting=DB::table('en_settings')->find(1);
@endphp
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
        @if($setting)
        {{ $setting->name }}
        @endif
         <a href="{{ route('admin.dashboard') }}" target="_blank"></a>. All rights reserved.</span>
    </div>
  </footer>
