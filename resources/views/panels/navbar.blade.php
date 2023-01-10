@if($configData["mainLayoutType"] === 'horizontal' && isset($configData["mainLayoutType"]))
<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}" data-nav="brand-center">
  <div class="navbar-header d-xl-block d-none bg-primary">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="navbar-brand" href="{{ isset(Auth::user()->name) ? url(Auth::user()->home->url) : url('/') }}">
            <span class="brand-logo">
                <img src="{{ asset('images/logo/favicon.ico') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" style="max-width: 90px;" />
            </span>
        </a>
      </li>
    </ul>
  </div>
  @else
  <nav class="header-navbar navbar navbar-expand-lg bg-primary align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }}">
    @endif
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
          </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="{{($configData['theme'] === 'dark') ? 'sun' : 'moon' }}"></i></a></li>
        <li class="nav-item dropdown dropdown-user">
          <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none">
              <span class="user-name font-weight-bolder">
                    {{ isset(Auth::user()->name) ? explode(" ", Auth::user()->name)[0] : '' }}
              </span>
              <span class="user-status"></span>
            </div>
            <span class="avatar">
              <img class="round" src="{{ asset(Auth::user()->imagem) }}" class="img-fluid"  height="40" width="40">
              <span class="avatar-status-online"></span>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
            @if(isset(Auth::user()->name))
            <a class="dropdown-item" href="{{url('logout')}}">
              <i class="mr-50" data-feather="log-out"></i> Sair do Sistema
            </a>
            @else
            <a class="dropdown-item" href="{{url('parceiro/logout')}}">
                <i class="mr-50" data-feather="log-out"></i> Sair do Sistema
              </a>
            @endif
          </div>
        </li>
      </ul>
    </div>
    
  </nav>
