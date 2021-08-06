<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item @if($page === 'home') active @endif"> <a class="sidebar-link sidebar-link" href="{{route('home')}}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">{{__('messages.sidebar.dashboard')}}</span></a>
                        </li>
                        @if (Auth::user()->isTeacher())
                            <li class="sidebar-item  @if($page === 'rating') active @endif"> <a class="sidebar-link sidebar-link" href="{{route('note')}}"
                                    aria-expanded="false"><i class="fa fa-edit"></i><span
                                        class="hide-menu">{{__('messages.sidebar.rating')}}</span></a>
                            </li>
                            <li class="sidebar-item  @if($page === 'myclasses') active @endif"> <a class="sidebar-link sidebar-link" href="{{route('myclasses')}}"
                                aria-expanded="false"><i class="fas fa-university"></i><span
                                    class="hide-menu">{{__('messages.sidebar.myclasses')}}
                                </span></a>
                            </li>
                        @elseif (Auth::user()->isStudent())
                        <li class="sidebar-item  @if($page === 'mymark') active @endif"> <a class="sidebar-link sidebar-link" href="{{route('mymark')}}"
                                    aria-expanded="false"><i class="fa fa-edit"></i><span
                                        class="hide-menu">{{__('messages.sidebar.mymark')}}</span></a>
                            </li>
                        @elseif (Auth::user()->isAdmin())

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                        <li class="sidebar-item @if($page === 'student') active @endif"> <a class="sidebar-link" href="{{route('student')}}"
                                aria-expanded="false"><i class="fas fa-user-graduate"></i><span
                                    class="hide-menu">{{__('messages.sidebar.student')}}
                                </span></a>
                        </li>
                        <li class="sidebar-item @if($page === 'teacher') active @endif"> <a class="sidebar-link" href="{{route('teacher')}}"
                                aria-expanded="false"><i class="fas fa-chalkboard-teacher"></i><span
                                    class="hide-menu">{{__('messages.sidebar.teacher')}}
                                </span></a>
                        </li>
                        <li class="sidebar-item @if($page === 'tutor') active @endif"> <a class="sidebar-link" href="{{route('parent')}}"
                                aria-expanded="false"><i class="fas fa-user-secret"></i><span
                                    class="hide-menu">{{__('messages.sidebar.tutor')}}
                                </span></a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap "><span class="hide-menu">Authentication</span></li>

                        <li class="sidebar-item  @if($page === 'class') active @endif"> <a class="sidebar-link sidebar-link" href="{{route('classe')}}"
                                aria-expanded="false"><i class="fas fa-university"></i><span
                                    class="hide-menu">{{__('messages.sidebar.class')}}
                                </span></a>
                        </li>
                        <li class="sidebar-item  @if($page === 'classroom') active @endif"> <a class="sidebar-link sidebar-link" href="{{route('classroom')}}"
                                aria-expanded="false"><i class="fas fa-warehouse"></i><span
                                    class="hide-menu">{{__('messages.sidebar.classroom')}}
                                </span></a>
                        </li>

                        <li class="sidebar-item  @if($page === 'course') active @endif"> <a class="sidebar-link sidebar-link" href="{{route('course')}}"
                                aria-expanded="false"><i class="fa fa-book-open" aria-hidden="true"></i><span
                                    class="hide-menu">{{__('messages.sidebar.course')}}
                                </span></a>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Extra</span></li>
                        <li class="sidebar-item  @if($page === 'rating') active @endif"> <a class="sidebar-link sidebar-link" href="{{route('note')}}"
                                aria-expanded="false"><i class="fa fa-edit"></i><span
                                    class="hide-menu">{{__('messages.sidebar.rating')}}</span></a>
                        </li>

                        <li class="sidebar-item  @if($page === 'subject') active @endif"> <a class="sidebar-link sidebar-link" href="{{route('subject')}}"
                                aria-expanded="false"><i data-feather="edit-3" class="feather-icon"></i><span
                                    class="hide-menu">{{__('messages.sidebar.subject')}}</span></a>
                        </li>
                        <li class="sidebar-item @if($page === 'subjectType') active @endif"> <a class="sidebar-link sidebar-link" href="{{route('subject-type')}}"
                                aria-expanded="false"><i data-feather="edit-3" class="feather-icon"></i><span
                                    class="hide-menu">{{__('messages.sidebar.subjectType')}}
                                </span></a>
                        </li>


                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">{{__('messages.sidebar.config')}}</span></li>


                        @endif
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="icon-settings"></i><span
                                    class="hide-menu">{{__('messages.sidebar.setting')}} <span class="badge badge-warning rounded-circle">4</span> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item @if($page === 'profile') active @endif"><a href="{{route('profile')}}" class="sidebar-link"><span
                                            class="hide-menu"> {{__('messages.sidebar.profile')}}
                                        </span></a>
                                </li>
                                <li class="sidebar-item @if($page === 'general') active @endif"><a href="{{route('general')}}" class="sidebar-link"><span
                                            class="hide-menu"> {{__('messages.sidebar.general')}}
                                        </span></a>
                                </li>
                                <li class="sidebar-item @if($page === 'role') active @endif"><a href="{{route('role')}}" class="sidebar-link"><span
                                            class="hide-menu"> {{__('messages.sidebar.role')}}
                                        </span></a>
                                </li>
                                <li class="sidebar-item @if($page === 'users') active @endif"><a href="{{route('users')}}" class="sidebar-link"><span
                                            class="hide-menu"> {{__('messages.sidebar.users')}}
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
