@extends('main')
@section('namePage', 'Book Room')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="row">
        {{-- Crud --}}
        <div class="col-lg-12">
            <!-- Circle Buttons -->

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Book Meet Room</h6>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <form action="{{ route('book.post') }}" method="post" id="myhour">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Ngày</label>
                                    <input type="hidden" name="meetid" value="{{ $meet_id }}">
                                    <input type="date" min="<?php echo (new Datetime())->format('Y-m-d') ?>" class="form-control col-7" name="datebook" id="mydate"
                                        aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                        @error('datebook')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                    <input type="hidden" id="time">
                                    {{-- radio --}}
                                    <div class="btn-group-toggle " data-toggle="buttons" >
                                        @for ($i = 8; $i < 23; $i++)
                                            <label class="btn btn-outline-dark {{ $i }}" style="margin: 5px">
                                                <input type="radio" value="{{($i==8 || $i==9)?'0'.$i:$i}}:00?{{($i+1==9)?'0'.$i+1:$i+1}}:00" name="hourbook" id="{{ $i }}" > {{($i==8 || $i==9)?'0'.$i:$i}}:00 - {{($i+1==9)?'0'.$i+1:$i+1}}:00
                                            </label>
                                        @endfor
                                    </div>
                                    <small id="helpId" class="form-text text-danger">
                                        @error('hourbook')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                    @if (!empty($message))
                                        <h3 id="helpId" class="form-text text-danger text-center alert alert-danger">
                                            {{ $message }}
                                        </h3>
                                    @endif

                                    {{-- end radio --}}
                                </div>

                                <br>
                                <button class="btn btn-success ">Book Room</button>
                            </form>

                        </div>
                        <div class="col">

                            <table class="table table-striped table-inverse ">
                                <thead>
                                    <tr>
                                        <th>Book Date</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($bookdate) == 0)
                                    <tr class="text-center text-danger  "><td  colspan="3" ><h2 >Phòng vẫn chưa có người Book</h2></td></tr>

                                    @endif
                                    @foreach ($bookdate as $item)
                                        <tr>
                                            <td scope="row">{{ date('d-m-Y H:i', strtotime($item->book_date)) }}</td>
                                            <td>{{ date('d-m-Y H:i', strtotime($item->start_date)) }}</td>
                                            <td>{{ date('d-m-Y H:i', strtotime($item->end_date)) }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                  <li class="page-item">
                                    <a class="page-link" href="{{$bookdate->previousPageUrl()}}">Previous</a>
                                  </li>
                                  <li class="page-item"><a class="page-link" href="{{$bookdate->currentPage()}}">{{$bookdate->currentPage()}} / {{$bookdate->lastPage()}}</a></li>
                                    <a class="page-link" href="{{$bookdate->nextPageUrl()}}">Next</a>
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
    <div id="data-table"></div>
    <script>
        var url = window.location.pathname;
        var meetId = url.split('/')[2];
        $.ajax({
            url:'http://localhost:8000/api/getAllPartTicket/'+meetId,
            type: 'GET',
            success:function(e){
                $('#mydate').change(function() {
                    $('label.btn.btn-outline-dark').removeClass('disabled');
                    for(let i=8;i < 23; i++){
                        for(let n=0;n < e.length; n++){
                            var time;
                            $('#time').val(this.value);
                            if(i==8 ){
                                time = $('#time').val() +' '+'0'+(i) +':00';
                            }
                            else if(i==9){
                                time = $('#time').val() +' '+'0'+(i) +':00';
                            }
                            else{
                                time = $('#time').val() +' '+(i) +':00';
                            }
                            console.log(time +"----"+e[n].start_date);
                            if(e[n].start_date === time+':00'){
                                $('label.btn.btn-outline-dark.'+i).addClass('disabled');
                                console.log(true);
                            }
                            // else{
                            //     $('label.btn.btn-outline-dark.'+i+'.disabled').removeClass('disabled');

                            // }
                        }
                    }
                });
            }
        });


    </script>
@endsection
