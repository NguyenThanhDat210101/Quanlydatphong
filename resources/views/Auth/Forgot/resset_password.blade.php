<!doctype html>
<html lang="en">
  <head>
    <title>Đổi Mật Khẩu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Đổi Mật Khẩu
            </div>
            <div class="card-body">
             <form action="{{ route('reset.password.post') }}" method="post">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"
                      class="form-control" name="emailResetPassword" id="" value="{{$email}}" aria-describedby="helpId" readonly placeholder="">
                      <small id="helpId" class="form-text text-danger">
                        @error('emailResetPassword')
                            {{$message}}
                        @enderror
                    </small>
                    </div>

                  <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password"
                      class="form-control" name="newpassword" id="" aria-describedby="helpId" placeholder="New Password">
                      <small id="helpId" class="form-text text-danger">
                        @error('newpassword')
                            {{$message}}
                        @enderror
                    </small>
                    </div>

                  <div class="form-group">
                    <label for="">Config Password</label>
                    <input type="password"
                      class="form-control" name="configpassword" id="" aria-describedby="helpId" placeholder="Config Password">
                    <small id="helpId" class="form-text text-danger">
                        @error('configpassword')
                            {{$message}}
                        @enderror
                    </small>
                  </div>
                  <button class="btn btn-dark">Đổi Mật Khẩu</button>
             </form>
            </div>
            <div class="card-footer">
                @if (!empty($error))
                    <div class="alert alert-danger text-center">
                        {{$error}}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
