@isset($perPage)
    <div class="row justify-content-end pb-3">
        <form class="col-12 col-lg-auto mb-3 mb-lg-0">
            <input value="{{ $search ?? '' }}" type="search" class="form-control" id="input-showcase" placeholder="Search..." aria-label="Search">
        </form>

        <div class="col-5 col-lg-2 col-md-2 col-sm-3 align-self-end">
            <select class="form-control w-100" id="select-showcase" aria-label="Default select example">
                @foreach([12, 24, 48] as $count)
                    <option {{ $count == $perPage ? 'selected' : '' }} value="{{ $count }}">{{ $count }}</option>
                @endforeach
            </select>
        </div>
    </div>
@endisset
