@extends('Installation::installer.layouts.UpdateMaster')

@section('title')
    {{ trans('Add Purchasecode') }}
@endsection

@section('container')

    <p class="fs-12 text-center">
        {{ 'Please enter your Purchasecode' }}
    </p>

    <form method="post" action="{{ route('SprukoAppInstaller::verifypurchasecode') }}" class="tabs-wrap">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="form-group col-6 {{ $errors->has('app_purchasecode') ? ' has-error ' : '' }}">
                <label for="app_purchasecode">
                    {{ trans('Enter Your Purchasecode') }}
                    <span class="text-red">*</span>
                </label>
                <input type="text" name="app_purchasecode" id="app_purchasecode" value=""
                    placeholder="{{ trans('Enter Your Purchasecode') }}" />
                @if ($errors->has('app_purchasecode'))
                    <span class="error-block">
                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                        {{ $errors->first('app_purchasecode') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="buttons">
            <button class="button" type="submit" id="buttonfinal" onclick="button(this)">
                {{ trans('Verify') }}
                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
            </button>
        </div>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        "use strict";


        function spruko() {
            event.preventDefault();
            if (document.querySelector('#password-toggle input').getAttribute("type") == "text") {

                document.querySelector('#password-toggle input').setAttribute('type', 'password');
                document.querySelector('#password-toggle i').classList.add("fa-eye");
                document.querySelector('#password-toggle i').classList.remove("fa-eye-slash");

            } else if (document.querySelector('#password-toggle input').getAttribute("type") == "password") {

                document.querySelector('#password-toggle input').setAttribute('type', 'text');
                document.querySelector('#password-toggle a i').classList.remove("fa-eye");

                document.querySelector('#password-toggle a i').classList.add("fa-eye-slash");
            }
        }


        function button(bt) {
            document.getElementById("buttonfinal").innerHTML = `Please Wait... <i class="fa fa-spinner fa-spin"></i>`;
            bt.disabled = true;
            bt.form.submit();
            document.getElementById("buttonfinal").style.cursor = "not-allowed";
            document.getElementById("buttonfinal").style.opacity = "0.5";
        }
    </script>
@endsection
