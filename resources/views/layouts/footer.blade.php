<footer class="d-flex flex-wrap justify-content-between align-items-center py-1 border-top">
    <div class="col-md-4 m-1 d-flex align-items-center">
        <span class="text-muted">&#169; 2021 Eternal-Grace, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        @foreach(['twitter', 'instagram', 'facebook'] as $socialMedia)
        <li class="ms-3">
            <a class="text-muted" href="#">
                <i class="fab fa-{{ $socialMedia }} fa-fw" size="24"></i>
            </a>
        </li>
        @endforeach
    </ul>
</footer>
