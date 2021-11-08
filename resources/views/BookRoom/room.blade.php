@extends('main')
@section('namePage', 'Book Room')
@section('content')
    <div class="row">
        {{-- Crud --}}
        <div class="col-lg-12">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Book Meet Room</h6>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">

                            <form action="{{ route('book.room.post') }}" method="post">
                                {{ csrf_field() }}
                                <img id="my_changing_image" src="../images/Noimage.png" width="300px" height="300px" />
                                <div class="form-group col-6">
                                    <div class="form-group">
                                        <label for="my-select">Select Meet Room</label>
                                        <select id="my_select_box" class="form-control" name="meetRoom">
                                            <option value="">Chọn Phòng Họp</option>
                                            @foreach ($getMeet as $item)
                                                <option value="../images/{{ $item->image }}?{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                                {{-- <option value="{{$item->id}}" >{{$item->name}} </option> --}}
                                            @endforeach
                                        </select>
                                        <small id="helpId" class="form-text text-danger">
                                            @error('meetRoom')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <button class="btn btn-outline-success">Book Room</button>
                                </div>
                            </form>

                        </div>

                        <div class="col">
                            <table class=" text-center table table-striped table-inverse ">
                                <thead>
                                    <tr>
                                        <th>Name </th>
                                        <th>Address</th>
                                        <th>Seats</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center tex">
                                    @foreach ($getMeetTable as $item)
                                        <tr>
                                            <td scope="row">{{ $item->name }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->seats }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                  <li class="page-item">
                                    <a class="page-link" href="{{$getMeetTable->previousPageUrl()}}">Previous</a>
                                  </li>
                                  <li class="page-item"><a class="page-link" href="{{$getMeetTable->currentPage()}}">{{$getMeetTable->currentPage()}} / {{$getMeetTable->lastPage()}}</a></li>
                                    <a class="page-link" href="{{$getMeetTable->nextPageUrl()}}">Next</a>
                                  </li>
                                </ul>
                              </nav>
                        </div>

                    </div>


                </div>
            </div>
            <!-- Brand Buttons -->

        </div>
    </div>
    <script>
        $('#my_select_box').change(function() {
            $('#my_changing_image').attr('src', $('#my_select_box').val());
            console.log($('#my_select_box').val());
        });
    </script>
@endsection
