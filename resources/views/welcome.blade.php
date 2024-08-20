<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Knowledge Base | CORK - Multipurpose Bootstrap Dashboard Template</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('src/assets/img/favicon.ico') }}"/>
    <link href="{{ asset('layouts/horizontal-light-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('layouts/horizontal-light-menu/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('layouts/horizontal-light-menu/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('layouts/horizontal-light-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/horizontal-light-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('src/plugins/src/autocomplete/css/autoComplete.02.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('src/plugins/css/light/autocomplete/css/custom-autoComplete.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/css/dark/autocomplete/css/custom-autoComplete.css') }}}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('src/assets/css/light/pages/knowledge_base.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/pages/knowledge_base.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <style>
        .questions-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .question-card {
            flex: 1 1 calc(33.333% - 1rem);
            box-sizing: border-box;
        }
    </style>
</head>
<body class="layout-boxed">
<nav class="bg-green-800 p-3">
    <div class="container mx-auto flex justify-between items-center">
        <!-- <a class="text-white text-lg font-bold" href="#">Opinion</a> -->
         <img src="opinion.png" class="w-9 h-7">
        <div class="block lg:hidden">
            <button id="nav-toggle" class="text-white focus:outline-none">
                <svg class="fill-current h-6 w-6" viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto" id="nav-content">
            <ul class="lg:flex-grow flex justify-end">
                <li class="nav-item">
                    <a class="nav-link block mt-4 lg:inline-block lg:mt-0 text-white hover:text-gray-400 mr-4" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link block mt-4 lg:inline-block lg:mt-0 text-white hover:text-gray-400" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="fq-header-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 align-self-center order-md-0 order-1">
                                <div class="faq-header-content">
                                    <h1 class="mb-4">Student Opinion Poll</h1>
                                    <div class="row">
                                        <div class="col-lg-5 mx-auto">
                                            <div class="autocomplete-btn">
                                                <input id="example2" class="form-control">
                                                <button class="btn btn-success">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-4 mb-0">Search instant answers & questions asked by popular users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-welcome-layout>
                    <div class="py-12 mx-8">
                        <div class="questions-container">
                            @foreach ($questions as $question)
                            <div class="question-card">
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                    <div class="p-6">
                                        <div class="flex items-center mb-4">
                                            <div class="w-12 h-12 overflow-hidden rounded-full">
                                                <img src="../src/assets/img/profile-19.jpeg" alt="avatar" class="w-full h-full object-cover">
                                            </div>
                                            <div class="ml-4">
                                                <h6 class="font-semibold">{{ __('Promise') }}</h6>
                                                <p class="text-xs text-green-600">{{ $question->created_at->diffForHumans() }}</p>
                                            </div>
                                            <a href="" class="px-3 py-1 border border-green-300 rounded-full text-green-400 text-xs uppercase font-semibold ml-28" style="font-size: 10px">{{ $question->category->category }}</a>
                                        </div>
                                        <h2 class="font-bold text-lg mb-3">{{ __('Question') }}</h2>
                                        <p class="text-sm">{{ $question->question }}</p>
                                    </div>
                                    <div class="px-6 py-4 bg-gray-100 flex justify-end">
                                        <a href="{{ route('question.show', ['question' => $question->id]) }}" class="text-green-500 hover:text-green-700 no-underline">{{ __('View Question') }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </x-welcome-layout>
                <div class="mt-4">
                    {{$questions->links()}}
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/waves/waves.min.js') }}"></script>
    <script src="{{ asset('layouts/horizontal-light-menu/app.js') }}"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('src/plugins/src/autocomplete/autoComplete.min.js') }}"></script>
    <script src="{{ asset('src/assets/js/pages/knowledge-base.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>
