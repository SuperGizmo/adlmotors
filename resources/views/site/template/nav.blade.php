<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @foreach($navPages as $nav)
          @if($nav->children->count() > 0)
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $nav->name }}<span class="caret"></span></a>
          <ul class="dropdown-menu">
              @foreach($nav->children as $child)
                    <li><a href="{{ $child->url }}.html">{{ $child->name }}</a></li>
              @endforeach
                </ul>
              </li>
          @else
            <li><a href="{{ $nav->url }}.html">{{ $nav->name }}</a></li>
          @endif
        @endforeach
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://www.facebook.com/pages/Sm-of-Weybridge-and-Addlestone-Vehicle-Servicing/576278755736184">Facebook</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

        