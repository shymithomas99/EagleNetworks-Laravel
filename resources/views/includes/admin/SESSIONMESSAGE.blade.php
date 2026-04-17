<div class="sessionMessage row justify-content-center" align="center">
    @if ($message = Session::get('success'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" role="alert" aria-live="assertive" aria-atomic="true"
                class="toast show bg-primary text-center" data-bs-autohide="false">
                <div class="toast-body">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" role="alert" aria-live="assertive" aria-atomic="true"
                class="toast show bg-primary text-center" data-bs-autohide="false">
                <div class="toast-body">
                    <ul class="list-group bg-transparent">
                        {!! implode(
                            '',
                            $errors->all('<li style="font-size:1rem"
                                                                                                class="text-left list-group-item bg-transparent">
                                                                                                :message</li>'),
                        ) !!}
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $(".toast").toast('hide');
        }, 5000); //  5000 milliseconds = 5 seconds
    });
</script>


<div class="sessionMessage row justify-content-center" align="center">
    @if ($message = Session::get('success'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" role="alert" aria-live="assertive" aria-atomic="true"
                class="toast show bg-primary text-center" data-bs-autohide="false">
                <div class="toast-body">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" role="alert" aria-live="assertive" aria-atomic="true"
                class="toast show bg-primary text-center" data-bs-autohide="false">
                <div class="toast-body">
                    <ul class="list-group bg-transparent">
                        {!! implode(
                            '',
                            $errors->all('<li style="font-size:1rem" class="text-left list-group-item bg-transparent">
                         :message</li>'),
                        ) !!}
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $(".toast").toast('hide');
        }, 5000); //  5000 milliseconds = 5 seconds
    });
</script>


{{-- @if (session('successmsg-contact')) --}}
    {{-- <div class="modal fade show shadow successmsg-contact" id="emailsend" style="display: none" aria-hidden="true" aria-labelledby="emailsendLabel"
        tabindex="-1" style="display: block;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="mx-auto" src="\backend_assets\fci_logo.png" style="150px;">
                </div>
                <div class="modal-body">
                    <p>Thank you for showing interest in us. We will contact you soon.
                    <p>
                        Team FCI
                    </p> --}}
                    {{-- <div class="row mx-5">
                        <button class="go-home btn btn-primary ">
                            Continue
                        </button>
                    </div> --}}
                {{-- </div>
            </div>
        </div>
    </div> --}}
    {{-- <script type="text/javascript">
        $('.go-home').click(function() {
            $('#emailsend').hide();
        });
    </script> --}}
{{-- @endif --}}


{{-- @if (session('successmsg-become_a_member')) --}}
    {{-- <div class="modal fade show shadow successmsg-becomeamember" style="display: none" id="emailsend" aria-hidden="true" aria-labelledby="emailsendLabel"
        tabindex="-1" style="display: block;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="mx-auto" src="\backend_assets\fci_logo.png" style="150px;">
                </div>
                <div class="modal-body">
                    <p>Thank you for showing interest to become a member. We will contact you soon.
                        Team FCI
                    </p> --}}
                    {{-- <div class="row mx-5">
                        <button class="go-home btn btn-primary ">
                            Continue
                        </button>
                    </div> --}}
                    {{-- <script>
                        setTimeout(function() {
                            window.location.href = '/';
                        }, 3000);
                    </script> --}}
                {{-- </div>
            </div>
        </div>
    </div> --}}
    {{-- <script type="text/javascript">
        $('.go-home').click(function() {
            $('#emailsend').hide();
        });
    </script> --}}
{{-- @endif --}}


{{-- @if (session('successmsg-requestaprayer')) --}}
    {{-- <div class="modal fade show shadow successmsg-requestaprayer" style="display: none" id="emailsend" aria-hidden="true" aria-labelledby="emailsendLabel"
        tabindex="-1" style="display: block;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="mx-auto" src="\backend_assets\fci_logo.png" style="150px;">
                </div>
                <div class="modal-body">
                    <p>Thank you for showing interest in prayer request. We will contact you soon.
                    <p>
                        Team FCI
                    </p> --}}
                    {{-- <div class="row mx-5">
                        <button class="go-home btn btn-primary ">
                            Continue
                        </button>
                    </div> --}}

                {{-- </div>
            </div>
        </div>
    </div> --}}
    {{-- <script type="text/javascript">
        $('.go-home').click(function() {
            $('#emailsend').hide();
        });
    </script> --}}
{{-- @endif --}}
