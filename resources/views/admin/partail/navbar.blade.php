<!-- Main navbar -->
        <div class="navbar navbar-inverse">
        <div class="navbar-header">

            <a class="navbar-brand" href="index.html"><img src="{{asset('fontend/images/yupa-logo-white.png')}}" alt="" style="display: inline-block ;margin-right: 5px" width="100" height="80">
            Yupa-Travel
            </a>

            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
       
            <p class="navbar-text"><span class="label bg-success">Online</span></p>
        
            <ul class="nav navbar-nav navbar-right">
            <button id="btnCalculator" title="Calculator" type="button" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10 popover-default" data-toggle="popover" data-trigger="click" data-content='<div id="calculator">
              <div class="row text-center" id="calc">
                <div class="calcBG col-md-12 text-center">
                  <div class="row" id="result">
                    <form name="calc">
                      <input type="text" class="screen text-right" name="result" readonly>
                    </form>
                  </div>
                  <div class="row">
                    <button id="allClear" type="button" class="btn btn-danger" onclick="clearScreen()">AC</button>
                    <button id="clear" type="button" class="btn btn-warning" onclick="clearScreen()">CE</button>
                    <button id="%" type="button" class="btn" onclick="calEnterVal(this.id)">%</button>
                    <button id="/" type="button" class="btn" onclick="calEnterVal(this.id)">÷</button>
                  </div>
                  <div class="row">
                    <button id="7" type="button" class="btn" onclick="calEnterVal(this.id)">7</button>
                    <button id="8" type="button" class="btn" onclick="calEnterVal(this.id)">8</button>
                    <button id="9" type="button" class="btn" onclick="calEnterVal(this.id)">9</button>
                    <button id="*" type="button" class="btn" onclick="calEnterVal(this.id)">x</button>
                  </div>
                  <div class="row">
                    <button id="4" type="button" class="btn" onclick="calEnterVal(this.id)">4</button>
                    <button id="5" type="button" class="btn" onclick="calEnterVal(this.id)">5</button>
                    <button id="6" type="button" class="btn" onclick="calEnterVal(this.id)">6</button>
                    <button id="-" type="button" class="btn" onclick="calEnterVal(this.id)">-</button>
                  </div>
                  <div class="row">
                    <button id="1" type="button" class="btn" onclick="calEnterVal(this.id)">1</button>
                    <button id="2" type="button" class="btn" onclick="calEnterVal(this.id)">2</button>
                    <button id="3" type="button" class="btn" onclick="calEnterVal(this.id)">3</button>
                    <button id="+" type="button" class="btn" onclick="calEnterVal(this.id)">+</button>
                  </div>
                  <div class="row">
                    <button id="0" type="button" class="btn" onclick="calEnterVal(this.id)">0</button>
                    <button id="." type="button" class="btn" onclick="calEnterVal(this.id)">.</button>
                    <button id="equals" type="button" class="btn btn-success" onclick="calculate()">=</button>
                    <button id="blank" type="button" class="btn">&nbsp;</button>
                  </div>
                </div>
              </div>
            </div>' data-html="true" data-placement="bottom">
            <strong><i class=" icon-calculator2" aria-hidden="true"></i></strong>
        </button>
                <li class="dropdown language-switch">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('backend/global_assets/images/flags/gb.png')}}" class="position-left" alt="">
                        English
                        <span class="caret"></span>
                    </a>

                </li>

             

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('backend/global_assets/images/placeholders/placeholder.jpg')}}" alt="">
                        <span>{{Auth::user()->name}}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ route('admin.profile') }}"><i class="icon-user-plus"></i> My profile</a></li>
                        
                        <li><a href="{{route('admin.logout') }}" id="logout"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->