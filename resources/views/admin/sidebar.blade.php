<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.html">Dashboard</a></li>
                </ul>
            </li>
            <li><a href="{{route('diagnosis.index')}}"><i class="fa fa-home"></i> Diagnosis Result</a></li>
            @role('Staff')
            <li><a><i class="fa fa-edit"></i> Patient Management<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li>
                        <a>Patient <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="sub_menu"><a href="{{route('patient.index')}}">Patient Data</a></li>
                            <li class="sub_menu"><a href="{{url('/admin/patient/create')}}">Create Patient</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endrole
            @role('Manager')
            <li><a><i class="fa fa-edit"></i> Hospital Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li>
                        <a>Structure Management<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="sub_menu"><a href="{{route('user.index')}}">All Workers</a></li>
                            <li class="sub_menu"><a href="{{route('user.index',['type'=>'doctor'])}}">Doctor List</a></li>
                            <li class="sub_menu"><a href="{{route('user.index',['type'=>'staff'])}}">Staff List</a></li>
                            <li class="sub_menu"><a href="{{route('job.trashed')}}">Banned Workers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>Inventory Management<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li>
                                <a>Drugs<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="{{route('drug.index')}}">All Drugs</a></li>
                                    <li class="sub_menu"><a href="{{route('drug.trashed')}}">Banned Drugs</a></li>
                                </ul>
                            </li>
                            <li class="sub_menu"><a href="{{route('job.trashed')}}">Room</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endrole
            <li><a><i class="fa fa-edit"></i> Transactions<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li>
                        <a>Jobs Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="sub_menu"><a>All Jobs</a></li>
                            <li class="sub_menu"><a>Banned Jobs</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</div> 