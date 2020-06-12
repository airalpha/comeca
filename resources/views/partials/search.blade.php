<!-- Search Form -->
<div class="search-form">
    <form action="{{ route('search') }}" method="get">
        <input type="search" name="search" id="search" placeholder="Votre mot &amp; appuyer sur entrer...">
        <button type="submit" class="d-none"></button>
    </form>
    <!-- Close Icon -->
    <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
</div>
