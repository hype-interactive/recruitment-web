<div class="staff-wrapper mrb-3" id="staff">
    <div class="container">
        <div class="directors">
            
            <div class="ttr-section-header text-center mrb-3">
                <h2>Our Staff</h2>
                Meet  our <div class="text-alt-underlined">Staff</div>
            </div>
            <div class="row">
                @if(!$staffs)
                    @for ($i = 1; $i < 4; $i++)
                        <a class="col-md-4">
                            <div class="card " >
                                <div class="card-image">
                                    <img src={{ asset('images/man.jpg') }} class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <strong>Manager</strong>
                                    <p >Manager</p>
                                </div>
                            </div>
                        </a>
                    @endfor
                @else
                    @foreach ($staffs as $staff)
                        {{-- @if ($staff->is_director) --}}
                            <a class="col-md-4">
                                <div class="card " >
                                    <div class="card-image">
                                        <img src="{{Storage::url($staff->image)}}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <strong>{{ nameFormat($staff) }}</strong>
                                        <p >{{ $staff->title }}</p>
                                    </div>
                                </div>
                            </a>
                        {{-- @endif --}}
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>