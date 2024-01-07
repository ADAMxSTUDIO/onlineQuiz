<section id="admin-panel" class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light border-bottom">
    <div class="alert alert-warning w-75 d-flex align-items-center" role="alert">
        <i class="fa-solid fa-lock"></i>
        <strong>Admin/ Professor private space! *Access denied for other users*</strong>
    </div>
    <a class="btn btn-outline-dark w-25" href="{{ route('admin.quiz.dump') }}">
        <strong>Dump all</strong>
        <i class="fa-solid fa-broom"></i>
    </a>
    <a class="btn btn-outline-success w-25" href="{{ route('admin.index') }}">
        <strong>Dashboard</strong>
        <i class="fa-solid fa-list"></i>
    </a>
    <a class="btn btn-outline-danger w-25" href="{{ route('logout') }}">
        <strong>Exit</strong>
        <i class="fa-solid fa-right-from-bracket"></i>
    </a>
</section>
