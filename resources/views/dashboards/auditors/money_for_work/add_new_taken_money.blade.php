<div class="modal fade" id="new-taken-money">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New money registration</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{ route('auditor.add_new_taken_money') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="modal-body">
                <div class="card">
                    <div class="card-body register-card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required
                                    autocomplete="username" style="width: 70%;" placeholder="Enter  username">
                                    <div class="invalid-feedback">
                                        Valid input is required.
                                    </div>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="taken_amount">Amount</label>
                                <input id="taken_amount" type="text"
                                    class="form-control @error('taken_amount') is-invalid @enderror"
                                    name="taken_amount" value="{{ old('taken_amount') }}" required
                                    autocomplete="taken_amount" style="width: 70%;" placeholder="Enter amount">
                                    <div class="invalid-feedback">
                                        Valid input is required.
                                    </div>
                                @error('taken_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Register</button>
            </div>
    </form>
      </div>
    </div>
  </div>

