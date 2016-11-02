<nav>
    <button id="aisle-heading" onclick="toggleNavigation();" class="btn btn-default btn-lg btn-block" type="button">Aisles</button>
    <ul id="aisles" class="nav nav-pills nav-stacked">
        @foreach($categories->unique() as $category)
            <li class="text-center"><a href="{{ url('/home/'.$category) }}">{{ $category }} <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
        @endforeach
    </ul>

    <br><br>
</nav>