  <div class="row bg-white">
      <div class="col-3 py-2 mt-2 text-center">
        <a href="{{route('home')}}" class="text-decoration-none">
          <h2 class="text-black mt-4">Kitty Cats</h2>
        </a>
        </div>
        
        <div class="col-3 py-2 mt-2">
            <h1 class="mt-3">Área do administrador </h1>    
        </div> 
       
  

      <div class="col-3 py-2 mt-4 header-search">
        <form method="GET" action="{{ route('produtos.search') }}" class="form-inline">
          <div class="br-input has-icon">
              <input id="query" value="{{ request('query')}}" type="text" placeholder="O que você procura?" />
              <button class="br-button circle small" type="submit" aria-label="Pesquisar"><i class="fas fa-search" style="color: #000000;" aria-hidden="true"></i>
              </button>
          </div>
        </form>
      </div>

      @if (Route::has('login'))
      <div class="col-2 align-self-center">
          <nav class="-mx-3 flex flex-1 justify-end">
              @auth
              <a href="{{ url('/dashboard') }}"
                  class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                  Dashboard
              </a>
              @else
              <a href="{{ route('login') }}"
                  class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24" width="27" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                      <path fill="#000000" d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                  </svg>
              </a>

              @if (Route::has('register'))
              <a href="{{ route('register') }}"
                  class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                  <i class="fa-solid fa-circle-user fa-xl" style="color: #000000;"></i>
              </a>
              @endif
              @endauth
          </nav>
      </div>
      @endif
  </div>
  <div class="divider-top text-center bg-black">
      &nbsp;
  </div>
