<main class="main-content mt-1 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb" >
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-md"><a class="opacity-5 text-dark" href="javascript:;">INICIO</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                        {{ str_replace('-', ' ', Route::currentRouteName()) }}</li>
                </ol>
            </nav>
            <div class="navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
                <div class="nav-item d-flex align-self-end">
                    <a href="{{Route('promotores')}}" class="btn btn-primary active mb-0 text-white" role="button" aria-pressed="true"> Promotores
                    </a>
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold pl-4">
                            <livewire:auth.logout />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

