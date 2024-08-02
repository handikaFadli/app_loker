@extends('profile.main')

@section('content-profile')
    <div class="password-content">
        <h3>Ubah Password</h3>
        <p>
            Disini anda dapat mengganti password, tolong isi semua form dengan benar.
        </p>
        <form action="{{ route('password-update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" id="old_password" name="old_password" required />
                        @error('old_password')
                            <div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
                                *{{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required />
                        @error('new_password')
                            <div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
                                *{{ $message }}
                            </div>
                        @enderror
                        <i class="bx bxs-low-vision"></i>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group last">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required />
                        @error('new_password_confirmation')
                            <div class="invalid-feedback animated fadeInUp mx-1" style="display: block;">
                                *{{ $message }}
                            </div>
                        @enderror
                        <i class="bx bxs-low-vision"></i>
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="button">
                        <button class="btn" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection