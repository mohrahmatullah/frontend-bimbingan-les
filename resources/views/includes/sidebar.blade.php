<div class="sidebar transition overlay-scrollbars animate__animated animate__slideInLeft">
  <div class="sidebar-content">
    <div id="sidebar">
      <!-- Logo -->
      <div class="logo">
        <h2 class="mb-0"><img src="{{url('assets/images/logo.png')}}">LES</h2>
      </div>
      <ul class="side-menu">
        @if(Session::get('role') == 'admin')
        <li>
          <a href="{{ route('dashboard' )}}" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard </a>
        </li>
        <!-- Divider-->
        <li class="divider" data-text="STARTER">MASTER</li>
        <li>
          <a href="#"><i class='bx bx-columns icon'></i> Data<i class='bx bx-chevron-right icon-right'></i></a>
          <ul class="side-dropdown">
            <li>
              <a href="{{ route('kelas') }}">Kelas</a>
            </li>
            <li>
              <a href="{{ route('jurusan') }}">Jurusan</a>
            </li>
            <li>
              <a href="{{ route('jadwal-belajar') }}">Jadwal Belajar</a>
            </li>
          </ul>
          <a href="{{ route('biodata') }}"><i class='bx bx-columns icon'></i> Biodata</a>
        </li>
        @endif
        @if(Session::get('role') == 'admin')
        <!-- Divider-->
        <li class="divider" data-text="Atrana">Registrasi</li>
        <li>
          <a href="{{ route('list-transactions') }}"><i class='bx bx-columns icon'></i> Bimbingan Belajar</a>
        </li>
        @endif
        @if(Session::get('role') == 'user')
        <li>
          <a href="{{route('edit-biodata', Session::get('id'))}}"><i class='bx bx-columns icon'></i> Update Biodata </a>
        </li>
        <!-- Divider-->
        <li class="divider" data-text="Atrana">Registrasi</li>
        <li>
          <a href="{{ route('transactions') }}"><i class='bx bx-columns icon'></i> Bimbingan Belajar</a>
        </li>
        @endif
      </ul>
      <div class="ads">
        <div class="wrapper">
          <div class="help-icon">
            <i class="fa fa-sign-out-alt size-icon-1 text-white"></i>
          </div>
          <a class="btn-upgrade" href="{{ route('logout')}}">Sign Out</a>
        </div>
      </div>
    </div>
  </div>
</div>