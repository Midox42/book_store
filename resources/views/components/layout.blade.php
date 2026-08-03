<nav class="navbar navbar-expand-lg navbar-dark rounded-4 shadow-sm px-3 py-2 mb-4" style="background: linear-gradient(135deg, #111827 0%, #1f2937 100%); border: 1px solid rgba(255,255,255,0.08);">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-semibold text-white" href="{{ route('welcome') }}">
            <span class="rounded-circle bg-light text-dark d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">B</span>
            <span>BlogHub</span>
        </a>
        <div class="ms-auto">
            <ul class="navbar-nav flex-row gap-2">
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light btn-sm px-3 py-2 rounded-pill" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light btn-sm px-3 py-2 rounded-pill" href="{{ route('posts') }}">posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light btn-sm px-3 py-2 rounded-pill" href="{{ route('about.us') }}">About Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
