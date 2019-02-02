<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="index.html">Dashboard</a></li>
        </ul>
        </li>
        <li><a><i class="fa fa-edit"></i> Hospital Management <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li>
                <a>Jobs Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li class="sub_menu"><a href="{{route('job.index')}}">All Jobs</a></li>
                    <li class="sub_menu"><a href="{{route('job.trashed')}}">Banned Jobs</a></li>
                </ul>
            </li>
            <li><a href="{{route('user.index')}}">Doctors Management</a></li>
            <li><a href="form_validation.html">Form Validation</a></li>
            <li><a href="form_wizards.html">Form Wizard</a></li>
            <li><a href="form_upload.html">Form Upload</a></li>
            <li><a href="form_buttons.html">Form Buttons</a></li>
        </ul>
        </li>
    </ul>
    </div>
    <div class="menu_section">
    <h3>Live On</h3>
    <ul class="nav side-menu">
        <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="#level1_1">Level One</a>
            <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                <li class="sub_menu"><a href="level2.html">Level Two</a>
                </li>
                <li><a href="#level2_1">Level Two</a>
                </li>
                <li><a href="#level2_2">Level Two</a>
                </li>
                </ul>
            </li>
            <li><a href="#level1_2">Level One</a>
            </li>
        </ul>
        </li>                  
    </ul>
    </div>

</div>