<hr>
    <ul class="subNavUl">
        <li class="subNavLi">
            <a href="{{ url('/home') }}"> 
                Protokoll 
            </a>   
        </li>
        <li class="subNavLi"> 
            <a href="{{ url('/home/npcs') }}"> 
                NPC's 
            </a>
        </li>
        <li class="subNavLi"> 
            <a href="{{ url('/home/places') }}"> 
                Örtlichkeiten 
            </a>
        </li>
        @if(Auth::user()->hasRole('master'))
        <li class="subNavLi"> 
            <a href="{{ url('/home/adventure') }}"> 
                Abenteuer 
            </a>
        </li>
        @endif
    </ul>
<hr>