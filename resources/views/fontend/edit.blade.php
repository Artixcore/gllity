<div class="col-3">
<div class="card sha">
    <li class="list-group-item"><a style="color: #000000; font-size:16px;" href="{{ url('edit') }}/{{Auth::user()->name}}"><i class="fas fa-clinic-medical"></i> General</a></li>
    <li class="list-group-item"><a style="color: #000000; font-size:16px;" href="{{ url('security') }}/{{ Auth::user()->name }}"><i class="fas fa-user-lock"></i> Security</a></li>
    {{-- <li class="list-group-item"><a style="color: #000000; font-size:16px;" href="{{ url('device') }}"><i class="fas fa-laptop"></i> Devices</a></li>
    <li class="list-group-item"><a style="color: #000000; font-size:16px;" href="#"><i class="fas fa-user-secret"></i> Privacy</a></li>
    <li class="list-group-item"><a style="color: #000000; font-size:16px;" href="#"><i class="fas fa-ban"></i> Blocking</a></li> --}}
</div>
</div>
