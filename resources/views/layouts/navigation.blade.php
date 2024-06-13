<nav class="navbar  bg-info navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Bigul</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">        
        <li class="nav-item">
            <a class="nav-link" href="{{ route('plans.index') }}"><strong> Plans</strong></a>
        </li>
        <li class="nav-item">
            <a  class="nav-link" href="{{ route('combo.index') }}"><strong>Combo Plans</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('eligibility.index') }}"><strong>Eligibility</strong></a>
        </li>
      </ul>
    </div>
  </div>
</nav>