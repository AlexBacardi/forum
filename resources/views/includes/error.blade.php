<section>
    <div class="row justify-content-center mt-3">
        <div class="col-10 col-md-6">
            @if ($message = session()->pull('error'))
                <div class="alert alert-danger mb-3 text-center">{{ $message }}</div>
            @endif
        </div>
    </div>
</section>
