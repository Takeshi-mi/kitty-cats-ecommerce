  <div class="row">
      <div>
          @if (Route::has('login'))
              <nav class="-mx-3 flex flex-1 justify-end">
                  @auth
                      <a href="{{ url('/dashboard') }}"
                          class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                          Dashboard
                      </a>
                  @else
                      <a href="{{ route('login') }}"
                          class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                          Entrar
                      </a>

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}"
                              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                              Registrar
                          </a>
                      @endif
                  @endauth
              </nav>
          @endif
      </div>
  </div>
  <div class="row" id="header">
      <div class='col-12 text-center bg-blue-80 p-2'>
          <img src="" alt="">
          <h1 class="text-white mt-3">TK News</h1>
          <p class="text-white">O melhor portal de informações</p>
      </div>
  </div>
