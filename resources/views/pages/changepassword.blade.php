@extends('pages.account')


@section('profile')
    <div class="border col-span-2">
        <div class="m-5">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('change-password.update') }}" class="space-y-3" method="post">
                @csrf
                @method('patch')
                <div class="form-group flex flex-col">
                    <label for="current-password">Password Lama</label>
                    <input type="password" class="mt-2 py-2 border rounded px-2" name="current-password"
                        placeholder="Password Lama">
                    @if ($errors->has('current-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group flex flex-col">
                    <label for="new_password">Password Baru</label>
                    <input type="password" class="mt-2 py-2 border rounded px-2" name="new_password"
                        placeholder="Password Baru">

                    @if ($errors->has('new-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('new-password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group flex flex-col">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="mt-2 py-2 border rounded px-2" name="confirm_password"
                        placeholder="Confirm Password">
                </div>
                <button type="submit" class="py-2 text-white bg-blue-500 hover:bg-blue-600 w-full">
                    Ubah Password
                </button>

            </form>
        </div>
    </div>
@endsection
