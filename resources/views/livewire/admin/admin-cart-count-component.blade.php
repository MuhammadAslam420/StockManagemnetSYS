<li class="nav-item ">
    <a class="nav-link count-indicator" style="display: inline-flex;"  href="{{ route('cart') }}" >
        <img src="{{ asset('cart.png') }}" alt="">
      @if(Cart::instance('cart')->count() > 0)
      <span class="count bg-primary text-light ">{{ Cart::instance('cart')->count() }}</span>
      @else
      <span class="count text-dark">0</span>
      @endif
    </a>

  </li>
