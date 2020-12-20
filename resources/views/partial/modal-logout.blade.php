
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __("แจ้งเตือน") }}
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{  __('คุณต้องการออกจากระบบหรือไม่ ?') }}
            </div>
            <div class="modal-footer">
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        {{ __('label.btn_cancel') }}
                    </button>
                    <button class="btn btn-primary" type="submit">
                        {{ __('label.btn_logout') }}
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>