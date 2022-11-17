<div class="staff-wrapper mrb-3" id="staff">
    <div class="container">
        <div class="directors">
            
            <div class="ttr-section-header text-center mrb-3">
                <h2>Our Staff</h2>
                Meet  our <div class="text-alt-underlined">Directors</div>
            </div>
            <div class="row">
                @if($staffs)
                    @for ($i = 1; $i < 4; $i++)
                        <a class="col-md-4" data-bs-toggle="modal" data-bs-target="#modal{{ $i }}"  id="card{{ $i }}">
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
                        @if ($staff->is_director)
                        <a class="col-md-4" data-bs-toggle="modal" data-bs-target="#modal{{ $staff->id }}"  id="card{{ $staff->id }}">
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
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        {{-- <div class="team mrt-3">
            <div class="section-subtitle text-center mrb-3">Meet the <div class="text-alt-underlined">Management</div></div>
            <div class="row">
                @foreach ($staffs as $staff)
                    @if (!$staff->is_director)
                        <a class="col-md-4" data-bs-toggle="modal" data-bs-target="#modal{{ $staff->id }}">
                            <div class="card " >
                                <div class="card-image">
                                    <img src={{Storage::url($staff->image)}} class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <strong>{{ nameFormat($staff) }}</strong>
                                    <p >{{ $staff->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div> --}}
    </div>
</div>

{{-- modals  --}}
<!-- Button trigger modal -->

  <!-- Modal -->
  @foreach ($staffs as $staff)
  <div class="modal fade" id="modal{{ $staff->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header phone-only">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body vib-modal custom-modal">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src={{Storage::url($staff->image)}} class="card-img-top img-border" alt="...">
                </div>
                <div class="col-md-6 body">
                    <Strong class="name ">{{ nameFormat($staff)  }}</Strong>
                    <hr>
                    {!! $staff->description  !!}
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $("#x").hover(function(){
        $("#modal1").modal({
            show: true,
            backdrop: false
        })
    })
    function showDetails(id) {
        console.log(id);
        var detailId= "details"+id;
        var cardId="card"+id;
        document.getElementById(detailId).style.display= "block";
    }
    function hideDetails(id) {
        var detailId= "details"+id;
        document.getElementById(detailId).style.display= "none";
    }
  </script>
  @endforeach